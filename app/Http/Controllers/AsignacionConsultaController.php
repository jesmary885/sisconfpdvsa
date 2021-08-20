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
         
            return view('reportes.usuarios');
        }
        if($tiporeporte==2){
            return view('reportes.regions_listado');
        }
        if($tiporeporte==3){
            return view('reportes.divisions');
        }
        if($tiporeporte==4){
            return view('reportes.negocios');
        }
        if($tiporeporte==5){
            return view('reportes.objestrategicos');
        }
        if($tiporeporte==6){
            return view('reportes.objtacticos');
        }
        if($tiporeporte==7){
            return view('reportes.objoperacionals');
        }
    }
}
