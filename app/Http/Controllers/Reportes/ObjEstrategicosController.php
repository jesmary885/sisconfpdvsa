<?php

namespace App\Http\Controllers\Reportes;

use App\Exports\ObjestrategicoExport;
use App\Http\Controllers\Controller;
use App\Models\Anoreporte;
use App\Models\Asignacion;
use App\Models\Objestrategico;
use App\Models\Reportegeneral;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ObjEstrategicosController extends Controller
{
    public function index(Objestrategico $objestrategico,Anoreporte $anoreporte){

        $anoreporteid = $anoreporte->id;
        $objestrategicoid = $objestrategico->id;
        $fecha_actual = date('Y-m-d');

                $asignacions = Asignacion::where('objestrategico_id',$objestrategicoid)
                                        ->where('anoreporte_id',$anoreporteid)->get();

                $plan_fecha_hoy_obj = 0;
                $real_total_asignacion = 0;
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
                    $plan_fecha_hoy_asig = ($plan_conformacion_d + $plan_recopilacion_d + $plan_inf_d + $plan_divulgacion_d + $plan_carga_d);
                    if ($plan_fecha_hoy_asig > 100){
                        $plan_fecha_hoy_asig = 100;
                    }
                    $plan_fecha_hoy_obj = $plan_fecha_hoy_obj + $plan_fecha_hoy_asig;
                    $real_asignacion = $asignacion->avance->avance_real;
                    $real_total_asignacion = $real_total_asignacion + $real_asignacion;
                    $asignacion_cont_d = $asignacion_cont_d + 1;
                    $cont1 = $cont1 + 1;
                }
                if ($cont1 > 0){
                    $plan_total = $plan_fecha_hoy_obj / $asignacion_cont_d;
                    $real_total = $real_total_asignacion / $asignacion_cont_d;
                    $desviacion = ($plan_total) - ($real_total);
                    $cumplimiento = (($real_total) / ($plan_total)) * 100;
                    $reportegeneral = Reportegeneral::where('avance_id','1')->first();
                    $reportegeneral->update(["reporte_plan" => $plan_total, "reporte_real" => $real_total,"reporte_desviacion" => $desviacion, "reporte_cumplimiento" => $cumplimiento]);
                }
                else{
                    $plan_total = 1;
                    $real_total = 1;
                    $desviacion = 1;
                    $cumplimiento = 1;
                    $reportegeneral = 1;
                }
        return view('reportes.objestrategicos',compact('plan_total','real_total','desviacion','cumplimiento','anoreporteid','reportegeneral'));

    }

    public function exportExcel()
    {
      
    	return Excel::download(new ObjestrategicoExport, 'ReporteObjestrategico.xlsx');
     
    }

    public function show()
    {
        return view('reportes.objestrategicos_listado');
    }
}
