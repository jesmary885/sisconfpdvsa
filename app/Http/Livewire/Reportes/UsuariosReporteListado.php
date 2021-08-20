<?php

namespace App\Http\Livewire\Reportes;

use App\Models\User;
use Livewire\Component;
Use Livewire\WithPagination;

class UsuariosReporteListado extends Component
{

    use WithPagination;
    //protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
    $this->resetPage();
    }

    public function render()
    {
        $users = User::where('name', 'LIKE', '%' . $this->search . '%')
                    ->orwhere('email', 'LIKE', '%' . $this->search . '%')
                    ->paginate(5);

        return view('livewire.reportes.usuarios-reporte-listado',compact('users'));
    }

}
