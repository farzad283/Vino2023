<?php

namespace App\Http\Livewire;

use App\Models\BottleConsumed;
use App\Models\BottleInCellar;
use Livewire\Component;
use App\Models\Cellar;
use Illuminate\Support\Facades\Auth;

class SingleCellar extends Component
{
    public $cellarId;
    public $cellar;
    public $count;
    protected $listeners = ['bottleDeleted' => 'handleBottleDeleted', "incrementListen" => "increment"];

    public function handleBottleDeleted()
    {
        // refresh the list of bottles by re-fetching the cellar
        $this->cellar = Cellar::with(['bottles' => function ($query) {
            $query->whereNull('bottle_in_cellars.deleted_at');
        }])->where('id', $this->cellarId)->first();
    }

    public function deleteBottle($bottleId)
    {
        $bottleInCellar = BottleInCellar::where('bottle_id', $bottleId)
            ->where('cellar_id', $this->cellarId)
            ->first();

        if ($bottleInCellar) {
            $bottleInCellar->delete();
        }

        $this->emit('bottleDeleted');  // emit an event to notify that a bottle was deleted
    }

    public function increment($bottle_id)
    {
        $bottleInCellar = BottleInCellar::where('cellar_id', $this->cellarId)
            ->where('bottle_id', $bottle_id)
            ->first();

        if ($bottleInCellar) {
            $bottleInCellar->quantity += 1;
            $bottleInCellar->save();
        }
    }

    public function decrement($bottle_id)
    {
        $bottleInCellar = BottleInCellar::where('cellar_id', $this->cellarId)
            ->where('bottle_id', $bottle_id)
            ->first();

        if ($bottleInCellar) {
            $bottleInCellar->quantity -= 1;
          
            if ($bottleInCellar->quantity <= 0) {
                    $bottleInCellar->delete();
                //     session()->flash('message', 'bouteille supprimer avec succès.');
                // }else {
                //     session()->flash('message', 'bouteille supprimer avec échoué.');
                // }
        
                $this->emit('bottleDeleted');  // emit an event to notify that a bottle was deleted
                $bottleInCellar->quantity = 0;
            }

            $bottleInCellar->save();
            $userId = Auth::check() ? Auth::id() : null;

            BottleConsumed::create([
                'bottle_id'=>  $this->bottle_id,
                'cellar_id'=> $this->cellar_id,
                'note' => $this->note,
                'user_id' => $userId
            ]);
            $this->reset('note');
            
        }
    }
    // public function submitConsumed(){
       
    // }

    // Recupère l'id dans le URL de la page directement à l'ouverture
    public function mount($cellar_id)
    {

        $this->cellarId = $cellar_id;
    }


    public function render()
    {
        $this->cellar = Cellar::with([
            'bottles' => function ($query) {
                $query->whereNull('bottle_in_cellars.deleted_at');
            }
        ])
            ->where('id', $this->cellarId)
            ->first();

        return view('livewire.single-cellar', ['cellar' => $this->cellar]);
    }
}
