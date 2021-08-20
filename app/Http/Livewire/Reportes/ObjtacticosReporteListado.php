<?php

namespace App\Http\Livewire\Reportes;

use App\Models\Objtactico;
Use Livewire\WithPagination;
use Livewire\Component;

class ObjtacticosReporteListado extends Component
{
    use WithPagination;
    //protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
    $this->resetPage();
    }

    public function render()
    {
        $objtacticos = Objtactico::where('description', 'LIKE', '%' . $this->search . '%')
        ->paginate(5);

        return view('livewire.reportes.objtacticos-reporte-listado',compact('objtacticos'));
    }
}
