<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bottle;
use Livewire\WithPagination;

class ManyBottles extends Component
{
    use WithPagination;
    public $search = '';
    public $component = 'bottles';

    public function styles()
    {
        return [
            'css/livewire.css',
        ];
    }

    public function render()
    {
        $bottles = Bottle::query();
        
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
    
        return view('livewire.many-bottles', [
            'bottles' => $bottles,
        ])->layout('layouts.app');
    }
    
    protected $listeners = ['searchPerformed' => 'performSearch', 'resultSelected' => 'performSearch'];

    public function performSearch($searchTerm)
    {
        $this->search = $searchTerm;
    }
}
