<?php

namespace App\Http\Livewire\Asignacion;

use App\Models\User;
use Livewire\Component;
Use Livewire\WithPagination;

class UsuariosListado extends Component
{
  
    public $search;

    use WithPagination;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $users = User::where('name', 'LIKE', '%' . $this->search . '%')
                    ->orwhere('email', 'LIKE', '%' . $this->search . '%')
                    ->paginate(5);

        return view('livewire.asignacion.usuarios-listado',compact('users'));
    }

    public function updatedPage(){
        $this->resetPage();
    }
}





