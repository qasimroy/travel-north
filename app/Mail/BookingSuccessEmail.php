<?php

namespace App\Mail;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingSuccessEmail extends Mailable
{
    use Queueable, SerializesModels;

    private Booking $booking;
    private User $user;
    private string $url;

    /**
     * Create a new message instance.
     */
    public function __construct(Booking $booking, User $user, string $url)
    {
        $this->booking = $booking;
        $this->user = $user;
        $this->url = $url;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Booking Success Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.booking.success',
            with: [
                'user' => $this->user,
                'booking' => $this->booking,
                'url' => $this->url,
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
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.booking.success')
                ->with([
                    'user' => $this->user,
                    'booking' => $this->booking,
                    'url' => $this->url,
                ]);
    }
}
