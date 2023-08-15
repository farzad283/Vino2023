<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;



class UsersStatistics extends Component
{
    public $users;
    public $totalUsers;
    public $totalCellars;
    public $totalPrice;
    public function mount() {
        $this->users = User::with('cellars.bottles')->get();
        $this->totalUsers = $this->users->count();
        $this->totalCellars = 0;
        $this->totalPrice = 0;

        foreach($this->users as $user) {
            $user->cellarCount = $user->cellars->count();
            $user->totalPrice = $user->cellars->reduce(function ($carry, $cellar) {
                return $carry + $cellar->bottles->sum('price');
            }, 0);
            $user->maxBottles = $user->cellars->reduce(function ($carry, $cellar) {
                return max($carry, $cellar->bottles->sum('quantity'));
            }, 0);

            $this->totalCellars += $user->cellarCount;
            $this->totalPrice += $user->totalPrice;
        }
    }

    public function render() {
        return view('livewire.users-statistics');
    }
}

