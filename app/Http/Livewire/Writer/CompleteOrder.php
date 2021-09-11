<?php

namespace App\Http\Livewire\Writer;

use App\Http\Controllers\Controller;
use Livewire\Component;

use App\Models\AssignedOrders;
use App\Models\BiddingOrders;
use App\Models\CompletedOrder;
use App\Models\Order;
use App\Models\Writer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class CompleteOrder extends Component
{
    public $orderNumber, $showButton, $confirmCompleteOrder;

    public function mount()
    {
        $assigned = DB::table('assigned_orders')
            ->where('email', Auth::guard('writers')->user()->email)
            ->where('order_number', $this->orderNumber)
            ->count();

        if ($assigned != 0) {
            $this->showButton = true;
        } else {
            $this->showButton = false;
        }
    }

    public function showButton()
    {
        $assigned = DB::table('assigned_orders')
            ->where('email', Auth::guard('writers')->user()->email)
            ->where('order_number', $this->orderNumber)
            ->count();

        if ($assigned != 0) {
            $this->showButton = true;
        } else {
            $this->showButton = false;
        }
    }

    public function CompleteOrder()
    {


        $count = DB::table('assigned_orders')
            ->where('email', Auth::guard('writers')->user()->email)
            ->where('order_number', $this->orderNumber)
            ->count();

        if ($count > 0) {

            $id = DB::table('assigned_orders')
                ->where('email', Auth::guard('writers')->user()->email)
                ->where('order_number', $this->orderNumber)
                ->value('id');

            AssignedOrders::find($id)->delete();
        }

        $order = Order::find($this->orderNumber);
        $order->in_progress = 0;
        $order->completed = 1;
        $order->bidding = 0;
        $order->update();


        $count = DB::table('bidding_orders')
            ->where('email', Auth::guard('writers')->user()->email)
            ->where('order_id', $this->orderNumber)
            ->count();

        if ($count > 0) {
            $id = DB::table('bidding_orders')
                ->where('email', Auth::guard('writers')->user()->email)
                ->where('order_id', $this->orderNumber)
                ->value('id');

            BiddingOrders::find($id)->delete();
        }

        $completed = new CompletedOrder();
        $order = Order::whereId($this->orderNumber)->first();


        $writer = Writer::where('email', Auth::guard('writers')->user()->email)->first();

        $completed->email = $writer->email;
        $completed->order_id = $this->orderNumber;
        $completed->save();

        Controller::createNotification(['notification' => "You completed an order!", "for" => @Auth::guard('writers')->user()->id]);

        Controller::createNotification(['notification' => $writer->name . " marked your order #".$this->orderNumber." as complete!", "for" => $order->user_id]);


        $this->confirmCompleteOrder = false;

        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success', 'message' => 'Order Marked as Complete!']);

        $this->redirect(URL::previous());
    }

    public function confirmCompleteOrder()
    {
        $this->confirmCompleteOrder = true;
    }

    public function render()
    {
        return view('livewire.writer.complete-order');
    }
}
