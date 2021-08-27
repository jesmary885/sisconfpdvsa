<?php

namespace App\Exports;

use App\Models\Objtactico;
use App\Models\Reportegeneral;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ObjtacticoExport implements FromView
{
    public function view(): View
	{
		$reporte = Reportegeneral::where('avance_id','1')->first();
		
		return view('exportexcel.obj_tacticos', ['reporte' => $reporte]);
	}
}
