<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Province;
use App\Models\VerifyRole;
use App\Models\BidangStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
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
            $user = User::with('bidang_studi')->where('name', 'like', '%' . $cari . '%')->orWhere('no_ukg', 'like', '%' . $cari . '%')->where('role', $role)->latest()->paginate(10);
        } else {
            $user = User::with('bidang_studi')->latest()->where('role', $role)->paginate(10);
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
            'no_ukg'          => 'required',
            'name'          => 'required|min:3',
            'email'         => 'required|email|min:4|unique:users',
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
        $data = [
            'title'   => 'Tambah ',
            'province' => Province::all(),
            'user'     => User::find($id),
            'verifyRole' => VerifyRole::with('province')->whereUserId($id)->get(),
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
            'email'         => 'required|email|min:4|unique:users,email,' . $user->id,
            'role'          => 'required',
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
        return redirect('/account/user/' . $user->id . '/edit?role=' . $data['role']);
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
}
