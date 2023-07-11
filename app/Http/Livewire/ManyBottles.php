<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bottle;
use Livewire\WithPagination;

class  ManyBottles extends Component
{
    use WithPagination;
    
    // public $component = 'bottles';

    public function render()
    {
        $bottles = Bottle::paginate(9);

        return view('livewire.many-bottles', [
            'bottles' => $bottles,
        ])->layout('layouts.app');
    }
    
}

