<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index()
    {
        return view('admin.regions.index');
    }

    public function edit(Region $region)
    {
        return view('admin.regions.edit',compact('region'));
    }

    public function update(Request $request, Region $region)
    {

        $request->validate([
            'name' =>'required',
        ]);
 
        $region->update($request->all());
        
        return redirect()->route('admin.regions.edit',$region)->with('info','se ha modificado la region correctamente');
    } 

    public function create()
    {
        return view('admin.regions.create');
    }

    public function store(Request $request)
    {
       $request->validate([
           'name' =>'required',
       ]);

       Region::create($request->all());

       return redirect()->route('admin.regions.create')->with('info', 'La región se ha creado con éxito');
    }
}
