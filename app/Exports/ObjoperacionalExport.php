<?php

namespace App\Exports;

use App\Models\Objoperacional;
use Maatwebsite\Excel\Concerns\FromCollection;

class ObjoperacionalExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Objoperacional::all();
    }
}
