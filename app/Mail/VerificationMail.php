<?php

namespace App\Mail;  // Ini harus berada di baris pertama


use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Log;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use App\Models\PendingUser;

class VerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pendingUser;
    public $verificationUrl;

    public function __construct(PendingUser $pendingUser)
    {
        $this->pendingUser = $pendingUser;


        $this->verificationUrl = route('verification.email', parameters: [
            'id' => $this->pendingUser->id,
            'hash' => sha1($this->pendingUser->email),
        ]);

        Log::info('Verification URL: ' . $this->verificationUrl);

    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Verification Mail',
        );
    }


    public function content(): Content
    {
        return new Content(
            view: 'emails.verify',
            with: [
                'url' => $this->verificationUrl,
            ]
        );
    }


    public function attachments(): array
    {
        return [];
    }
}
