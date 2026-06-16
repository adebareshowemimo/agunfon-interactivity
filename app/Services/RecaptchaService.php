<?php

namespace App\Services;

use Google\Cloud\RecaptchaEnterprise\V1\Client\RecaptchaEnterpriseServiceClient;
use Google\Cloud\RecaptchaEnterprise\V1\Event;
use Google\Cloud\RecaptchaEnterprise\V1\Assessment;
use Google\Cloud\RecaptchaEnterprise\V1\CreateAssessmentRequest;
use Illuminate\Support\Facades\Log;

class RecaptchaService
{
    protected string $siteKey;
    protected string $projectId;
    protected string $secret;
    protected float $minScore;
    protected bool $required;

    public function __construct()
    {
        $this->siteKey = (string) config('services.recaptcha.site_key', '');
        $this->projectId = (string) config('services.recaptcha.project_id', '');
        $this->secret = (string) config('services.recaptcha.secret', '');
        $this->minScore = 0.5; // Minimum acceptable score (0.0 to 1.0)
        $this->required = (bool) config('services.recaptcha.required', false);
    }

    /**
     * Verify reCAPTCHA Enterprise token
     *
     * @param string|null $token The reCAPTCHA token from the frontend
     * @param string $action The expected action name
     * @return array ['success' => bool, 'score' => float, 'error' => string|null]
     */
    public function verify(?string $token, string $action = 'submit'): array
    {
        if (empty($token)) {
            return [
                'success' => false,
                'score' => 0,
                'error' => 'reCAPTCHA token is missing'
            ];
        }

        // Credentials check. reCAPTCHA Enterprise authenticates via the Google
        // service-account JSON (GOOGLE_APPLICATION_CREDENTIALS); the classic
        // secret key is only used by reCAPTCHA v2/v3.
        $credentialsPath = $this->credentialsPath();
        if (!$this->hasVerificationConfig()) {
            // Fail closed if the site explicitly requires reCAPTCHA, otherwise fall
            // back gracefully (the honeypot + timing guard still protects the form).
            if ($this->required) {
                Log::error('reCAPTCHA credentials missing while RECAPTCHA_REQUIRED=true — rejecting submission');
                return [
                    'success' => false,
                    'score' => 0,
                    'error' => 'CAPTCHA verification is temporarily unavailable. Please try again later.'
                ];
            }

            Log::warning('reCAPTCHA credentials not configured — skipping verification (honeypot/timing guard still active)');
            return [
                'success' => true,
                'score' => 1.0,
                'error' => null
            ];
        }

        try {
            // Create the reCAPTCHA client. Pass the service-account JSON explicitly
            // (resolved from the app root) so authentication works regardless of the
            // web server's working directory, rather than relying on env auto-discovery.
            $client = new RecaptchaEnterpriseServiceClient(
                $credentialsPath !== null ? ['credentials' => $credentialsPath] : []
            );
            $projectName = $client->projectName($this->projectId);

            // Set the properties of the event to be tracked
            $event = (new Event())
                ->setSiteKey($this->siteKey)
                ->setToken($token);

            // Build the assessment request
            $assessment = (new Assessment())
                ->setEvent($event);

            $request = (new CreateAssessmentRequest())
                ->setParent($projectName)
                ->setAssessment($assessment);

            $response = $client->createAssessment($request);

            // Check if the token is valid
            if (!$response->getTokenProperties()->getValid()) {
                $invalidReason = $response->getTokenProperties()->getInvalidReason();
                Log::warning('reCAPTCHA token invalid', ['reason' => $invalidReason]);
                
                return [
                    'success' => false,
                    'score' => 0,
                    'error' => 'Invalid reCAPTCHA token'
                ];
            }

            // Check if the expected action was executed
            $tokenAction = $response->getTokenProperties()->getAction();
            if ($tokenAction !== $action) {
                Log::warning('reCAPTCHA action mismatch', [
                    'expected' => $action,
                    'received' => $tokenAction
                ]);

                $client->close();

                return [
                    'success' => false,
                    'score' => 0,
                    'error' => 'reCAPTCHA action mismatch'
                ];
            }

            // Get the risk score
            $score = $response->getRiskAnalysis()->getScore();
            
            Log::info('reCAPTCHA assessment', [
                'score' => $score,
                'action' => $tokenAction
            ]);

            // Close the client
            $client->close();

            return [
                'success' => $score >= $this->minScore,
                'score' => $score,
                'error' => $score < $this->minScore ? 'Low reCAPTCHA score - suspected bot' : null
            ];

        } catch (\Exception $e) {
            Log::error('reCAPTCHA Enterprise error', ['error' => $e->getMessage()]);
            
            return [
                'success' => false,
                'score' => 0,
                'error' => 'reCAPTCHA verification failed'
            ];
        }
    }

    /**
     * Whether this environment has enough configuration to attempt verification.
     */
    public function shouldVerify(): bool
    {
        return $this->required || $this->hasVerificationConfig();
    }

    /**
     * Get the site key for frontend use
     */
    public function getSiteKey(): string
    {
        return $this->siteKey;
    }

    protected function hasVerificationConfig(): bool
    {
        return $this->siteKey !== ''
            && $this->projectId !== ''
            && ($this->secret !== '' || $this->credentialsPath() !== null);
    }

    protected function credentialsPath(): ?string
    {
        $configuredPath = env('GOOGLE_APPLICATION_CREDENTIALS');

        if (empty($configuredPath)) {
            return null;
        }

        $path = preg_match('/^(?:[A-Za-z]:[\/\\\\]|[\/\\\\])/', $configuredPath)
            ? $configuredPath
            : base_path($configuredPath);

        return is_file($path) ? $path : null;
    }
}
