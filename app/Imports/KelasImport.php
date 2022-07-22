<?php

namespace App\Imports;

use App\Models\kelas;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\ToModel;

class KelasImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new kelas([
            //
            'periode_id'    => Session::get('periode_id'),
            'name'          => $row[0]
        ]);
    }
}
