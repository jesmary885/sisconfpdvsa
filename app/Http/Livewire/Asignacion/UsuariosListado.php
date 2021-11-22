<?php

namespace App\Http\Livewire\Asignacion;

use Livewire\Component;

class UsuariosListado extends Component
{
  
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
