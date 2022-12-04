<?php

namespace App\Imports;

use App\Models\Serdik;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class SerdikImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Serdik([
            'periode_id'    => Session::get('periode_id'),
            'no_ukg'          => $row[0],
            'nomor_seri'          => $row[0]
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
