<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReviewMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        // Mengatur subjek email dan memanggil file tampilan (view) HTML
        return $this->subject('New Client Review - Bali Coconut Art')
                    ->view('emails.review_template');
    }
}