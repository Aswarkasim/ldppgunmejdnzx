<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use App\Models\Kelengkapan;
use App\Models\Mahasiswa;
use App\Models\Periode;
use App\Models\User;
use App\Models\ValidProfileMahasiswa;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use RealRashid\SweetAlert\Facades\Alert;

class AdminBerkasController extends Controller
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
        $user = User::find($user_id);
        $noukg = auth()->user()->no_ukg;
        // echo $noukg;
        // echo $user_id;
        //get data mahasiswa web user id = $user_id and noukg = $noukg
        // $mahasiswa = \App\Models\Mahasiswa::where('user_id', $user_id)->where('no_ukg', $noukg)->first();
        // dd($mahasiswa);

        $no_ukg = auth()->user()->no_ukg;
        $periode_id  = auth()->user()->periode_id;
        $cekValidData = ValidProfileMahasiswa::whereNoUkg($no_ukg)->wherePeriodeId($periode_id)->first();
        if ($cekValidData == false) {
            $data = [
                'periode_id' => $periode_id,
                'no_ukg' => $no_ukg
            ];
            ValidProfileMahasiswa::create($data);
        }

        $periode = Periode::find($periode_id);

        $kelengkapan = Kelengkapan::whereJenis($periode->jenis)->get();
        foreach ($kelengkapan as $item) {
            $cek = Berkas::whereUserId($user_id)->whereKelengkapanId($item->id)->first();
            if ($cek == false) {
                $data = [
                    'user_id'           => $user_id,
                    'periode_id'        => $user->periode_id,
                    'kelengkapan_id'    => $item->id,
                ];
                Berkas::create($data);
            }
        }
        $berkas = Berkas::with('kelengkapan')
            ->whereUserId($user_id)
            ->get();
        $berkas->sortBy(function ($berkas) {
            return $berkas->kelengkapan->name;
        });

        $data = [
            'title'   => 'Manajemen Berkas',
            'create'  => route('kelengkapan.create'),
            // 'berkas'  => Berkas::with('kelengkapan')->whereUserId($user_id)->get(),
            'berkas' => $berkas,
            'user'      => User::find($user_id),
            'valid'     => $this->getValidProfileValue(),
            'content' => 'admin/berkas/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    function upload(Request $request)
    {

        $messages = [
            'berkas' . $request->id . '.mimes' => 'Format file harus .pdf',
        ];

        $request->validate([
            'berkas' . $request->id   => 'mimes:pdf|max:200',
        ], $messages);
        $berkasData = Berkas::find($request->id);

        if ($berkasData->berkas != null) {
            unlink($berkasData->path . $berkasData->berkas);
        }

        $berkas = $request->file('berkas' . $request->id);
        $uuid1 = Uuid::uuid4()->toString();
        $uuid2 = Uuid::uuid4()->toString();
        $file_name = $uuid1 . $uuid2 . '.' . $berkas->getClientOriginalExtension();

        $storage = 'uploads/berkas/';
        $berkas->move($storage, $file_name);
        $data['path'] = $storage;
        $data['berkas'] =  $file_name;
        $data['status'] = 'PENDING';

        $berkasData->update($data);
        Alert::success('Sukses', 'Berkas diupload');
        return redirect('/account/berkas');
    }

    function cetakBukti()
    {
        $user_id = '';

        if (auth()->user()->role == 'mahasiswa') {
            $user_id = auth()->user()->id;
        } else {
            $user_id = request('user_id');
        }
        //check if status valid
        $berkas = Mahasiswa::whereUserId($user_id)->whereStatus('VALID')->get();
        if ($berkas->count() == 0) {
            Alert::error('Error', 'Berkas belum valid');
            return redirect('/account/dashboard');
        } else {
            $mahasiswa = Mahasiswa::with(['periode', 'bidang_studi', 'provinceBydomisili', 'kabupatenByDomisili'])->whereUserId($user_id)->first();
            $data['mahasiswa'] = $mahasiswa;
            $data['jenis_ppg'] = $mahasiswa->periode->jenis;
            return view('admin/berkas/cetak', $data);
        }
    }

    function checkValidasi()
    {
        $user_id = auth()->user()->id;
        $periode_id  = auth()->user()->periode_id;

        $berkas = Berkas::with('kelengkapan')->whereUserId($user_id)->wherePeriodeId($periode_id)->get();


        $jumlah_wajib = 0;
        $berkas_available = 0;
        foreach ($berkas as $item)
            if ($item->kelengkapan->kebutuhan == 'WAJIB') {
                $jumlah_wajib = $jumlah_wajib + 1;

                if ($item->berkas != null) {
                    $berkas_available = $berkas_available + 1;
                }
            }

        // dd($berkas_available);

        if ($jumlah_wajib <= $berkas_available) {
            $valid = $this->getValidProfileValue();

            $data = [
                'berkas' => 1
            ];
            $valid->update($data);

            Alert::success('Success', 'Silakan klik tombol valid di halaman dashboard');
            return redirect('/account/berkas');
        } else {
            Alert::warning('Peringatan', 'Masih ada berkas wajib belum diupload');
            return redirect('/account/berkas');
        }
    }

    private function getValidProfileValue()
    {
        $no_ukg = auth()->user()->no_ukg;
        $periode_id  = auth()->user()->periode_id;
        $valid = ValidProfileMahasiswa::whereNoUkg($no_ukg)->wherePeriodeId($periode_id)->first();
        return $valid;
    }
}
