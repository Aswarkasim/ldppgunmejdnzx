<?php

namespace App\Http\Controllers;

use App\Models\KelasProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AdminKelasProgramController extends Controller
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
            $kelasprogram = KelasProgram::where('name', 'like', '%' . $cari . '%')->latest()->paginate(10);
        } else {
            $kelasprogram = KelasProgram::latest()->paginate(10);
        }
        $data = [
            'title'   => 'Kelas Program',
            'create'  => route('kelasprogram.create'),
            'kelasprogram' => $kelasprogram,
            'content' => 'admin/kelasprogram/index'
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
            'store'    => route('kelasprogram.store'),
            'content' => 'admin/kelasprogram/add'
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
            'kode'              => 'required',
        ]);
        KelasProgram::create($data);
        Alert::success('Sukses', 'KelasProgram telah ditambahkan');
        return redirect('/account/master/kelasprogram');
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
            'kelasprogram' => KelasProgram::find($id),
            'store'    => route('kelasprogram.store'),
            'content' => 'admin/kelasprogram/add'
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
        $kelasprogram = KelasProgram::find($id);
        $data = $request->validate([
            'name'              => 'required|min:3',
            'kode'              => 'required',
        ]);
        $kelasprogram->update($data);
        Alert::success('Sukses', 'Kategori telah diubah');
        return redirect('/account/master/kelasprogram');
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
        DB::table('kelasprograms')->delete($id);
        Alert::success('success', 'KelasProgram telah dihapus');
        return redirect('/account/master/kelasprogram');
    }
}
