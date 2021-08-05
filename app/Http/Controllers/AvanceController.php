<?php

namespace App\Http\Controllers;

use App\Models\Asignacion;
use App\Models\Avance;
use Illuminate\Http\Request;

class AvanceController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($asignacion)
    {

        $asignacion_id = $asignacion;

        return view('avance.registro',compact('asignacion_id'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $asignacion_id)
    {
        $code = $asignacion_id;

        $conformacion = $request ['conformacion'] * 10;

        $recopilacion = $request ['recopilacion'] * 50;

        $informacion = $request ['informacion'] * 20;

        $divulgacion = $request ['divulgacion'] * 15;

        $recomendaciones = $request ['recomendaciones'] * 5;

        $sumreal= $conformacion + $recopilacion + $informacion + $divulgacion + $recomendaciones;

        $real = (($sumreal) / (5)) / 10;

            Avance::create([
                'avance_real' => $real,
                'asignacion_id' => $code,
                'avance_plan' => 'numero',
                'avance_desviacion' => 'numero',
                'avance_cumplimiento' => 'numero'
                
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
