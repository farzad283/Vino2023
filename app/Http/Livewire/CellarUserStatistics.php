<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CellarUserStatistics extends Component
{

    public function render()
    {
        $cellars_user_statistics = DB::table('bottle_in_cellars')
            ->join('cellars', 'cellars.id', '=', 'bottle_in_cellars.cellar_id')
            ->join('wine_bottles', 'wine_bottles.id', '=', 'bottle_in_cellars.bottle_id')
            ->select('cellars.id as cellar_id', 'cellars.name', 'cellars.user_id')
            ->selectRaw('SUM(bottle_in_cellars.quantity) as bottle_count')
            ->selectRaw('SUM(CASE WHEN bottle_in_cellars.deleted_at IS NOT NULL THEN 1 ELSE 0 END) as bottle_deleted')
            ->selectRaw('MAX(bottle_in_cellars.updated_at) as last_modified')
            ->selectRaw('SUM(bottle_in_cellars.quantity * wine_bottles.price) as total_price')
            ->addSelect(DB::raw('(SELECT SUM(bottles_consumed.qty) FROM bottles_consumed WHERE bottles_consumed.cellar_id = cellars.id) as bottles_consumed')) // Adding total bottles consumed calculation with subquery
            ->where('cellars.user_id', auth()->id())
            ->groupBy('cellars.id', 'cellars.name', 'cellars.user_id')
            ->get();

        return view('livewire.cellar-user-statistics', compact('cellars_user_statistics'));
    }
}
    

