<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Writer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ApproveOrder extends Component
{
    public $orderId;
    public $confirmApproval;
    public $showButton;
    public $approved;

    public function mount()
    {
        $this->confirmApproval = false;

        $this->approved = DB::table('orders')
        ->where('id', $this->orderId)
        ->value('user_approved');

        if ($this->approved === 0) {
            $this->showButton = true;
        } else {
            $this->showButton = false;
        }

    }

    public function showButton()
    {
   
        if ($this->approved === 0) {
            $this->showButton = true;
        } else {
            $this->showButton = false;
        }
    }


    public function confirmApproval()
    {
        $this->confirmApproval = true;
    }


    public function render()
    {
        return view('livewire.approve-order');
    }



    public function approveOrder()
    {
        $order = Order::find($this->orderId);

        $order->user_approved = 1;
        $order->update();

        $this->confirmApproval = false;


        $writer = Writer::leftjoin('completed_orders', 'writers.email', 'completed_orders.email')
        ->where('order_id', $this->orderId)->select('writers.id as id')->first();

        Controller::createNotification(['notification' => Auth::user()->name." ended the contract!", "for" => @$writer->id]);

        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success', 'message' => 'success!']);

        $this->showButton = false;
    }
}
