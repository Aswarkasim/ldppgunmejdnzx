<?php

namespace App\Http\Controllers;

use App\Models\JenisPpg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AdminJenisPpgController extends Controller
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
            $jenisppg = JenisPpg::where('name', 'like', '%' . $cari . '%')->latest()->paginate(10);
        } else {
            $jenisppg = JenisPpg::latest()->paginate(10);
        }
        $data = [
            'title'   => 'Kelas Program',
            'create'  => route('jenisppg.create'),
            'jenisppg' => $jenisppg,
            'content' => 'admin/jenisppg/index'
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
            'title'   => 'Tambah Jenis',
            'store'    => route('jenisppg.store'),
            'content' => 'admin/jenisppg/add'
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
            'desc'              => 'required',
        ]);
        JenisPpg::create($data);
        Alert::success('Sukses', 'JenisPpg telah ditambahkan');
        return redirect('/account/master/jenisppg');
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
            'title'   => 'Tambah Jenis',
            'jenisppg' => JenisPpg::find($id),
            'store'    => route('jenisppg.store'),
            'content' => 'admin/jenisppg/add'
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
        $jenisppg = JenisPpg::find($id);
        $data = $request->validate([
            'name'              => 'required|min:3',
            'desc'              => 'required',
        ]);
        $jenisppg->update($data);
        Alert::success('Sukses', 'Kategori telah diubah');
        return redirect('/account/master/jenisppg');
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
        DB::table('jenis_ppgs')->delete($id);
        Alert::success('success', 'JenisPpg telah dihapus');
        return redirect('/account/master/jenisppg');
    }
}
