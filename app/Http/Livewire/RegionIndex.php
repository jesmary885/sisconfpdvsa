<?php

namespace App\Http\Livewire;

use App\Models\Region;
use Livewire\Component;
Use Livewire\WithPagination;


class RegionIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $regions =  Region::where('name', 'LIKE', '%' . $this->search . '%')
                    ->paginate(5);
        return view('livewire.region-index',compact('regions'));
    }
}
