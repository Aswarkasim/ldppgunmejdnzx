<?php

namespace App\Http\Controllers;

use App\Models\Notif;
use App\Models\User;
use Illuminate\Http\Request;

class AdminNotifController extends Controller
{
    //

    function index()
    {
        $user_id = auth()->user()->id;
        $notif = Notif::whereUserId($user_id)->latest()->paginate(10);
        $data = [
            'title'   => 'Notifikasi',
            'notif'    => $notif,
            'content' => 'admin/notif/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    function show()
    {
    }
}
