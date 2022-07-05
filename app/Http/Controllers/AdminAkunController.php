<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminAkunController extends Controller
{
    //
    //
    public function index()
    {
        //
        $data = [
            'akun'      => User::find(auth()->user()->id),
            'content'  => 'admin/akun/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    function save(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $data = $request->validate([
            'name'       => 'required',
            'nohp'       => 'required|unique:users,nohp,' . $user->id,
            // 'email'         => 'required|email|min:4|unique:users,email,' . $user->id,
            're_password'   => 'same:password'
        ]);


        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            $data['password']   = $user->password;
        }

        $user->update($data);
        Alert::success('Sukses', 'Akun disimpan');
        return redirect('/account/akun');
    }
}
