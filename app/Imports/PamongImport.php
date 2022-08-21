<?php

namespace App\Imports;

use App\Models\Pamong;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PamongImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Pamong([
            //
            'nuptk'               => $row[0],
            'nomor_serdik'      => $row[1],
            'namalengkap'       => $row[2],
            'npwp'              => $row[3],
            'pangkat_golongan'  => $row[4],
            'nama_sekolah'      => $row[5],
            'alamat_rumah'      => $row[6],
            'nohp'              => $row[7],
            'nomor_rekening'    => $row[8],
            'nama_bank'         => $row[9],
            'nama_pemilik'      => $row[10],

        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
