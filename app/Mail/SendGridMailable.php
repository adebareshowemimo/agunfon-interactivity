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

        // Get from address (envelope->from is a single Address|null)
        $from = optional($envelope->from)->address ?? config('mail.from.address');
        $fromName = optional($envelope->from)->name ?? config('mail.from.name');

        // Get subject
        $subject = $envelope->subject;

        // Recipients set via Mail::to()/->cc()/->bcc() live on the Mailable
        // properties ($this->to, $this->cc, $this->bcc), while any set inside
        // envelope() live on the envelope. Merge both so neither is dropped.
        $to = $this->mergeSendGridRecipients($this->to, $envelope->to);
        $cc = $this->mergeSendGridRecipients($this->cc, $envelope->cc);
        $bcc = $this->mergeSendGridRecipients($this->bcc, $envelope->bcc);

        if (empty($to)) {
            throw new \Exception('Cannot send email via SendGrid: no "to" recipients were set.');
        }

        // Get HTML content by rendering the view
        $htmlContent = $this->render();

        // Send via SendGrid
        $result = $sendgrid->send(
            from: $from,
            fromName: $fromName,
            to: $to,
            subject: $subject,
            htmlContent: $htmlContent,
            plainTextContent: null,
            replyTo: $this->mergeSendGridRecipients($this->replyTo, $envelope->replyTo) ?: null,
            cc: $cc ?: null,
            bcc: $bcc ?: null,
        );

        if (!$result['success']) {
            throw new \Exception("Failed to send email via SendGrid: {$result['message']}");
        }
    }

    /**
     * Normalize recipient addresses from both the Mailable properties
     * (set via Mail::to()/->cc()/->bcc()) and the Envelope into a flat
     * ['email' => 'name', ...] map expected by SendGridService.
     *
     * @param  array  $mailableAddresses  Entries like ['name' => ?, 'address' => 'x@y']
     * @param  array  $envelopeAddresses  Illuminate\Mail\Mailables\Address instances
     */
    protected function mergeSendGridRecipients(array $mailableAddresses, array $envelopeAddresses = []): array
    {
        $recipients = [];

        foreach ($mailableAddresses as $address) {
            if (is_array($address) && isset($address['address'])) {
                $recipients[$address['address']] = $address['name'] ?? '';
            } elseif (is_string($address) && $address !== '') {
                $recipients[$address] = '';
            }
        }

        foreach ($envelopeAddresses as $address) {
            // Illuminate\Mail\Mailables\Address
            $recipients[$address->address] = $address->name ?? '';
        }

        return $recipients;
    }
}
