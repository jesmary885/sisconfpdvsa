<?php

namespace App\Http\Controllers\Reportes;

use App\Http\Controllers\Controller;
use App\Models\Anoreporte;
use App\Models\Asignacion;
use App\Models\Division;
use App\Models\Region;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\AsignacionsExport;
use App\Models\Reportegeneral;
use Maatwebsite\Excel\Facades\Excel;

class RegionsController extends Controller
{
    public function index(Region $region,Anoreporte $anoreporte){

        // $region = $region;
        // $ano = $anore

        $anoreporteid = $anoreporte->id;
        $regionid = $region->id;
        $fecha_actual = date('Y-m-d');
        $divisions = Division::where('region_id',$regionid)->get();
        //$reportegeneral = Reportegeneral::where('avance_id','1')->get();
        $division_total = 0;
        $plan_total_dr = 0;
        $real_total_dr = 0;
        foreach ($divisions as $division){
            $plan_total_usuarios_d = 0;
            $real_total_usuarios_d = 0;
            $cant_usuarios_d =0;
            $usuarios_divisions = User::where('division_id',$division->id)->get();
            foreach ($usuarios_divisions as $usuario_division){
                $asignacions_usuario = Asignacion::where('user_id',$usuario_division->id)
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
                $division->reportedivision->update(['plan' => $plan_total_d,'real' => $real_total_d]);
                $division_total = $division_total + 1;
            }
        }
        if($division_total > 0){
            $plan_total_r = $plan_total_dr / $division_total;
            $real_total_r = $real_total_dr / $division_total;
            $desviacion_r = ($plan_total_r) - ($real_total_r);
            $cumplimiento_r = (($real_total_r) / ($plan_total_r)) * 100;
            $reportegeneral = Reportegeneral::where('avance_id','1')->first();
            $reportegeneral->update(["reporte_plan" => $plan_total_r, "reporte_real" => $real_total_r,"reporte_desviacion" => $desviacion_r, "reporte_cumplimiento" => $cumplimiento_r]);
     
        } else{
            $plan_total_r = 1;
            $real_total_r = 1;

        }
        return view('reportes.regions',compact('plan_total_r','real_total_r','desviacion_r','cumplimiento_r','divisions','anoreporteid','reportegeneral'));

    }

    public function exportExcel()
    {
    	return Excel::download(new AsignacionsExport, 'ReporteGeneral.xlsx');
    }
}
