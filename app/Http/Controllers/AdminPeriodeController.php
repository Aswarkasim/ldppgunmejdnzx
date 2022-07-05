<?php

namespace App\Http\Controllers;

use App\Models\JenisPpg;
use App\Models\KelasProgram;
use App\Models\Periode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AdminPeriodeController extends Controller
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
            $periode = Periode::with('jenisPpg')->where('name', 'like', '%' . $cari . '%')->latest()->paginate(10);
        } else {
            $periode = Periode::with('jenisPpg')->latest()->paginate(10);
        }
        $data = [
            'title'   => 'Periode',
            'create'  => route('periode.create'),
            'periode' => $periode,
            'content' => 'admin/periode/index'
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
            'jenis'     => JenisPpg::all(),
            'store'    => route('periode.store'),
            'content' => 'admin/periode/add'
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
            'jenis_ppg_id'              => 'required',
            'name'              => 'required|min:3',
            'tahun'              => 'required|min:4',
            'desc'              => 'required|min:3',
        ]);
        Periode::create($data);
        Alert::success('Sukses', 'Periode telah ditambahkan');
        return redirect('/account/master/periode');
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
            'periode' => Periode::find($id),
            'jenis'     => JenisPpg::all(),
            'store'    => route('periode.store'),
            'content' => 'admin/periode/add'
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
        $periode = Periode::find($id);
        $data = $request->validate([
            'jenis_ppg_id'              => 'required',
            'name'              => 'required|min:3',
            'tahun'              => 'required|min:4',
            'desc'              => 'required|min:3',
        ]);
        $periode->update($data);
        Alert::success('Sukses', 'Kategori telah diubah');
        return redirect('/account/master/periode');
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
        DB::table('periodes')->delete($id);
        Alert::success('success', 'Periode telah dihapus');
        return redirect('/account/master/periode');
    }
}
