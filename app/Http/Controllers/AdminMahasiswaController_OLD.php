<?php

namespace App\Http\Controllers;

use Ramsey\Uuid\Uuid;
use App\Models\Berkas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\VerifyHistory;
use App\Exports\MahasiswaExport;
use App\Imports\MahasiswaImport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class AdminMahasiswaController extends Controller
{
    //
    function index()
    {
        $periode_id = Session::get('periode_id');
        $cari = request('cari');
        $kementerian = request('kementerian');

        if ($cari) {
            $mahasiswa = Mahasiswa::with('provinceBydomisili')->where('namalengkap', 'like', '%' . $cari . '%')->orWhere('no_ukg', 'like', '%' . $cari . '%')->whereIsRegistered(1)->wherePeriodeId($periode_id)->whereKementerian($kementerian)->latest()->paginate(10);
        } else {
            $mahasiswa = Mahasiswa::with('provinceBydomisili')->whereIsRegistered(1)->wherePeriodeId($periode_id)->whereKementerian($kementerian)->latest()->paginate(10);
        }


        $data = [
            'title'   => 'Mahasiswa',
            'mahasiswa' => $mahasiswa,
            'content' => 'admin/mahasiswa/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }


    // function 


    public function destroy($id)
    {
        die('masuk');
        DB::table('mahasiswas')->delete($id);
        Alert::success('success', 'Mahasiswa telah dihapus');
        return redirect('/account/mahasiswa/notregisted');
    }

    function notRegis()
    {

        $periode_id = Session::get('periode_id');
        $mahasiswa = Mahasiswa::with('provinceBydomisili')->whereIsRegistered(0)->wherePeriodeId($periode_id)->latest()->paginate(10);

        $data = [
            'title'   => 'Mahasiswa',
            'mahasiswa' => $mahasiswa,
            'content' => 'admin/mahasiswa/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    function show($user_id)
    {

        $periode_id = Auth::user()->periode_id;
        $verificator_id  = Auth::user()->id;
        $cek_history = VerifyHistory::wherePeriodeId($periode_id)->whereVerificatorId($verificator_id)->whereMahasiswaId($user_id)->first();
        // $berkas = Berkas::with('kelengkapan')->whereUserId($user_id)->get();
        $berkas = Berkas::whereHas('kelengkapan', function ($q) {
            $q->where('is_verified', 1);
        })->whereUserId($user_id)->get();
        // @dd($berkas);
        $berkas_id = request('berkas_id');
        $berkas_data = Berkas::find($berkas_id);
        $data = [
            'title'   => 'Verifikasi Berkas',
            'berkas' => $berkas,
            'user_id' => $user_id,
            'cek_history'      => $cek_history,
            'berkas_data' => $berkas_data,
            'mahasiswa' => Mahasiswa::whereUserId($user_id)->first(),
            'link_route' => '/account/verifikasi/show/',
            'content' => 'admin/verifikasi/show'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    function biodata($user_id)
    {
        $mahasiswa = Mahasiswa::with([
            'bidang_studi',
            'provinceBydomisili',
            'kabupatenByDomisili',
            'kabupatenByPts1',
            'provinceByPts1',
            'kabupatenByPts2',
            'provinceByPts2',
            'provinceByOrangtua',
            'kabupatenByOrangtua'
        ])->whereUserId($user_id)->first();
        // dd($mahasiswa);
        $data = [
            'title'   => 'Verifikasi Data',
            'mahasiswa' => $mahasiswa,
            'berkas'    => Berkas::whereUserId($user_id)->get(),
            'content' => 'admin/verifikasi/biodata'
        ];
        return view('admin/layouts/wrapper', $data);
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

            Excel::import(new MahasiswaImport, public_path('/uploads/excel/') . $file_name);

            Alert::success('Sukses', 'Data telah di import');
            return redirect('/account/mahasiswa/notregisted');
        } catch (\Throwable $th) {
            Alert::error('Error', 'Tidak sesuai format, atau data sudah ada');
            return redirect('/account/mahasiswa/notregisted');
        }
    }

    function exportExcel()
    {

        $this->updateNameById();
        return Excel::download(new MahasiswaExport(), 'mahasiswa.xlsx');
    }

    function updateNameById()
    {
        $periode_id = Session::get('periode_id');
        $mahasiswa = Mahasiswa::with([
            'bidang_studi',
            'provinceBydomisili',
            'kabupatenByDomisili',
            'kabupatenByPts1',
            'provinceByPts1',
            'kabupatenByPts2',
            'provinceByPts2',
            'provinceByOrangtua',
            'kabupatenByOrangtua'
        ])->wherePeriodeId($periode_id)->get();

        foreach ($mahasiswa as $item) {

            if (isset($item->bidang_studi)) {
                $item->bidang_studi_name = $item->bidang_studi->name;
            }

            if (isset($item->kabupatenByDomisili)) {
                $item->kabupaten_tempat_tinggal_name = $item->kabupatenByDomisili->name;
            }

            if (isset($item->provinceBydomisili)) {
                $item->provinsi_tempat_tinggal_name = $item->provinceBydomisili->name;
            }

            if (isset($item->kabupatenByPts1)) {
                $item->kabupaten_kota_pt_s1_name = $item->kabupatenByPts1->name;
            }

            if (isset($item->provinceByPts1)) {
                $item->provinsi_pt_s1_name = $item->provinceByPts1->name;
            }

            if (isset($item->kabupatenByPts2)) {
                $item->kabupaten_kota_pt_s2_name = $item->kabupatenByPts2->name;
            }

            if (isset($item->provinceByPts2)) {
                $item->provinsi_pt_s2_name = $item->provinceByPts2->name;
            }

            if (isset($item->kabupatenByOrangtua)) {
                $item->kabupaten_orangtua_name = $item->kabupatenByOrangtua->name;
            }

            if (isset($item->kabupatenByOrangtua)) {
                $item->provinsi_orangtua_name = $item->provinceByOrangtua->name;
            }
            $item->save();
        }
    }

    function updatePeriode()
    {
        $periode_id = Session::get('periode_id');
        $mahasiswa = Mahasiswa::wherePeriodeId(null)->get();
        foreach ($mahasiswa as $item) {
            $item->periode_id = $periode_id;
            $item->save();
        }
        Alert::success('Sukses', 'Periode telah perbaharui');
        return redirect('/account/dashboard');
    }
}
