<?php

namespace App\Imports;

use App\Models\Nilai;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\ToModel;

class NilaiImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $nilai = Nilai::whereNoUkg($row[0])->whereMatakuliahId($row[2])->first();
        //ceck nilai if exist, then upadate, else create new
        if ($nilai) {
            $nilai->nilai = $row[3];
            $nilai->save();
        } else {
            return new Nilai([
                //
                // 'periode_id'    => Session::get('periode_id'),
                'no_ukg'    => $row[0],
                'matakuliah_id' => $row[2],
                'nilai'         => $row[3]
            ]);
        }
    }
}
