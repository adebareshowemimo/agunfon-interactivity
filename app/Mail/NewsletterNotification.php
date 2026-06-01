<?php

namespace App\Mail;

use App\Models\NewsletterSubscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewsletterNotification extends SendGridMailable
{
    use Queueable, SerializesModels;

    public NewsletterSubscriber $subscriber;

    public function __construct(NewsletterSubscriber $subscriber)
    {
        $this->subscriber = $subscriber;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Newsletter Subscriber - ' . $this->subscriber->email,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.newsletter-notification',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
