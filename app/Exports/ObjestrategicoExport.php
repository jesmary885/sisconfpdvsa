<?php

namespace App\Exports;

use App\Models\Objestrategico;
use Maatwebsite\Excel\Concerns\FromCollection;

class ObjestrategicoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Objestrategico::all();
    }
}
