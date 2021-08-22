<?php

namespace App\Exports;

use App\Models\Division;
use App\Models\Region;
use App\Models\Reportegeneral;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class RegionsExport implements FromView
{
    public function view(): View
	{
		$reporte = Reportegeneral::where('avance_id','1')->first();
		$region_id = $reporte->region_id;
		$divisions = Division::where('region_id',$region_id)->get();
		return view('exportexcel.regions', ['reporte' => $reporte,'divisions'=> $divisions]);
	}
}


