<?php

namespace App\Http\Controllers;

use App\Models\Petunjuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AdminPetunjukController extends Controller
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
            $petunjuk = Petunjuk::where('title', 'like', '%' . $cari . '%')->latest()->paginate(10);
        } else {
            $petunjuk = Petunjuk::latest()->paginate(10);
        }
        $data = [
            'title'   => 'Petunjuk',
            'create'  => route('petunjuk.create'),
            'petunjuk' => $petunjuk,
            'content' => 'admin/petunjuk/index'
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
            'title'   => 'Tambah Petunjuk',
            'store'    => route('petunjuk.store'),
            'content' => 'admin/petunjuk/add'
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
            'title'              => 'required',
            'link'              => 'required',
            // 'desc'              => 'required|min:3',
            // 'start'              => 'required',
            // 'is_done'              => 'required',
        ]);
        // $data['end']    = $request->end;

        Petunjuk::create($data);
        Alert::success('Sukses', 'Petunjuk telah ditambahkan');
        return redirect('/account/petunjuk');
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
            'title'   => 'Tambah Petunjuk',
            'petunjuk' => Petunjuk::find($id),
            'store'    => route('petunjuk.store'),
            'content' => 'admin/petunjuk/add'
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
        $petunjuk = Petunjuk::find($id);
        $data = $request->validate([
            'title'              => 'required',
            'link'              => 'required',
            // 'desc'              => 'required|min:3',
            // 'start'              => 'required',
            // 'is_done'              => 'required',
        ]);
        $data['end']    = $request->end;
        $petunjuk->update($data);
        Alert::success('Sukses', 'Kategori telah diubah');
        return redirect('/account/petunjuk');
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
        DB::table('petunjuks')->delete($id);
        Alert::success('success', 'Petunjuk telah dihapus');
        return redirect('/account/petunjuk');
    }
}
