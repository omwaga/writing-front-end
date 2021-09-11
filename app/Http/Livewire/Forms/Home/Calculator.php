<?php

namespace App\Http\Livewire\Forms\Home;

use Livewire\Component;

class Calculator extends Component
{

    public $type, $level, $deadline, $pages, $price;
    protected $rules = [
        'type' => 'string|required',
        'level' => 'string|required',
        'deadline' => 'string|required',
        'pages' => 'int|required',
    ];

    public function mount()
    {
        $this->price = '0';
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function Calculate()
    {
        if ($this->deadline == '3h') {
            $this->price = "20.00" * $this->pages;
        } elseif ($this->deadline == '12h') {
            $this->price = "20.00" * $this->pages;
        } elseif ($this->deadline == '24h') {
            $this->price = "18.00" * $this->pages;
        } elseif ($this->deadline == '2d') {
            $this->price = "16.00" * $this->pages;
        } elseif ($this->deadline == '3d') {
            $this->price = "16.00" * $this->pages;
        } elseif ($this->deadline == '6d') {
            $this->price = "14.00" * $this->pages;
        } elseif ($this->deadline == '10d') {
            $this->price = "12.00" * $this->pages;
        } elseif ($this->deadline == '14d') {
            $this->price = "10.00" * $this->pages;
        } elseif ($this->deadline == '1m') {
            $this->price = "12.00" * $this->pages;
        } elseif ($this->deadline == '2m') {
            $this->price = "12.00" * $this->pages;
        }
        $this->validate();
    }

    public function render()
    {
        return view('livewire.forms.home.calculator');
    }
}
