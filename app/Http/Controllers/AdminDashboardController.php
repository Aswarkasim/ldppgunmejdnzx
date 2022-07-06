<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Berkas;
use App\Models\Periode;
use App\Models\Dashboard;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\Configuration;
use App\Models\JenisPpg;
use App\Models\KelasProgram;
use App\Models\RegisterSetting;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;
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

            case 'mahasiswa':
                return $this->mahasiswa();
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
            'total_mahasiswa' => Mahasiswa::count(),
            'total_registered' => Mahasiswa::where('is_registered', 1)->count(),
            'total_verifikasi' => Mahasiswa::where('status', 'WAITING')->count(),
            'total_valid' => Mahasiswa::where('status', 'VALID')->count(),
            'content' => 'admin/dashboard/superadmin'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    function verificator()
    {

        // count percentage berkas where not null
        $user_id = auth()->user()->id;

        $data = [
            'user'      => User::find($user_id),
            'mahasiswa' => Mahasiswa::whereUserId($user_id)->first(),
            'content'   => 'admin/dashboard/verificator'
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
        $mahasiswa->status = request('status');
        $mahasiswa->save();
        Alert::success('Sukses', 'Berkas dikirim. Tunggu proses verifikasi oleh admin');
        return redirect('/account/dashboard');
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
