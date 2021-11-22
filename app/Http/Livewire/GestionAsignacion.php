<?php

namespace App\Http\Livewire;

use App\Models\Anoreporte;
use App\Models\Asignacion;
use App\Models\Avance;
use App\Models\Division;
use App\Models\Negocio;
use App\Models\Objestrategico;
use App\Models\Objoperacional;
use App\Models\Objtactico;
use App\Models\Region;
use App\Models\Reportegeneral;
use App\Models\Reporteplan;
use App\Models\Reportereal;
use Carbon\Carbon;
use Livewire\Component;

class GestionAsignacion extends Component
{
    public $objestrategicos, $regions;
    public $objestrategicos_id ="", $objtacticos_id ="", $objoperacionals_id ="", $region_id ="", $division_id ="",$negocio_id ="",$usuario_id ="";
    public $tacticos = [], $operacionals = [], $divisions = [], $negocios = [],$usuarios= [];
    public $input_conformacion_i, $input_conformacion_f, $input_recopilacion_i,$input_recopilacion_f,$input_inf_i,$input_inf_f,$input_divulgacion_i,$input_divulgacion_f,$input_carga_i,$input_carga_f,$fecha_creacion,$fecha_actual,$ano;
    public $saved = false;

    protected $rules = [
        'objestrategicos_id' => 'required',
        'objtacticos_id' => 'required',
        'objoperacionals_id' => 'required',
        'input_conformacion_i' => 'required',
        'input_conformacion_f' => 'required',
        'input_recopilacion_i' => 'required',
        'input_recopilacion_i' => 'required',
        'input_inf_i' => 'required',
        'input_inf_f' => 'required',
        'input_divulgacion_i' => 'required',
        'input_divulgacion_f' => 'required',
        'input_carga_i' => 'required',
        'input_carga_i' => 'required',
        'region_id' => 'required',
        'division_id' => 'required',
        'negocio_id' => 'required',
        'usuario_id' => 'required',
    ];

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

        $rules = $this->rules;
        $this->fecha_actual = date('Y-m-d');
        $fecha = Carbon::parse($this->fecha_actual);
        $this->ano = $fecha->year;
        $ano_reporte = Anoreporte::where('ano',$this->ano)->first();
        $reportegeneral = Reportegeneral::where('avance_id','1')->first();
      
        $conformacion_total = Carbon::parse($this->input_conformacion_i)->diffInDays(Carbon::parse($this->input_conformacion_f));
        $recopilacion_total = Carbon::parse($this->input_recopilacion_i)->diffInDays(Carbon::parse($this->input_recopilacion_f));
        $inf_total = Carbon::parse($this->input_inf_i)->diffInDays(Carbon::parse($this->input_inf_f));
        $divulgacion_total = Carbon::parse($this->input_divulgacion_i)->diffInDays(Carbon::parse($this->input_divulgacion_f));
        $carga_total = Carbon::parse($this->input_carga_i)->diffInDays(Carbon::parse($this->input_carga_f));

        $this->validate($rules);

        $asignacion = new Asignacion();
        $asignacion->user_id = $this->usuario_id;
        $asignacion->objestrategico_id = $this->objestrategicos_id;
        $asignacion->objtactico_id = $this->objtacticos_id;
        $asignacion->objoperacional_id = $this->objoperacionals_id;
        $asignacion->fecha_conformacion_i = $this->input_conformacion_i;
        $asignacion->fecha_recopilacion_i= $this->input_recopilacion_i;
        $asignacion->fecha_inf_i =  $this->input_inf_i;
        $asignacion->fecha_divulgacion_i = $this->input_divulgacion_i;
        $asignacion->fecha_carga_i = $this->input_carga_i;


        $asignacion->ano_creacion = $this->ano;
        $asignacion->plan_dias_conformacion = $conformacion_total;
        $asignacion->plan_dias_recopilacion = $recopilacion_total;
        $asignacion->plan_dias_inf = $inf_total;
        $asignacion->plan_dias_divulgacion = $divulgacion_total;
        $asignacion->plan_dias_carga = $carga_total;
        $asignacion->anoreporte_id = $ano_reporte->id;
        $asignacion->save();

        $avance = new Avance();
        $ultima_asignacion = $asignacion->id;
        $avance->avance_plan = '0';
        $avance->avance_real = '0';
        $avance->avance_desviacion = '0';
        $avance->avance_cumplimiento = '0';
        $avance->avance_observaciones = '';
        $avance->asignacion_id = $ultima_asignacion;
        $avance->save();

        if($reportegeneral){
            $reportegeneral->update(['reporte_plan' => '1', 'reporte_real' => '1','reporte_desviacion' => '1', 'reporte_cumplimiento' => '1','division_id' => '1','region_id' => '1','negocio_id' => '1', 'usuario_id' => '1', 'anoreporte_id' => '1']);
        }
        else{
            $reporte = new Reportegeneral();
            $reporte->reporte_plan = '1';
            $reporte->reporte_real = '1';
            $reporte->reporte_desviacion = '1';
            $reporte->reporte_cumplimiento = '1';
            $reporte->division_id = '1';
            $reporte->region_id = '1';
            $reporte->avance_id = '1';
            $reporte->usuario_id = '1';
            $reporte->negocio_id = '1';
            $reporte->anoreporte_id = '1';
            $reporte->save();
        }

        $this->reset(['objestrategicos_id','objtacticos_id','objoperacionals_id','input_conformacion_i','input_recopilacion_i','input_inf_i','input_divulgacion_i','input_carga_i','region_id','division_id','negocio_id','input_conformacion_f','input_recopilacion_f','input_inf_f','input_divulgacion_f','input_carga_f','usuario_id']);
        $this->emit('alert');
    }

    public function render()
    {
        return view('livewire.gestion-asignacion');
    }
}

