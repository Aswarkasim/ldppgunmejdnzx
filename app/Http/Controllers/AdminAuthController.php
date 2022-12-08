<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

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
            'no_ukg'     => 'required',
            'password'  => 'required',
        ]);

        // $this->sinkronasi($request);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            if (auth()->user()->role == 'mahasiswa') {
                $this->sinkronasi(auth()->user()->no_ukg);
            }
            return redirect('account/dashboard');
        }

        return back()->with('loginError', 'Gagal login. No. UKG atau password anda salah');
    }

    private function sinkronasi($no_ukg)
    {
        $user = User::whereNoUkg($no_ukg)->first();
        // dd($user);
        $mahasiswa = Mahasiswa::whereNoUkg($no_ukg)->first();
        if ($user->periode_id != $mahasiswa->periode_id) {
            $user->periode_id = $mahasiswa->periode_id;
            $user->save();
        }
    }

    function register()
    {
        Toastr::success('Status berkas diubah', 'Sukses');
        Alert::error('Gagal', 'Nomor UKG anda tidak terdaftar');
        return view('admin/auth/register');
    }

    function doRegister(Request $request)
    {
        // dd($request);
        $message = [
            'unique'    => ':attribute anda telah diregistrasi sebelumnya. Silakan login',
            'required'  => ':attribute tidak boleh kosong',
            'same'      => 'Password harus sama'
        ];
        $data = $request->validate([
            'no_ukg'       => 'required|unique:users',
            'name'       => 'required',
            'nohp'       => 'required|unique:users',
            'password'       => 'required',
            're_password'   => 'required|same:password'
        ], $message);
        $data['role']   = 'Mahasiswa';

        $data['password']   = bcrypt(request('password'));


        $mahasiswa = Mahasiswa::whereNoUkg($request->no_ukg)->wherePeriodeId($request->periode_id)->first();
        $data['periode_id'] = $mahasiswa->periode_id;

        if (!$mahasiswa) {
            Alert::error('Gagal', 'Nomor UKG anda tidak terdaftar');
            return back()->with('registerError', 'Nomor UKG anda tidak terdaftar untuk periode ini');
            // alert()->success('SuccessAlert', 'Lorem ipsum dolor sit amet.');
        } else {
            $user = User::create($data);
            $mahasiswa->user_id = $user->id;
            $mahasiswa->periode_id = $request->periode_id;
            $mahasiswa->is_registered = 1;
            $mahasiswa->save();
            Alert::success('Sukses', 'Akun anda telah dibuat');
            return redirect('/auth');
        }
    }



    function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('auth');
    }
}
