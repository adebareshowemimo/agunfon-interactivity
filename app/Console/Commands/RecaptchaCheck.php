<?php

namespace App\Console\Commands;

use Google\Cloud\RecaptchaEnterprise\V1\Assessment;
use Google\Cloud\RecaptchaEnterprise\V1\Client\RecaptchaEnterpriseServiceClient;
use Google\Cloud\RecaptchaEnterprise\V1\CreateAssessmentRequest;
use Google\Cloud\RecaptchaEnterprise\V1\Event;
use Illuminate\Console\Command;

class RecaptchaCheck extends Command
{
    protected $signature = 'recaptcha:check';

    protected $description = 'Verify reCAPTCHA Enterprise configuration and that credentials authenticate with Google';

    public function handle(): int
    {
        $this->info('reCAPTCHA Enterprise — configuration check');
        $this->newLine();

        $siteKey    = (string) config('services.recaptcha.site_key');
        $projectId  = (string) config('services.recaptcha.project_id');
        $secret     = (string) config('services.recaptcha.secret');
        $required   = (bool) config('services.recaptcha.required', false);
        $credRel    = (string) env('GOOGLE_APPLICATION_CREDENTIALS', '');
        $credPath   = $credRel !== '' ? base_path($credRel) : '';
        $credExists = $credPath !== '' && file_exists($credPath);

        $preview = fn (string $v): string => $v !== '' ? substr($v, 0, 6) . '… (' . strlen($v) . ' chars)' : '(empty)';

        $this->table(['Setting', 'Value'], [
            ['Site key', $preview($siteKey)],
            ['Project ID', $projectId !== '' ? $projectId : '(empty)'],
            ['Secret key (classic only)', $secret !== '' ? 'SET — should be EMPTY for Enterprise' : '(empty) — correct'],
            ['Credentials path (.env)', $credRel !== '' ? $credRel : '(empty)'],
            ['Credentials file exists', $credExists ? 'yes' : 'NO'],
            ['RECAPTCHA_REQUIRED', $required ? 'true (fail closed)' : 'false (graceful)'],
        ]);

        // Mirror the runtime bypass logic in RecaptchaService::verify().
        $wouldBypass = $secret === '' && ! $credExists;

        if ($wouldBypass) {
            $this->newLine();
            if ($required) {
                $this->error('Credentials missing AND RECAPTCHA_REQUIRED=true → submissions will be REJECTED (fail closed).');
            } else {
                $this->warn('Credentials missing → reCAPTCHA verification is SKIPPED.');
                $this->line('The honeypot + timing + rate-limit guard is the active protection until the JSON is in place.');
            }
            $this->line('Place the service-account JSON at:');
            $this->line('  ' . ($credPath !== '' ? $credPath : base_path('storage/credentials/recaptcha-credentials.json')));

            return self::FAILURE;
        }

        if (! $credExists) {
            $this->newLine();
            $this->warn('A secret key is set but no Enterprise JSON was found.');
            $this->line('reCAPTCHA Enterprise authenticates via the service-account JSON, not the secret key.');

            return self::FAILURE;
        }

        if ($projectId === '' || $siteKey === '') {
            $this->newLine();
            $this->error('RECAPTCHA_PROJECT_ID and RECAPTCHA_SITE_KEY must both be set.');

            return self::FAILURE;
        }

        // Live auth test: send a deliberately invalid token. If credentials are good,
        // Google authenticates the request and returns an assessment that simply marks
        // the token invalid. If credentials/role/project are wrong, the call throws.
        $this->newLine();
        $this->info('Testing live authentication against Google (using a dummy token)…');

        try {
            $client = new RecaptchaEnterpriseServiceClient(['credentials' => $credPath]);

            $event = (new Event())
                ->setSiteKey($siteKey)
                ->setToken('recaptcha-check-dummy-token');

            $request = (new CreateAssessmentRequest())
                ->setParent($client->projectName($projectId))
                ->setAssessment((new Assessment())->setEvent($event));

            $response = $client->createAssessment($request);
            $client->close();

            $tokenValid = $response->getTokenProperties()->getValid();

            $this->info('Authentication OK — Google accepted the request and returned an assessment.');
            $this->line('  (The dummy token was reported ' . ($tokenValid ? 'valid' : 'invalid') . ', which is expected.)');
            $this->newLine();
            $this->info('reCAPTCHA Enterprise is correctly configured. Real submissions will be scored.');

            return self::SUCCESS;
        } catch (\Throwable $e) {
            $this->newLine();
            $this->error('Authentication / API call FAILED:');
            $this->line('  ' . $e->getMessage());
            $this->newLine();
            $this->line('Common causes:');
            $this->line('  • Service account is missing the "reCAPTCHA Enterprise Agent" role');
            $this->line('  • reCAPTCHA Enterprise API is not enabled on the project');
            $this->line('  • Project ID is wrong, or the JSON key belongs to a different project');
            $this->line('  • Billing is not enabled on the Google Cloud project');

            return self::FAILURE;
        }
    }
}
