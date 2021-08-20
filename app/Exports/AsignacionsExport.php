<?php

namespace App\Exports;

use App\Models\Asignacion;
use App\Models\Reportegeneral;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class AsignacionsExport implements FromView
{
    public function view(): View
	{
		return view('reportegeneral-excel', [
			
			'reporte' => Reportegeneral::where('avance_id','1')->first()
		]);
	}
}
