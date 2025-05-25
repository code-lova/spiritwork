<?php

namespace App\Mail;

use App\Models\Agreement;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RentPayment extends Mailable
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
            subject: 'Rent Payment',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        // format your date, url, etc. once here
        $renewalDate  = now()->format('F j, Y');
        $agreementUrl = route('login');

        return new Content(
            markdown: 'emails.agreement.rent-payment',
            with: [
                'tenantName'   => $this->agreement->user->name,
                'propertyName' => $this->agreement->property->property_name,
                'renewalDate'  => $renewalDate,
                'agreementUrl' => $agreementUrl,
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
