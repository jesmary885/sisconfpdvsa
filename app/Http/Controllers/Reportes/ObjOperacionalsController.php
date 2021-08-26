<?php

namespace App\Http\Controllers\Reportes;

use App\Exports\ObjoperacionalExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ObjOperacionalsController extends Controller
{
    public function exportExcel()
    {
      
    	return Excel::download(new ObjoperacionalExport, 'ReporteObjoperacional.xlsx');
     
    }

    public function show()
    {
        return view('reportes.objoperacionals_listado');
    }
}
