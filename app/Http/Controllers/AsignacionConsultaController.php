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
        if($request->categoria = '1'){
            //return redirect()->route('consultas.usuarios');
            return 'hola';
        }
        if($request->categoria = '2'){
            return 'hola2';
        }
        if($request->categoria = '3'){
            return 'holak';
        }
        if($request->categoria = '4'){
            return 'hola';
        }
        if($request->categoria = '5'){
            return 'hola5';
        }
        if($request->categoria = '6'){
            return 'hola';
        }
        if($request->categoria = '7'){
            return 'hola';
        }

        
    }
}
