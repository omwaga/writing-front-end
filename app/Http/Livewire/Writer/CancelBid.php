<?php

namespace App\Http\Livewire\Writer;

use App\Http\Controllers\Controller;
use App\Models\BiddingOrders;
use App\Models\Order;
use App\Models\Writer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CancelBid extends Component
{

    public $showButton, $orderNumber, $confirmCancelBid;

    public function mount()
    {
        $bidding = DB::table('bidding_orders')
            ->where('order_id', $this->orderNumber)
            ->where('email', Auth::guard('writers')->user()->email)
            ->count();

        $completed = Order::where('id', $this->orderNumber)->value('completed');

        if ($bidding == 0) {
            $this->showButton = false;
        } elseif ($completed == 1) {
            $this->showButton = false;
        } else {
            $this->showButton = true;
        }
    }

    public function cancelBid()
    {
        $id = DB::table('bidding_orders')
            ->where('email', Auth::guard('writers')->user()->email)
            ->where('order_id', $this->orderNumber)
            ->value('id');

        BiddingOrders::find($id)->delete();
        $order = Order::find($this->orderNumber)->first();

        $this->confirmCancelBid = false;

        $writer = Writer::where('email', Auth::guard('writers')->user()->email)->first();

        Controller::createNotification(['notification' => "You cancelled a bid!", "for" => @Auth::guard('writers')->user()->id]);

        Controller::createNotification(['notification' => $writer->name . " cancelled a bid for order ".$this->orderNumber."!", "for" => $order->user_id]);


        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success', 'message' => 'Bid cancelled successfully!']);

        $this->showButton = false;
    }

    public function confirmCancelBid()
    {
        $this->confirmCancelBid = true;
    }

    public function showButton()
    {
        $bidding = DB::table('bidding_orders')
            ->where('order_id', $this->orderNumber)
            ->where('email', Auth::guard('writers')->user()->email)
            ->count();

        $completed = Order::where('id', $this->orderNumber)->value('completed');

        if ($bidding == 0) {
            $this->showButton = false;
        } elseif ($completed == 1) {
            $this->showButton = false;
        } else {
            $this->showButton = true;
        }
    }

    public function render()
    {
        return view('livewire.writer.cancel-bid');
    }
}
