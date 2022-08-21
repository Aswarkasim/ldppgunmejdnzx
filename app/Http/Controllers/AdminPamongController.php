<?php

namespace App\Http\Controllers;

use Ramsey\Uuid\Uuid;
use App\Models\Pamong;
use Illuminate\Http\Request;
use App\Exports\PamongExport;
use App\Imports\PamongImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class AdminPamongController extends Controller
{
    //
    function index()
    {
        $periode_id = Session::get('periode_id');
        // $pamong = Pamong::wherePeriodeId($periode_id)->paginate(10);
        $pamong = Pamong::paginate(10);
        $data = [
            'title'   => 'Data Pamong',
            'pamong' => $pamong,
            'content' => 'admin/pamong/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    function create()
    {
        $data = [
            'title'   => 'Tambah Pamong',
            'content' => 'admin/pamong/add'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    function store(Request $request)
    {
        $data = $request->validate([
            'nuptk'           => 'required|unique:pamongs',
            'namalengkap'              => 'required',
            'nomor_serdik'              => 'required',
            'nama_sekolah'              => 'required',
            'npwp'              => 'required',
            'pangkat_golongan'                  => 'required',
            'alamat_rumah'                  => 'required',
            'nohp'                  => 'required',
            'nomor_rekening'                  => 'required',
            'nama_pemilik'                  => 'required',
        ]);

        $data['nama_bank']   = 'BNI';

        Pamong::create($data);
        Alert::success('Sukses', 'Pamong telah ditambahkan');
        return redirect('/account/pamong');
    }

    function edit($id)
    {
        $pamong = Pamong::find($id);
        $data = [
            'title'     => 'Edit Pamong',
            'pamong'     => $pamong,
            'content'   => 'admin/pamong/add'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    function update(Request $request, $id)
    {
        $pamong = Pamong::find($id);
        // dd($pamong->nuptk);
        $data = $request->validate([
            'nuptk'                   => 'required|unique:pamongs,nuptk,' . $pamong->nuptk,
            'namalengkap'           => 'required',
            'nomor_serdik'          => 'required',
            'nama_sekolah'          => 'required',
            'npwp'                  => 'required',
            'pangkat_golongan'      => 'required',
            'alamat_rumah'          => 'required',
            'nohp'                  => 'required',
            'nomor_rekening'        => 'required',
            'nama_pemilik'          => 'required',
        ]);

        $data['nama_bank']   = 'BNI';

        $pamong->update($data);
        Alert::success('Sukses', 'Pamong telah diedit');
        return redirect('/account/pamong/' . $id . '/edit');
    }

    function show($id)
    {
        $pamong  = Pamong::find($id);

        $data = [
            'title'   => 'Data Pamong',
            'pamong' => $pamong,
            'content' => 'admin/pamong/show'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    function destroy($id)
    {
        DB::table('pamongs')->delete($id);
        Alert::success('success', 'Pamong telah dihapus');
        return redirect('/account/pamong');
    }

    function exportExcel()
    {

        // $this->updateNameById();

        // die($filter);
        return Excel::download(new PamongExport(), 'pamong.xlsx');
    }

    function downloadFormat()
    {
        // return Storage::download('/public/docs/format-excel.xlsx');
        return response()->download('dokumen/format-pamong.xlsx');
    }

    function import(Request $request)
    {


        try {
            $file = $request->file('file');
            $uuid1 = Uuid::uuid4()->toString();
            $uuid2 = Uuid::uuid4()->toString();
            $file_name = $uuid1 . $uuid2 . '.' . $file->getClientOriginalExtension();

            // $file_name = time() . "_" . $file->getClientOriginalName();

            $storage = 'uploads/excel/';
            $file->move($storage, $file_name);
            // $data['file'] = $storage . $file_name;

            Excel::import(new PamongImport, public_path('/uploads/excel/') . $file_name);

            Alert::success('Sukses', 'Data telah di import');
            return redirect('/account/pamong');
        } catch (\Throwable $th) {
            Alert::error('Error', 'Tidak sesuai format, atau data sudah ada');
            return redirect('/account/pamong');
        }
    }
}
