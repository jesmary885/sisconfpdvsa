<?php

namespace App\Http\Livewire;

use App\Models\Division;
use Livewire\Component;
Use Livewire\WithPagination;

class DivisionIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $divisions =  Division::where('name', 'LIKE', '%' . $this->search . '%')
                    ->paginate(5);
        return view('livewire.division-index',compact('divisions'));
    }
}
