<?php

namespace App\Imports;

use App\Models\KelasPeserta;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\ToModel;

class KelasPesertaImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function __construct($kelas_id)
    {
        $this->kelas_id = $kelas_id;
    }
    public function model(array $row)
    {
        return new KelasPeserta([
            //
            'periode_id'    => Session::get('periode_id'),
            'kelas_id'      => $this->kelas_id,
            'no_ukg'          => $row[0]
        ]);
    }
}
