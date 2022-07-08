<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuration;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AdminConfigurationController extends Controller
{
    //

    function index()
    {
        $konfigurasi  = DB::table('configurations')->where('id', '1')->first();
        $data = [
            'title'   => 'Konfigurasi',
            'konfigurasi' => $konfigurasi,
            'content' => 'admin/konfigurasi/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    function update(Request $request)
    {
        $konfigurasi  = Configuration::find('1')->first();

        $data = $request->validate([
            'app_name' => 'required|min:3',
            'alamat' => 'required|min:3',
            'nohp_1' => 'required|min:3',
            'nohp_2' => 'required|min:3',
            'email' => 'required|min:3',
            'maps' => 'required|min:3',
        ]);
        $konfigurasi->update($data);
        Alert::success('Sukses', 'Konfigurasi telah diperbaharui');
        return redirect('/account/konfigurasi');
    }
}
