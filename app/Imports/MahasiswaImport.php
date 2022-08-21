<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class MahasiswaImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function model(array $row)
    {
        return new Mahasiswa([
            //
            'periode_id' => Session::get('periode_id'),
            'no_ukg'  => $row[0],
            'npm'     => $row[1],
            'namalengkap'     => $row[2],
            'kementerian'     => $row[3],
            'status'            => 'LENGKAPI'

        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
