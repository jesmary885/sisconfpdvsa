<?php

namespace App\Http\Livewire\Reportes;

use App\Models\Division;
Use Livewire\WithPagination;
use Livewire\Component;

class DivisionsReporteListado extends Component
{
    use WithPagination;
    //protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
    $this->resetPage();
    }

    public function render()
    {
        $divisions = Division::where('name', 'LIKE', '%' . $this->search . '%')
        ->paginate(5);

        return view('livewire.reportes.divisions-reporte-listado',compact('divisions'));
    }
}
