<?php

namespace App\Support;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;

/**
 * Friction-free spam protection for public forms.
 *
 * Two passive checks, validated against the <x-spam-guard /> Blade component:
 *   1. Honeypot  — a hidden field that automated bots fill in but humans never see.
 *   2. Timing    — an encrypted "page rendered at" timestamp; bots submit almost
 *                  instantly, whereas a real visitor takes at least a few seconds.
 *
 * Neither check adds any friction for genuine users, and both work even when an
 * external CAPTCHA service is unavailable or unconfigured.
 */
class SpamGuard
{
    /** Honeypot input name — must match the spam-guard Blade component. */
    public const HONEYPOT_FIELD = 'website_url';

    /** Encrypted render-timestamp input name — must match the Blade component. */
    public const TIMESTAMP_FIELD = 'form_loaded_at';

    /** Lightweight browser-interaction proof input name — must match the Blade component. */
    public const INTERACTION_FIELD = 'form_guard';

    /**
     * Inspect a request and return the reason it looks like spam, or null if it passes.
     *
     * @param  float  $minSeconds  Minimum plausible fill time (reject faster submits).
     * @param  int    $maxSeconds  Maximum token age before it is considered stale.
     */
    public static function detect(
        Request $request,
        float $minSeconds = 2.0,
        int $maxSeconds = 86400,
        array $contentFields = [],
        ?string $expectedForm = null,
        ?array $rateLimit = null
    ): ?string
    {
        // 1. Honeypot: any value here means an automated client filled a hidden field.
        if (filled($request->input(self::HONEYPOT_FIELD))) {
            return 'honeypot';
        }

        // 2. Timing trap: the encrypted timestamp must be present and decryptable.
        $token = $request->input(self::TIMESTAMP_FIELD);
        if (blank($token)) {
            return 'missing-timestamp';
        }

        try {
            $payload = self::decodePayload(Crypt::decryptString($token));
        } catch (DecryptException $e) {
            return 'tampered-timestamp';
        }

        if ($payload === null) {
            return 'invalid-timestamp';
        }

        if ($expectedForm !== null && isset($payload['form']) && !hash_equals($expectedForm, (string) $payload['form'])) {
            return 'form-mismatch';
        }

        if (isset($payload['session_hash']) && !self::matchesSession($request, (string) $payload['session_hash'])) {
            return 'session-mismatch';
        }

        if (!empty($payload['requires_interaction']) && !self::hasBrowserInteraction($request, (string) $token)) {
            return 'missing-interaction';
        }

        $loadedAt = (int) $payload['loaded_at'];
        $elapsed = time() - $loadedAt;

        if ($elapsed < $minSeconds) {
            return 'too-fast';
        }

        if ($elapsed > $maxSeconds) {
            return 'stale';
        }

        if ($rateLimit !== null && ($reason = self::detectRateLimit($request, $rateLimit)) !== null) {
            return $reason;
        }

        if ($contentFields !== [] && ($reason = self::detectContentSpam($request, $contentFields)) !== null) {
            return $reason;
        }

        return null;
    }

    /**
     * Convenience wrapper: detect + log. Returns true when the request is spam.
     */
    public static function isSpam(
        Request $request,
        float $minSeconds = 2.0,
        array $contentFields = [],
        ?string $expectedForm = null,
        int $maxSeconds = 86400,
        ?array $rateLimit = null
    ): bool
    {
        $reason = self::detect($request, $minSeconds, $maxSeconds, $contentFields, $expectedForm, $rateLimit);

        if ($reason !== null) {
            Log::warning('Spam submission blocked', [
                'reason' => $reason,
                'ip' => $request->ip(),
                'path' => $request->path(),
                'user_agent' => substr((string) $request->userAgent(), 0, 200),
            ]);

            return true;
        }

        return false;
    }

