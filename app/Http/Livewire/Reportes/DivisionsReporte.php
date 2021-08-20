<?php

namespace App\Http\Livewire\Reportes;

use App\Models\Asignacion;
use App\Models\Division;
use App\Models\Negocio;
use App\Models\User;
use Carbon\Carbon;

use Livewire\Component;

class DivisionsReporte extends Component
{
    public $division;
    public $asignacion,$conformacion,$recopilacion,$informacion,$divulgacion,$recomendaciones;
    public $fecha_actual;
    public $cant_usuarios = 0;
    public $cant_usuarios_d = 0;

    public function mount(Division $division){
        $this->division = $division;
    }

    public function render()
    {
        $plan_total_usuarios = 0;
        $real_total_usuarios = 0;
        $divisionid = $this->division->id;
        $negocios = Negocio::where('division_id',$divisionid)->get();
        $usuarios = User::where('division_id',$divisionid)->get();

        foreach ($usuarios as $usuario){
            $asignacions = Asignacion::where('user_id',$usuario->id)->get();
            $plan_fecha_hoy_usuario = 0;
            $real_total_asignacion = 0;
            $asignacion_cont = 0;
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
                $plan_fecha_hoy_usuario = $plan_fecha_hoy_usuario + $plan_fecha_hoy;
                $real_asignacion = $asignacion->avance->avance_real;
                $real_total_asignacion = $real_total_asignacion + $real_asignacion;
                $asignacion_cont = $asignacion_cont + 1;
           }
           $plan_usuario = $plan_fecha_hoy_usuario / $asignacion_cont;
           $real_usuario = $real_total_asignacion / $asignacion_cont;
           $plan_total_usuarios = $plan_total_usuarios + $plan_usuario;
           $real_total_usuarios = $real_total_usuarios + $real_usuario;
           $this->cant_usuarios = $this->cant_usuarios + 1;
        }
        $plan_total = $plan_total_usuarios / $this->cant_usuarios;
        $real_total = $real_total_usuarios / $this->cant_usuarios;
        
        foreach ($negocios as $negocio){
            $plan_total_usuarios_d = 0;
            $real_total_usuarios_d = 0;
            //$division_reporte = Reportedivision::where('division_id',$division)->get();
            $usuarios_negocios = User::where('negocio_id',$negocio->id)->get();
            foreach ($usuarios_negocios as $usuario_negocio){
                $asignacions_usuario = Asignacion::where('user_id',$usuario_negocio->id)->get();
                $plan_fecha_hoy_usuario_d = 0;
                $real_total_asignacion_d = 0;
                $asignacion_cont_d = 0;
                foreach ($asignacions_usuario as $asignacion_usuario){
                    $plan_conformacion_d = 0;
                    $plan_recopilacion_d = 0;
                    $plan_inf_d = 0;
                    $plan_divulgacion_d = 0;
                    $plan_carga_d = 0;
                    $dias_real_conformacion_d = Carbon::parse($asignacion_usuario->fecha_conformacion_i)->diffInDays(Carbon::parse($this->fecha_actual));
                    $plan_conformacion_d = ((($dias_real_conformacion_d) * 100) / ($asignacion_usuario->plan_dias_conformacion)) * 0.10;
                    $dias_real_recopilacion_d = Carbon::parse($asignacion_usuario->fecha_recopilacion_i)->diffInDays(Carbon::parse($this->fecha_actual));
                    $plan_recopilacion_d = ((($dias_real_recopilacion_d) * 100) / ($asignacion_usuario->plan_dias_recopilacion)) * 0.50;
                    $dias_real_inf_d = Carbon::parse($asignacion_usuario->fecha_inf_i)->diffInDays(Carbon::parse($this->fecha_actual));
                    $plan_inf_d = ((($dias_real_inf_d) * 100) / ($asignacion_usuario->plan_dias_inf)) * 0.20;
                    $dias_real_divulgacion_d = Carbon::parse($asignacion_usuario->fecha_divulgacion_i)->diffInDays(Carbon::parse($this->fecha_actual));
                    $plan_divulgacion_d = ((($dias_real_divulgacion_d) * 100) / ($asignacion_usuario->plan_dias_divulgacion)) * 0.15;
                    $dias_real_carga_d = Carbon::parse($asignacion_usuario->fecha_carga_i)->diffInDays(Carbon::parse($this->fecha_actual));
                    $plan_carga_d = ((($dias_real_carga_d) * 100) / ($asignacion_usuario->plan_dias_carga)) * 0.05;
                    $plan_fecha_hoy_d = ($plan_conformacion_d + $plan_recopilacion_d + $plan_inf_d + $plan_divulgacion_d + $plan_carga_d);
                    $plan_fecha_hoy_usuario_d = $plan_fecha_hoy_usuario_d + $plan_fecha_hoy_d;
                    $real_asignacion_d = $asignacion_usuario->avance->avance_real;
                    $real_total_asignacion_d = $real_total_asignacion_d + $real_asignacion_d;
                    $asignacion_cont_d = $asignacion_cont_d + 1;
                }
                $plan_usuario_d = $plan_fecha_hoy_usuario_d / $asignacion_cont_d;
                $real_usuario_d = $real_total_asignacion_d / $asignacion_cont_d;
                $plan_total_usuarios_d = $plan_total_usuarios_d + $plan_usuario_d;
                $real_total_usuarios_d = $real_total_usuarios_d + $real_usuario_d;
                $this->cant_usuarios_d = $this->cant_usuarios_d + 1;
            }
            $plan_total_d = $plan_total_usuarios_d / $this->cant_usuarios_d;
            $real_total_d = $real_total_usuarios_d / $this->cant_usuarios_d;
            $negocio->reportenegocio->update(['plan' => $plan_total_d,'real' => $real_total_d]);
        }
        return view('livewire.reportes.divisions-reporte',compact('plan_total','real_total','negocios'))->layout('layouts.inicio2');
    }
}
