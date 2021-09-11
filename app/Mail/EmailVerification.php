<?php

namespace App\Mail;

use App\Models\Writer;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    public $token;

    /**
     * Create a new message instance.
     *
     * @param $email
     */
    public function __construct($email)
    {
        $this->token = Str::random(100);

        $id = DB::table('writers')
            ->where('email', $email)
            ->value('id');

        $writer = Writer::find($id);
        $writer->verification_token = $this->token;
        $writer->update();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.verification');
    }
}
