<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Ramsey\Uuid\Uuid;
use App\Exports\DosenExport;
use App\Imports\DosenImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
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

        $data['nama_bank']   = 'BNI';

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
            'nip'                   => 'required|unique:dosens,nip,' . $dosen->id,
            'namalengkap'           => 'required',
            'nomor_serdos'          => 'required',
            'npwp'                  => 'required',
            'pangkat_golongan'      => 'required',
            'alamat_rumah'          => 'required',
            'nohp'                  => 'required',
            'nomor_rekening'        => 'required',
            'nama_pemilik'          => 'required',
        ]);

        $data['nama_bank']   = 'BNI';

        $dosen->update($data);
        Alert::success('Sukses', 'Dosen telah diedit');
        return redirect('/account/dosen/' . $id . '/edit');
    }

    function show($id)
    {
        $dosen  = Dosen::find($id);

        $data = [
            'title'   => 'Data Dosen',
            'dosen' => $dosen,
            'content' => 'admin/dosen/show'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    function destroy($id)
    {
        DB::table('dosens')->delete($id);
        Alert::success('success', 'Dosen telah dihapus');
        return redirect('/account/dosen');
    }

    function exportExcel()
    {

        // $this->updateNameById();

        // die($filter);
        return Excel::download(new DosenExport(), 'dosen.xlsx');
    }

    function downloadFormat()
    {
        // return Storage::download('/public/docs/format-excel.xlsx');
        return response()->download('dokumen/format-dosen.xlsx');
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

            Excel::import(new DosenImport, public_path('/uploads/excel/') . $file_name);

            Alert::success('Sukses', 'Data telah di import');
            return redirect('/account/dosen');
        } catch (\Throwable $th) {
            Alert::error('Error', 'Tidak sesuai format, atau data sudah ada');
            return redirect('/account/dosen');
        }
    }
}
