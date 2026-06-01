<?php

namespace App\Services;

use SendGrid;
use SendGrid\Mail\Mail;
use SendGrid\Mail\To;
use SendGrid\Mail\ReplyToList;
use SendGrid\Mail\ReplyTo;
use Exception;
use Illuminate\Support\Facades\Log;

class SendGridService
{
    protected SendGrid $sendgrid;

    /**
     * Create a new SendGrid service instance
     */
    public function __construct()
    {
        $apiKey = config('services.sendgrid.api_key') ?? env('SENDGRID_API_KEY');
        
        if (!$apiKey) {
            throw new Exception('SendGrid API key is not configured');
        }

        $this->sendgrid = new SendGrid($apiKey);
    }

    /**
     * Send an email using SendGrid
     *
     * @param string $from From email address
     * @param string $fromName From name
     * @param string|array $to To email address(es)
     * @param string $subject Email subject
     * @param string $htmlContent HTML content
     * @param string|null $plainTextContent Plain text content
     * @param array|null $replyTo Reply-to email addresses
     * @param array|null $cc CC email addresses
     * @param array|null $bcc BCC email addresses
     * @param array|null $attachments Attachments
     * @return array SendGrid response
     */
    public function send(
        string $from,
        string $fromName,
        string|array $to,
        string $subject,
        string $htmlContent,
        ?string $plainTextContent = null,
        ?array $replyTo = null,
        ?array $cc = null,
        ?array $bcc = null,
        ?array $attachments = null
    ): array {
        try {
            $mail = new Mail();
            $mail->setFrom($from, $fromName);
            $mail->setSubject($subject);

            // Handle multiple recipients
            if (is_array($to)) {
                foreach ($to as $email => $name) {
                    if (is_numeric($email)) {
                        $mail->addTo($name);
                    } else {
                        $mail->addTo($email, $name);
                    }
                }
            } else {
                $mail->addTo($to);
            }

            // Add content
            $mail->addContent('text/html', $htmlContent);
            
            if ($plainTextContent) {
                $mail->addContent('text/plain', $plainTextContent);
            }

            // Add reply-to
            if ($replyTo) {
                if (is_array($replyTo)) {
                    $replyToList = new ReplyToList();
                    foreach ($replyTo as $email => $name) {
                        if (is_numeric($email)) {
                            $replyToList->addReplyTo(new ReplyTo($name));
                        } else {
                            $replyToList->addReplyTo(new ReplyTo($email, $name));
                        }
                    }
                    $mail->setReplyToList($replyToList);
                } else {
                    $mail->setReplyTo($replyTo);
                }
            }

            // Add CC recipients
            if ($cc) {
                foreach ((array) $cc as $email => $name) {
                    if (is_numeric($email)) {
                        $mail->addCc($name);
                    } else {
                        $mail->addCc($email, $name);
                    }
                }
            }

            // Add BCC recipients
            if ($bcc) {
                foreach ((array) $bcc as $email => $name) {
                    if (is_numeric($email)) {
                        $mail->addBcc($name);
                    } else {
                        $mail->addBcc($email, $name);
                    }
                }
            }

            // Add attachments
            if ($attachments) {
                foreach ($attachments as $attachment) {
                    if (isset($attachment['file']) && isset($attachment['filename'])) {
                        $mail->addAttachment(
                            base64_encode($attachment['file']),
                            $attachment['type'] ?? 'application/octet-stream',
                            $attachment['filename']
                        );
                    }
                }
            }

            // Send the email
            $response = $this->sendgrid->send($mail);

            // Log successful send
            Log::info('Email sent via SendGrid', [
                'to' => is_array($to) ? implode(', ', array_keys($to)) : $to,
                'subject' => $subject,
                'status_code' => $response->statusCode(),
            ]);

            return [
                'success' => true,
                'status_code' => $response->statusCode(),
                'message' => 'Email sent successfully',
            ];
        } catch (Exception $e) {
            Log::error('SendGrid email sending failed', [
                'error' => $e->getMessage(),
                'to' => is_array($to) ? implode(', ', array_keys($to)) : $to,
                'subject' => $subject,
            ]);

            return [
                'success' => false,
                'status_code' => null,
                'message' => $e->getMessage(),
                'error' => $e,
            ];
        }
    }

    /**
     * Send using Mail template
     *
     * @param string $from From email
     * @param string $fromName From name
     * @param string|array $to To email(s)
     * @param string $templateId SendGrid template ID
     * @param array $dynamicData Template dynamic data
     * @return array
     */
    public function sendTemplate(
        string $from,
        string $fromName,
        string|array $to,
        string $templateId,
        array $dynamicData = []
    ): array {
        try {
            $mail = new Mail();
            $mail->setFrom($from, $fromName);
            $mail->setTemplateId($templateId);

            // Handle multiple recipients
            if (is_array($to)) {
                foreach ($to as $email => $name) {
                    if (is_numeric($email)) {
                        $mail->addTo($name);
                    } else {
                        $mail->addTo($email, $name);
                    }
                }
            } else {
                $mail->addTo($to);
            }

            // Add dynamic template data
            if (!empty($dynamicData)) {
                $mail->addDynamicTemplateDatas($dynamicData);
            }

            $response = $this->sendgrid->send($mail);

            Log::info('Template email sent via SendGrid', [
                'template_id' => $templateId,
                'status_code' => $response->statusCode(),
            ]);

            return [
                'success' => true,
                'status_code' => $response->statusCode(),
                'message' => 'Template email sent successfully',
            ];
        } catch (Exception $e) {
            Log::error('SendGrid template email sending failed', [
                'error' => $e->getMessage(),
                'template_id' => $templateId,
            ]);

            return [
                'success' => false,
                'status_code' => null,
                'message' => $e->getMessage(),
                'error' => $e,
            ];
        }
    }

    /**
     * Get SendGrid instance for advanced usage
     */
    public function getInstance(): SendGrid
    {
        return $this->sendgrid;
    }
}
