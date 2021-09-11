<?php

namespace App\Http\Livewire\Forms\Order;

use App\Models\Order;
use Livewire\Component;

class View extends Component
{

    public $topic, $type, $deadlineDate, $service, $language, $pages, $level, $time, $sources, $subject, $style,
        $instructions, $orderId;

    public function mount()
    {
        $order = Order::find($this->orderId);
        $this->type = $order->type;
        $this->topic = $order->topic;
        $this->deadlineDate = date('d/m/Y', strtotime($order->deadline));
        $this->time = date('h:i:s A', strtotime($order->deadline));
        $this->service = $order->service;
        $this->language = $order->language;
        $this->pages = $order->pages;
        $this->level = $order->level;
        $this->sources = $order->sources;
        $this->subject = $order->subject;
        $this->style = $order->style;
        $this->instructions = $order->instructions;
    }

    public function render()
    {
        return view('livewire.forms.order.view');
    }
}
