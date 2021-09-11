<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUsEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $email, $name, $messageSent;

    /**
     * Create a new message instance.
     *
     * @param $email
     * @param $name
     * @param $message
     */
    public function __construct($email, $name, $message)
    {
        $this->email = $email;
        $this->name = $name;
        $this->messageSent = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->replyTo($this->email)
            ->view('mail.contact');
    }
}
