<?php

namespace App\Http\Controllers;

use App\Models\BidangStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AdminBidangStudiController extends Controller
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
            $bidangstudi = BidangStudi::where('name', 'like', '%' . $cari . '%')->latest()->paginate(10);
        } else {
            $bidangstudi = BidangStudi::latest()->paginate(10);
        }
        $data = [
            'title'   => 'BidangStudi',
            'create'  => route('bidangstudi.create'),
            'bidangstudi' => $bidangstudi,
            'content' => 'admin/bidangstudi/index'
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
            'store'    => route('bidangstudi.store'),
            'content' => 'admin/bidangstudi/add'
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
            'kode'              => 'required|unique:bidang_studis',
            'name'              => 'required|min:3',
            'desc'              => 'required|min:3',
        ]);
        BidangStudi::create($data);
        Alert::success('Sukses', 'BidangStudi telah ditambahkan');
        return redirect('/account/master/bidangstudi');
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
            'bidangstudi' => BidangStudi::find($id),
            'store'    => route('bidangstudi.store'),
            'content' => 'admin/bidangstudi/add'
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
        $bidangstudi = BidangStudi::find($id);
        $data = $request->validate([
            'kode'              => 'required|unique:bidang_studis',
            'name'              => 'required|min:3',
        ]);
        $bidangstudi->update($data);
        Alert::success('Sukses', 'Kategori telah diubah');
        return redirect('/account/master/bidangstudi');
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
        DB::table('bidang_studis')->delete($id);
        Alert::success('success', 'Bidang studi telah dihapus');
        return redirect('/account/master/bidangstudi');
    }
}
