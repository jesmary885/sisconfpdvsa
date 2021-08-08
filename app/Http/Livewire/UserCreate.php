<?php

namespace App\Http\Livewire;

use App\Models\Division;
use App\Models\Region;
use App\Models\User;
use Livewire\Component;

class UserCreate extends Component
{
    public $region_id ="";
    public $division_id ="";
    public $negocio_id ="";

    public $divisions = [];
    public $negocios = [];

    public $nombre, $apellido, $cedula, $indicador, $telefono, $email, $regions;
    public $saved = false;


    public function render()
    {
        return view('livewire.user-create');
    }

    public function mount(){
        $this->regions=Region::all();
    }

    public function updatedRegionId($value)
    {
        $region_select = Region::find($value);
        $this->divisions = $region_select->divisions;
    }

    public function updatedDivisionId($value)
    {
        $division_select = Division::find($value);
        $this->negocios = $division_select->negocios;
    }


    public function save(){
     

        $usuario = new User();
    
        //Guardando en bdd
        $usuario->name = $this->nombre;
        $usuario->email = $this->email;
        $usuario->indicador = $this->indicador;
        $usuario->apellido = $this->apellido;
        $usuario->cedula = $this->cedula;
        $usuario->telefono = $this->telefono;
        $usuario->password = $this->cedula;
        $usuario->region_id = $this->region_id;
        $usuario->division_id = $this->division_id;
        $usuario->negocio_id = $this->negocio_id;
        $usuario->save();

        $this->saved = true;

    $this->reset(['nombre','apellido','cedula','division_id','negocio_id','email','telefono','indicador']);
    }
}
