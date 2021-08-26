<?php

namespace App\Http\Controllers\Reportes;

use App\Exports\NegociosExport;
use App\Http\Controllers\Controller;
use App\Models\Anoreporte;
use App\Models\Asignacion;
use App\Models\Negocio;
use App\Models\Reportegeneral;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class NegociosController extends Controller
{

    public function index(Negocio $negocio,Anoreporte $anoreporte){

        $anoreporteid = $anoreporte->id;
        $negocioid = $negocio->id;
        $fecha_actual = date('Y-m-d');
        $plan_total_usuarios_n = 0;
        $real_total_usuarios_n = 0;
        $cant_usuarios_d =0;
        $usuarios = User::where('negocio_id',$negocioid)->get();
            foreach ($usuarios as $usuario){
                $asignacions = Asignacion::where('user_id',$usuario->id)
                                                ->where('anoreporte_id',$anoreporteid)->get();
                $plan_fecha_hoy_usuario_d = 0;
                $real_total_asignacion_n = 0;
                $asignacion_cont_d = 0;
                $cont1 = 0;
                foreach ($asignacions as $asignacion){
                    $plan_conformacion_d = 0;
                    $plan_recopilacion_d = 0;
                    $plan_inf_d = 0;
                    $plan_divulgacion_d = 0;
                    $plan_carga_d = 0;
                    $dias_real_conformacion_d = Carbon::parse($asignacion->fecha_conformacion_i)->diffInDays(Carbon::parse($fecha_actual));
                    $plan_conformacion_d = ((($dias_real_conformacion_d) * 100) / ($asignacion->plan_dias_conformacion)) * 0.10;
                    $dias_real_recopilacion_d = Carbon::parse($asignacion->fecha_recopilacion_i)->diffInDays(Carbon::parse($fecha_actual));
                    $plan_recopilacion_d = ((($dias_real_recopilacion_d) * 100) / ($asignacion->plan_dias_recopilacion)) * 0.50;
                    $dias_real_inf_d = Carbon::parse($asignacion->fecha_inf_i)->diffInDays(Carbon::parse($fecha_actual));
                    $plan_inf_d = ((($dias_real_inf_d) * 100) / ($asignacion->plan_dias_inf)) * 0.20;
                    $dias_real_divulgacion_d = Carbon::parse($asignacion->fecha_divulgacion_i)->diffInDays(Carbon::parse($fecha_actual));
                    $plan_divulgacion_d = ((($dias_real_divulgacion_d) * 100) / ($asignacion->plan_dias_divulgacion)) * 0.15;
                    $dias_real_carga_d = Carbon::parse($asignacion->fecha_carga_i)->diffInDays(Carbon::parse($fecha_actual));
                    $plan_carga_d = ((($dias_real_carga_d) * 100) / ($asignacion->plan_dias_carga)) * 0.05;
                    $plan_fecha_hoy_d = ($plan_conformacion_d + $plan_recopilacion_d + $plan_inf_d + $plan_divulgacion_d + $plan_carga_d);
                    $plan_fecha_hoy_usuario_d = $plan_fecha_hoy_usuario_d + $plan_fecha_hoy_d;
                    $real_asignacion_d = $asignacion->avance->avance_real;
                    $real_total_asignacion_n = $real_total_asignacion_n + $real_asignacion_d;
                    $asignacion_cont_d = $asignacion_cont_d + 1;
                    $cont1 = $cont1 + 1;
                }
                if ($cont1 > 0){
                    $plan_usuario_n = $plan_fecha_hoy_usuario_d / $asignacion_cont_d;
                    $real_usuario_n = $real_total_asignacion_n / $asignacion_cont_d;
                    $usuario->reporteusuario->update(['plan' => $plan_usuario_n,'real' => $real_usuario_n]);
                    $plan_total_usuarios_n = $plan_total_usuarios_n + $plan_usuario_n;
                    $real_total_usuarios_n = $real_total_usuarios_n + $real_usuario_n;
                    $cant_usuarios_d = $cant_usuarios_d + 1;
                }
            }
            if($cant_usuarios_d > 0){
                $plan_total_n = $plan_total_usuarios_n / $cant_usuarios_d;
                $real_total_n = $real_total_usuarios_n / $cant_usuarios_d;
                $desviacion_n = ($plan_total_n) - ($real_total_n);
                $cumplimiento_n = (($real_total_n) / ($plan_total_n)) * 100; 
                $reportegeneral = Reportegeneral::where('avance_id','1')->first();
                $reportegeneral->update(["reporte_plan" => $plan_total_n, "reporte_real" => $real_total_n,"reporte_desviacion" => $desviacion_n, "reporte_cumplimiento" => $cumplimiento_n, "negocio_id" => $negocioid]);
            }
            else{
                $plan_total_n = 1;
                $real_total_n = 1;
                $desviacion_n = 1;
                $cumplimiento_n = 1;
                $reportegeneral = 1;
    
            }
        return view('reportes.negocios',compact('plan_total_n','real_total_n','desviacion_n','cumplimiento_n','usuarios','anoreporteid','reportegeneral'));

    }

    public function exportExcel()
    {
      
    	return Excel::download(new NegociosExport, 'ReporteNegocio.xlsx');
     
    }

    public function show()
    {
        return view('reportes.negocios_listado');
    }
}
