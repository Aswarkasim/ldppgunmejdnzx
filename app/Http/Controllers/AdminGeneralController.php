<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminGeneralController extends Controller
{
    //
    function matakuliah()
    {
        $periode_id = Auth::user()->periode_id;
        $matakuliah = Matakuliah::wherePeriodeId($periode_id)->get();
        $data = [
            'title'   => 'Matakuliah',
            'matakuliah' => $matakuliah,
            'content' => 'admin/matakuliah/list_for_admin'
        ];
        return view('admin/layouts/wrapper', $data);
    }
}
