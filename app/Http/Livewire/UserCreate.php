<?php

namespace App\Http\Livewire;

use App\Models\Division;
use App\Models\Region;
use App\Models\Reporteusuario;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class UserCreate extends Component
{
    public $region_id ="",$division_id ="",$negocio_id ="";
    public $divisions = [],$negocios = [];
    public $nombre, $apellido, $cedula, $indicador, $telefono, $email, $regions, $mensaje;
    
    protected $rules = [
        'region_id' => 'required',
        'division_id' => 'required',
        'negocio_id' => 'required',
        'nombre' => 'required|max:50',
        'apellido' => 'required|max:50',
        'cedula' => 'required|numeric|min:7',
        'indicador' => 'required',
        'telefono' => 'required|numeric|min:11',
        'email' => 'required|max:50|unique:users',
    ];

    

    public function render()
    {
        return view('livewire.user-create');
    }

    public function mount(){
        $this->regions=Region::all();
        $this->mensaje = false;
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

    public function save()
    {
        $rules = $this->rules;
        $this->validate($rules);

        $usuario = new User();
        $usuario->name = $this->nombre;
        $usuario->email = $this->email;
        $usuario->indicador = $this->indicador;
        $usuario->apellido = $this->apellido;
        $usuario->cedula = $this->cedula;
        $usuario->telefono = $this->telefono;
        $usuario->password = Hash::make($this->cedula);
        $usuario->region_id = $this->region_id;
        $usuario->division_id = $this->division_id;
        $usuario->negocio_id = $this->negocio_id;
        $usuario->save();

        $reporte_usuario = new Reporteusuario();
        $reporte_usuario->real = 0;
        $reporte_usuario->plan = 0;
        $reporte_usuario->user_id = $usuario->id;
        $reporte_usuario->save();

        return redirect()->route('admin.users.index');

        // $this->reset(['nombre','apellido','cedula','division_id','negocio_id','region_id','email','telefono','indicador']);

        // $this->emitTo('user-index','render');
        // $this->emit('alert','Usuario registrado correctamente');
        
    }
}
