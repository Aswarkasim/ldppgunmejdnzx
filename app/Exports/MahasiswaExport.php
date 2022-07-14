<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;

// class MahasiswaExport implements FromCollection, WithHeadings
class MahasiswaExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    // public function collection()
    // {
    //     return Mahasiswa::whereIsRegistered(1)->get();
    // }



    public function view(): View
    {
        $kemeterian = request('kemeterian');
        $data['mahasiswa'] = Mahasiswa::whereIsRegistered(1)->get();
        return view('admin.mahasiswa.export', $data);
    }
}
