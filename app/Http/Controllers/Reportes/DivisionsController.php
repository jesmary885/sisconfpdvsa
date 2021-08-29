<?php

namespace App\Http\Controllers\Reportes;

use App\Exports\DivisionsExport;
use App\Http\Controllers\Controller;
use App\Models\Anoreporte;
use App\Models\Asignacion;
use App\Models\Division;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\RegionsExport;
use App\Models\Negocio;
use App\Models\Reportegeneral;
use Maatwebsite\Excel\Facades\Excel;

class DivisionsController extends Controller
{
    public function index(Division $division,Anoreporte $anoreporte){

        $anoreporteid = $anoreporte->id;
        $divisionid = $division->id;
        $fecha_actual = date('Y-m-d');
        $negocios = Negocio::where('division_id',$divisionid)->get();
        $negociospaginate = Negocio::where('division_id',$divisionid)->paginate(2);
        //$reportegeneral = Reportegeneral::where('avance_id','1')->get();
        $negocio_total = 0;
        $plan_total_dr = 0;
        $real_total_dr = 0;
        foreach ($negocios as $negocio){
            $plan_total_usuarios_d = 0;
            $real_total_usuarios_d = 0;
            $cant_usuarios_d =0;
            $usuarios_negocios = User::where('negocio_id',$negocio->id)->get();
            foreach ($usuarios_negocios as $usuario_negocio){
                $asignacions_usuario = Asignacion::where('user_id',$usuario_negocio->id)
                                                ->where('anoreporte_id',$anoreporteid)->get();
                $plan_fecha_hoy_usuario_d = 0;
                $real_total_asignacion_d = 0;
                $asignacion_cont_d = 0;
                $cont1 = 0;
                foreach ($asignacions_usuario as $asignacion_usuario){
                    $plan_conformacion_d = 0;
                    $plan_recopilacion_d = 0;
                    $plan_inf_d = 0;
                    $plan_divulgacion_d = 0;
                    $plan_carga_d = 0;
                    $dias_real_conformacion_d = Carbon::parse($asignacion_usuario->fecha_conformacion_i)->diffInDays(Carbon::parse($fecha_actual));
                    $plan_conformacion_d = ((($dias_real_conformacion_d) * 100) / ($asignacion_usuario->plan_dias_conformacion)) * 0.10;
                    $dias_real_recopilacion_d = Carbon::parse($asignacion_usuario->fecha_recopilacion_i)->diffInDays(Carbon::parse($fecha_actual));
                    $plan_recopilacion_d = ((($dias_real_recopilacion_d) * 100) / ($asignacion_usuario->plan_dias_recopilacion)) * 0.50;
                    $dias_real_inf_d = Carbon::parse($asignacion_usuario->fecha_inf_i)->diffInDays(Carbon::parse($fecha_actual));
                    $plan_inf_d = ((($dias_real_inf_d) * 100) / ($asignacion_usuario->plan_dias_inf)) * 0.20;
                    $dias_real_divulgacion_d = Carbon::parse($asignacion_usuario->fecha_divulgacion_i)->diffInDays(Carbon::parse($fecha_actual));
                    $plan_divulgacion_d = ((($dias_real_divulgacion_d) * 100) / ($asignacion_usuario->plan_dias_divulgacion)) * 0.15;
                    $dias_real_carga_d = Carbon::parse($asignacion_usuario->fecha_carga_i)->diffInDays(Carbon::parse($fecha_actual));
                    $plan_carga_d = ((($dias_real_carga_d) * 100) / ($asignacion_usuario->plan_dias_carga)) * 0.05;
                    $plan_fecha_hoy_d = ($plan_conformacion_d + $plan_recopilacion_d + $plan_inf_d + $plan_divulgacion_d + $plan_carga_d);
                    $plan_fecha_hoy_usuario_d = $plan_fecha_hoy_usuario_d + $plan_fecha_hoy_d;
                    $real_asignacion_d = $asignacion_usuario->avance->avance_real;
                    $real_total_asignacion_d = $real_total_asignacion_d + $real_asignacion_d;
                    $asignacion_cont_d = $asignacion_cont_d + 1;
                    $cont1 = $cont1 + 1;
                }
                if ($cont1 > 0){
                    $plan_usuario_d = $plan_fecha_hoy_usuario_d / $asignacion_cont_d;
                    $real_usuario_d = $real_total_asignacion_d / $asignacion_cont_d;
                    $plan_total_usuarios_d = $plan_total_usuarios_d + $plan_usuario_d;
                    $real_total_usuarios_d = $real_total_usuarios_d + $real_usuario_d;
                    $cant_usuarios_d = $cant_usuarios_d + 1;
                }
            }
            if($cant_usuarios_d > 0){
                $plan_total_d = $plan_total_usuarios_d / $cant_usuarios_d;
                $real_total_d = $real_total_usuarios_d / $cant_usuarios_d;
                $plan_total_dr = $plan_total_dr + $plan_total_d;
                $real_total_dr = $real_total_dr + $real_total_d;
                $negocio->reportenegocio->update(['plan' => $plan_total_d,'real' => $real_total_d]);
                $negocio_total = $negocio_total + 1;
            }

            $puntos[]= ['name' => $negocio['name'] , 'y' => $negocio->reportenegocio['real']];
            $data = json_encode($puntos);

        }
        if($negocio_total > 0){
            $plan_total_r = $plan_total_dr / $negocio_total;
            $real_total_r = $real_total_dr / $negocio_total;
            $desviacion_r = ($plan_total_r) - ($real_total_r);
            $cumplimiento_r = (($real_total_r) / ($plan_total_r)) * 100;
            $reportegeneral = Reportegeneral::where('avance_id','1')->first();
            $reportegeneral->update(["reporte_plan" => $plan_total_r, "reporte_real" => $real_total_r,"reporte_desviacion" => $desviacion_r, "reporte_cumplimiento" => $cumplimiento_r, "division_id" => $divisionid]);
     
        } else{
            $plan_total_r = 1;
            $real_total_r = 1;
            $desviacion_r = 1;
            $cumplimiento_r = 1;
            $reportegeneral = 1;

        }
        return view('reportes.divisions',compact('plan_total_r','real_total_r','desviacion_r','cumplimiento_r','negocios','anoreporteid','reportegeneral','data','negociospaginate'));

    }

    public function exportExcel()
    {
      
    	return Excel::download(new DivisionsExport, 'ReporteDivision.xlsx');
     
    }

    public function show()
    {
        return view('reportes.divisions_listado');
    }
}
