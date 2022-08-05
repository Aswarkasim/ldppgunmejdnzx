<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Ramsey\Uuid\Uuid;
use App\Models\Province;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DosenProfileController extends Controller
{
    //
    public function index()
    {
        //
        $no_ukg = auth()->user()->no_ukg;
        $user_id  = auth()->user()->id;
        $cek = Dosen::whereUserId($user_id)->first();
        if ($cek == false) {
            $data = [
                'user_id' => $user_id,
                'periode_id' => auth()->user()->periode_id,
            ];
            Dosen::create($data);
        }
        $profile = Dosen::with(['periode'])->whereUserId($user_id)->first();
        $data = [
            'title'   => 'Data Diri',
            'profile' => $profile,
            'provinces' => Province::get(),
            'content' => 'dosen/profile/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    function updateDataDiri(Request $request)
    {
        // dd($request->all());

        $user_id = auth()->user()->id;
        $profile = Dosen::whereUserId($user_id)->first();

        // dd($profile);
        // dd($request->all());
        $data = $request->validate([
            'namalengkap' => 'required',
            'nip' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'pangkat_golongan' => 'required',
            'jabatan' => 'required',
            'alamat_rumah' => 'required',
            'nohp' => 'required',
        ]);

        $profile->update($data);
        Alert::success('Sukses', 'Data Anda Disimpan');
        return redirect('account/dosen/profile?page=data_diri&action=edit');
    }

    function updateInstansi(Request $request)
    {
        // dd($request->all());

        $user_id = auth()->user()->id;
        $profile = Dosen::whereUserId($user_id)->first();

        // dd($profile);
        // dd($request->all());
        $data = $request->validate([
            'nama_instansi'    => 'required',
            'fakultas'          => 'required',
            'jurusan'           => 'required',
            'prodi'             => 'required',
        ]);

        $profile->update($data);
        Alert::success('Sukses', 'Data Anda Disimpan');
        return redirect('account/dosen/profile?page=instansi&action=edit');
    }


    function updatePendidikan(Request $request)
    {
        // dd($request->all());

        $user_id = auth()->user()->id;
        $profile = Dosen::whereUserId($user_id)->first();

        // dd($profile);
        // dd($request->all());
        $data = $request->validate([
            's1_jurusan'    => 'required',
            'tahun_selesai_s1'    => 'required',
            's2_jurusan'    => 'required',
            'tahun_selesai_s2'    => 'required',
        ]);

        $data['s3_jurusan']     = $request->s3_jurusan;
        $data['tahun_selesai_s3']     = $request->tahun_selesai_s3;

        $profile->update($data);
        Alert::success('Sukses', 'Data Anda Disimpan');
        return redirect('account/dosen/profile?page=pendidikan&action=edit');
    }


    function updateRekening(Request $request)
    {
        // dd($request->all());

        $user_id = auth()->user()->id;
        $profile = Dosen::whereUserId($user_id)->first();

        // dd($profile);
        // dd($request->all());
        $data = $request->validate([
            'nama_bank'    => 'required',
            'nama_pemilik'    => 'required',
            'nomor_rekening'    => 'required',
        ]);
        if ($request->nama_bank == 'Lainnya') {
            $data['nama_bank'] = $request->nama_bank_lain;
        }

        $profile->update($data);
        Alert::success('Sukses', 'Data Anda Disimpan');
        return redirect('account/dosen/profile?page=rekening&action=edit');
    }

    function pasfoto(Request $request)
    {
        $user_id = auth()->user()->id;
        $profile = Dosen::whereUserId($user_id)->first();

        $request->validate([
            'pasfoto'  => 'max:200',
        ]);

        // $pasfoto = $request->hasFile('pasfoto');
        // dd($request->all());
        $profile = Dosen::find($request->id);

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
        return redirect('/account/dosen?page=pasfoto');
    }
}
