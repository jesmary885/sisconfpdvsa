<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\Negocio;
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
           'region_id' =>'required'
       ]);

       $negocio = Negocio::create($request->all());

       $divisions = Division::pluck('name','id');
       return redirect()->route('admin.negocios.edit',$negocio)->with('info','se ha modificado la division correctamente');
    }
}
