<?php

namespace App\Http\Controllers;

use Ramsey\Uuid\Uuid;
use App\Models\Mahasiswa;
use App\Models\KelasPeserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Imports\KelasPesertaImport;
use App\Models\Nilai;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class AdminKelasPesertaController extends Controller
{
    public function create(Request $request)
    {
        //
        $kelas_id = $request->kelas_id;
        $no_ukg = $request->no_ukg;
        // die($no_ukg);
        $mahasiswa = Mahasiswa::whereNoUkg($no_ukg)->first();
        if ($mahasiswa == null) {
            Alert::error('Error', 'Nomor UKG/Peg.ID tidak ditemukan');
        } else {
            $data = [
                'periode_id'    => Session::get('periode_id'),
                'kelas_id'      => $kelas_id,
                'no_ukg'        => $no_ukg
            ];
            KelasPeserta::create($data);
            Alert::success('Sukses', $mahasiswa->namalengkap . ' ditambahkan');
            return redirect('/account/kelas/' . $kelas_id);
        }
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

        Excel::import(new KelasPesertaImport($request->kelas_id), public_path('/uploads/excel/') . $file_name);

        Alert::success('Sukses', 'Data telah di import');
        return redirect('/account/kelas/' . $request->kelas_id);
        // } catch (\Throwable $th) {
        //     Alert::error('Error', 'Tidak sesuai format, atau data sudah ada');
        //     return redirect('/account/kelas/' . $request->kelas_id);
        // }
    }

    function detailPeserta($no_ukg)
    {
        $mahasiswa = Mahasiswa::whereNoUkg($no_ukg)->first();
        $kelas_id = request('kelas_id');
        $nilai = Nilai::with(['matakuliah'])->whereNoUkg($no_ukg)->whereKelasId($kelas_id)->get();
        // dd($nilai);
        $data = [
            'title'   => 'Detail Nilai dari ' . $mahasiswa->namalengkap,
            'mahasiswa'    => $mahasiswa,
            'nilai'    => $nilai,
            'content' => 'admin/kelas/peserta-detail'
        ];
        return view('admin/layouts/wrapper', $data);
    }



    function downloadFormat()
    {
        // return Storage::download('/public/docs/format-excel.xlsx');
        return response()->download('dokumen/format-peserta.xlsx');
    }

    public function delete($id)
    {
        //
        $peserta = KelasPeserta::find($id);
        DB::table('kelas_pesertas')->delete($id);
        Alert::success('success', 'Peserta telah dikeluarkan');
        return redirect('/account/kelas/' . $peserta->kelas_id);
    }
}
