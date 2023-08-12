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
    public $note;
    public $qty;
    public $bottle_qty = 0;
    public $errorMessage;
    public $modalId=0;

    protected $messages = [
        'qty.required' => 'Le champ qty est obligatoire.',
        'qty.numeric' => 'Le champ qty doit être une chiffre.',
        'qty.min' => 'Le champ qty ne doit pas être moins :min .',
    ];

    protected $listeners = ['bottleDeleted' => 'handleBottleDeleted', "incrementListen" => "increment"];
    public function updateCellar()
    {
        $this->modalId = 0;
        // $this->loadCellars();
    }

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

    public function updated()
    {
        $this->validateOnly("qty", [
            'qty' => 'required|numeric|min:0'
        ]);
    }



    public function decrement($bottle_id, $bottle_quantity)
    {

        if ($this->qty > $bottle_quantity) {

            session()->flash('message',  'Le champ qty ne doit pas dépasser ' . $bottle_quantity);
            return;
        }
        
        $bottleInCellar = BottleInCellar::where('cellar_id', $this->cellarId)
            ->where('bottle_id', $bottle_id)
            ->first();

        if ($bottleInCellar) {
            $bottleInCellar->quantity -= $this->qty;

            if ($bottleInCellar->quantity <= 0) {
                $bottleInCellar->delete();


                $this->emit('bottleDeleted');  // emit an event to notify that a bottle was deleted
                $bottleInCellar->quantity = 0;
            }

            BottleConsumed::create([
                'bottle_id' =>  $bottle_id,
                'cellar_id' => $this->cellarId,
                'note' => $this->note,
                'qty' => 1,
                "consumption_date" => date('Y-m-d'),
            ]);

            $bottleInCellar->save();
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
