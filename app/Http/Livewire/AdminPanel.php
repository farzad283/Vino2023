<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminPanel extends Component
{
    public $page;

    public function mount($page = 'home-admin-panel')
    {
        $this->page = $page;
        $user = Auth::user();
        $role = $user ? $user->role : null;

        if (!$role) {
            return redirect('login');
        }
    }
    public function render()
    {

        return view('livewire.admin-panel', ['page' => $this->page]);
    }
}
