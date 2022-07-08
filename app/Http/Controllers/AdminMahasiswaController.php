<?php

namespace App\Http\Controllers;

use Ramsey\Uuid\Uuid;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Imports\MahasiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class AdminMahasiswaController extends Controller
{
    //
    function index()
    {
        $periode_id = Session::get('periode_id');
        $cari = request('cari');
        $kementerian = request('kementerian');

        if ($cari) {
            $mahasiswa = Mahasiswa::where('name', 'like', '%' . $cari . '%')->whereIsRegistered(1)->wherePeriodeId($periode_id)->whereKementerian($kementerian)->latest()->paginate(10);
        } else {
            $mahasiswa = Mahasiswa::whereIsRegistered(1)->wherePeriodeId($periode_id)->whereKementerian($kementerian)->latest()->paginate(10);
        }


        $data = [
            'title'   => 'Mahasiswa',
            'mahasiswa' => $mahasiswa,
            'content' => 'admin/mahasiswa/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }


    function import(Request $request)
    {
        $file = $request->file('file');
        $uuid1 = Uuid::uuid4()->toString();
        $uuid2 = Uuid::uuid4()->toString();
        $file_name = $uuid1 . $uuid2 . '.' . $file->getClientOriginalExtension();

        // $file_name = time() . "_" . $file->getClientOriginalName();

        $storage = 'uploads/excel/';
        $file->move($storage, $file_name);
        // $data['file'] = $storage . $file_name;

        Excel::import(new MahasiswaImport, public_path('/uploads/excel/') . $file_name);
        redirect('/account/mahasiswa');
    }
}
