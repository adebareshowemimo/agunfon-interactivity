<?php

namespace App\Mail;

use App\Services\SendGridService;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;

/**
 * Base Mailable class for SendGrid integration
 * 
 * All mail classes that need to send via SendGrid should extend this class
 * instead of Illuminate\Mail\Mailable
 * 
 * Usage:
 * class MyMail extends SendGridMailable { ... }
 */
class SendGridMailable extends Mailable
{
    /**
     * Send the message using SendGrid
     * This method is called by Laravel's mail system
     */
    public function send($mailer)
    {
        // Use SendGrid service
        $sendgrid = app(SendGridService::class);
        
        // Get the envelope
        $envelope = $this->envelope();
        
        // Get from address
        $from = $envelope->from[0]->address ?? config('mail.from.address');
        $fromName = $envelope->from[0]->name ?? config('mail.from.name');
        
        // Get subject
        $subject = $envelope->subject;

        // Get recipients
        $to = [];
        if (!empty($envelope->to)) {
            foreach ($envelope->to as $recipient) {
                $to[$recipient->address] = $recipient->name ?? '';
            }
        }

        // Get HTML content by rendering the view
        $htmlContent = $this->render();

        // Get plain text content if available
        $plainTextContent = null;

        // Send via SendGrid
        $result = $sendgrid->send(
            from: $from,
            fromName: $fromName,
            to: $to,
            subject: $subject,
            htmlContent: $htmlContent,
            plainTextContent: $plainTextContent,
            replyTo: $envelope->replyTo ? array_map(
                fn($r) => [$r->address => $r->name ?? ''],
                $envelope->replyTo
            ) : null,
            cc: $envelope->cc ? array_map(
                fn($r) => [$r->address => $r->name ?? ''],
                $envelope->cc
            ) : null,
            bcc: $envelope->bcc ? array_map(
                fn($r) => [$r->address => $r->name ?? ''],
                $envelope->bcc
            ) : null,
        );

        if (!$result['success']) {
            throw new \Exception("Failed to send email via SendGrid: {$result['message']}");
        }
    }
}
