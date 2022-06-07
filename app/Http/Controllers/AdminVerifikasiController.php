<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Berkas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Toaster;
use Brian2694\Toastr\Facades\Toastr;

class AdminVerifikasiController extends Controller
{
    //
    function index()
    {
        //
        $cari = request('cari');

        // if ($cari) {
        //     $berkas = Kelengkapan::where('name', 'like', '%' . $cari . '%')->latest()->paginate(10);
        // } else {
        //     $berkas = Kelengkapan::latest()->paginate(10);
        // }
        $berkas = Berkas::with('user')->groupBy('user_id')->latest()->paginate(10);
        // $berkas = User::with('mahasiswa')->get();
        // dd($berkas);
        // $berkas = User::latest()->paginate(10);
        $data = [
            'title'   => 'Verifikasi Berkas',
            'berkas' => $berkas,
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
            'berkas_data' => $berkas_data,
            'link_route' => '/account/verifikasi/show/',
            'content' => 'admin/verifikasi/show'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    function validasi($user_id)
    {
        die('masuk');
        $berkas_id = request('berkas_id');
        $status = request('status');

        $berkas = Berkas::find($berkas_id);
        $berkas->status = $status;
        $berkas->update();
        Toastr::success('Status berkas diubah', 'Sukses');
        redirect('/admin/account/verifikasi/' . $user_id . 'berkas_id=' . $berkas_id);
    }
}