    /**
     * Build the encrypted payload rendered by the Blade component.
     */
    public static function payload(Request $request, ?string $form = null): string
    {
        $sessionId = $request->hasSession() ? (string) $request->session()->getId() : '';

        return Crypt::encryptString(json_encode([
            'loaded_at' => time(),
            'session_hash' => hash('sha256', $sessionId),
            'form' => $form,
            'requires_interaction' => true,
        ], JSON_THROW_ON_ERROR));
    }

    protected static function decodePayload(string $decrypted): ?array
    {
        // Backward compatibility for timestamp-only tokens rendered before this guard was strengthened.
        if (ctype_digit($decrypted)) {
            return ['loaded_at' => (int) $decrypted];
        }

        $payload = json_decode($decrypted, true);

        if (!is_array($payload) || !isset($payload['loaded_at']) || !is_numeric($payload['loaded_at'])) {
            return null;
        }

        return $payload;
    }

    protected static function matchesSession(Request $request, string $expectedHash): bool
    {
        if (!$request->hasSession()) {
            return false;
        }

        return hash_equals($expectedHash, hash('sha256', (string) $request->session()->getId()));
    }

    protected static function hasBrowserInteraction(Request $request, string $token): bool
    {
        $proof = (string) $request->input(self::INTERACTION_FIELD, '');

        return $proof !== '' && hash_equals(substr($token, -16), $proof);
    }

    protected static function detectRateLimit(Request $request, array $config): ?string
    {
        $scope = preg_replace('/[^a-z0-9_-]/i', '', (string) ($config['scope'] ?? 'form'));
        $maxAttempts = (int) ($config['max'] ?? 4);
        $decaySeconds = (int) ($config['decay'] ?? 3600);

        $keys = [
            'spamguard:' . $scope . ':ip:' . sha1((string) $request->ip()),
        ];

        $email = strtolower(trim((string) $request->input('email', '')));
        if ($email !== '') {
            $keys[] = 'spamguard:' . $scope . ':email:' . sha1($email);
        }

        foreach ($keys as $key) {
            if (RateLimiter::tooManyAttempts($key, $maxAttempts)) {
                return 'rate-limit';
            }
        }

        foreach ($keys as $key) {
            RateLimiter::hit($key, $decaySeconds);
        }

        return null;
    }

    protected static function detectContentSpam(Request $request, array $fields): ?string
    {
        $totalUrls = 0;

        foreach ($fields as $field) {
            $value = $request->input($field);
            if (!is_scalar($value)) {
                continue;
            }

            $text = trim((string) $value);
            if ($text === '') {
                continue;
            }

            if ($field === 'email' && self::isDisposableEmail($text)) {
                return 'disposable-email';
            }

            if (preg_match('/<\s*a\b|href\s*=|\[url(?:=|\])/i', $text)) {
                return 'link-markup';
            }

            $urlCount = preg_match_all('/(?:https?:\/\/|www\.|[a-z0-9-]+\.(?:ru|cn|tk|top|xyz|icu|click|monster|quest|cam)\b)/i', $text);
            $totalUrls += $urlCount;

            if (in_array($field, ['name', 'company', 'phone'], true) && $urlCount > 0) {
                return 'url-in-short-field';
            }

            if ($urlCount > 0 && preg_match('/\b(?:viagra|cialis|casino|betting|crypto|bitcoin|forex|payday loan|backlink|guest post)\b/i', $text)) {
                return 'spam-keyword';
            }

            if (preg_match('/(.)\1{14,}/u', $text)) {
                return 'repeated-characters';
            }
        }

        if ($totalUrls >= 2) {
            return 'too-many-links';
        }

        return null;
    }

    protected static function isDisposableEmail(string $email): bool
    {
        $domain = strtolower(substr(strrchr($email, '@') ?: '', 1));

        if ($domain === '') {
            return false;
        }

        return in_array($domain, [
            '10minutemail.com',
            'dispostable.com',
            'fakeinbox.com',
            'getnada.com',
            'guerrillamail.com',
            'maildrop.cc',
            'mailinator.com',
            'sharklasers.com',
            'temp-mail.org',
            'tempmail.com',
            'trashmail.com',
            'yopmail.com',
        ], true);
    }
}
