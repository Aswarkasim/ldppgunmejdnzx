<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Province;
use Illuminate\Http\Request;

class DosenProfileController extends Controller
{
    //
    public function index()
    {
        //
        $no_ukg = auth()->user()->no_ukg;
        $user_id  = auth()->user()->id;
        $cek = Dosen::whereUserId($user_id)->first();
        if ($cek == false) {
            $data = [
                'user_id' => $user_id,
                'periode_id' => auth()->user()->periode_id,
            ];
            Dosen::create($data);
        }
        $profile = Dosen::with(['periode'])->whereUserId($user_id)->first();
        $data = [
            'title'   => 'Data Diri',
            'profile' => $profile,
            'provinces' => Province::get(),
            'content' => 'dosen/profile/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }
}
