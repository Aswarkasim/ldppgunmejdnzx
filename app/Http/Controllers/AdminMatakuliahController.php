<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class AdminMatakuliahController extends Controller
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
        $periode_id = Session::get('periode_id');
        if ($cari) {
            $matakuliah = Matakuliah::where('name', 'like', '%' . $cari . '%')->wherePeriodeId($periode_id)->latest()->paginate(10);
        } else {
            $matakuliah = Matakuliah::latest()->wherePeriodeId($periode_id)->paginate(10);
        }
        $data = [
            'title'   => 'Matakuliah',
            'create'  => route('matakuliah.create'),
            'matakuliah' => $matakuliah,
            'content' => 'admin/matakuliah/index'
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
            'store'    => route('matakuliah.store'),
            'content' => 'admin/matakuliah/add'
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
            'name'              => 'required',
            'kode'              => 'required',
        ]);
        $data['periode_id'] = Session::get('periode_id');
        Matakuliah::create($data);
        Alert::success('Sukses', 'Matakuliah telah ditambahkan');
        return redirect('/account/master/matakuliah');
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
            'matakuliah' => Matakuliah::find($id),
            'store'    => route('matakuliah.store'),
            'content' => 'admin/matakuliah/add'
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
        $matakuliah = Matakuliah::find($id);
        $data = $request->validate([
            'name'              => 'required',
            'kode'              => 'required',
        ]);
        $matakuliah->update($data);
        Alert::success('Sukses', 'Kategori telah diubah');
        return redirect('/account/master/matakuliah');
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
        DB::table('matakuliahs')->delete($id);
        Alert::success('success', 'Matakuliah telah dihapus');
        return redirect('/account/master/matakuliah');
    }
}
