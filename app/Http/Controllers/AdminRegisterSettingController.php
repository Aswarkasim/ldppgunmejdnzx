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
        $setting->periode_id = $request->periode_id;
        $setting->kelas_program_id = $request->kelas_program_id;
        $setting->is_active = $request->is_active;
        $setting->save();
        Toastr::success('Status berkas diubah', 'Sukses');
        return redirect('/account/dashboard');
    }
}
