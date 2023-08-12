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

    public $unlisted = false;
    public $search = '';
    public $showSearch = false;

    public function addToWishlist($bottleId)
    {
        $userId = Auth::id();

        // Vérifier si la bouteille est déjà dans la wishlist
        $existingWishlistItem = Wishlist::where('user_id', $userId)
                                        ->where('bottle_id', $bottleId)
                                        ->first();

        if ($existingWishlistItem) {
            // Incrémenter la quantité
            $existingWishlistItem->increment('quantity');
            $existingWishlistItem->refresh(); // Reload the model from the database

        } else {
         // Ajouter un nouvel élément à la liste de souhaits
            $newWishlistItem = Wishlist::create([
                'user_id' => $userId,
                'bottle_id' => $bottleId,
                'quantity' => 1,
            ]);

        }
        return redirect()->route('add-to-wishlist');
    }

    public function paginationView()
    {
        return 'vendor.livewire.tailwind';
    }

   
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

        return view('livewire.many-bottles', ['bottles' => $bottles, 'filter' => $this->unlisted])->layout('layouts.app');
    }

    protected $listeners = [
        'toggleSearch', 'searchPerformed' => 'performSearch',
        'Filter' => 'FilterBottles'
    ];

    public function performSearch($searchTerm)
    {
        $this->search = $searchTerm;
        $this->resetPage();  // Réinitialise la page courante à 1 après chaque recherche
    }

    public function toggleSearch()
    {
        $this->showSearch = !$this->showSearch; 
    }

    public function FilterBottles($newFilter)
    {
        $this->unlisted = $newFilter;
        $this->resetPage();
    }



    

    

    
}
