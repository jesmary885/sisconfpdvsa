<?php

namespace App\Http\Livewire\Reportes;

use App\Models\Objestrategico;
Use Livewire\WithPagination;
use Livewire\Component;

class ObjestrategicosReporteListado extends Component
{
    use WithPagination;
    //protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
    $this->resetPage();
    }

    public function render()
    {
        $objestrategicos = Objestrategico::where('description', 'LIKE', '%' . $this->search . '%')
        ->paginate(5);

        return view('livewire.reportes.objestrategicos-reporte-listado',compact('objestrategicos'));
    }
}
