<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InquireSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            to: 'info@balicoconutart.com',
            replyTo: $this->data['email'],
            subject: 'New Inquiry — ' . $this->data['event_name'] . ' | Bali Coconut Art',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.inquire-submitted',
            with: [
                'data' => $this->data,
            ],
        );
    }
}