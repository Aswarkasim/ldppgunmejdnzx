<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Periode;
use App\Models\Province;
use App\Models\Mahasiswa;
use App\Models\VerifyRole;
use App\Exports\UserExport;
use App\Models\AdminHistoryNilai;
use App\Models\BidangStudi;
use Illuminate\Http\Request;
use App\Models\Adminkelasrole;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cari = request('cari');
        $role = request('role');

        if ($cari) {
            $user = User::with(['bidang_studi', 'periode'])->where('name', 'like', '%' . $cari . '%')->orWhere('no_ukg', 'like', '%' . $cari . '%')->where('role', $role)->latest()->paginate(20);
        } else {
            $user = User::with(['bidang_studi', 'periode'])->latest()->where('role', $role)->paginate(20);
        }
        // dd($user);
        $data = [
            'title'   => 'Manajemen User',
            'user' => $user,
            'periode_id' => Session::get('periode_id'),
            'periode'   => Periode::with('jenisPpg')->get(),
            'content' => 'admin/user/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    function admin()
    {
        //
        $cari = request('cari');
        $role = request('role');

        $periode_id = Session::get('periode_id');
        if ($cari) {
            $user = User::with('bidang_studi')->wherePeriodeId($periode_id)->where('name', 'like', '%' . $cari . '%')->orWhere('no_ukg', 'like', '%' . $cari . '%')->where('role', 'admin')->latest()->paginate(20);
        } else {
            $user = User::with(['bidang_studi', 'verifyHistory'])->wherePeriodeId($periode_id)->latest()->where('role', 'admin')->paginate(20);
        }
        // dd($user);
        $data = [
            'title'   => 'Manajemen User',
            'user' => $user,
            'content' => 'admin/user/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = [
            'title'   => 'Tambah ' . request('role'),
            'bidangstudi' => BidangStudi::all(),
            'content' => 'admin/user/add'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // print_r($request);
        // die;
        // Re Password harusnya tidak masuk
        $data = $request->validate([
            'no_ukg'          => 'required|unique:users',
            'name'          => 'required|min:3',
            // 'email'         => 'required|email|min:4|unique:users',
            'role'          => 'required',
            'password'      => 'required|min:4',
            're_password'   => 'required|same:password'
        ]);

        // $data['bidang_studi_id'] = $request->bidang_studi_id;
        $data['periode_id']     = Session::get('periode_id');
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        Alert::success('Sukses', 'User telah ditambahkan');
        return redirect('/account/user/create?role=' . $data['role']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $role = request('role');
        $periode_id = Session::get('periode_id');
        $kelas = [];
        $verifyRole = [];
        $adminkelasrole = [];
        $adminHistoryNilai = [];
        if ($role == 'admin') {
            $kelas = Kelas::wherePeriodeId($periode_id)->get();
            $adminkelasrole = Adminkelasrole::with('kelas')->wherePeriodeId($periode_id)->whereUserId($id)->get();
            $adminHistoryNilai = AdminHistoryNilai::whereUserId($id)->get();
        } else if ($role == 'verificator') {
            $verifyRole = VerifyRole::with('province')->whereUserId($id)->wherePeriodeId($periode_id)->get();
        }
        $data = [
            'title'   => 'Tambah ',
            'province' => Province::all(),
            'user'     => User::find($id),
            'kelas'     => $kelas,
            'adminkelasrole'     => $adminkelasrole,
            'adminHistoryNilai'  => $adminHistoryNilai,
            'verifyRole' => $verifyRole,
            'content' => 'admin/user/show'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        $data = [
            'title'   => 'Edit User',
            'user' => $user,
            'bidangstudi' => BidangStudi::all(),
            'content' => 'admin/user/add'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::find($id);
        $data = $request->validate([
            'no_ukg'          => 'required',
            'name'          => 'required|min:3',
            // 'email'         => 'required|email|min:4|unique:users,email,' . $user->id,
            // 'role'          => 'required',
        ]);

        $data['periode_id']     = Session::get('periode_id');
        // $data['bidang_studi_id'] = $request->bidang_studi_id;

        if ($request->password == '') {
            $data['password'] = $user->password;
        } else {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);
        Alert::success('success', 'User telah diedit');
        return redirect('/account/user/' . $user->id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table('users')->delete($id);
        Alert::success('success', 'User telah dihapus');
        return redirect('/account/user');
    }

    function addProvince(Request $request)
    {
        $data = [
            'province_id'   => $request->province_id,
            'user_id'       => $request->user_id,
            'periode_id'    => Session::get('periode_id')
        ];
        VerifyRole::create($data);
        Toastr::success('Status berkas diubah', 'Sukses');
        return redirect('/account/user/' . $data['user_id'] . '?role=verificator');
    }


    function deleteProvince($id)
    {
        $verify = VerifyRole::find($id);
        $user_id = $verify->user_id;
        DB::table('verify_roles')->delete($id);
        Toastr::success('File berhasil dihapus', 'Sukses');
        return redirect('/account/user/' . $user_id . '?role=verificator');
    }

    function exportExcel()
    {

        return Excel::download(new UserExport(), 'registrasi_mahasiswa.xlsx');
    }

    function periode(Request $request)
    {
        $user = User::whereRole('verificator')->get();
        foreach ($user as $item) {
            $item->periode_id = $request->periode_id;
            $item->save();
        }
        Toastr::success('Periode berhasil diubah', 'Sukses');
        return redirect('/account/user/?role=verificator');
    }


    function addKelas(Request $request)
    {
        $data = [
            'periode_id'    => Session::get('periode_id'),
            'user_id'       => $request->user_id,
            'kelas_id'       => $request->kelas_id,
        ];
        Adminkelasrole::create($data);
        Toastr::success('Status berkas diubah', 'Sukses');
        return redirect('/account/user/' . $data['user_id'] . '?role=admin');
    }


    function deleteKelas($id)
    {
        $adminkelas = Adminkelasrole::find($id);
        $user_id = $adminkelas->user_id;
        DB::table('adminkelasroles')->delete($id);
        Toastr::success('Kelas berhasil dihapus', 'Sukses');
        return redirect('/account/user/' . $user_id . '?role=admin');
    }

    // function ubahPeriodeUser()
    // {

    //     $periode_id = request('periode_id');

    //     if ($periode_id) {
    //         $mahasiswa = Mahasiswa::wherePeriodeId($periode_id)->get();

    //         foreach ($mahasiswa as $item) {
    //             $user = User::whereNoUkg($item->no_ukg)->first();
    //             if($item->periode_id != $user->periode_id){
    //                 $user->periode_id = $mahasiswa
    //             }
    //         }
    //     }
    // }
}
