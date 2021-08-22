<?php

namespace App\Exports;

use App\Models\Objtactico;
use Maatwebsite\Excel\Concerns\FromCollection;

class ObjtacticoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Objtactico::all();
    }
}
