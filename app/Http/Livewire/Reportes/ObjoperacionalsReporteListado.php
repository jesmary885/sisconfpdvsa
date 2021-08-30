<?php

namespace App\Http\Livewire\Reportes;

use App\Models\Anoreporte;
use App\Models\Objoperacional;
Use Livewire\WithPagination;

use Livewire\Component;

class ObjoperacionalsReporteListado extends Component
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
        $objoperacionals = Objoperacional::where('description', 'LIKE', '%' . $this->search . '%')
        ->paginate(5);

        $this->anos=Anoreporte::all();
        $anor = $this->ano_idd;

        return view('livewire.reportes.objoperacionals-reporte-listado',compact('objoperacionals','anor'));
    }

    public function updatedPage(){
        $this->resetPage();
    }
}
