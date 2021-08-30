<?php

namespace App\Http\Livewire;

use App\Models\Negocio;
use Livewire\Component;
Use Livewire\WithPagination;

class NegocioIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $negocios =  Negocio::where('name', 'LIKE', '%' . $this->search . '%')
                    ->paginate(5);
        return view('livewire.negocio-index',compact('negocios'));
    }
}
