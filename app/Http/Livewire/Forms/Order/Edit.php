<?php

namespace App\Http\Livewire\Forms\Order;

use App\Http\Controllers\Paypal;
use App\Models\Order;
use App\Models\OrderFile;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $files = [];
    protected $order;
    public $topic, $type, $deadline, $service, $language, $pages, $level, $sources, $subject, $style,
        $instructions, $orderId, $step, $price;

    protected $rules = [
        'files.*' => 'required|mimes:png,jpeg,pdf,jpg,xlsx,docx,ppt,wps,pptx|max:10240',
        'type' => 'required|string',
        'service' => 'string|required',
        'language' => 'string|required',
        'pages' => 'required|int|min:1',
        'level' => 'required',
        'deadline' => 'required',
        'topic' => 'required|min:5',
        'sources' => 'required|int|min:1',
        'subject' => 'required|string',
        'style' => 'required|string',
        'instructions' => 'required|min:100',
    ];

    public function mount()
    {
        $this->step = 1;
        $order = Order::find($this->orderId);
        $this->price = $order->price;
        $this->type = $order->type;
        $this->level = $order->level;
        $this->instructions = $order->instructions;
        $this->service = $order->service;
        $this->pages = $order->pages;
        $this->type = $order->type;
        $this->topic = $order->topic;
        $this->sources = $order->sources;
        $this->subject = $order->subject;
        $this->style = $order->style;
        $this->language = $order->language;

    }

    public function firstStepValidate()
    {
        $validatedData = $this->validate([
            'deadline' => 'required',
            'service' => 'required|string',
            'type' => 'required|string',
            'pages' => 'required|int|min:1',
            'level' => 'required|string',
        ]);

        $this->step = 2;
    }

    public function payment()
    {
        $this->redirect('/paypal/' . $this->price);
    }

    public function secondStepValidate()
    {
        $this->validate([
            'topic' => 'required|min:5',
            'sources' => 'required|int|min:1',
            'subject' => 'required|string',
            'style' => 'required|string',
            'language' => 'string|required',
            'instructions' => 'required|min:100',
        ]);

        $this->step = 3;
    }

    public function back($step)
    {
        $this->step = $step - 1;
    }

    public function thirdStepValidate()
    {
        $this->validate([
            'files.*' => 'required|mimes:png,jpeg,pdf,jpg,xlsx,docx,ppt,wps,pptx|max:10240',
        ]);

        $this->Order();
    }

    public function updatedPhoto()
    {
        $this->validate([
            'files.*' => 'required|mimes:png,jpeg,pdf,jpg,xlsx,docx,ppt,wps,pptx|max:10240',
        ]);
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function Order()
    {
        $this->validate();

        $order = Order::find($this->orderId);
        $email = Auth::user()->email;
        $id = DB::table('users')->where('email', $email)->value('id');

        $order->user_id = $id;
        $order->service = $this->service;
        $order->type = $this->type;
        $order->pages = $this->pages;
        $order->level = $this->level;
        $order->sources = $this->sources;
        $order->language = $this->language;
        $order->subject = $this->subject;
        $order->style = $this->style;
        $order->instructions = $this->instructions;
        $order->topic = $this->topic;
        $now = Carbon::now();

        if ($this->deadline == '3h') {
            $deadline = $now->addHours(3);
            $this->price = "20.00" * $this->pages;
        } elseif ($this->deadline == '12h') {
            $deadline = $now->addHours(12);
            $this->price = "20.00" * $this->pages;
        } elseif ($this->deadline == '24h') {
            $deadline = $now->addHours(24);
            $this->price = "18.00" * $this->pages;
        } elseif ($this->deadline == '2d') {
            $deadline = $now->addDays(2);
            $this->price = "16.00" * $this->pages;
        } elseif ($this->deadline == '3d') {
            $deadline = $now->addDays(3);
            $this->price = "16.00" * $this->pages;
        } elseif ($this->deadline == '6d') {
            $deadline = $now->addDays(6);
            $this->price = "14.00" * $this->pages;
        } elseif ($this->deadline == '10d') {
            $deadline = $now->addDays(10);
            $this->price = "12.00" * $this->pages;
        } elseif ($this->deadline == '14d') {
            $deadline = $now->addDays(14);
            $this->price = "10.00" * $this->pages;
        } elseif ($this->deadline == '1m') {
            $deadline = $now->addMonth();
            $this->price = "12.00" * $this->pages;
        } elseif ($this->deadline == '2m') {
            $deadline = $now->addMonths(2);
            $this->price = "12.00" * $this->pages;
        }
        $order->price = $this->price;
        $order->deadline = $deadline;
        $order->order_date = now();
        $order->update();

        $orderNumber = $this->orderId;

        foreach ($this->files as $file) {
            $path = $file->store('public');
            $files = DB::table('order_files')
                ->where('order_number', $orderNumber)
                ->get();

            foreach ($files as $f) {
                Storage::delete($f->file);
            }

            DB::table('order_files')
                ->delete(['order_number' => $orderNumber]);

            $orderFiles = new OrderFile();
            $orderFiles->order_number = $orderNumber;
            $orderFiles->file = $path;
            $orderFiles->save();
        }

        return redirect()->action(
            [Paypal::class, 'postPaymentWithpaypal'], ['price' => $this->price, 'orderNumber' => $orderNumber]
        );
    }

    public function render()
    {
        return view('livewire.forms.order.add');
    }
}
