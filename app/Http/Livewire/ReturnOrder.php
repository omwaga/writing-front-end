<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\ReturnedOrder;
use App\Models\Writer;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ReturnOrder extends Component
{

        public $orderId;
        public $return;
        public $writer;
        public $comment;
        public $order;
    
        protected $rules = [
            'comment' => 'required',
    
        ];
    
        public function render()
        {
            $order = Order::where('id', $this->orderId)->with(['user'])->first();
            $writer = Writer::leftjoin('completed_orders', 'writers.email', 'completed_orders.email')
            ->where('order_id', $this->orderId)->select('writers.id as id')->first();
            $this->order = $order;
            $this->writer = $writer;

            return view('livewire.return-order', compact('order', 'writer'));
        }
    
        public function mount()
        {
            if(auth()->user()){
                $return = ReturnedOrder::where('user_id', Auth::user()->id)->where('order_id', $this->orderId)->first();
                if (!empty($return)) {
                    $this->return  = $return;
                    $this->comment = $return->comment;
                }
            }
            return view('livewire.return-order');
        }
    
    
        public function returnOrder()
        {
            $this->validate();
            $return = ReturnedOrder::where('user_id', Auth::user()->id)->where('order_id', $this->orderId)->first();
            if (!empty($return)) {
                $return->user_id = auth()->user()->id;
                $return->comment = $this->comment;
                try {
                    $return->update();
                } catch (\Throwable $th) {
                    throw $th;
                }
                session()->flash('success', 'Success!');

                $this->dispatchBrowserEvent(
                    'alert', ['type' => 'success', 'message' => 'Comment Saved!']);
        
            } else {
                $return = new ReturnedOrder();
                $return->user_id = auth()->user()->id;
                $return->writer_id = $this->writer->id;
                $return->order_id = $this->order->id;
                $return->comment = $this->comment;
                try {
                    $return->save();
                } catch (\Throwable $th) {
                    throw $th;
                }

                $this->return = $return;

                $this->order->returned = true;
                $this->order->update();

                Controller::createNotification(['notification' => "You order is under review!", "for" => @$this->order->user_id]);
                Controller::createNotification(['notification' => "Your order was returned!! Order #".$this->orderId."!", "for" => $this->writer->id]);        



                $this->dispatchBrowserEvent(
                    'alert', ['type' => 'success', 'message' => 'Order marked as returned!']);

                $this->hideForm = true;
            }
        }
    
        
}
