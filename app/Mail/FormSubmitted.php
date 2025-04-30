<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FormSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $formType;

    /**
     * Create a new message instance.
     */
    public function __construct(array $data, string $formType)
    {
        $this->data = $data;
        $this->formType = $formType;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Konfirmasi Pengajuan Form ' . $this->formType,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.form_submitted',
            with: [
                'data' => $this->data,
                'formType' => $this->formType,
                'judul' => $this->data['judul'] ?? $this->data['judul_ta'] ?? null,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
