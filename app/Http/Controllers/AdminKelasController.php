<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Ramsey\Uuid\Uuid;
use App\Imports\KelasImport;
use App\Models\Adminkelasrole;
use App\Models\KelasPeserta;
use App\Models\Matakuliah;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class AdminKelasController extends Controller
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
            $kelas = Kelas::with(['kelaspeserta'])->where('name', 'like', '%' . $cari . '%')->wherePeriodeId($periode_id)->orderBy('name', 'asc')->paginate(10);
        } else {
            $kelas = Kelas::with(['kelaspeserta'])->orderBy('name', 'asc')->wherePeriodeId($periode_id)->paginate(10);
        }
        $data = [
            'title'   => 'Kelas',
            'create'  => route('kelas.create'),
            'kelas' => $kelas,
            'content' => 'admin/kelas/index'
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
            'title'   => 'Tambah Kelas',
            'store'    => route('kelas.store'),
            'content' => 'admin/kelas/add'
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
        ]);
        $data['periode_id'] = Session::get('periode_id');
        Kelas::create($data);
        Alert::success('Sukses', 'Kelas telah ditambahkan');
        return redirect('/account/kelas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //   //
        $kelas = Kelas::find($id);
        $kelas_Peserta = KelasPeserta::with(['mahasiswa', 'kelas'])->whereKelasId($id)->get();
        $admin = Adminkelasrole::with('user')->whereKelasId($id)->get();
        // dd($kelas);
        $data = [
            'title'   => 'Peserta Kelas ' . $kelas->name,
            'kelas'    => $kelas_Peserta,
            'admin'     => $admin,
            'content' => 'admin/kelas/show'
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
            'title'   => 'Tambah Kelas',
            'kelas' => Kelas::find($id),
            'store'    => route('kelas.store'),
            'content' => 'admin/kelas/add'
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
        $kelas = Kelas::find($id);
        $data = $request->validate([
            'name'              => 'required',
        ]);
        $kelas->update($data);
        Alert::success('Sukses', 'Kategori telah diubah');
        return redirect('/account/kelas');
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
        DB::table('kelas')->delete($id);
        Alert::success('success', 'Kelas telah dihapus');
        return redirect('/account/kelas');
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

        Excel::import(new KelasImport, public_path('/uploads/excel/') . $file_name);

        Alert::success('Sukses', 'Data telah di import');
        return redirect('/account/kelas');
        // } catch (\Throwable $th) {
        //     Alert::error('Error', 'Tidak sesuai format, atau data sudah ada');
        //     return redirect('/account/kelas');
        // }
    }

    function downloadFormat()
    {
        // return Storage::download('/public/docs/format-excel.xlsx');
        return response()->download('dokumen/format-kelas.xlsx');
    }

    function lihatNilai($kelas_id)
    {
        $periode_id = Session::get('periode_id');

        if ($periode_id == null) {
            $periode_id = auth()->user()->periode_id;
        }


        $matakuliah_id = request('matakuliah_id');
        $nilai = Nilai::with(['mahasiswa', 'matakuliah'])->whereKelasId($kelas_id)->whereMatakuliahId($matakuliah_id)->orderBy('mahasiswas.npm', 'desc')->get();
        // dd($nilai);
        $data = [
            'title'             => 'Detail Nilai dari ',
            'nilai'             => $nilai,
            'matakuliah'        => Matakuliah::wherePeriodeId($periode_id)->get(),
            'content'           => 'admin/kelas/nilai'
        ];
        return view('admin/layouts/wrapper', $data);
    }
}
