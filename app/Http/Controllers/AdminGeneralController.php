<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mahasiswa;
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

    function ubahPeriodeUser()
    {
        $mahasiswa = Mahasiswa::all();

        $user = User::whereRole('mahasiswa')->wherePeriodeId(2)->get();
        foreach ($user as $row) {
            $mahasiswa = Mahasiswa::whereUserId($row->id)->first();
            if ($mahasiswa) {
                if ($row->periode_id != $mahasiswa->periode_id) {
                    $row->periode_id = $mahasiswa->periode_id;
                    $row->save();
                }
            }
        }
        return redirect()->back()->with('success', 'Berhasil mengubah periode user');
    }
}
