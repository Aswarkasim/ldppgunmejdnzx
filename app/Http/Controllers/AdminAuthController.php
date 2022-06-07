<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    //
    function index()
    {
        return view('admin/auth/login');
    }

    function login(Request $request)
    {
        $data  = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect('account/dashboard');
        }

        return back()->with('loginError', 'Gagal login. Email atau password anda salah');
    }

    function register()
    {
        return view('admin/auth/register');
    }

    function doRegister(Request $request)
    {
        $data = $request->validate([
            'nik'       => 'required',
            'name'       => 'required',
            'nohp'       => 'required',
            'password'       => 'required',
            're_password'   => 'required|same:password'
        ]);
        $data['role']   = 'Mahasiswa';
    }

    function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('auth');
    }
}
