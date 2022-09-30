<?php

namespace App\Exports;

use App\Models\Nilai;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMapping;

class NilaiExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $periode_id;

    function __construct($periode_id)
    {
        $this->periode_id = $periode_id;
    }


    function view(): View
    {
        $data['nilai'] = Nilai::wherePeriodeId($this->periode_id)->get();
        return view('admin.kelas.export_nilai', $data);
    }
}
