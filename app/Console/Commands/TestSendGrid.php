<?php

namespace App\Console\Commands;

use App\Services\SendGridService;
use Illuminate\Console\Command;

class TestSendGrid extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendgrid:test {--email=test@example.com : Email address to send test to}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test SendGrid integration by sending a test email';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $email = $this->option('email');

        if ($email === 'test@example.com') {
            $this->warn('⚠️  Using default test email. Use --email to specify a real email address.');
            if (!$this->confirm('Continue with test@example.com?')) {
                $this->info('Cancelled.');
                return 1;
            }
        }

        $this->info('🔍 Testing SendGrid integration...');
        $this->newLine();

        // Check API Key
        $this->info('1️⃣  Checking SendGrid API Key...');
        $apiKey = config('services.sendgrid.api_key') ?? env('SENDGRID_API_KEY');
        
        if (!$apiKey) {
            $this->error('❌ SENDGRID_API_KEY not found in .env file!');
            $this->info('Add this to your .env file:');
            $this->line('SENDGRID_API_KEY=your_api_key_here');
            return 1;
        }

        if (strlen($apiKey) < 10) {
            $this->error('❌ SENDGRID_API_KEY appears to be invalid (too short)');
            return 1;
        }

        $this->info('✅ SENDGRID_API_KEY is configured');
        $this->line('   Key (masked): ' . substr($apiKey, 0, 5) . '...' . substr($apiKey, -5));
        $this->newLine();

        // Check From Address
        $this->info('2️⃣  Checking from address...');
        $from = config('mail.from.address');
        $fromName = config('mail.from.name');

        if (!$from) {
            $this->error('❌ MAIL_FROM_ADDRESS not configured!');
            return 1;
        }

        $this->info("✅ From address: {$fromName} <{$from}>");
        $this->newLine();

        // Try to instantiate SendGrid Service
        $this->info('3️⃣  Initializing SendGrid service...');
        try {
            $sendgrid = app(SendGridService::class);
            $this->info('✅ SendGrid service initialized');
        } catch (\Exception $e) {
            $this->error('❌ Failed to initialize SendGrid service: ' . $e->getMessage());
            return 1;
        }
        $this->newLine();

        // Send test email
        $this->info('4️⃣  Sending test email...');
        $this->info("   To: {$email}");
        $this->info("   From: {$fromName} <{$from}>");

        try {
            $result = $sendgrid->send(
                from: $from,
                fromName: $fromName,
                to: $email,
                subject: 'SendGrid Test Email - Agunfon',
                htmlContent: $this->getTestEmailHtml(),
                plainTextContent: 'This is a test email from Agunfon SendGrid integration.'
            );

            if ($result['success']) {
                $this->info('✅ Email sent successfully!');
                $this->info('   Status Code: ' . $result['status_code']);
                $this->newLine();

                if ($email !== 'test@example.com') {
                    $this->info('📧 Check your email inbox for the test message.');
                }

                return 0;
            } else {
                $this->error('❌ Failed to send email');
                $this->error('   Error: ' . $result['message']);
                return 1;
            }
        } catch (\Exception $e) {
            $this->error('❌ Exception occurred: ' . $e->getMessage());
            $this->newLine();
            $this->info('Troubleshooting tips:');
            $this->line('1. Verify SENDGRID_API_KEY is correct');
            $this->line('2. Verify sender email is verified in SendGrid dashboard');
            $this->line('3. Check SendGrid account has available email quota');
            $this->line('4. Review .env file for any typos');
            return 1;
        }
    }

    /**
     * Get the HTML content for test email
     */
    private function getTestEmailHtml(): string
    {
        return <<<'HTML'
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; border-radius: 5px; }
        .content { padding: 20px; border: 1px solid #ddd; border-radius: 5px; margin: 20px 0; }
        .footer { text-align: center; font-size: 12px; color: #999; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎉 Agunfon SendGrid Test</h1>
        </div>
        
        <div class="content">
            <p>Hello,</p>
            
            <p>This is a <strong>test email</strong> from your Agunfon application using SendGrid integration.</p>
            
            <p><strong>Test Details:</strong></p>
            <ul>
                <li>✅ SendGrid API connection working</li>
                <li>✅ Sender email verified</li>
                <li>✅ Email delivered successfully</li>
            </ul>
            
            <p>If you received this email, your SendGrid integration is properly configured!</p>
            
            <p><strong>Next steps:</strong></p>
            <ol>
                <li>Add your SendGrid API key to the .env file</li>
                <li>Verify your sender email in SendGrid dashboard</li>
                <li>Test with your mail classes</li>
                <li>Deploy to production with queue worker</li>
            </ol>
        </div>
        
        <div class="footer">
            <p>Sent by Agunfon | Powered by SendGrid</p>
            <p><small>Test email generated at: ' . now()->format('Y-m-d H:i:s') . ' UTC</small></p>
        </div>
    </div>
</body>
</html>
HTML;
    }
}
