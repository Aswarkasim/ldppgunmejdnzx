<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Nilai;
use App\Models\Ppi;
use App\Models\ValidProfileMahasiswa;
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
        // $dataValid = ValidProfileMahasiswa::whereNoUkg($no_ukg)->wherePeriodeId($periode_id)->first();
        // dd($matakuliah);
        // cek kelulusan
        $user_id = auth()->user()->id;
        $periode_id = auth()->user()->periode_id;
        $ppi = Ppi::with(['mahasiswa', 'periode'])->wherePeriodeId($periode_id)->whereUserId($user_id)->first();
        // dd($ppi);
        if ($mahasiswa->keaktifan == 'LULUS') {
            // die('ketiga');
            // die($cek);
            if ($ppi->bukti_selesai != null) {

                $data['mahasiswa'] = $mahasiswa;
                $data['matakuliah'] = $matakuliah;
                return view('admin.mahasiswa.cetak_skbs', $data);
            } else {
                Alert::warning('Peringatan', 'Anda belum mengupload bukti selesai PPI');
                return redirect('/account/dashboard');
            }
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
