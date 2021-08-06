<?php

namespace App\Http\Livewire;

use App\Models\Asignacion;
use App\Models\Avance;
use Carbon\Carbon;
use Livewire\Component;
Use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class GestionAvance extends Component
{ 
    use WithPagination;

    public $fecha_actual;
    public $avance;


    public function render()
    {
        $usuario = Auth::user()->id;
       $asignacions = Asignacion::where('user_id',$usuario)->get();
       $this->fecha_actual = date('Y-m-d');

       foreach ($asignacions as $asignacion){
            $omitir = 0;
            $plan_conformacion = 0;
            $plan_recopilacion = 0;
            $plan_inf = 0;
            $plan_divulgacion = 0;
            $plan_carga = 0;
            if ($asignacion->fecha_conformacion_i <= $this->fecha_actual){
                $dias_real_conformacion = Carbon::parse($asignacion->fecha_conformacion_i)->diffInDays(Carbon::parse($this->fecha_actual));
                $plan_conformacion = ((($dias_real_conformacion) * 100) / ($asignacion->plan_dias_conformacion)) * 10;
                $omitir = $omitir + 1;
            }
            if ($asignacion->fecha_recopilacion_i <= $this->fecha_actual){
                $dias_real_recopilacion = Carbon::parse($asignacion->fecha_recopilacion_i)->diffInDays(Carbon::parse($this->fecha_actual));
                $plan_recopilacion = ((($dias_real_recopilacion) * 100) / ($asignacion->plan_dias_recopilacion)) * 50;
                $omitir = $omitir + 1;
            }
            if ($asignacion->fecha_inf_i <= $this->fecha_actual){
                $dias_real_inf = Carbon::parse($asignacion->fecha_inf_i)->diffInDays(Carbon::parse($this->fecha_actual));
                $plan_inf = ((($dias_real_inf) * 100) / ($asignacion->plan_dias_inf)) * 20;
                $omitir = $omitir + 1;
            }
            if ($asignacion->fecha_divulgacion_i <= $this->fecha_actual){
                $dias_real_divulgacion = Carbon::parse($asignacion->fecha_divulgacion_i)->diffInDays(Carbon::parse($this->fecha_actual));
                $plan_divulgacion = ((($dias_real_divulgacion) * 100) / ($asignacion->plan_dias_divulgacion)) * 15;
                $omitir = $omitir + 1;
            }
            if ($asignacion->fecha_carga_i <= $this->fecha_actual){
                $dias_real_carga = Carbon::parse($asignacion->fecha_carga_i)->diffInDays(Carbon::parse($this->fecha_actual));
                $plan_carga = ((($dias_real_carga) * 100) / ($asignacion->plan_dias_carga)) * 5;
                $omitir = $omitir + 1;
            }
            if($omitir == 0){
                $omitir = 1;
                }
            $plan_fecha_hoy = (($plan_conformacion + $plan_recopilacion + $plan_inf + $plan_divulgacion + $plan_carga) / $omitir) / 10;
            $asignacion->avance->update(['avance_plan' => $plan_fecha_hoy]);

            //$this_avance = Avance::where('asignacion_id',$asignacion->id)->get();
       }
       return view('livewire.gestion-avance',compact('asignacions'));
    }

    // public function edit(){

    //     $asignacion_select 

    //     return view('livewire.gestion-avance_edit');
    // }

    // public function update()
    // {

    //     $asignacion = Asignacion::where('id',$avance->asignacion_id)->get();


    //     $conformacion = $request ['conformacion'] * 10;

    //     $recopilacion = $request ['recopilacion'] * 50;

    //     $informacion = $request ['informacion'] * 20;

    //     $divulgacion = $request ['divulgacion'] * 15;

    //     $recomendaciones = $request ['recomendaciones'] * 5;

    //     $sumreal= $conformacion + $recopilacion + $informacion + $divulgacion + $recomendaciones;

    //     $real = (($sumreal) / (5)) / 10;

    //     $desviacion = ($avance->avance_plan) - $real;
    //     $cumplimiento = ($real / ($avance->avance_plan)) * 100;

    //     $avance->update([
    //             'avance_real' => $real,
    //             'asignacion_id' => $asignacion->id,
    //             'avance_plan' => $avance->avance_plan,
    //             'avance_desviacion' => $desviacion,
    //             'avance_cumplimiento' => $cumplimiento
                
    //         ]);

    //         return redirect()->route('home.avance');
    // }

  
}
