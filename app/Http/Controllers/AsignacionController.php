<?php

namespace App\Http\Controllers;

use App\Models\Asignacion;
use App\Models\Avance;
use Illuminate\Http\Request;

class AsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignacion $asignacion)
    {
        return view('asignacion_avance.registro',compact('asignacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
