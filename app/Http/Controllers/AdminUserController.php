<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
            $user = User::with('bidang_studi')->where('name', 'like', '%' . $cari . '%')->where('role', $role)->latest()->paginate(10);
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
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        Alert::success('Sukses', 'User telah ditambahkan');
        return redirect('/account/user/create');
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
            'title'   => 'Tambah User',
            'user' => $user,
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

        if ($request->password == '') {
            $data['password'] = $user->password;
        } else {
            $data['password'] = Hash::make($data['password']);
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
}
