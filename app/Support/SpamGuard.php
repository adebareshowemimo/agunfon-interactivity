<?php

namespace App\Support;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

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

    /**
     * Inspect a request and return the reason it looks like spam, or null if it passes.
     *
     * @param  float  $minSeconds  Minimum plausible fill time (reject faster submits).
     * @param  int    $maxSeconds  Maximum token age before it is considered stale.
     */
    public static function detect(Request $request, float $minSeconds = 2.0, int $maxSeconds = 86400): ?string
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
            $loadedAt = (int) Crypt::decryptString($token);
        } catch (DecryptException $e) {
            return 'tampered-timestamp';
        }

        $elapsed = time() - $loadedAt;

        if ($elapsed < $minSeconds) {
            return 'too-fast';
        }

        if ($elapsed > $maxSeconds) {
            return 'stale';
        }

        return null;
    }

    /**
     * Convenience wrapper: detect + log. Returns true when the request is spam.
     */
    public static function isSpam(Request $request, float $minSeconds = 2.0): bool
    {
        $reason = self::detect($request, $minSeconds);

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
}
