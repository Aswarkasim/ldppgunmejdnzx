<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Berkas;
use App\Models\Mahasiswa;
use App\Models\Notif;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Toaster;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminVerifikasiController extends Controller
{
    //
    function index()
    {
        //
        $role = Auth::user()->periode_id;
        // die($role);
        $periode_id = '';
        if (Auth::user()->role == 'verificator') {
            $periode_id = Auth::user()->periode_id;
        } else {
            $periode_id = Session::get('periode_id');
        }
        // die($periode_id);

        $cari = request('cari');

        // if ($cari) {
        //     $berkas = Kelengkapan::where('name', 'like', '%' . $cari . '%')->latest()->paginate(10);
        // } else {
        //     $berkas = Kelengkapan::latest()->paginate(10);
        // }

        $user = [];
        if (Auth::user()->role == 'verificator') {
            $user = Mahasiswa::wherePeriodeId($periode_id)
                ->whereStatus('WAITING')
                ->whereBidangStudiId(Auth::user()->bidang_studi_id)
                ->paginate(10);
        } else {
            $user = Mahasiswa::wherePeriodeId($periode_id)
                ->whereStatus('WAITING')
                ->paginate(10);
        }



        $data = [
            'title'   => 'Verifikasi Berkas',
            'user' => $user,
            'content' => 'admin/verifikasi/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    function show($user_id)
    {

        $berkas = Berkas::with('kelengkapan')->whereUserId($user_id)->get();
        // @dd($berkas);
        $berkas_id = request('berkas_id');
        $berkas_data = Berkas::find($berkas_id);
        $data = [
            'title'   => 'Verifikasi Berkas',
            'berkas' => $berkas,
            'user_id' => $user_id,
            'berkas_data' => $berkas_data,
            'link_route' => '/account/verifikasi/show/',
            'content' => 'admin/verifikasi/show'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    function validasi($user_id)
    {
        // die('masuk');
        $berkas_id = request('berkas_id');
        $status = request('status');

        $berkas = Berkas::with('kelengkapan')->find($berkas_id);

        $notif = [
            'user_id'   => $user_id,
            'title'     => 'Berkas Valid',
            'type'      => 'VALID',
            'message'   => $berkas->kelengkapan->name . ' Valid'
        ];
        Notif::create($notif);

        $berkas->status = 'VALID';
        $berkas->update();

        Toastr::success('Status berkas diubah', 'Sukses');
        return redirect('/account/verifikasi/show/' . $user_id . '?berkas_id=' . $berkas_id);
    }

    function invalid(Request $request)
    {
        // dd($request->all());
        $user_id = $request->user_id;
        $berkas_id = $request->id;
        $berkas = Berkas::with('kelengkapan')->find($berkas_id);

        $message = $request->message;
        $notif = [
            'user_id'   => $user_id,
            'type'      => 'INVALID',
            'title'     => $berkas->name . ' Berkas Tidak Valid',
            'message'   => $message
        ];
        Notif::create($notif);
        $berkas->status = 'INVALID';
        $berkas->save();
        Toastr::success('Status berkas diubah', 'Sukses');
        return redirect('/account/verifikasi/show/' . $user_id . '?berkas_id=' . $berkas_id);
    }

    function verifikasiAll($user_id)
    {
        $berkas = Berkas::whereUserId($user_id)->get();
        // dd($berkas);
        foreach ($berkas as $item) {
            $item->status = 'VALID';
            $item->save();
        }
        $mahasiswa = Mahasiswa::whereUserId($user_id)->first();
        $mahasiswa->status = 'VALID';
        $mahasiswa->save();

        $notif = [
            'user_id'   => $user_id,
            'title'     => 'Berkas Valid',
            'type'      => 'VALID',
            'message'   => 'Semua berkas anda diterima'
        ];
        Notif::create($notif);

        Toastr::success('Status berkas diubah', 'Sukses');
        return redirect('/account/verifikasi/show/' . $user_id);
    }

    function biodata($user_id)
    {
        $mahasiswa = Mahasiswa::with('bidangstudi')->whereUserId($user_id)->first();
        $data = [
            'title'   => 'Verifikasi Data',
            'mahasiswa' => $mahasiswa,
            'content' => 'admin/verifikasi/biodata'
        ];
        return view('admin/layouts/wrapper', $data);
    }
}
