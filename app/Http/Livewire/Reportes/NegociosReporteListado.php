<?php

namespace App\Http\Livewire\Reportes;

use App\Models\Negocio;
Use Livewire\WithPagination;
use Livewire\Component;

class NegociosReporteListado extends Component
{
    use WithPagination;
    //protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
    $this->resetPage();
    }

    public function render()
    {
        $negocios = Negocio::where('name', 'LIKE', '%' . $this->search . '%')
        ->paginate(5);

        return view('livewire.reportes.negocios-reporte-listado',compact('negocios'));
    }
}
