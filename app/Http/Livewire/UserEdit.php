<?php

namespace App\Http\Livewire;

use App\Models\Division;
use App\Models\Negocio;
use App\Models\Region;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserEdit extends Component
{

    public $region_id ="",$division_id ="",$negocio_id ="";
    public $divisions,$negocios;
    public $nombre, $apellido, $cedula, $indicador, $telefono, $email, $regions, $mensaje, $user;
    
    protected $rules = [
        'region_id' => 'required',
        'division_id' => 'required',
        'negocio_id' => 'required',
        'nombre' => 'required|max:50',
        'apellido' => 'required|max:50',
        'cedula' => 'required|numeric|min:7',
        'indicador' => 'required',
        'telefono' => 'required|numeric|min:11',
        'email' => 'required|max:50',
    ];

    public function mount(){
      
        $this->nombre = $this->user->name;
        $this->apellido = $this->user->apellido;
        $this->email = $this->user->email;
        $this->cedula = $this->user->cedula;
        $this->indicador = $this->user->indicador;
        $this->telefono = $this->user->telefono;
        $this->region_id = $this->user->region_id;
        $this->division_id = $this->user->division_id;
        $this->negocio_id = $this->user->negocio_id;
        $this->regions=Region::all();
        $this->divisions=Division::all();
        $this->negocios=Negocio::all();
        $this->mensaje = false;
    }

    public function render()
    {
     
        return view('livewire.user-edit');
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

        $usuario = User::where('id',$this->user->id)->first();
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

        return redirect()->route('admin.users.index');

        // $this->reset(['nombre','apellido','cedula','division_id','negocio_id','region_id','email','telefono','indicador']);

        // $this->emitTo('user-index','render');
        // $this->emit('alert','Usuario registrado correctamente');
        
    }

}
