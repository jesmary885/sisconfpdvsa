<?php

namespace App\Http\Livewire;

use App\Models\Asignacion;
use App\Models\Avance;
use Livewire\Component;
Use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class GestionAvance extends Component
{ 
    use WithPagination;

    public function render()
    {

        $usuario = Auth::user()->id;

       $asignacions = Asignacion::where('user_id',$usuario)->get();

       
       


        return view('livewire.gestion-avance',compact('asignacions'));
    }
}
