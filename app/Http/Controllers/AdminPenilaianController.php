<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Nilai;
use Ramsey\Uuid\Uuid;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Imports\NilaiImport;
use App\Models\KelasPeserta;
use Illuminate\Http\Request;
use App\Models\Adminkelasrole;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class AdminPenilaianController extends Controller
{
    //

    function kelas()
    {
        $adminKelas = Adminkelasrole::with('kelas')->get();
        $data = [
            'title'   => 'Penilaian',
            'adminKelas' => $adminKelas,
            'content' => 'admin/penilaian/kelas'
        ];

        return view('admin/layouts/wrapper', $data);
    }
    function mahasiswa($kelas_id)
    {
        $role = Auth::user()->role;
        $periode_id = '';
        if ($role == 'superadmin') {
            $periode_id = Session::get('periode_id');
        } else {
            $periode_id = Auth::user()->periode_id;
        }
        // $mahasiswa = Mahasiswa::wherePeriodeId($periode_id)->whereStatus('VALID')->paginate(10);
        $kelas_peserta = KelasPeserta::with('mahasiswa')->whereKelasId($kelas_id)->get();
        $data = [
            'title'   => 'Penilaian',
            'kelas_peserta' => $kelas_peserta,
            'matakuliah' => Matakuliah::wherePeriodeId($periode_id)->get(),
            'content' => 'admin/penilaian/index'
        ];

        return view('admin/layouts/wrapper', $data);
    }

    function show($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        // dd($mahasiswa);
        // print_r($mahasiswa->user_id);
        // die;

        $matakuliah = Matakuliah::wherePeriodeId($mahasiswa->periode_id)->get();

        // dd($mahasiswa);
        foreach ($matakuliah as $item) {
            $cek = Nilai::whereNoUkg($mahasiswa->no_ukg)->whereMatakuliahId($item->id)->first();

            if ($cek == false) {
                $data = [
                    'no_ukg'           => $mahasiswa->no_ukg,
                    'matakuliah_id'    => $item->id,
                ];
                Nilai::create($data);
            }
        }


        $data = [
            'title'   => 'Penilaian',
            'nilai'    => Nilai::with(['mahasiswa', 'matakuliah'])->whereNoUkg($mahasiswa->no_ukg)->get(),
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

    function updateStatusMahasiswa()
    {
        $id = request('id');
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->keaktifan = request('keaktifan');
        $mahasiswa->save();

        return response()->json([
            'Status'   => 'Sukses'
        ]);
    }

    function importNilai(Request $request)
    {


        // try {
        $file = $request->file('file');
        $uuid1 = Uuid::uuid4()->toString();
        $uuid2 = Uuid::uuid4()->toString();
        $file_name = $uuid1 . $uuid2 . '.' . $file->getClientOriginalExtension();

        // $file_name = time() . "_" . $file->getClientOriginalName();

        $storage = 'uploads/excel/';
        $file->move($storage, $file_name);
        // $data['file'] = $storage . $file_name;

        Excel::import(new NilaiImport, public_path('/uploads/excel/') . $file_name);

        Alert::success('Sukses', 'Data telah di import');
        return redirect('/account/penilaian/kelas');
        // } catch (\Throwable $th) {
        //     Alert::error('Error', 'Tidak sesuai format, atau data sudah ada');
        //     return redirect('/account/penilaian/kelas');
        // }
    }

    function downloadFormat()
    {
        // return Storage::download('/public/docs/format-excel.xlsx');
        return response()->download('dokumen/format-nilai.xlsx');
    }
}
