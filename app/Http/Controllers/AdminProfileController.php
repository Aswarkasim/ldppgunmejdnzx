<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Periode;
use App\Models\Regency;
use App\Models\Province;
use App\Models\Mahasiswa;
use App\Models\BidangStudi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminProfileController extends Controller
{
    //
    public function index()
    {
        //
        $no_ukg = auth()->user()->no_ukg;
        $cek = Mahasiswa::whereNoUkg($no_ukg)->first();
        if ($cek == false) {
            $data = [
                'no_ukg' => $no_ukg
            ];
            Mahasiswa::create($data);
        }
        $profile = Mahasiswa::whereNoUkg($no_ukg)->first();
        $data = [
            'title'   => 'Data Diri',
            'profile' => $profile,
            'bidangstudi' => BidangStudi::all(),
            'peridode' => Periode::all(),
            'provinces' => Province::get(),
            'content' => 'admin/profile/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    function updateDataDiri(Request $request)
    {

        $request->validate([
            // 'no_ukg'    => 'required',
            'nuptk'    => 'required',
            'angkatan_id'    => 'required',
            'bidang_studi_id'    => 'required',
            'namalengkap'    => 'required',
            'tanggal_lahir'    => 'required',
            'tempat_lahir'    => 'required',
            'nik'    => 'required',
            'alamat_domisili'    => 'required'
        ]);
        $user_id = auth()->user()->id;
        $profile = Mahasiswa::whereUserId($user_id)->first();
        // $profile->no_ukg = $request->no_ukg;
        $profile->nuptk = $request->nuptk;
        $profile->angkatan_id = $request->angkatan_id;
        $profile->bidang_studi_id = $request->bidang_studi_id;
        $profile->namalengkap = $request->namalengkap;
        $profile->tanggal_lahir = $request->tanggal_lahir;
        $profile->tempat_lahir = $request->tempat_lahir;
        $profile->jenis_kelamin = $request->jenis_kelamin;
        $profile->nik = $request->nik;
        $profile->alamat_domisili = $request->alamat_domisili;
        $profile->rt = $request->rt;
        $profile->rw = $request->rw;
        $profile->kelurahan_tempat_tinggal = $request->kelurahan_tempat_tinggal;
        $profile->kecamatan_tempat_tinggal = $request->kecamatan_tempat_tinggal;

        $profile->save();
        Alert::success('Sukses', 'Data Anda Disimpan');
        return redirect('/account/profile?page=data_diri');
    }

    function updateInstansi(Request $request)
    {
        $request->validate([

            'nama_instansi'    => 'required',
            'npsn_sekolah'    => 'required',
            'jenjang_pendidikan'    => 'required',
            'alamat_instansi'    => 'required',
        ]);
        $user_id = auth()->user()->id;
        $profile = Mahasiswa::whereUserId($user_id)->first();
        $profile->nama_instansi = $request->nama_instansi;
        $profile->npsn_sekolah = $request->npsn_sekolah;
        $profile->jenjang_pendidikan = $request->jenjang_pendidikan;
        $profile->alamat_instansi = $request->alamat_instansi;

        $profile->update();
        Alert::success('Sukses', 'Data Anda Disimpan');
        return redirect('/account/profile?page=instansi');
    }

    function updatePendidikan(Request $request)
    {
        $user_id = auth()->user()->id;
        $profile = Mahasiswa::whereUserId($user_id)->first();

        $profile->perguruan_tinggi_s1 = $request->perguruan_tinggi_s1;
        $profile->nama_prodi_s1 = $request->nama_prodi_s1;
        $profile->nomor_ijazah_s1 = $request->nomor_ijazah_s1;
        $profile->ipk_s1 = $request->ipk_s1;
        $profile->tanggal_kelulusan_s1 = $request->tanggal_kelulusan_s1;
        $profile->alamat_pt_s1 = $request->alamat_pt_s1;
        $profile->kabupaten_kota_pt_s1 = $request->kabupaten_kota_pt_s1;
        $profile->provinsi_pt_s1 = $request->provinsi_pt_s1;
        $profile->unggah_ijazah_s1 = $request->unggah_ijazah_s1;
        $profile->unggah_transkrip_s1 = $request->unggah_transkrip_s1;
        $profile->perguruan_tinggi_s2 = $request->perguruan_tinggi_s2;
        $profile->nama_prodi_s2 = $request->nama_prodi_s2;
        $profile->nomor_ijazah_s2 = $request->nomor_ijazah_s2;
        $profile->ipk_s2 = $request->ipk_s2;
        $profile->tanggal_kelulusan_s2 = $request->tanggal_kelulusan_s2;
        $profile->alamat_pt_s2 = $request->alamat_pt_s2;
        $profile->kabupaten_kota_pt_s2 = $request->kabupaten_kota_pt_s2;
        $profile->provinsi_pt_s2 = $request->provinsi_pt_s2;
        $profile->unggah_ijazah_s2 = $request->unggah_ijazah_s2;
        $profile->unggah_transkrip_s2 = $request->unggah_transkrip_s2;

        $profile->update();
        Alert::success('Sukses', 'Data Anda Disimpan');
        return redirect('/account/profile?page=pendidikan');
    }

    function updateKeluarga(Request $request)
    {
        $user_id = auth()->user()->id;
        $profile = Mahasiswa::whereNoUkg($user_id)->first();
        // dd($profile);


        $profile->nama_pasangan = $request->nama_pasangan;
        $profile->pendidikan_pasangan = $request->pendidikan_pasangan;
        $profile->pekerjaan_pasangan = $request->pekerjaan_pasangan;
        $profile->jumlah_anak = $request->jumlah_anak;


        $profile->nama_ayah_kandung = $request->nama_ayah_kandung;
        $profile->pendidikan_ayah_kandung = $request->pendidikan_ayah_kandung;
        $profile->penghasilan_ayah_kandung = $request->penghasilan_ayah_kandung;
        $profile->nik_ayah_kandung = $request->nik_ayah_kandung;

        $profile->nama_ibu_kandung = $request->nama_ibu_kandung;
        $profile->pendidikan_ibu_kandung = $request->pendidikan_ibu_kandung;
        $profile->penghasilan_ibu_kandung = $request->penghasilan_ibu_kandung;
        $profile->nik_ibu_kandung = $request->nik_ibu_kandung;


        $profile->nohp_keluarga_dekat = $request->nohp_keluarga_dekat;
        $profile->alamat_orangtua = $request->alamat_orangtua;
        $profile->kabupaten_orangtua = $request->kabupaten_orangtua;
        $profile->provinsi_orangtua = $request->provinsi_orangtua;

        $profile->update();
        Alert::success('Sukses', 'Data Anda Disimpan');
        return redirect('/account/profile?page=keluarga');
    }

    function getCity($provinsi_id)
    {
        if (!$provinsi_id) return response()->json('NOT OK');

        $city = Regency::where('province_id', $provinsi_id)->get();

        if ($city == false) return response()->json('NOT OK');

        $cities = "";

        foreach ($city as $key) {
            $cities .= "<option value='" . $key->id . "'>$key->name</option>";
        }

        return response()->json($cities);
    }
}
