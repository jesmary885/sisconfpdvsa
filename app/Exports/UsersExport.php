<?php

namespace App\Exports;

use App\Models\Asignacion;
use App\Models\Reportegeneral;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;


class UsersExport implements FromView
{
    public function view(): View
	{
		$reporte = Reportegeneral::where('avance_id','1')->first();
		$usuario_id = $reporte->usuario_id;
        $anoreporte_id = $reporte->anoreporte_id;

        $asignacions = Asignacion::where('user_id',$usuario_id)
                    ->where('anoreporte_id',$anoreporte_id)->get();

		return view('exportexcel.users', ['reporte' => $reporte,'asignacions'=> $asignacions]);
	}
}


