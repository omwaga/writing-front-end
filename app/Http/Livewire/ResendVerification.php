<?php

namespace App\Http\Livewire;

use App\Mail\EmailVerification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ResendVerification extends Component
{

    public $message;

    public function mount()
    {
        $this->message = "Resend Verification Email";
    }

    public function sendVerificationEmail()
    {
        Mail::to(Auth::guard('writers')->user()->email)->send(new EmailVerification(Auth::guard('writers')->user()->email));
        $this->message = 'Email sent';
    }

    public function render()
    {
        return view('livewire.resend-verification');
    }
}
