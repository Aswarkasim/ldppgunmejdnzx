<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class AdminDosenController extends Controller
{
    //
    function index()
    {
        $periode_id = Session::get('periode_id');
        // $dosen = Dosen::wherePeriodeId($periode_id)->paginate(10);
        $dosen = Dosen::paginate(10);
        $data = [
            'title'   => 'Data Dosen',
            'dosen' => $dosen,
            'content' => 'admin/dosen/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    function create()
    {
        $data = [
            'title'   => 'Tambah Dosen',
            'content' => 'admin/dosen/add'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    function store(Request $request)
    {
        $data = $request->validate([
            'nip'           => 'required|unique:dosens',
            'namalengkap'              => 'required',
            'nomor_serdos'              => 'required',
            'npwp'              => 'required',
            'pangkat_golongan'                  => 'required',
            'alamat_rumah'                  => 'required',
            'nohp'                  => 'required',
            'nomor_rekening'                  => 'required',
            'nama_pemilik'                  => 'required',
        ]);

        $data['nomor_serdos']   = 'BNI';

        Dosen::create($data);
        Alert::success('Sukses', 'Dosen telah ditambahkan');
        return redirect('/account/dosen');
    }

    function edit($id)
    {
        $dosen = Dosen::find($id);
        $data = [
            'title'     => 'Edit Dosen',
            'dosen'     => $dosen,
            'content'   => 'admin/dosen/add'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    function update(Request $request, $id)
    {
        $dosen = Dosen::find($id);
        // dd($dosen->nip);
        $data = $request->validate([
            'nip'                   => 'required|unique:dosens,nip,' . $dosen->nip,
            'namalengkap'           => 'required',
            'nomor_serdos'          => 'required',
            'npwp'                  => 'required',
            'pangkat_golongan'      => 'required',
            'alamat_rumah'          => 'required',
            'nohp'                  => 'required',
            'nomor_rekening'        => 'required',
            'nama_pemilik'          => 'required',
        ]);

        $data['nomor_serdos']   = 'BNI';

        $dosen->update($data);
        Alert::success('Sukses', 'Dosen telah diedit');
        return redirect('/account/dosen/' . $id . '/edit');
    }

    function detail($id)
    {
        $dosen  = Dosen::find($id);

        $data = [
            'title'   => 'Data Dosen',
            'dosen' => $dosen,
            'content' => 'admin/dosen/detail'
        ];
        return view('admin/layouts/wrapper', $data);
    }
}
