<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\Negocio;
use App\Models\Reportenegocio;
use Illuminate\Http\Request;

class NegocioController extends Controller
{
    
    public function index()
    {
        return view('admin.negocios.index');
    }

    public function edit(Negocio $negocio)
    {
        $divisions = Division::pluck('name','id');
        return view('admin.negocios.edit',compact('negocio','divisions'));
    }

    public function update(Request $request, Negocio $negocio)
    {
        $request->validate([
            'name' =>'required',
            'division_id' =>'required'
        ]);
 
        $negocio->update($request->all());

        return redirect()->route('admin.negocios.edit',$negocio)->with('info','se ha modificado la division correctamente');
    } 

    public function create()
    {
        $divisions = Division::pluck('name','id');
       
        return view('admin.negocios.create',compact('divisions'));
    }

    public function store(Request $request)
    {
       $request->validate([
           'name' =>'required',
           'division_id' =>'required'
       ]);

       $negocio = Negocio::create($request->all());

       Reportenegocio::create([
        'real' => '0',
        'plan' => '0',
        'negocio_id' => $negocio->id
    ]);

       return redirect()->route('admin.negocios.create')->with('info','se ha creado el negocio correctamente');
    }

    // public function destroy(Negocio $negocio)
    // {
    //     $negocio->delete();
    //     return redirect()->route('admin.negocios.index')->with('info', 'El negocio se ha eliminado con éxito');
    // }
}


