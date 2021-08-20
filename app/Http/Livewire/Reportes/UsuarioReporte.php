<?php

namespace App\Http\Livewire\Reportes;

use App\Models\Asignacion;
use App\Models\User;
use Livewire\Component;
use Carbon\Carbon;


class UsuarioReporte extends Component
{
    public $user;
    public $asignacion,$conformacion,$recopilacion,$informacion,$divulgacion,$recomendaciones;
    public $open = false;
    public $fecha_actual;

    public function mount(User $user){
        $this->user = $user;
    }
    public function render()
    {
        
        $usuarioid = $this->user->id;

       $asignacions = Asignacion::where('user_id',$usuarioid)->get();
       $this->fecha_actual = date('Y-m-d');

       foreach ($asignacions as $asignacion){
   
            $plan_conformacion = 0;
            $plan_recopilacion = 0;
            $plan_inf = 0;
            $plan_divulgacion = 0;
            $plan_carga = 0;
      
            $dias_real_conformacion = Carbon::parse($asignacion->fecha_conformacion_i)->diffInDays(Carbon::parse($this->fecha_actual));
            $plan_conformacion = ((($dias_real_conformacion) * 100) / ($asignacion->plan_dias_conformacion)) * 0.10;
            $dias_real_recopilacion = Carbon::parse($asignacion->fecha_recopilacion_i)->diffInDays(Carbon::parse($this->fecha_actual));
            $plan_recopilacion = ((($dias_real_recopilacion) * 100) / ($asignacion->plan_dias_recopilacion)) * 0.50;
            $dias_real_inf = Carbon::parse($asignacion->fecha_inf_i)->diffInDays(Carbon::parse($this->fecha_actual));
            $plan_inf = ((($dias_real_inf) * 100) / ($asignacion->plan_dias_inf)) * 0.20;
            $dias_real_divulgacion = Carbon::parse($asignacion->fecha_divulgacion_i)->diffInDays(Carbon::parse($this->fecha_actual));
            $plan_divulgacion = ((($dias_real_divulgacion) * 100) / ($asignacion->plan_dias_divulgacion)) * 0.15;
            $dias_real_carga = Carbon::parse($asignacion->fecha_carga_i)->diffInDays(Carbon::parse($this->fecha_actual));
            $plan_carga = ((($dias_real_carga) * 100) / ($asignacion->plan_dias_carga)) * 0.05;
            $plan_fecha_hoy = ($plan_conformacion + $plan_recopilacion + $plan_inf + $plan_divulgacion + $plan_carga);
            $asignacion->avance->update(['avance_plan' => $plan_fecha_hoy]);
       }

        return view('livewire.reportes.usuario-reporte',compact('asignacions'))->layout('layouts.inicio2');
    }
}
