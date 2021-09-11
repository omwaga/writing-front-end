<?php

namespace App\Http\Livewire\Writer;

use App\Models\Writer;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Balance extends Component
{
    public $balance, $email;


    public function mount()
    {
        $this->email = Auth::guard('writers')->user()->email;
        $this->balance = Writer::where('email', $this->email)->value('account_balance');
    }

    public function getBalance()
    {
        $this->balance = Writer::where('email', $this->email)->value('account_balance');
    }

    public function render()
    {
        return view('livewire.writer.balance');
    }
}
