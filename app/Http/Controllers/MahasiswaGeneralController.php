<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Nilai;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Logical\Boolean;
use RealRashid\SweetAlert\Facades\Alert;

class MahasiswaGeneralController extends Controller
{
    //
    function cetakSkbs()
    {
        // die('masuk');
        $user_id = auth()->user()->id;
        $no_ukg = auth()->user()->no_ukg;
        $periode_id = auth()->user()->periode_id;

        $matakuliah = Matakuliah::wherePeriodeId($periode_id)->get();
        $nilai = Nilai::whereNoUkg($no_ukg)->get();

        // dd($nilai);

        if (count($matakuliah) == count($nilai)) {
            // die('pertama');

            if (count($nilai) > 0) {
                // die('kedua');
                $cek = $this->checkLulus($nilai);

                if ($cek == false) {
                    // die('ketiga');
                    // die($cek);
                    $data['mahasiswa'] = Mahasiswa::with('periode')->whereUserId($user_id)->first();
                    $data['matakuliah'] = Matakuliah::wherePeriodeId($periode_id)->get();
                    return view('admin.mahasiswa.cetak_skbs', $data);
                } else {
                    Alert::info('Info', 'Masih ada matakuliah yang belum dilulusi');
                    return redirect('/account/dashboard');
                }
            } else {
                Alert::info('Info', 'Masih ada matakuliah yang belum dilulusi');
                return redirect('/account/dashboard');
            }
        } else {
            Alert::info('Info', 'Masih ada matakuliah yang belum diinput');
            return redirect('/account/dashboard');
        }
    }

    private function checkLulus($nilai)
    {

        foreach ($nilai as $item) {
            if ($item->nilai_index != null && $item->nilai_index != 'K' && $item->nilai_index != 'E') {
                return true;
            } else {
                return false;
            }
        }
    }
}
