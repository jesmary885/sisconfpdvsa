<?php

namespace App\Http\Livewire\Reportes;

use App\Models\Anoreporte;
use App\Models\User;
use Livewire\Component;
Use Livewire\WithPagination;

class UsuariosReporteListado extends Component
{

    public $anos, $ano_id, $ano_idd = "0", $search, $pSelectAno;

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
        $users = User::where('name', 'LIKE', '%' . $this->search . '%')
                    ->orwhere('email', 'LIKE', '%' . $this->search . '%')
                    ->paginate(5);

        return view('livewire.reportes.usuarios-reporte-listado',compact('users','anor'));
    }

    public function updatedPage(){
        $this->resetPage();
    }
}
