<?php

namespace App\Http\Livewire\Reportes;

use App\Models\Anoreporte;
use App\Models\Negocio;
Use Livewire\WithPagination;
use Livewire\Component;

class NegociosReporteListado extends Component
{
    public $anos, $ano_id, $ano_idd, $search, $pSelectAno;

    use WithPagination;
  
    public function mount(){
        $this->ano_id = "0";
        $this->ano_idd = "0";
    }

    public function updatingSearch(){
    $this->resetPage();
    }

    public function updatedAnoId($value)
    {
        $this->ano_idd = Anoreporte::find($value);
    }

    public function render()
    {
        $this->anos=Anoreporte::all();
        $anor = $this->ano_idd;
        $negocios = Negocio::where('name', 'LIKE', '%' . $this->search . '%')
        ->paginate(5);

        return view('livewire.reportes.negocios-reporte-listado',compact('negocios','anor'));
    }

    public function updatedPage(){
        $this->resetPage();
    }
}
