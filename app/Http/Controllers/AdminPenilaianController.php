<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPenilaianController extends Controller
{
    //
    function index()
    {
        $role = Auth::user()->role;
        $periode_id = '';
        if ($role == 'superadmin') {
            $periode_id = Session::get('periode_id');
        } else {
            $periode_id = Auth::user()->periode_id;
        }
        $mahasiswa = Mahasiswa::wherePeriodeId($periode_id)->whereStatus('VALID')->paginate(10);
        $data = [
            'title'   => 'Penilaian',
            'mahasiswa' => $mahasiswa,
            'content' => 'admin/penilaian/index'
        ];

        return view('admin/layouts/wrapper', $data);
    }

    function show($id)
    {
        $mahasiswa = Mahasiswa::find($id);

        $matakuliah = Matakuliah::wherePeriodeId($mahasiswa->periode_id)->get();

        // dd($mahasiswa);
        foreach ($matakuliah as $item) {
            $cek = Nilai::wherePeriodeId($mahasiswa->periode_id)->whereUserId($mahasiswa->user_id)->whereMatakuliahId($item->id)->first();

            if ($cek == false) {
                $data = [
                    'periode_id'    => $mahasiswa->periode_id,
                    'user_id'    => $mahasiswa->user_id,
                    'mahasiswa_id'    => $id,
                    'bidang_studi_id' => $mahasiswa->bidang_studi_id,
                    'matakuliah_id'    => $item->id,
                ];
                Nilai::create($data);
            }
        }


        $data = [
            'title'   => 'Penilaian',
            'nilai'    => Nilai::with(['mahasiswa', 'matakuliah'])->whereUserId($mahasiswa->user_id)->get(),
            'content' => 'admin/penilaian/show'
        ];

        return view('admin/layouts/wrapper', $data);
    }

    function updateNilai()
    {
        $id = request('id');
        $nilai = Nilai::find($id);
        $nilai->nilai = request('nilai');
        $nilai->save();

        return response()->json([
            'Status'   => 'Sukses'
        ]);
    }
}
