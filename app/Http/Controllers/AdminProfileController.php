<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    //
    public function index()
    {
        //
        $user_id = auth()->user()->id;
        $profile = User::whereId($user_id);
        $data = [
            'title'   => 'Manajemen Banner',
            'profile' => $profile,
            'content' => 'admin/profile/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }
}
