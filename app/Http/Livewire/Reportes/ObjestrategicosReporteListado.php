<?php

namespace App\Http\Livewire\Reportes;

use App\Models\Anoreporte;
use App\Models\Objestrategico;
Use Livewire\WithPagination;
use Livewire\Component;

class ObjestrategicosReporteListado extends Component
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
        $objestrategicos = Objestrategico::where('description', 'LIKE', '%' . $this->search . '%')
        ->paginate(5);
        $this->anos=Anoreporte::all();
        $anor = $this->ano_idd;

        return view('livewire.reportes.objestrategicos-reporte-listado',compact('objestrategicos','anor'));
    }

    public function updatedPage(){
        $this->resetPage();
    }
}
