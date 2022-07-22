<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Berkas;
use App\Models\Periode;
use App\Models\JenisPpg;
use App\Models\Dashboard;
use App\Models\Mahasiswa;
use App\Models\KelasProgram;
use Illuminate\Http\Request;
use App\Models\Configuration;
use App\Models\Dosen;
use App\Models\VerifyHistory;
use App\Models\RegisterSetting;
use App\Models\VerifyRole;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PhpParser\Parser\Multiple;
use RealRashid\SweetAlert\Facades\Alert;

class AdminDashboardController extends Controller
{
    //
    function index()
    {
        // $config = Configuration::first();

        $role  = auth()->user()->role;
        // echo $role;
        switch ($role) {
            case 'superadmin':
                return $this->superadmin();
                break;

            case 'admin':
                return $this->admin();
                break;

            case 'mahasiswa':
                return $this->mahasiswa();
                break;

            case 'dosen':
                return $this->dosen();
                break;
            case 'verificator':
                return $this->verificator();
                break;

            default:
                # code...
                break;
        }
    }
    function periodeActive()
    {
        // die('masuk');
        $id = request('id');
        $name = request('name');
        Session::put([
            'periode_id' => $id,
            'periode_name' => $name,
        ]);
        return redirect('/account/dashboard');
    }

    function periodeLD($id)
    {
        $config = Configuration::first();
        $config->periode_id = $id;
        $config->save();
        return redirect('/account/dashboard');
        Toastr::success('Periode diaktifkan', 'Sukses');
    }

    function dosen()
    {
        $user_id = auth()->user()->id;

        $data = [
            'user'      => User::find($user_id),
            'dosen' => Dosen::whereUserId($user_id)->first(),
            'content'   => 'admin/dashboard/dosen'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    function superadmin()
    {
        $periode_id = Session::get('periode_id');

        if ($periode_id == null) {
            $periode = Periode::latest()->first();
            Session::put([
                'periode_id' => $periode->id,
                'periode_name' => $periode->name,
            ]);
        }

        $data = [
            'periode'   => Periode::latest()->get(),
            'jenis'     => JenisPpg::all(),
            'register_setting'  => RegisterSetting::with(['periode', 'jenis_ppg'])->first(),
            'total_mahasiswa' => Mahasiswa::wherePeriodeId($periode_id)->count(),
            'total_registered' => Mahasiswa::wherePeriodeId($periode_id)->where('is_registered', 1)->count(),
            'total_verifikasi' => Mahasiswa::wherePeriodeId($periode_id)->where('status', 'WAITING')->count(),
            'total_valid' => Mahasiswa::wherePeriodeId($periode_id)->where('status', 'VALID')->count(),
            'content' => 'admin/dashboard/superadmin'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    function admin()
    {
        $data = [
            'content'   => 'admin/dashboard/admin'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    function verificator()
    {

        // count percentage berkas where not null
        $user_id = auth()->user()->id;

        $periode_id = Auth::user()->periode_id;

        $data = [
            'total_verified'    => VerifyHistory::whereVerificatorId($user_id)->wherePeriodeId($periode_id)->count(),
            'total_provinsi'    => VerifyRole::wherePeriodeId($periode_id)->whereUserId($user_id)->count(),
            'user'              => User::find($user_id),
            'mahasiswa'         => Mahasiswa::whereUserId($user_id)->first(),
            'content'           => 'admin/dashboard/verificator'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    function mahasiswa()
    {

        // count percentage berkas where not null
        $user_id = auth()->user()->id;

        $data = [
            'user'      => User::find($user_id),
            'mahasiswa' => Mahasiswa::whereUserId($user_id)->first(),
            'content'   => 'admin/dashboard/mahasiswa'
        ];
        return view('admin/layouts/wrapper', $data);
    }
    function changeStatus()
    {
        //berikan pengecekan jika field profil masih kosong
        $user_id = auth()->user()->id;
        $mahasiswa = Mahasiswa::whereUserId($user_id)->first();

        //cek namalengkap, provinsi_tempat_tinggal not string or null
        if (
            $mahasiswa->nama_lengkap == null &&
            $mahasiswa->bidang_studi_id == null &&
            $mahasiswa->provinsi_tempat_tinggal == null &&
            $mahasiswa->kabupaten_tempat_tinggal == null &&
            $mahasiswa->npsn_sekola == null &&
            $mahasiswa->alamat_instansi == null &&
            $mahasiswa->pt_s1 == null &&
            $mahasiswa->alamat_pt_s1 == null &&
            $mahasiswa->nama_pasangan == null &&
            $mahasiswa->jumlah_anak == null &&
            $mahasiswa->nama_ayah_kandung == null &&
            $mahasiswa->alamat_orangtua == null &&
            $mahasiswa->pasfoto == null &&
            $mahasiswa->nomor_rekening == null
        ) {
            Alert::error('Data diri atau berkas belum lengkap', 'Cek kembali data diri');
            return redirect('/account/dashboard');
            //ceck if berkas where user_id and periode_id and kelengkapan_id not null
            // $berkas = Berkas::whereUserId($user_id)->wherePeriodeId($mahasiswa->periode_id)->whereBerkas(!null)->count();

            // if ($berkas < 10) {
            //     Alert::error('Data diri atau berkas belum lengkap', 'Cek kembali data diri');
            //     return redirect('/account/dashboard');
            // } else {
            //     $mahasiswa->status = request('status');
            //     $mahasiswa->save();
            //     Alert::success('Sukses', 'Berkas dikirim. Tunggu proses verifikasi oleh admin');
            //     return redirect('/account/dashboard');
            // }
        } else {
            $mahasiswa->status = request('status');
            $mahasiswa->save();
            Alert::success('Sukses', 'Berkas dikirim. Tunggu proses verifikasi oleh admin');
            return redirect('/account/dashboard');
        }
    }

    function getPeriode($jenis_ppg_id)
    {
        if (!$jenis_ppg_id) return response()->json('NOT OK');

        $periode = Periode::where('jenis_ppg_id', $jenis_ppg_id)->get();

        if ($periode == false) return response()->json('NOT OK');

        $dataPeriode = "";

        foreach ($periode as $key) {
            $dataPeriode .= "<option value='" . $key->id . "'>$key->name</option>";
        }

        return response()->json($dataPeriode);
    }
}
