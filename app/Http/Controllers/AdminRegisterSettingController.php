<?php

namespace App\Http\Controllers;

use App\Models\RegisterSetting;
use App\Models\Setting;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class AdminRegisterSettingController extends Controller
{
    //
    function update(Request $request)
    {
        // dd($request->all());
        $setting = RegisterSetting::first();
        // dd($setting);
        $setting->jenis_ppg_id = $request->jenis_ppg_id;
        $setting->periode_id = $request->periode_id;
        $setting->status = $request->status;
        $setting->save();
        Toastr::success('Status berkas diubah', 'Sukses');
        return redirect('/account/dashboard');
    }
}
