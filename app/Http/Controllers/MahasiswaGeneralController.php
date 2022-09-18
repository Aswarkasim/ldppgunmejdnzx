<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpSpreadsheet\Calculation\Logical\Boolean;
use RealRashid\SweetAlert\Facades\Alert;

class MahasiswaGeneralController extends Controller
{
    //
    function cetakSkbs()
    {
        // die('masuk');
        $no_ukg = auth()->user()->no_ukg;
        $periode_id = auth()->user()->periode_id;
        $mahasiswa = Mahasiswa::whereNoUkg($no_ukg)->first();

        $matakuliah = Matakuliah::wherePeriodeId($periode_id)->get();
        // dd($matakuliah);
        // cek kelulusan
        if ($mahasiswa->keaktifan == 'LULUS') {
            // die('ketiga');
            // die($cek);
            $data['mahasiswa'] = $mahasiswa;
            $data['matakuliah'] = $matakuliah;
            return view('admin.mahasiswa.cetak_skbs', $data);
        } else {
            Alert::info('Info', 'Masih ada matakuliah yang belum dilulusi');
            return redirect('/account/dashboard');
        }
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
}
