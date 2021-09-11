<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Writer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PlaceBid extends Component
{
    public $orderNumber, $showButton, $confirmPlaceBid;

    public function mount()
    {
        $writerBid = DB::table('bidding_orders')
            ->where('email', Auth::guard('writers')->user()->email)
            ->where('order_id', $this->orderNumber)
            ->count();

        if ($writerBid > 0) {
            $this->showButton = false;
        } else {
            $this->showButton = true;
        }
    }

    public function confirmPlaceBid()
    {
        $this->confirmPlaceBid = true;
    }

    public function showButton()
    {
        $writerBid = DB::table('bidding_orders')
            ->where('email', Auth::guard('writers')->user()->email)
            ->where('order_id', $this->orderNumber)
            ->count();

        if ($writerBid > 0) {
            $this->showButton = false;
        } else {
            $this->showButton = true;
        }
    }

    public function placeBid()
    {
        $bidding = new \App\Models\BiddingOrders();
        $bidding->email = Auth::guard('writers')->user()->email;
        $bidding->order_id = $this->orderNumber;
        $bidding->save();
        $this->confirmPlaceBid = false;

        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success', 'message' => 'Bid placed successfully!']);

        $order = Order::whereId($this->orderNumber)->first();

        $writer = Writer::where('email', Auth::guard('writers')->user()->email)->first();

        Controller::createNotification(['notification' => "You placed a new bid!", "for" => @Auth::guard('writers')->user()->id]);
        Controller::createNotification(['notification' => $writer->name . " placed a bid for order #".$this->orderNumber."!", "for" => $order->user_id]);

        $this->showButton = false;
    }

    public function render()
    {
        return view('livewire.place-bid');
    }
}
