<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingConfirmed extends Mailable
{
    use Queueable, SerializesModels;
    use Queueable, SerializesModels;

    public $fares;
    public $station;
    public $user;
    public $booking;

    public function __construct($fares, $station, $user , $booking)
    {
        $this->fares = $fares;
        $this->station = $station;
        $this->user = $user;
        $this->booking = $booking;

    }

    public function build()
    {
        return $this->subject('Booking Confirmation')
                    ->view('emails.booking_confirmed'); // Create this Blade file for the email layout
    }

}
