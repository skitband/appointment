<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendgridMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'appointment_test@email.com';
        $subject = 'Your appointment is';
        $name = 'Appointment Booking';

        // dd($this->data);
        return $this->view('mail')
                    ->from($address, $name)
                    ->subject($subject)
                    ->with('datas', $this->data);
    }
}
