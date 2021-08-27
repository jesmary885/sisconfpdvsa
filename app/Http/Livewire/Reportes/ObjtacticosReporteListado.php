<?php

namespace App\Http\Livewire\Reportes;

use App\Models\Anoreporte;
use App\Models\Objtactico;
Use Livewire\WithPagination;
use Livewire\Component;

class ObjtacticosReporteListado extends Component
{
    public $anos;
    public $ano_id, $ano_idd;

    use WithPagination;
  
    public $search;
    public $pSelectAno;

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
        $objtacticos = Objtactico::where('description', 'LIKE', '%' . $this->search . '%')
        ->paginate(5);

        return view('livewire.reportes.objtacticos-reporte-listado',compact('objtacticos','anor'));
    }

    public function updatedPage(){
        $this->resetPage();
    }
}
