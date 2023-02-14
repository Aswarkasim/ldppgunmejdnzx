<?php

namespace App\Http\Controllers;

use App\Exports\NilaiExport;
use App\Imports\SerdikImport;
use App\Models\Serdik;
use Illuminate\Http\Request;
use Illuminate\Http\Testing\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Ramsey\Uuid\Uuid;
use RealRashid\SweetAlert\Facades\Alert;
use ZanySoft\Zip\Zip;
use Illuminate\Support\Facades\Storage;


class AdminSerdikController extends Controller
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

        if ($periode_id == null) {
            $periode_id = auth()->user()->periode_id;
        }

        if ($cari) {
            $serdik = Serdik::with(['mahasiswa'])->where('no_ukg', 'like', '%' . $cari . '%')->orWhere('nomor_seri', 'like', '%' . $cari . '%')->wherePeriodeId($periode_id)->orderBy('no_ukg', 'asc')->paginate(10);
        } else {
            $serdik = Serdik::with(['mahasiswa'])->orderBy('no_ukg', 'asc')->wherePeriodeId($periode_id)->paginate(10);
        }
        $data = [
            'title'   => 'Serdik',
            'create'  => route('serdik.create'),
            'serdik' => $serdik,
            'content' => 'admin/serdik/index'
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
            'title'   => 'Tambah Serdik',
            'store'    => route('serdik.store'),
            'content' => 'admin/serdik/add'
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
            'no_ukg'              => 'required',
            'nomor_seri'              => 'required',
        ]);
        $data['periode_id'] = Session::get('periode_id');
        Serdik::create($data);
        Alert::success('Sukses', 'Serdik telah ditambahkan');
        return redirect('/account/serdik');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($no_ukg)
    {
        //   //
        $serdik = Serdik::with('mahasiswa')->whereNoUkg($no_ukg)->first();
        // dd($serdik);
        $path_serdik = '/uploads/serdik/' . $serdik->nomor_seri . '.pdf';
        $data = [
            'title'   => 'Peserta Serdik ',
            'serdik'    => $serdik,
            'path_serdik'    => $path_serdik,
            'content' => 'admin/serdik/show'
        ];
        return view('admin/layouts/wrapper', $data);
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
            'title'   => 'Tambah Serdik',
            'serdik' => Serdik::find($id),
            'store'    => route('serdik.store'),
            'content' => 'admin/serdik/add'
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
        $serdik = Serdik::find($id);
        $data = $request->validate([
            'no_ukg'              => 'required',
            'nomor_seri'              => 'required',

        ]);
        $serdik->update($data);
        Alert::success('Sukses', 'Kategori telah diubah');
        return redirect('/account/serdik');
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
        DB::table('serdiks')->delete($id);
        Alert::success('success', 'Serdik telah dihapus');
        return redirect('/account/serdik');
    }

    function import(Request $request)
    {


        // try {
        $file = $request->file('file');
        $uuid1 = Uuid::uuid4()->toString();
        $uuid2 = Uuid::uuid4()->toString();
        $file_name = $uuid1 . $uuid2 . '.' . $file->getClientOriginalExtension();

        // $file_name = time() . "_" . $file->getClientOriginalName();

        $storage = 'uploads/excel/';
        $file->move($storage, $file_name);
        // $data['file'] = $storage . $file_name;

        Excel::import(new SerdikImport, public_path('/uploads/excel/') . $file_name);

        Alert::success('Sukses', 'Data telah di import');
        return redirect('/account/serdik');
        // } catch (\Throwable $th) {
        //     Alert::error('Error', 'Tidak sesuai format, atau data sudah ada');
        //     return redirect('/account/serdik');
        // }
    }

    function downloadFormat()
    {
        // return Storage::download('/public/docs/format-excel.xlsx');
        return response()->download('dokumen/format-serdik.xlsx');
    }

    function uploadSerdik(Request $request)
    {
        $request->validate([
            'file'  => 'max:200',
        ]);


        //masih belum bagus
        $serdik = $request->file('serdik');
        // dd($serdik);
        $uuid1 = Uuid::uuid4()->toString();
        $uuid2 = Uuid::uuid4()->toString();
        $file_name = $uuid1 . $uuid2 . '.' . $serdik->getClientOriginalExtension();

        $storage = 'uploads/serdik/';
        $serdik->move($storage, $file_name);
        // $data['path'] = $storage;
        $this->extractZip($storage, $file_name);

        unlink($storage . $file_name);

        Alert::success('Sukses', 'Berkas diupload');
        return redirect('/account/serdik');
    }


    private function extractZip($storage, $file_name)
    {
        $zip = new Zip();
        $filepath = $storage . $file_name;
        $zip->open($filepath);
        return $zip->extract(public_path() . '/uploads/serdik');
    }

    function listFile()
    {


        $files = Storage::disk('folder-serdik')->allFiles();
        // dd($files);
        foreach ($files as $row) {
            echo substr($row, 0, -4) . '<br>';
        }
    }

    function checkFileExist()
    {
        if (file_exists('uploads/serdik/9004.pdf')) {
            echo 'ada';
        } else {
            echo 'Tidak Ada';
        }
    }
}
