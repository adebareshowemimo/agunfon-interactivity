<?php

namespace App\Mail;

use App\Services\SendGridService;
use Illuminate\Mail\Mailable;
use Illuminate\Contracts\Mail\Mailable as MailableContract;

/**
 * Trait to send Mailable classes via SendGrid
 * 
 * Usage:
 * 1. Add `use SendsViaSendGrid;` to your Mailable class
 * 2. The mail will automatically send via SendGrid
 */
trait SendsViaSendGrid
{
    /**
     * Send the mailable via SendGrid
     */
    public function sendViaSendGrid(): void
    {
        $sendgrid = app(SendGridService::class);
        
        // Get the envelope
        $envelope = $this->envelope();
        $from = $envelope->from[0]->address ?? config('mail.from.address');
        $fromName = $envelope->from[0]->name ?? config('mail.from.name');
        $subject = $envelope->subject;

        // Get the content
        $content = $this->content();
        $htmlContent = $this->render();
        
        // Get recipients
        $to = [];
        if (!empty($envelope->to)) {
            foreach ($envelope->to as $recipient) {
                $to[$recipient->address] = $recipient->name ?? '';
            }
        }

        // Send via SendGrid
        $result = $sendgrid->send(
            from: $from,
            fromName: $fromName,
            to: $to,
            subject: $subject,
            htmlContent: $htmlContent,
            replyTo: $envelope->replyTo ? array_map(fn($r) => ['email' => $r->address, 'name' => $r->name ?? ''], $envelope->replyTo) : null,
            cc: $envelope->cc ? array_map(fn($r) => ['email' => $r->address, 'name' => $r->name ?? ''], $envelope->cc) : null,
            bcc: $envelope->bcc ? array_map(fn($r) => ['email' => $r->address, 'name' => $r->name ?? ''], $envelope->bcc) : null,
        );

        if (!$result['success']) {
            throw new \Exception("Failed to send email via SendGrid: {$result['message']}");
        }
    }
}
