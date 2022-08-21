<?php

namespace App\Http\Controllers;

use App\Models\Regency;
use App\Models\Province;
use App\Models\Mahasiswa;
use App\Models\Periode;
use App\Models\Ppi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MahasiswaPpiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_id = auth()->user()->id;
        $no_ukg = auth()->user()->no_ukg;
        $periode_id = auth()->user()->periode_id;

        $periode = Periode::find($periode_id);

        if ($periode->ppi_status == 'NONAKTIF') {
            Alert::info('PPI', 'Belum dibuka');
            return redirect('/account/dashboard');
        } else {

            $mahasiswa = Mahasiswa::with('bidang_studi')->whereUserId($user_id)->first();

            $cek_ppi = Ppi::whereMahasiswaId($mahasiswa->id)->wherePeriodeId($periode_id)->first();
            if ($cek_ppi == null) {

                $periode = Periode::with('jenisPpg')->find($periode_id);

                $data_ppi = [
                    'nomor_surat'   => mt_rand($periode->nomor_surat_first, $periode->nomor_surat_last),
                    'user_id'    => $user_id,
                    'periode_id'    => $periode_id,
                    'mahasiswa_id'  => $mahasiswa->id,
                    // 'mahasiswa'     => $mahasiswa,
                    'perihal'       => 'Pelaksanaan PPI Mahasiswa ' . $periode->jenisPpg->name . ' ' . $periode->name . ' Tahun ' . $periode->tahun
                ];
                Ppi::create($data_ppi);
            }

            $ppi = Ppi::with(['mahasiswa', 'kabupaten'])->wherePeriodeId($periode_id)->whereUserId($user_id)->first();
            $data = [
                'title'   => 'Data PPI',
                'mahasiswa' => $mahasiswa,
                'ppi'       => $ppi,
                'provinces' => Province::all(),
                'content' => 'admin/ppi/index'
            ];
            return view('admin/layouts/wrapper', $data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $user_id = auth()->user()->id;
        $periode_id = auth()->user()->periode_id;

        $ppi = Ppi::whereUserId($user_id)->wherePeriodeId($periode_id)->first();

        $data = [
            'namalengkap'    => $request->namalengkap,
            'sekolah_lokasi'    => $request->sekolah_lokasi,
            'alamat'    => $request->alamat,
            'kabupaten_name'    => $request->kabupaten_name,
            // 'province_id'       => $request->province_id,
            // 'kabupaten_id'       => $request->kabupaten_id,
        ];
        $ppi->update($data);
        return redirect('/account/ppi');
    }
    function cetakSurat()
    {
        $user_id = auth()->user()->id;
        $periode_id = auth()->user()->periode_id;

        $periode = Periode::find($periode_id);

        // dd($periode);

        if ($periode->ppi_status == 'NONAKTIF') {
            Alert::info('PPI', 'Belum dibuka');
            return redirect('/account/dashboard');
        } else {

            $ppi = Ppi::with(['mahasiswa', 'periode'])->wherePeriodeId($periode_id)->whereUserId($user_id)->first();
            if ($ppi->kabupaten_name != null && $ppi->sekolah_lokasi != null && $ppi->namalengkap != null && $ppi->alamat != null) {
                $data['ppi'] = $ppi;
                return view('admin.ppi.cetak_surat', $data);
            } else {
                Alert::warning('Gagal Cetak', 'Data PPI anda belum lengkap');
                return redirect('/account/ppi');
            }
        }
    }
}
