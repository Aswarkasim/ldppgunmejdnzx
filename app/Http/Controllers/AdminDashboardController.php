<?php

namespace App\Http\Controllers;

use App\Models\Adminkelasrole;
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
use App\Models\Kelas;
use App\Models\KelasPeserta;
use App\Models\VerifyHistory;
use App\Models\RegisterSetting;
use App\Models\Surat;
use App\Models\ValidProfileMahasiswa;
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
        $jenis_ppg_id = request('jenis_ppg_id');
        Session::put([
            'periode_id' => $id,
            'periode_name' => $name,
            'jenis_ppg_id' => $jenis_ppg_id,
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
                'jenis_ppg_id_name' => $periode->jenis_ppg_id,
            ]);
        }

        $periode_id = Session::get('periode_id');

        $data = [
            // 'periode'   => Periode::latest()->get(),
            'periode'       => Periode::with('jenisPpg')->find($periode_id),
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
        $periode_id = Auth::user()->periode_id;
        $user_id = Auth::user()->id;
        $kelas = Adminkelasrole::wherePeriodeId($periode_id)->whereUserId($user_id)->get();
        // print_r('Periode ID  : ' . $periode_id . '---- User ID :' . $user_id);
        // dd($kelas);
        $mahasiswa = 0;
        foreach ($kelas as $k) {
            $kls = KelasPeserta::whereKelasId($k->kelas_id)->count();
            $mahasiswa = $kls + $mahasiswa;
        }
        $data = [
            'kelas'     => $kelas,
            'mahasiswa'     => $mahasiswa,
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
        $periode_id = auth()->user()->id;

        $data = [
            'user'      => User::find($user_id),
            'periode'   => Periode::find($periode_id),
            'mahasiswa' => Mahasiswa::whereUserId($user_id)->wherePeriodeId($periode_id)->first(),
            'content'   => 'admin/dashboard/mahasiswa'
        ];
        return view('admin/layouts/wrapper', $data);
    }
    function changeStatus()
    {
        //berikan pengecekan jika field profil masih kosong
        $user_id = auth()->user()->id;
        $mahasiswa = Mahasiswa::with('periode')->whereUserId($user_id)->first();
        $no_ukg = auth()->user()->no_ukg;
        $periode_id  = auth()->user()->periode_id;
        $valid = ValidProfileMahasiswa::whereNoUkg($no_ukg)->wherePeriodeId($periode_id)->first();

        if ($valid == null) {
            return redirect('/account/profile?page=data_diri');
        }

        //cek namalengkap, provinsi_tempat_tinggal not string or null

        if ($mahasiswa->periode->jenis == 'PRAJAB') {
            if (
                $valid->data_diri != 1 ||
                // $valid->instansi != 1 ||
                $valid->pendidikan != 1 ||
                $valid->keluarga != 1 ||
                // $valid->rekening != 1 ||
                $valid->pasfoto != 1 ||
                $valid->berkas != 1
            ) {
                Alert::error('Data diri atau berkas belum lengkap', 'Cek kembali data diri');
                return redirect('/account/dashboard');
            } else {
                $mahasiswa->status = request('status');
                $mahasiswa->save();
                Alert::success('Sukses', 'Berkas dikirim. Tunggu proses verifikasi oleh admin');
                return redirect('/account/dashboard');
            }
        } else {
            if (
                $valid->data_diri != 1 ||
                $valid->instansi != 1 ||
                $valid->pendidikan != 1 ||
                $valid->keluarga != 1 ||
                $valid->rekening != 1 ||
                $valid->pasfoto != 1 ||
                $valid->berkas != 1
            ) {
                Alert::error('Data diri atau berkas belum lengkap', 'Cek kembali data diri');
                return redirect('/account/dashboard');
            } else {
                $mahasiswa->status = request('status');
                $mahasiswa->save();
                Alert::success('Sukses', 'Berkas dikirim. Tunggu proses verifikasi oleh admin');
                return redirect('/account/dashboard');
            }
        }
    }

    function getPeriode($jenis_ppg_id)
    {
        if (!$jenis_ppg_id) return response()->json('NOT OK');

        $periode = Periode::where('jenis_ppg_id', $jenis_ppg_id)->get();

        if ($periode == false) return response()->json('NOT OK');

        $dataPeriode = "";

        foreach ($periode as $key) {
            $dataPeriode .= "<option value='" . $key->id . "'>$key->name" . " - $key->tahun</option>";
        }

        return response()->json($dataPeriode);
    }

    function updatePpiPeriode(Request $request)
    {
        $periode_id = Session::get('periode_id');
        $periode = Periode::find($periode_id);
        $surat = Surat::whereName('PPI')->wherePeriodeId($periode_id)->first();
        if ($surat == null) {
            return redirect('/account/surat/ppi');
        } else {
            $data = [
                'ppi_status'    => $request->ppi_status,
                // 'nomor_surat_first' => $request->nomor_surat_first,
                // 'nomor_surat_last' => $request->nomor_surat_last,
            ];
            $periode->update($data);
            Alert::success('Sukses', "Pengaturan PPI telah diubah");
            return redirect('/account/dashboard');
        }
    }


    function updateSkbsPeriode(Request $request)
    {
        $periode_id = Session::get('periode_id');
        $periode = Periode::find($periode_id);
        $data = [
            'nomor_skbs_awal' => $request->nomor_skbs_awal,
            'nomor_skbs_akhir' => $request->nomor_skbs_akhir,
        ];
        $periode->update($data);
        Alert::success('Sukses', "SKBS telah diubah");
        return redirect('/account/dashboard');
    }
}
