<?php

namespace App\Imports;

use App\Models\Kelas;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class KelasImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Kelas([
            //
            'periode_id'    => Session::get('periode_id'),
            'name'          => $row[0]
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
