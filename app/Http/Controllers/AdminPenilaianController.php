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
        $user_id = Auth::user()->id;
        $periode_id = Auth::user()->periode_id;
        if ($periode_id == null) {
            Session::get('periode_id');
        }
        $adminKelas = Adminkelasrole::with('kelas')->whereUserId($user_id)->get();
        $data = [
            'title'   => 'Penilaian',
            'adminKelas' => $adminKelas,
            'content' => 'admin/penilaian/kelas'
        ];

        return view('admin/layouts/wrapper', $data);
    }
    function mahasiswa($matakuliah_id)
    {
        $kelas_id = request('kelas_id');

        $role = Auth::user()->role;
        $periode_id = '';
        if ($role == 'superadmin') {
            $periode_id = Session::get('periode_id');
        } else {
            $periode_id = Auth::user()->periode_id;
        }
        // $mahasiswa = Mahasiswa::wherePeriodeId($periode_id)->whereStatus('VALID')->paginate(10);
        $kelas_peserta = KelasPeserta::whereKelasId($kelas_id)->get();
        // dd($kelas_peserta);
        foreach ($kelas_peserta as $item) {
            $cek = Nilai::whereNoUkg($item->no_ukg)->whereMatakuliahId($matakuliah_id)->whereKelasId($kelas_id)->first();
            // print_r($cek);
            if ($cek == null) {
                $data = [
                    'kelas_id'         => $kelas_id,
                    'no_ukg'           => $item->no_ukg,
                    'matakuliah_id'    => $matakuliah_id,
                ];
                Nilai::create($data);
            }
        }

        $nilai = Nilai::with('mahasiswa')->whereKelasId($kelas_id)->whereMatakuliahId($matakuliah_id)->get();
        // dd($nilai);
        $data = [
            'title'   => 'Penilaian',
            // 'matakuliah' => Matakuliah::wherePeriodeId($periode_id)->get(),
            'matakuliah_id' => $matakuliah_id,
            'kelas_id' => $kelas_id,
            'nilai'     => $nilai,
            'content' => 'admin/penilaian/mahasiswa'
        ];

        return view('admin/layouts/wrapper', $data);
    }

    function sinkronkan($matakuliah_id)
    {
        $periode_id = auth()->user()->periode_id;
        $kelas_id = request('kelas_id');

        $matakuliah = Matakuliah::wherePeriodeId($periode_id)->get();
        $nilaiPerKelas = Nilai::whereKelasId($kelas_id)->get();

        // dd($matakuliah);
        foreach ($nilaiPerKelas as $item) {
            $nilai = Nilai::whereNoUkg($item->no_ukg)->get();
            $mahasiswa = Mahasiswa::whereNoUkg($item->no_ukg)->first();

            if (count($matakuliah) == count($nilai)) {
                // die('masuk if');
                if (count($nilai) > 0) {
                    $cek = $this->checkLulus($nilai);

                    if ($cek) {
                        $mahasiswa->keaktifan  = 'LULUS';
                        $mahasiswa->save();
                    }
                }
            }
        }

        return redirect('/account/penilaian/matakuliah/mahasiswa/' . $matakuliah_id . '?kelas_id=' . $kelas_id);
    }

    private function checkLulus($nilai)
    {

        $jumlah = count($nilai);
        $berhasil = 0;
        $gagal = 0;

        foreach ($nilai as $item) {
            if ($item->nilai_index != null && $item->nilai_index != 'K' && $item->nilai_index != 'E') {
                $berhasil = $berhasil + 1;
            } else {
                $gagal = $gagal + 1;
            }
        }

        if ($berhasil == $jumlah) {
            return true;
        } else {
            return false;
        }
    }

    function matakuliah($kelas_id)
    {
        $role = Auth::user()->role;
        $periode_id = '';
        if ($role == 'superadmin') {
            $periode_id = Session::get('periode_id');
        } else {
            $periode_id = Auth::user()->periode_id;
        }
        $data = [
            'title'   => 'Penilaian',
            'kelas_id'  => $kelas_id,
            'matakuliah' => Matakuliah::wherePeriodeId($periode_id)->get(),
            'content' => 'admin/penilaian/matakuliah'
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
            'matakuliah' => $matakuliah,
            'nilai'    => Nilai::with(['mahasiswa', 'matakuliah'])->whereNoUkg($mahasiswa->no_ukg)->get(),
            'content' => 'admin/penilaian/show'
        ];

        return view('admin/layouts/wrapper', $data);
    }

    function updateNilai()
    {
        $id = request('id');
        $nilai = Nilai::find($id);
        $nilai_acuan = request('nilai_acuan');
        $nilai_index = 'K';

        if ($nilai_acuan <= 100 && $nilai_acuan >= 91) {
            $nilai_index = 'A';
        } else if ($nilai_acuan <= 90 && $nilai_acuan >= 86) {
            $nilai_index = 'A-';
        } else if ($nilai_acuan <= 85 && $nilai_acuan >= 81) {
            $nilai_index = 'B+';
        } else if ($nilai_acuan <= 80 && $nilai_acuan >= 76) {
            $nilai_index = 'B';
        } else if ($nilai_acuan <= 75 && $nilai_acuan >= 71) {
            $nilai_index = 'B-';
        } else if ($nilai_acuan <= 70 && $nilai_acuan >= 66) {
            $nilai_index = 'C+';
        } else if ($nilai_acuan <= 65 && $nilai_acuan >= 61) {
            $nilai_index = 'C';
        } else if ($nilai_acuan <= 60 && $nilai_acuan >= 56) {
            $nilai_index = 'C-';
        } else if ($nilai_acuan <= 55 && $nilai_acuan >= 46) {
            $nilai_index = 'D';
        } else if ($nilai_acuan <= 45 && $nilai_acuan >= 0) {
            $nilai_index = 'E';
        } else {
            $nilai_index = 'K';
        }

        switch ($nilai_index) {
            case  'A':
                $nilai_mutu = 4.0;
                break;
            case 'A-':
                $nilai_mutu = 3.75;
                break;
            case 'B+':
                $nilai_mutu = 3.25;
                break;
            case 'B':
                $nilai_mutu = 3.0;
                break;
            case 'B-':
                $nilai_mutu = 2.75;
                break;
            case 'C+':
                $nilai_mutu = 2.25;
            case 'C':
                $nilai_mutu = 2;
                break;
            case 'C-':
                $nilai_mutu = 1.75;
                break;
            case 'D':
                $nilai_mutu = 1;
                break;
            case 'E':
                $nilai_mutu = 0;
                break;
            case '':
                $nilai_mutu = 0;
                break;
            default:
                $nilai_mutu = 0;
                break;
        }

        $nilai->nilai_acuan = $nilai_acuan;
        $nilai->nilai_index = $nilai_index;
        $nilai->nilai_mutu = $nilai_mutu;
        // $nilai->angka = $angka;
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
