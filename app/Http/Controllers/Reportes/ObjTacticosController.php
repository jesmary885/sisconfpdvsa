<?php

namespace App\Http\Controllers\Reportes;

use App\Exports\ObjtacticoExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ObjTacticosController extends Controller
{
    public function exportExcel()
    {
      
    	return Excel::download(new ObjtacticoExport, 'ReporteObjtactico.xlsx');
     
    }

    public function show()
    {
        return view('reportes.objtacticos_listado');
    }
}
