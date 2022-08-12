<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminDosenController extends Controller
{
    //
    function index()
    {
        $periode_id = Session::get('periode_id');
        $dosen = Dosen::wherePeriodeId($periode_id)->paginate(10);
        $data = [
            'title'   => 'Data Dosen',
            'dosen' => $dosen,
            'content' => 'admin/dosen/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    function detail($id)
    {
        $dosen  = Dosen::find($id);

        $data = [
            'title'   => 'Data Dosen',
            'dosen' => $dosen,
            'content' => 'admin/dosen/detail'
        ];
        return view('admin/layouts/wrapper', $data);
    }
}