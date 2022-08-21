<?php

namespace App\Exports;

use App\Models\Pamong;
use Maatwebsite\Excel\Concerns\FromCollection;

class PamongExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pamong::all();
    }
}
