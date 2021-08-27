<?php

namespace App\Http\Controllers\Reportes;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Models\Anoreporte;
use App\Models\Asignacion;
use App\Models\Reportegeneral;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class UsuariosController extends Controller
{
    public function index(User $usuario,Anoreporte $anoreporte){

            $real_total_asignacion_d = 0;
            $plan_fecha_hoy_usuario_d = 0;
            $asignacion_cont_d = 0;
            $anoreporteid = $anoreporte->id;
            $usuarioid = $usuario->id;
            $fecha_actual = date('Y-m-d');
            $asignacions = Asignacion::where('user_id',$usuarioid)
                                        ->where('anoreporte_id',$anoreporteid)->get();

            foreach ($asignacions as $asignacion){
                $plan_conformacion = 0;
                $plan_recopilacion = 0;
                $plan_inf = 0;
                $plan_divulgacion = 0;
                $plan_carga = 0;
                $dias_real_conformacion = Carbon::parse($asignacion->fecha_conformacion_i)->diffInDays(Carbon::parse($fecha_actual));
                $plan_conformacion = ((($dias_real_conformacion) * 100) / ($asignacion->plan_dias_conformacion)) * 0.10;
                $dias_real_recopilacion = Carbon::parse($asignacion->fecha_recopilacion_i)->diffInDays(Carbon::parse($fecha_actual));
                $plan_recopilacion = ((($dias_real_recopilacion) * 100) / ($asignacion->plan_dias_recopilacion)) * 0.50;
                $dias_real_inf = Carbon::parse($asignacion->fecha_inf_i)->diffInDays(Carbon::parse($fecha_actual));
                $plan_inf = ((($dias_real_inf) * 100) / ($asignacion->plan_dias_inf)) * 0.20;
                $dias_real_divulgacion = Carbon::parse($asignacion->fecha_divulgacion_i)->diffInDays(Carbon::parse($fecha_actual));
                $plan_divulgacion = ((($dias_real_divulgacion) * 100) / ($asignacion->plan_dias_divulgacion)) * 0.15;
                $dias_real_carga = Carbon::parse($asignacion->fecha_carga_i)->diffInDays(Carbon::parse($fecha_actual));
                $plan_carga = ((($dias_real_carga) * 100) / ($asignacion->plan_dias_carga)) * 0.05;
                $plan_fecha_hoy = ($plan_conformacion + $plan_recopilacion + $plan_inf + $plan_divulgacion + $plan_carga);
                $asignacion->avance->update(['avance_plan' => $plan_fecha_hoy]);
                $real_asignacion_d = $asignacion->avance->avance_real;
                $real_total_asignacion_d = $real_total_asignacion_d + $real_asignacion_d;
                $plan_fecha_hoy_usuario_d = $plan_fecha_hoy_usuario_d + $plan_fecha_hoy;
                $asignacion_cont_d = $asignacion_cont_d + 1;
            }

            if ($asignacion_cont_d > 0){
                $plan_usuario_d = $plan_fecha_hoy_usuario_d / $asignacion_cont_d;
                $real_usuario_d = $real_total_asignacion_d / $asignacion_cont_d;
                $desviacion_usuario_d =  $plan_usuario_d - $real_usuario_d;
                $cumplimiento_usuario_d = ($real_usuario_d / $plan_usuario_d) * 100;
                $reportegeneral = Reportegeneral::where('avance_id','1')->first();
                $reportegeneral->update(["reporte_plan" => $plan_usuario_d, "reporte_real" => $real_usuario_d,"reporte_desviacion" => $desviacion_usuario_d, "reporte_cumplimiento" => $cumplimiento_usuario_d,"anoreporte_id" => $anoreporteid, "usuario_id" => $usuarioid]);
            }else{
                $plan_usuario_d = 1;
                $real_usuario_d = 1;
                $desviacion_usuario_d =  1;
                $cumplimiento_usuario_d = 1;
            }

            return view('reportes.usuarios',compact('plan_usuario_d','real_usuario_d','desviacion_usuario_d','cumplimiento_usuario_d','asignacions'));
        }
    }

    public function exportExcel()
    {
    	return Excel::download(new UsersExport, 'ReporteUsuario.xlsx');
    }

    public function show()
    {
        
        return view('reportes.usuarios_listado');
    }
}
