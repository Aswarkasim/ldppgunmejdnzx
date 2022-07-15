<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    // public function collection()
    // {
    //     return User::whereRole('mahasiswa')->get();
    // }


    public function view(): View
    {
        $data['user'] = User::whereRole('mahasiswa')->get();
        return view('admin.user.export', $data);
    }
}
