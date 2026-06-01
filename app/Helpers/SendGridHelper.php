<?php

namespace App\Helpers;

use App\Services\SendGridService;
use Illuminate\Support\Facades\Log;

/**
 * SendGrid helper functions for sending emails
 */
class SendGridHelper
{
    /**
     * Send an email via SendGrid
     * 
     * @param string $from From email address
     * @param string $fromName From name
     * @param string|array $to To email address(es)
     * @param string $subject Email subject
     * @param string $htmlContent HTML content
     * @param array|null $options Additional options (plaintext, replyTo, cc, bcc, attachments)
     * @return bool
     */
    public static function send(
        string $from,
        string $fromName,
        string|array $to,
        string $subject,
        string $htmlContent,
        ?array $options = []
    ): bool {
        try {
            $sendgrid = app(SendGridService::class);
            
            $result = $sendgrid->send(
                from: $from,
                fromName: $fromName,
                to: $to,
                subject: $subject,
                htmlContent: $htmlContent,
                plainTextContent: $options['plaintext'] ?? null,
                replyTo: $options['replyTo'] ?? null,
                cc: $options['cc'] ?? null,
                bcc: $options['bcc'] ?? null,
                attachments: $options['attachments'] ?? null,
            );

            return $result['success'];
        } catch (\Exception $e) {
            Log::error('SendGrid send error: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Send a template email via SendGrid
     * 
     * @param string $from From email address
     * @param string $fromName From name
     * @param string|array $to To email address(es)
     * @param string $templateId SendGrid template ID
     * @param array $dynamicData Template dynamic data
     * @return bool
     */
    public static function sendTemplate(
        string $from,
        string $fromName,
        string|array $to,
        string $templateId,
        array $dynamicData = []
    ): bool {
        try {
            $sendgrid = app(SendGridService::class);
            
            $result = $sendgrid->sendTemplate(
                from: $from,
                fromName: $fromName,
                to: $to,
                templateId: $templateId,
                dynamicData: $dynamicData,
            );

            return $result['success'];
        } catch (\Exception $e) {
            Log::error('SendGrid template send error: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Get the SendGrid service instance
     * 
     * @return SendGridService
     */
    public static function getInstance(): SendGridService
    {
        return app(SendGridService::class);
    }
}
