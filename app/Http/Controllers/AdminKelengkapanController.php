<?php

namespace App\Http\Controllers;

use App\Models\Kelengkapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AdminKelengkapanController extends Controller
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
            $kelengkapan = Kelengkapan::where('name', 'like', '%' . $cari . '%')->latest()->paginate(10);
        } else {
            $kelengkapan = Kelengkapan::latest()->paginate(10);
        }
        $data = [
            'title'   => 'Type Berkas',
            'create'  => route('kelengkapan.create'),
            'kelengkapan' => $kelengkapan,
            'content' => 'admin/kelengkapan/index'
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
            'store'    => route('kelengkapan.store'),
            'content' => 'admin/kelengkapan/add'
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
        ]);
        Kelengkapan::create($data);
        Alert::success('Sukses', 'Kelengkapan telah ditambahkan');
        return redirect('/account/kelengkapan');
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
            'kelengkapan' => Kelengkapan::find($id),
            'store'    => route('kelengkapan.store'),
            'content' => 'admin/kelengkapan/add'
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
        $kelengkapan = Kelengkapan::find($id);
        $data = $request->validate([
            'name'              => 'required|min:3',
        ]);
        $kelengkapan->update($data);
        Alert::success('Sukses', 'Kategori telah diubah');
        return redirect('/account/kelengkapan');
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
        DB::table('kelengkapans')->delete($id);
        Alert::success('success', 'Kelengkapan telah dihapus');
        return redirect('/account/kelengkapan');
    }
}
