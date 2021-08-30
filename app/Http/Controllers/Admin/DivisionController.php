<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\Region;
use App\Models\Reportedivision;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function index()
    {
        return view('admin.divisions.index');
    }

    public function edit(Division $division)
    {
        $regions = Region::pluck('name','id');
        return view('admin.divisions.edit',compact('division','regions'));
    }

    public function update(Request $request, Division $division)
    {
        $request->validate([
            'name' =>'required',
            'region_id' =>'required'
        ]);
 
        $division->update($request->all());

        return redirect()->route('admin.divisions.edit',$division)->with('info','se ha modificado la division correctamente');
    } 
    public function create()
    {
        $regions = Region::pluck('name','id');
        return view('admin.divisions.create',compact('regions'));
    }

    public function store(Request $request)
    {
       $request->validate([
           'name' =>'required',
           'region_id' =>'required'
       ]);

       $division = Division::create($request->all());

       Reportedivision::create([
           'real' => '0',
           'plan' => '0',
           'division_id' => $division->id
       ]);

       return redirect()->route('admin.divisions.create',$division)->with('info', 'La división se ha creado con éxito');
    }

    // public function destroy(Division $division)
    // {
    //     $division->delete();
    //     return redirect()->route('admin.divisions.index')->with('info', 'La división se ha eliminado con éxito');
    // }
}
