<?php

namespace App\Http\Livewire\Forms;

use App\Mail\ContactUsEmail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactUs extends Component
{
    public $message, $email, $name;

    protected $rules = [
        'name' => 'min:3|required',
        'email' => 'email|required',
        'message' => 'required|min:5'
    ];

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function sendMessage()
    {
        $response = $this->validate();

        Mail::to('support@essayflame.com')->send(new ContactUsEmail($this->email, $this->name, $this->message));

        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success', 'message' => 'Message sent successfully!']);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.forms.contact-us');
    }
}
