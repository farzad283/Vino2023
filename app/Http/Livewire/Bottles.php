<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bottle;
use Livewire\WithPagination;

class Bottles extends Component
{
    use WithPagination;
    
    // public $component = 'bottles';

    public function render()
    {
        $bottles = Bottle::orderBy('name')
            ->paginate(9);

        return view('livewire.bottles', [
            'bottles' => $bottles,
        ])->layout('layouts.app');
    }
}

