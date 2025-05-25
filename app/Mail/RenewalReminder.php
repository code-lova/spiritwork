<?php

namespace App\Mail;

use App\Models\Agreement;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RenewalReminder extends Mailable
{
    use Queueable, SerializesModels;
    public $agreement;

    /**
     * Create a new message instance.
     */
    public function __construct(Agreement $agreement)
    {
        $this->agreement = $agreement;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: env(key: 'MAIL_USERNAME'),
            subject: 'Renewal Reminder',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        // format your date, url, etc. once here
        $agreementDate  = Carbon::parse($this->agreement->agreement_date)->format('F j, Y');
        $agreementUrl = route('login');

        return new Content(
            markdown: 'emails.agreement.renewal',
            with: [
                'tenantName'   => $this->agreement->user->name,
                'propertyName' => $this->agreement->property->property_name,
                'agreementUrl' => $agreementUrl,
                'agreementDate' => $agreementDate,
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
