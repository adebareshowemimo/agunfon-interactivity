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
    protected float $minScore;

    public function __construct()
    {
        $this->siteKey = config('services.recaptcha.site_key');
        $this->projectId = config('services.recaptcha.project_id');
        $this->minScore = 0.5; // Minimum acceptable score (0.0 to 1.0)
    }

    /**
     * Verify reCAPTCHA Enterprise token
     *
     * @param string $token The reCAPTCHA token from the frontend
     * @param string $action The expected action name
     * @return array ['success' => bool, 'score' => float, 'error' => string|null]
     */
    public function verify(string $token, string $action = 'submit'): array
    {
        if (empty($token)) {
            return [
                'success' => false,
                'score' => 0,
                'error' => 'reCAPTCHA token is missing'
            ];
        }

        // Graceful fallback: if credentials are not configured, allow submission
        $credentialsPath = base_path(env('GOOGLE_APPLICATION_CREDENTIALS', ''));
        $secret = config('services.recaptcha.secret');
        if ((empty($secret) && (empty($credentialsPath) || !file_exists($credentialsPath)))) {
            Log::warning('reCAPTCHA credentials not configured — bypassing verification');
            return [
                'success' => true,
                'score' => 1.0,
                'error' => null
            ];
        }

        try {
            // Create the reCAPTCHA client
            $client = new RecaptchaEnterpriseServiceClient();
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
     * Get the site key for frontend use
     */
    public function getSiteKey(): string
    {
        return $this->siteKey;
    }
}
