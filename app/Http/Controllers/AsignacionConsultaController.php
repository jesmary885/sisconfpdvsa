<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsignacionConsultaController extends Controller
{
    public function index()
    {
        return view('asignacions_consultas');
    }

    public function buscar(Request $request)
    {
        $tiporeporte = $request["categoria"];

        if($tiporeporte==1){
            return redirect()->route('listado.usuario');
        }
        if($tiporeporte==2){
            return redirect()->route('listado.region');
        }
        if($tiporeporte==3){
            return redirect()->route('listado.division');
        }
        if($tiporeporte==4){
            return redirect()->route('listado.negocio');
        }
        if($tiporeporte==5){
            return redirect()->route('listado.objestrategico');
        }
        if($tiporeporte==6){
            return redirect()->route('listado.objtactico');
        }
        if($tiporeporte==7){
            return redirect()->route('listado.objoperacional');
        }
    }
}
