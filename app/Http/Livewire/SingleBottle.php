<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bottle;

class SingleBottle extends Component
{
    public $bottleId;
    public $bottle;

    // Handle the passed parameter
    public function mount($bottle_id)
    {
        $this->bottleId = $bottle_id;
    }

    public function render()
    {
        // Fetch the bottle data
        $this->bottle = Bottle::find($this->bottleId);

        return view('livewire.single-bottle', ['bottle' => $this->bottle]);
    }
}

