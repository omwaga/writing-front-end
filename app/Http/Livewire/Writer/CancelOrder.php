<?php

namespace App\Http\Livewire\Writer;

use App\Models\AssignedOrders;
use App\Models\BiddingOrders;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Livewire\Component;

class CancelOrder extends Component
{
    public $orderNumber, $showButton, $confirmCancelOrder;

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

    public function cancelOrder()
    {
        $id = DB::table('assigned_orders')
            ->where('email', Auth::guard('writers')->user()->email)
            ->where('order_number', $this->orderNumber)
            ->value('id');

        AssignedOrders::find($id)->delete();

        $order = Order::find($this->orderNumber);
        $order->in_progress = 0;
        $order->completed = 0;
        $order->bidding = 1;
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

        $this->confirmCancelOrder = false;

        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success', 'message' => 'Order cancelled successfully!']);

        $this->redirect(URL::previous());
    }

    public function confirmCancelOrder()
    {
        $this->confirmCancelOrder = true;
    }

    public function render()
    {
        return view('livewire.writer.cancel-order');
    }
}
