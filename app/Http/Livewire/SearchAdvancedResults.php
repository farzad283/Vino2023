<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Bottle;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class SearchAdvancedResults extends Component
{
    use WithPagination;

    public $unlisted = false;
    public $showSearch = false;
    public $results = [];
    public $component = 'bottles';

    protected $queryString = ['search', 'priceMin', 'priceMax', 'description', 'page'];

    public $search;
    public $priceMin;
    public $priceMax;
    public $description;

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

    protected $listeners = ['toggleSearch', 'searchPerformance' => 'performSearch', 'Filter' => 'FilterBottles'];

    public function mount()
    {
        $this->search = request()->query('search', null);
        $this->priceMin = request()->query('priceMin', null);
        $this->priceMax = request()->query('priceMax', null);
        $this->description = request()->query('description', null);
    }

    public function performSearch()
    {
        // La logique a été déplacée vers render(), cette méthode peut donc être vide ou supprimée
    }

    public function render()
    {
        // Commence la requête
        $query = Bottle::query();

        if ($this->unlisted) {
            $query->where('unlisted', true);
        } else {
            $query->where('unlisted', false);
        }

        // Appliquer les filtres de recherche
        if ($this->search && $this->search !== 'null') {
            $query->where(function ($query) {
                $query->where('name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('description', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('code_saq', 'LIKE', $this->search . '%');
            });
            
            if (is_numeric($this->search)) {
                $query->where(function ($query) {
                    $query->where('price', '>=', (float)$this->search)
                        ->where('price', '<', (float)$this->search + 1);
                });
            }
        }

        if ($this->description && $this->description !== 'null') {
            $query->where('description', 'LIKE', '%' . $this->description . '%');
        }

        if ($this->priceMin !== null && $this->priceMin > 0) {
            $query->where('price', '>=', (float) $this->priceMin);
        }
        
        if ($this->priceMax !== null && $this->priceMax > 0) {
            $query->where('price', '<=', (float) $this->priceMax);
        }
        
        // Trier et paginer
        $bottles = $query->orderBy('name')->paginate(9);
        $wishlistBottleIds = Wishlist::where('user_id', Auth::id())
            ->whereIn('bottle_id', $bottles->pluck('id'))
            ->pluck('bottle_id')
            ->toArray();
    
        $this->wishlistStatus = array_fill_keys($bottles->pluck('id')->toArray(), false);
    
        // Définir le statut des bouteilles dans la liste de souhaits à vrai
        foreach ($wishlistBottleIds as $bottleId) {
            $this->wishlistStatus[$bottleId] = true;
        }

        // Retourner la vue
        return view('livewire.many-bottles', [
            'bottles' => $bottles, 
            'filter' => $this->unlisted, 
            'wishlistStatus' => $this->wishlistStatus
        ])->layout('layouts.app');
    }

    public function searchPerformed($search)
    {
        $this->search = $search;
    }

    public function toggleSearch()
    {
        $this->showSearch = !$this->showSearch; // Basculer la visibilité
    }

    public function FilterBottles($newFilter)
    {
        $this->unlisted = $newFilter;
        $this->resetPage();
    }
}
