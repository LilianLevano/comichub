<?php

namespace App\Mail;

use App\Models\Faq;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FaqAsked extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Faq $faq) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New question: ' . $this->faq->question,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.faq-asked',
        );
    }
}
