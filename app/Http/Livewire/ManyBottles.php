<?php

namespace App\Http\Livewire;


use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Bottle;

class ManyBottles extends Component
{
    use WithPagination;

    public function render()
    {
        $bottles = Bottle::paginate(10); // set your desired items per page here
        return view('livewire.many-bottles', ['bottles'=>$bottles]);
    }
}

