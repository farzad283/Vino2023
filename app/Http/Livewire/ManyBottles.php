<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bottle;
use App\Models\UnlistedBottle;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use PhpOption\None;

class ManyBottles extends Component
{
    use WithPagination;

    public $unlisted = false; // Statut de filtre pour les bouteilles non répertoriées
    public $search = ''; // Terme de recherche saisi par l'utilisateur
    public $showSearch = false; // Indicateur pour afficher ou masquer la barre de recherche
    public $wishlistStatus = []; // Statut de la liste de souhaits pour chaque bouteille

    // Méthode pour ajouter ou supprimer un article de la liste de souhaits
    public function addToWishlist($bottleId)
    {
        $userId = Auth::id();
        $existingWishlistItem = Wishlist::where('user_id', $userId)
                                        ->where('bottle_id', $bottleId)
                                        ->first();

        if ($existingWishlistItem) {
            if ($this->wishlistStatus[$bottleId]) {
                // Suppression de la liste de souhaits
                $existingWishlistItem->delete();
                $this->wishlistStatus[$bottleId] = false;
            } else {
                // Ajout à la liste de souhaits
                $existingWishlistItem->increment('quantity');
                $existingWishlistItem->refresh(); // Recharge le modèle depuis la base de données
                $this->wishlistStatus[$bottleId] = true;
            }
        } else {
            // Ajout d'un nouvel article à la liste de souhaits
            Wishlist::create([
                'user_id' => $userId,
                'bottle_id' => $bottleId,
                'quantity' => 1,
            ]);
            $this->wishlistStatus[$bottleId] = true;
        }

        // Émettre un événement pour actualiser l'autre composant
        $this->emit('wishlistUpdated', $this->wishlistStatus);

        return redirect()->route('add-to-wishlist');
    }
 
    // Méthode pour définir la vue de pagination personnalisée
    public function paginationView()
    {
        return 'vendor.livewire.tailwind';
    }
 
    // Méthode pour afficher la liste de bouteilles en fonction des filtres et de la recherche
    public function render()
    {
        if ($this->unlisted) {
            $bottles = Bottle::where('unlisted', true);
        } else {
            $bottles = Bottle::where('unlisted', false);
        }
        if (!empty($this->search)) {
            $bottles->where(function ($query) {
                $query->where('name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('description', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('code_saq', 'LIKE', $this->search . '%');
                if (is_numeric($this->search)) {
                    $query->orWhere(function ($query) {
                        $query->where('price', '>=', (float)$this->search)
                            ->where('price', '<', (float)$this->search + 1);
                    });
                }
            });
        }
        $bottles = $bottles->orderBy('name')->paginate(9);
        $wishlistBottleIds = Wishlist::where('user_id', Auth::id())
        ->whereIn('bottle_id', $bottles->pluck('id'))
        ->pluck('bottle_id')
        ->toArray();
    
        $this->wishlistStatus = array_fill_keys($bottles->pluck('id')->toArray(), false);
    
        // Définir le statut des bouteilles dans la liste de souhaits à vrai
        foreach ($wishlistBottleIds as $bottleId) {
            $this->wishlistStatus[$bottleId] = true;
        }
        
        return view('livewire.many-bottles', [
            'bottles' => $bottles, 
            'filter' => $this->unlisted, 
            'wishlistStatus' => $this->wishlistStatus
        ])->layout('layouts.app');    
    }

    protected $listeners = [
        'toggleSearch', 'searchPerformed' => 'performSearch',
        'Filter' => 'FilterBottles'
    ];

    // Méthode pour effectuer une recherche
    public function performSearch($searchTerm)
    {
        $this->search = $searchTerm;
        $this->resetPage();  // Réinitialise la page courante à 1 après chaque recherche
    }

    // Méthode pour basculer l'affichage de la barre de recherche
    public function toggleSearch()
    {
        $this->showSearch = !$this->showSearch; 
    }

    // Méthode pour filtrer les bouteilles en fonction de la sélection de l'utilisateur
    public function FilterBottles($newFilter)
    {
        $this->unlisted = $newFilter;
        $this->resetPage();
    }   
}
