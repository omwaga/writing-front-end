<?php

namespace App\Http\Livewire\Writer\Forms;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UploadWork extends Component
{
    public $orderNumber, $showForm;


    public function mount()
    {
        $progress = Order::find($this->orderNumber)->value('in_progress');
        if ($progress == 1) {
            $this->showForm = true;
        } else {
            $this->showForm = false;
        }
    }

    public function showForm()
    {
        $progress = Order::find($this->orderNumber)->value('in_progress');
        if ($progress == 1) {
            $this->showForm = true;
        } else {
            $this->showForm = false;
        }
    }

    public function render()
    {
        return view('livewire.writer.forms.upload-work');
    }
}
