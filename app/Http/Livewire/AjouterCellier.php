<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Cellar;

class AjouterCellier extends Component
{
    public $nom;

    protected $rules = [
        'nom' => 'required|string|max:255',
    ];

    protected $messages = [
        'nom.required' => 'Le champ Nom est obligatoire.',
        'nom.string' => 'Le champ Nom doit être une chaîne de caractères.',
        'nom.max' => 'Le champ Nom ne doit pas dépasser :max caractères.',
    ];

    public function store()
    {
        $this->validate();
        $userId = 2;
        // $userId = Auth::check() ? Auth::id() : null;

        Cellar::create([
            'name' => $this->nom,
            'user_id' => $userId
        ]);

        session()->flash('message', 'Cellier ajouté avec succès.');

        $this->reset('nom');

        return redirect()->route('cellars'); // Replace 'many_cellars' with the actual route name for the "many-cellars" view
    }

    public function render()
    {
        return view('livewire.ajouter-cellier')->layout('layouts.app');
    }
}