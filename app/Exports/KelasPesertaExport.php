<?php

namespace App\Exports;

use App\Models\KelasPeserta;
use Maatwebsite\Excel\Concerns\FromCollection;

class KelasPesertaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return KelasPeserta::all();
    }
}
