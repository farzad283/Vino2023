<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bottle;
use App\Models\Cellar;

class AddBottleToCellar extends Component
{
    public $bottleId;
    public $cellarId;
    public $newQuantity;

    public function render()
    {
        return view('livewire.add-bottle-to-cellar');
    }

    public function addBottleToCellar()
    {
        // Validate the input here if needed.

        // Find the bottle and cellar.
        $bottle = Bottle::findOrFail($this->bottleId);
        $cellar = Cellar::findOrFail($this->cellarId);

        // Attach the bottle to the cellar with the new quantity.
        $cellar->bottles()->attach($bottle, ['quantity' => $this->newQuantity]);

        session()->flash('success', 'Bottle added/updated successfully');

        // Clear the form fields after adding/updating the bottle.
        $this->reset(['bottleId', 'cellarId', 'newQuantity']);
    }
}
