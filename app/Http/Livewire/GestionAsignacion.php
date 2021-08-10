<?php

namespace App\Http\Livewire;

use App\Models\Asignacion;
use App\Models\Avance;
use App\Models\Division;
use App\Models\Negocio;
use App\Models\Objestrategico;
use App\Models\Objoperacional;
use App\Models\Objtactico;
use App\Models\Region;
use Carbon\Carbon;
use Livewire\Component;

class GestionAsignacion extends Component
{
    public $objestrategicos, $regions;

    public $objestrategicos_id ="";
    public $objtacticos_id ="";
    public $objoperacionals_id ="";

    public $region_id ="";
    public $division_id ="";
    public $negocio_id ="";

    public $usuario_id ="";

    public $tacticos = [];
    public $operacionals = [];

    public $divisions = [];
    public $negocios = [];

    public $usuarios= [];

    public $input_conformacion_i;
    public $input_conformacion_f;
    public $input_recopilacion_i;
    public $input_recopilacion_f;
    public $input_inf_i;
    public $input_inf_f;
    public $input_divulgacion_i;
    public $input_divulgacion_f;
    public $input_carga_i;
    public $input_carga_f;
    public $fecha_creacion;
    public $saved = false;

    public function render()
    {
        return view('livewire.gestion-asignacion');
    }

    public function mount(){
        $this->objestrategicos=Objestrategico::all();
        $this->regions=Region::all();
       $this->fecha_creacion = date('Y-m-d');
    }



    public function updatedObjestrategicosId($value)
    {
        $estrategico = Objestrategico::find($value);
        $this->tacticos = $estrategico->objtacticos;
    }

    public function updatedObjtacticosId($value)
    {
        $tactic = Objtactico::find($value);
        $this->operacionals = $tactic->objoperacionals;
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

    public function updatedNegocioId($value)
    {
        $negocio_select = Negocio::find($value);
        $this->usuarios = $negocio_select->users;
    }

    public function save(){
     

        $asignacion = new Asignacion();
        $avance = new Avance();

        //Calculando cantidad de dias entre fechas de cada hito
        $conformacion_total = Carbon::parse($this->input_conformacion_i)->diffInDays(Carbon::parse($this->input_conformacion_f));
        $recopilacion_total = Carbon::parse($this->input_recopilacion_i)->diffInDays(Carbon::parse($this->input_recopilacion_f));
        $inf_total = Carbon::parse($this->input_inf_i)->diffInDays(Carbon::parse($this->input_inf_f));
        $divulgacion_total = Carbon::parse($this->input_divulgacion_i)->diffInDays(Carbon::parse($this->input_divulgacion_f));
        $carga_total = Carbon::parse($this->input_carga_i)->diffInDays(Carbon::parse($this->input_carga_f));

        //Guardando en bdd
        $asignacion->user_id = $this->usuario_id;
        $asignacion->objestrategico_id = $this->objestrategicos_id;
        $asignacion->objtactico_id = $this->objtacticos_id;
        $asignacion->objoperacional_id = $this->objoperacionals_id;
        $asignacion->fecha_conformacion_i = $this->input_conformacion_i;
        $asignacion->fecha_recopilacion_i= $this->input_recopilacion_i;
        $asignacion->fecha_inf_i =  $this->input_inf_i;
        $asignacion->fecha_divulgacion_i = $this->input_divulgacion_i;
        $asignacion->fecha_carga_i = $this->input_carga_i;
        $asignacion->fecha_creacion = $this->fecha_creacion;
        $asignacion->plan_dias_conformacion = $conformacion_total;
        $asignacion->plan_dias_recopilacion = $recopilacion_total;
        $asignacion->plan_dias_inf = $inf_total;
        $asignacion->plan_dias_divulgacion = $divulgacion_total;
        $asignacion->plan_dias_carga = $carga_total;
        $asignacion->save();


        //$ultima_asignacion = Asignacion::latest('id')->first()->id;
        $ultima_asignacion = $asignacion->id;
        $avance->avance_plan = '0';
        $avance->avance_real = '0';
        $avance->avance_desviacion = '0';
        $avance->avance_cumplimiento = '0';
        $avance->asignacion_id = $ultima_asignacion;
        $avance->save();
        $this->reset(['objestrategicos_id','objtacticos_id','objoperacionals_id','input_conformacion_i','input_recopilacion_i','input_inf_i','input_divulgacion_i','input_carga_i','region_id','division_id','negocio_id','input_conformacion_f','input_recopilacion_f','input_inf_f','input_divulgacion_f','input_carga_f','usuario_id']);
        $this->emit('alert');

    }
}

