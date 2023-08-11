<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bottle;
use App\Models\Cellar;
use App\Models\BottleInCellar;
use Illuminate\Support\Facades\Auth;

class UpdateBottle extends Component
{
    public $bottle_id, $cellar_id, $quantity, $bottle, $new_cellar_id;

    protected $listener = ["update_bottle" => "update"];

    public function update()
    {
        $this->cellar_id = $this->new_cellar_id;
    }

    public function mount($cellar_id, $bottle_id)
    {
        $this->bottle_id = $bottle_id;
        $this->cellar_id = $cellar_id;
        $this->new_cellar_id = $cellar_id;

        $bottleInCellar = BottleInCellar::where('cellar_id', $this->cellar_id)
            ->where('bottle_id', $this->bottle_id)->first();

        if ($bottleInCellar) {
            $this->quantity = $bottleInCellar->quantity;
        }

        $this->bottle = Bottle::findOrFail($bottle_id);
    }

    public function store()
    {
        $bottleInCellar = BottleInCellar::where('bottle_id', $this->bottle_id)
            ->where('cellar_id', $this->cellar_id)
            ->first();


        if ($this->new_cellar_id == $this->cellar_id) {
            session()->flash('message', 'choisir une autre cellier');
            // $bottleInCellar->quantity = $this->quantity;
            // $bottleInCellar->save();
        } else {
            if ($bottleInCellar->quantity  <= $this->quantity) {

                $new_bottleInCellar = BottleInCellar::where('bottle_id', $this->bottle_id)
                    ->where('cellar_id', $this->new_cellar_id)
                    ->first();
                if ($new_bottleInCellar) {
                    $bottleInCellar->forceDelete();
                    $new_bottleInCellar->quantity += $this->quantity;
                    $new_bottleInCellar->save();
                } else {

                    $bottleInCellar->quantity = $this->quantity;
                    $bottleInCellar->cellar_id = $this->new_cellar_id;
                    $bottleInCellar->save();
                }
            } else if ($bottleInCellar->quantity > $this->quantity) {

                $new_bottleInCellar = BottleInCellar::where('bottle_id', $this->bottle_id)
                    ->where('cellar_id', $this->new_cellar_id)
                    ->first();

                if ($new_bottleInCellar) {
                    $new_bottleInCellar->quantity += $this->quantity;
                    $new_bottleInCellar->save();
                } else {
                    BottleInCellar::create([
                        'bottle_id' => $this->bottle_id,
                        'quantity' => $this->quantity,
                        'cellar_id' => $this->new_cellar_id,
                    ]);
                }



                $bottleInCellar->quantity -= $this->quantity;
                $bottleInCellar->save();
            }
            $this->emit("update_bottle");
        session()->flash('message', 'Bottle updated successfully.');
        }
        
    }

    public function render()
    {

        $cellars = Cellar::where('user_id', Auth::id())->get();
        return view('livewire.update-bottle', ['cellars' => $cellars]);
    }
}
