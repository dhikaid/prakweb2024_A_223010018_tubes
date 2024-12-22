<?php

namespace App\Mail;

use App\Models\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Contracts\Queue\ShouldQueue;

class Ticket extends Mailable
{
    use Queueable, SerializesModels;
    public $ticket;

    /**
     * Create a new message instance.
     */
    public function __construct(Payment $ticket)
    {
        $this->ticket = Payment::where('uuid', $ticket->uuid)
            ->with(['booking', 'booking.bookingDetail', 'booking.bookingDetail.ticket', 'booking.event'])
            ->where('status', 'settlement')
            ->first();
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Ticket: ' . $this->ticket->booking->event->name,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.ticket', // tambahkan ini
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromPath(storage_path('app/public/tickets/ticket_' . $this->ticket->uuid . '.pdf')),
        ];
    }
}
