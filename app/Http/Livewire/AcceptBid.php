<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Controller;
use App\Models\AssignedOrders;
use App\Models\Order;
use App\Models\Writer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AcceptBid extends Component
{

    public $showButton, $orderNumber, $writerEmail;

    public function mount()
    {
        $this->showButton = true;
    }

    public function acceptBid()
    {
        $order = Order::find($this->orderNumber);

        $order->draft = 0;
        $order->bidding = 0;
        $order->in_progress = 1;
        $order->update();

        $assigned = new AssignedOrders();
        $id = DB::table('users')
            ->where('email', Auth::user()->email)
            ->value('id');

        $assigned->user_id = $id;
        $assigned->email = $this->writerEmail;
        $assigned->order_number = $this->orderNumber;
        $assigned->save();



        \App\Models\BiddingOrders::where('order_id', $this->orderNumber)->delete();

        $writer = Writer::where('email', $this->writerEmail)->first();

        Controller::createNotification(['notification' => Auth::user()->name." accepted your bid!", "for" => @$writer->id]);

        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success', 'message' => 'Bid accepted successfully!']);
        $this->showButton = false;
    }

    public function render()
    {
        return view('livewire.accept-bid');
    }
}
