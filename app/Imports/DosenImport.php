<?php

namespace App\Imports;

use App\Models\Dosen;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class DosenImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Dosen([
            //
            'nuptk'             => $row[0],
            'nomor_serdos'      => $row[1],
            'namalengkap'       => $row[2],
            'npwp'              => $row[3],
            'pangkat_golongan'  => $row[4],
            'alamat_rumah'      => $row[5],
            'nohp'              => $row[6],
            'nomor_rekening'    => $row[7],
            'nama_bank'         => $row[8],
            'nama_pemilik'      => $row[9],

        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
