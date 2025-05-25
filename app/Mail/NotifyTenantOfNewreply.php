<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotifyTenantOfNewreply extends Mailable
{
    use Queueable, SerializesModels;
    public $tenant;
    public $reply;
    /**
     * Create a new message instance.
     */
    public function __construct($tenant, $reply)
    {
        $this->tenant = $tenant;
        $this->reply = $reply;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: env(key: 'MAIL_USERNAME'),
            subject: 'You have a reply from admin',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.reply.notify_tenant',
            with: [
                'tenant' => $this->tenant,
                'reply' => $this->reply,
            ]
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
