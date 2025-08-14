<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels; //user
use App\Models\User;


class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $message;
    public $user;
    /**
     * Create a new message instance.
     */
    // In WelcomeMail.php
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->subject = 'Welcome to GreenBasket';
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.welcomemail',
            with: [
                'user' => $this->user
            ]
        );
    }


    public function attachments(): array
    {
        return [];
    }
}
