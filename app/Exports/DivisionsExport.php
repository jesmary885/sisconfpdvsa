<?php

namespace App\Exports;

use App\Models\Division;
use App\Models\Negocio;
use App\Models\Reportegeneral;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class DivisionsExport implements FromView
{
    public function view(): View
	{
		$reporte = Reportegeneral::where('avance_id','1')->first();
		$division_id = $reporte->division_id;
		$negocios = Negocio::where('division_id',$division_id)->get();
		return view('exportexcel.divisions', ['reporte' => $reporte,'negocios'=> $negocios]);
	}
}



