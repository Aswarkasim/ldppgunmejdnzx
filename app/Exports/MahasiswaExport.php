<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

// class MahasiswaExport implements FromCollection, WithHeadings
class MahasiswaExport implements FromView
// class MahasiswaExport implements WithHeadings, FromQuery
// class MahasiswaExport implements WithHeadings, FromQuery, FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    // public function collection()
    // {
    //     return Mahasiswa::whereIsRegistered(1)->get();
    // }

    protected $filter;
    protected $periode_id;

    function __construct($filter, $periode_id)
    {
        $this->filter = $filter;
        $this->periode_id = $periode_id;
    }


    public function view(): View
    {
        // $kemeterian = request('kemeterian');
        // die($this->filter);

        if ($this->filter != null) {
            $mahasiswa = Mahasiswa::whereIsRegistered(1)->whereKeaktifan($this->filter)->wherePeriodeId($this->periode_id)->get();
        } else {
            $mahasiswa = Mahasiswa::whereIsRegistered(1)->wherePeriodeId($this->periode_id)->get();
        }
        $data['mahasiswa'] = $mahasiswa;
        return view('admin.mahasiswa.export', $data);
    }
}
