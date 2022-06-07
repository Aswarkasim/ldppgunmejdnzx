<?php

namespace App\Http\Controllers;

use App\Models\Angkatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AdminAngkatanController extends Controller
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

        if ($cari) {
            $angkatan = Angkatan::where('name', 'like', '%' . $cari . '%')->latest()->paginate(10);
        } else {
            $angkatan = Angkatan::latest()->paginate(10);
        }
        $data = [
            'title'   => 'Angkatan',
            'create'  => route('angkatan.create'),
            'angkatan' => $angkatan,
            'content' => 'admin/angkatan/index'
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
            'title'   => 'Tambah Type Berkas',
            'store'    => route('angkatan.store'),
            'content' => 'admin/angkatan/add'
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
        $data = $request->validate([
            'name'              => 'required|min:3',
            'desc'              => 'required|min:3',
        ]);
        Angkatan::create($data);
        Alert::success('Sukses', 'Angkatan telah ditambahkan');
        return redirect('/account/master/angkatan');
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
        $data = [
            'title'   => 'Tambah Type Berkas',
            'angkatan' => Angkatan::find($id),
            'store'    => route('angkatan.store'),
            'content' => 'admin/angkatan/add'
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
        $angkatan = Angkatan::find($id);
        $data = $request->validate([
            'name'              => 'required|min:3',
        ]);
        $angkatan->update($data);
        Alert::success('Sukses', 'Kategori telah diubah');
        return redirect('/account/master/angkatan');
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
        DB::table('angkatans')->delete($id);
        Alert::success('success', 'Angkatan telah dihapus');
        return redirect('/account/master/angkatan');
    }
}
