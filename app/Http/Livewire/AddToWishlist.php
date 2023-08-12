<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Wishlist;
use App\Models\Bottle;
use Illuminate\Support\Facades\Auth;


class AddToWishlist extends Component
{
    public $wishlistItems;
    
    public function mount()
{
    $this->wishlistItems = Wishlist::where('user_id', Auth::id())->get();
}

public function render()
{
    return view('livewire.add-to-wishlist', ['wishlistItems' => $this->wishlistItems]);
}
}
