<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Button extends Component
{
    public $label;

    public function mount($label = 'Click')
    {
        $this->label = $label;
    }

    public function render()
    {
        return view('livewire.button');
    }

    public function handleClick()
    {
        // here you can define what happens when the button is clicked
    }
}
