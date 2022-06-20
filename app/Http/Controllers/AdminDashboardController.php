<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminDashboardController extends Controller
{
    //
    function index()
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
            'content' => 'admin/dashboard/index'
        ];
        return view('admin/layouts/wrapper', $data);
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
}
