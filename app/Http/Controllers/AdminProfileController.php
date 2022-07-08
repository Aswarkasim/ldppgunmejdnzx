<?php

namespace App\Http\Controllers;

use App\Models\User;
use Ramsey\Uuid\Uuid;
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
        $user_id  = auth()->user()->id;
        $cek = Mahasiswa::whereNoUkg($no_ukg)->whereUserId($user_id)->first();
        if ($cek == false) {
            $data = [
                'user_id' => $user_id,
                'no_ukg' => $no_ukg
            ];
            Mahasiswa::create($data);
        }
        $profile = Mahasiswa::with(['periode'])->whereUserId($user_id)->whereNoUkg($no_ukg)->first();
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

        $user_id = auth()->user()->id;
        $profile = Mahasiswa::whereUserId($user_id)->first();

        // dd($profile);
        // dd($request->all());
        $data = $request->validate([
            // 'no_ukg'    => 'required',
            'nuptk'             => 'required',
            // 'angkatan_id'       => 'required',
            'kementrian'   => 'required',
            'bidang_studi_id'   => 'required',
            'namalengkap'       => 'required',
            'tanggal_lahir'     => 'required',
            'tempat_lahir'      => 'required',
            'golongan_darah'    => 'required',
            'nik'               => 'required',
            'jenis_kelamin'                 => 'required',
            'nik'                           => 'required',
            'alamat_domisili'               => 'required',
            'provinsi_tempat_tinggal'       => 'required',
            'kabupaten_tempat_tinggal'      => 'required',
            // $profile->nuptk = $request->nuptk;
        ]);
        $data['kecamatan']     = $request->rt;
        $data['kelurahan']     = $request->rt;
        $data['rt']     = $request->rt;
        $data['rw']     = $request->rw;

        // $profile->no_ukg = $request->no_ukg;
        // $profile->angkatan_id = $request->angkatan_id;
        // $profile->bidang_studi_id = $request->bidang_studi_id;
        // $profile->namalengkap = $request->namalengkap;
        // $profile->tanggal_lahir = $request->tanggal_lahir;
        // $profile->tempat_lahir = $request->tempat_lahir;
        // $profile->jenis_kelamin = $request->jenis_kelamin;
        // $profile->nik = $request->nik;
        // $profile->alamat_domisili = $request->alamat_domisili;
        // $profile->golongan_darah = $request->golongan_darah;
        // $profile->rt = $request->rt;
        // $profile->rw = $request->rw;
        // $profile->kelurahan_tempat_tinggal = $request->kelurahan_tempat_tinggal;
        // $profile->kecamatan_tempat_tinggal = $request->kecamatan_tempat_tinggal;

        $profile->update($data);
        Alert::success('Sukses', 'Data Anda Disimpan');
        return redirect('/account/profile?page=data_diri');
    }

    function updateInstansi(Request $request)
    {
        // dd($request);    
        $request->validate([

            'nama_instansi'         => 'required',
            'npsn_sekolah'          => 'required',
            'akreditasi_sekolah'          => 'required',
            'jenjang_pendidikan'    => 'required',
            'alamat_instansi'       => 'required',
        ]);
        $user_id                     = auth()->user()->id;
        $profile                     = Mahasiswa::whereUserId($user_id)->first();
        $profile->nama_instansi      = $request->nama_instansi;
        $profile->npsn_sekolah       = $request->npsn_sekolah;
        $profile->jenjang_pendidikan = $request->jenjang_pendidikan;
        $profile->alamat_instansi    = $request->alamat_instansi;

        $profile->update();
        Alert::success('Sukses', 'Data Anda Disimpan');
        return redirect('/account/profile?page=instansi');
    }

    function updatePendidikan(Request $request)
    {
        $user_id = auth()->user()->id;
        $profile = Mahasiswa::whereUserId($user_id)->whereUserId($user_id)->first();

        $profile->pt_s1 = $request->pt_s1;
        $profile->nama_prodi_s1 = $request->nama_prodi_s1;
        $profile->nomor_ijazah_s1 = $request->nomor_ijazah_s1;
        $profile->ipk_s1 = $request->ipk_s1;
        $profile->tanggal_kelulusan_s1 = $request->tanggal_kelulusan_s1;
        $profile->alamat_pt_s1 = $request->alamat_pt_s1;
        $profile->kabupaten_kota_pt_s1 = $request->kabupaten_kota_pt_s1;
        $profile->provinsi_pt_s1 = $request->provinsi_pt_s1;
        $profile->unggah_ijazah_s1 = $request->unggah_ijazah_s1;
        $profile->unggah_transkrip_s1 = $request->unggah_transkrip_s1;
        $profile->pt_s2 = $request->pt_s2;
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
        $profile = Mahasiswa::whereUserId($user_id)->first();
        // dd($profile);


        $profile->nama_pasangan = $request->nama_pasangan;
        $profile->pendidikan_pasangan = $request->pendidikan_pasangan;
        $profile->pekerjaan_pasangan = $request->pekerjaan_pasangan;
        $profile->jumlah_anak = $request->jumlah_anak;


        $profile->nama_ayah_kandung = $request->nama_ayah_kandung;
        $profile->pendidikan_ayah_kandung = $request->pendidikan_ayah_kandung;
        $profile->penghasilan_ayah_kandung = $request->penghasilan_ayah_kandung;
        $profile->pekerjaan_ayah_kandung = $request->pekerjaan_ayah_kandung;
        $profile->nik_ayah_kandung = $request->nik_ayah_kandung;

        $profile->nama_ibu_kandung = $request->nama_ibu_kandung;
        $profile->pendidikan_ibu_kandung = $request->pendidikan_ibu_kandung;
        $profile->penghasilan_ibu_kandung = $request->penghasilan_ibu_kandung;
        $profile->pekerjaan_ibu_kandung = $request->pekerjaan_ibu_kandung;
        $profile->nik_ibu_kandung = $request->nik_ibu_kandung;


        $profile->nohp_keluarga_dekat = $request->nohp_keluarga_dekat;
        $profile->alamat_orangtua = $request->alamat_orangtua;
        $profile->kabupaten_orangtua = $request->kabupaten_orangtua;
        $profile->provinsi_orangtua = $request->provinsi_orangtua;

        $profile->update();
        Alert::success('Sukses', 'Data Anda Disimpan');
        return redirect('/account/profile?page=keluarga');
    }

    function pasfoto(Request $request)
    {
        $user_id = auth()->user()->id;
        $profile = Mahasiswa::whereUserId($user_id)->first();

        $request->validate([
            'pasfoto'  => 'max:200',
        ]);

        // $pasfoto = $request->hasFile('pasfoto');
        // dd($request->all());
        $profile = Mahasiswa::find($request->id);

        if ($profile->pasfoto != null) {
            unlink($profile->pasfoto);
        }

        //masih belum bagus
        $pasfoto = $request->file('pasfoto');
        // dd($pasfoto);
        $uuid1 = Uuid::uuid4()->toString();
        $uuid2 = Uuid::uuid4()->toString();
        $file_name = $uuid1 . $uuid2 . '.' . $pasfoto->getClientOriginalExtension();

        $storage = 'uploads/pasfoto/';
        $pasfoto->move($storage, $file_name);
        // $data['path'] = $storage;
        $data['pasfoto'] =  $storage . $file_name;

        $profile->update($data);
        Alert::success('Sukses', 'Berkas diupload');
        return redirect('/account/profile?page=pasfoto');
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
