<?php

namespace App\Http\Controllers;

use App\Models\Asignacion;
use App\Models\Avance;
use Illuminate\Http\Request;

class AsignacionController extends Controller
{
    
    public function edit(Asignacion $asignacion)
    {
        return view('asignacion_avance.registro',compact('asignacion'));
    }

    public function update(Request $request, Asignacion $asignacion)
    {

        $avance = Avance::where('asignacion_id',$asignacion->id)->first();
         $conformacion = $request ['conformacion'] * 10;
         $recopilacion = $request ['recopilacion'] * 50;
         $informacion = $request ['informacion'] * 20;
         $divulgacion = $request ['divulgacion'] * 15;
         $recomendaciones = $request ['recomendaciones'] * 5;
         $sumreal= $conformacion + $recopilacion + $informacion + $divulgacion + $recomendaciones;
         $real = (($sumreal) / (5)) / 10;
         if($real > 100){
             $real = 100;
         }
         $desviacion = ($avance->avance_plan) - $real;
         $cumplimiento = ($real / ($avance->avance_plan)) * 100;

         $avance->update([
                 'avance_real' => $real,
                 'asignacion_id' => $asignacion->id,
                 'avance_plan' => $avance->avance_plan,
                 'avance_desviacion' => $desviacion,
                 'avance_cumplimiento' => $cumplimiento
                
             ]);

             return redirect()->route('home.avance');
    }

    public function show()
    {
        return view('asignacion.listado_usuarios');
    }

    public function eliminar()
    {
        return redirect()->route('asignacion_listado.usuario');
    }

   
  
}
