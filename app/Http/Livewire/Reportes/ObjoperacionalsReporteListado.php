<?php

namespace App\Http\Livewire\Reportes;

use App\Models\Objoperacional;
Use Livewire\WithPagination;

use Livewire\Component;

class ObjoperacionalsReporteListado extends Component
{
    use WithPagination;
    //protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
    $this->resetPage();
    }

    public function render()
    {
        $objoperacionals = Objoperacional::where('description', 'LIKE', '%' . $this->search . '%')
        ->paginate(5);

        return view('livewire.reportes.objoperacionals-reporte-listado',compact('objoperacionals'));
    }
}
