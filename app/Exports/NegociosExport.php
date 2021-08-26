<?php

namespace App\Exports;

use App\Models\Negocio;
use App\Models\Reportegeneral;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class NegociosExport implements FromView
{
    public function view(): View
	{
		$reporte = Reportegeneral::where('avance_id','1')->first();
		$negocio_id = $reporte->negocio_id;
		$usuarios = User::where('negocio_id',$negocio_id)->get();
		return view('exportexcel.negocios', ['reporte' => $reporte,'usuarios'=> $usuarios]);
	}
}
