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



    public function view(): View
    {
        // $kemeterian = request('kemeterian');
        $data['mahasiswa'] = Mahasiswa::whereIsRegistered(1)->get();
        return view('admin.mahasiswa.export', $data);
    }

    //construct
    // public function __construct()
    // {
    //     $this->mahasiswa = Mahasiswa::whereIsRegistered(1)->get();
    // }
    // public function collection()
    // {
    //     return $this->mahasiswa;
    // }


    // public function map($row): array
    // {
    //     return [
    //         $row->npm,
    //         $row->namalengkap,
    //         $row->bidang_studi->name,
    //         $row->provinceBydomisili->name,
    //         $row->status,
    //         $row->created_at,
    //         $row->updated_at,
    //     ];
    // }

    // function headings(): array
    // {
    //     return [
    //         'NIM',
    //         'Nama',
    //         'Bidang Studi',
    //         'Provinsi',
    //         'Status',
    //         'Dibuat',
    //         'Diubah',
    //     ];
    // }

    // public function query()
    // {
    //     return Mahasiswa::whereIsRegistered(1);
    // }
}
