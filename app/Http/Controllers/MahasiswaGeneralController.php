<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Nilai;
use App\Models\Periode;
use App\Models\Ppi;
use App\Models\Serdik;
use App\Models\Surat;
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
            $periode = Periode::find($periode_id);

            if ($periode->jenis_ppg_id != 6) {
                if ($ppi->bukti_selesai != null) {

                    $data['mahasiswa'] = $mahasiswa;
                    $data['matakuliah'] = $matakuliah;
                    $data['surat'] = Surat::wherePeriodeId($periode_id)->whereName('SKBS')->first();
                    // $data['periode'] = $periode;
                    return view('admin.mahasiswa.cetak_skbs', $data);
                } else {
                    Alert::warning('Peringatan', 'Anda belum mengupload bukti selesai PPI');
                    return redirect('/account/dashboard');
                }
            } else {
                $data['mahasiswa'] = $mahasiswa;
                $data['matakuliah'] = $matakuliah;
                $data['surat'] = Surat::wherePeriodeId($periode_id)->whereName('SKBS')->first();
                // $data['periode'] = $periode;
                return view('admin.mahasiswa.cetak_skbs', $data);
            }
        } else {
            Alert::info('Info', 'Masih ada matakuliah yang belum dilulusi');
            return redirect('/account/dashboard');
        }
    }


    function cetakSerdik()
    {
        // die('aa');
        $no_ukg = auth()->user()->no_ukg;
        $mahasiswa = Mahasiswa::whereNoUkg($no_ukg)->first();
        // dd($mahasiswa);
        $serdik = Serdik::whereNoUkg($no_ukg)->first();

        if ($mahasiswa->keaktifan == 'LULUS') {
            return response()->download('uploads/serdik/' . $serdik->nomor_seri . '.pdf');
        } else {
            Alert::info('Info', 'Anda belum dinyatakan lulus');
            return redirect('/account/dashboard');
        }
    }
}
