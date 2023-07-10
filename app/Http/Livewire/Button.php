<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Button extends Component
{
    public $lable;

    public function mount($lable = 'Click')
    {
        $this->lable = $lable;
    }

    public function render()
    {
        return view('livewire.button', ['lable', $this->lable]);
    }

    public function handleClick()
    {
        // here you can define what happens when the button is clicked
    }
}