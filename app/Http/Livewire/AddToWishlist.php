<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class AddToWishlist extends Component
{
    public $wishlistItems; // Liste des articles de la liste de souhaits
    public $wishlistStatus = []; // Statut de la liste de souhaits pour chaque article

    public function mount()
    {
        $this->refreshWishlist();
    }

    // Méthode pour actualiser la liste de souhaits
    public function refreshWishlist()
    {
        // Récupérer les articles de la liste de souhaits pour l'utilisateur connecté
        $this->wishlistItems = Wishlist::where('user_id', Auth::id())->with('bottle')->get();
    }

    protected $listeners = ['wishlistUpdated' => 'updateWishlistStatus'];

    // Méthode pour mettre à jour le statut de la liste de souhaits
    public function updateWishlistStatus($wishlistStatus)
    {
        $this->wishlistStatus = $wishlistStatus;
        $this->refreshWishlist(); // Optionnellement, actualiser également les articles de la liste de souhaits
    }

    // Méthode pour afficher la liste de souhaits
    public function render()
    {
        return view('livewire.add-to-wishlist', ['wishlistItems' => $this->wishlistItems]);
    }
}
