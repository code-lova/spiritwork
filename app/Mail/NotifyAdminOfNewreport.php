<?php

namespace App\Mail;

use App\Models\ResidentReport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotifyAdminOfNewreport extends Mailable
{
    use Queueable, SerializesModels;

    public $report;

    /**
     * Create a new message instance.
     */
    public function __construct(ResidentReport $report)
    {
        $this->report = $report;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: env(key: 'MAIL_USERNAME'),
            subject: 'New Report from tenant',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $agreementUrl = route('login');

        return new Content(
            markdown: 'emails.report.notify_admin',
            with: [
                'tenantname' => $this->report->user->name,
                'agreementUrl' => $agreementUrl,
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
