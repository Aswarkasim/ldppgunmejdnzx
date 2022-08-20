<?php

namespace App\Http\Controllers;

use Ramsey\Uuid\Uuid;
use App\Models\Berkas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\VerifyHistory;
use App\Exports\MahasiswaExport;
use App\Imports\MahasiswaImport;
use App\Models\KelasPeserta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AdminMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $periode_id = Session::get('periode_id');
        $cari = request('cari');
        $filter = request('filter');

        if ($filter == null) {
            $filter = 'AKTIF';
        }

        if ($cari) {
            $mahasiswa = Mahasiswa::with('provinceBydomisili')->where('namalengkap', 'like', '%' . $cari . '%')->orWhere('no_ukg', 'like', '%' . $cari . '%')->whereIsRegistered(1)->wherePeriodeId($periode_id)->whereKeaktifan($filter)->latest()->paginate(10);
        } else {
            $mahasiswa = Mahasiswa::with('provinceBydomisili')->whereIsRegistered(1)->wherePeriodeId($periode_id)->whereKeaktifan($filter)->latest()->paginate(10);
        }



        $data = [
            'title'   => 'Mahasiswa',
            'mahasiswa' => $mahasiswa,
            'content' => 'admin/mahasiswa/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    public function kemendikbud()
    {
        //
        $periode_id = Session::get('periode_id');
        $cari = request('cari');
        $filter = request('filter');

        if (
            $filter == null
        ) {
            $filter = 'AKTIF';
        }

        $kementerian = 'KEMENDIKBUD';

        if ($cari) {
            $mahasiswa = Mahasiswa::with('provinceBydomisili')->where('namalengkap', 'like', '%' . $cari . '%')->orWhere('no_ukg', 'like', '%' . $cari . '%')->whereIsRegistered(1)->wherePeriodeId($periode_id)->whereKementerian($kementerian)->whereKeaktifan($filter)->latest()->paginate(10);
        } else {
            $mahasiswa = Mahasiswa::with('provinceBydomisili')->whereIsRegistered(1)->wherePeriodeId($periode_id)->whereKementerian($kementerian)->whereKeaktifan($filter)->latest()->paginate(10);
        }


        $data = [
            'title'   => 'Mahasiswa',
            'mahasiswa' => $mahasiswa,
            'content' => 'admin/mahasiswa/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    public function kemenag()
    {
        //
        $periode_id = Session::get('periode_id');
        $cari = request('cari');
        $kementerian = 'KEMENAG';

        $filter = request('filter');

        if (
            $filter == null
        ) {
            $filter = 'AKTIF';
        }

        if ($cari) {
            $mahasiswa = Mahasiswa::with('provinceBydomisili')->where('namalengkap', 'like', '%' . $cari . '%')->orWhere('no_ukg', 'like', '%' . $cari . '%')->whereIsRegistered(1)->wherePeriodeId($periode_id)->whereKementerian($kementerian)->whereKeaktifan($filter)->latest()->paginate(10);
        } else {
            $mahasiswa = Mahasiswa::with('provinceBydomisili')->whereIsRegistered(1)->wherePeriodeId($periode_id)->whereKementerian($kementerian)->whereKeaktifan($filter)->latest()->paginate(10);
        }


        $data = [
            'title'   => 'Mahasiswa',
            'mahasiswa' => $mahasiswa,
            'content' => 'admin/mahasiswa/index'
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
            'title'   => 'Tambah Mahasiswa',
            'store'    => route('mahasiswa.store'),
            'content' => 'admin/mahasiswa/add'
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
            'no_ukg'           => 'required|unique:mahasiswas',
            'namalengkap'              => 'required',
            'kementerian'              => 'required',
            'npm'                  => 'required'
        ]);
        $data['periode_id'] = Session::get('periode_id');
        Mahasiswa::create($data);
        Alert::success('Sukses', 'Mahasiswa telah ditambahkan');
        return redirect('/account/mahasiswa/notregisted');
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
        $mahasiswa = Mahasiswa::find($id);
        $user_id = $mahasiswa->user_id;
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
            'mahasiswa' => $mahasiswa,
            'link_route' => '/account/verifikasi/show/',
            'content' => 'admin/verifikasi/show'
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
            'title'   => 'Edit Mahasiswa',
            'mahasiswa' => Mahasiswa::find($id),
            // 'store'    => route('mahasiswa.update'),
            'content' => 'admin/mahasiswa/add'
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
        $mahasiswa = Mahasiswa::find($id);
        $data = $request->validate([
            'no_ukg'                   => 'required|unique:mahasiswas,no_ukg,' . $mahasiswa->id,
            'namalengkap'              => 'required',
            'kementerian'              => 'required',
            'npm'                      => 'required'
        ]);
        $data['periode_id'] = Session::get('periode_id');
        $data['status'] = 'LENGKAPI';
        $mahasiswa->update($data);
        Alert::success('Sukses', 'Mahasiswa telah diedit');
        return redirect('/account/mahasiswa/notregisted');
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
        // die('masuk');
        DB::table('mahasiswas')->delete($id);
        Alert::success('success', 'Mahasiswa telah dihapus');
        return redirect('/account/mahasiswa/notregisted');
    }

    function notRegis()
    {

        $periode_id = Session::get('periode_id');
        // $mahasiswa = Mahasiswa::with('provinceBydomisili')->whereIsRegistered(0)->wherePeriodeId($periode_id)->latest()->paginate(10);

        $cari = request('cari');

        if ($cari) {
            $mahasiswa = Mahasiswa::with('provinceBydomisili')->where('namalengkap', 'like', '%' . $cari . '%')->orWhere('no_ukg', 'like', '%' . $cari . '%')->whereIsRegistered(0)->wherePeriodeId($periode_id)->latest()->paginate(10);
        } else {
            $mahasiswa = Mahasiswa::with('provinceBydomisili')->whereIsRegistered(0)->wherePeriodeId($periode_id)->latest()->paginate(10);
        }

        $data = [
            'title'   => 'Mahasiswa',
            'mahasiswa' => $mahasiswa,
            'content' => 'admin/mahasiswa/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    function notInVerified()
    {

        $periode_id = Session::get('periode_id');
        // $mahasiswa = Mahasiswa::with('provinceBydomisili')->whereIsRegistered(0)->wherePeriodeId($periode_id)->latest()->paginate(10);

        $cari = request('cari');

        if ($cari) {
            $mahasiswa = Mahasiswa::with('provinceBydomisili')->where('namalengkap', 'like', '%' . $cari . '%')->orWhere('no_ukg', 'like', '%' . $cari . '%')->whereIsRegistered(1)->whereStatus('LENGKAPI')->wherePeriodeId($periode_id)->latest()->paginate(10);
        } else {
            $mahasiswa = Mahasiswa::with('provinceBydomisili')->whereIsRegistered(1)->whereStatus('LENGKAPI')->wherePeriodeId($periode_id)->latest()->paginate(10);
        }

        $data = [
            'title'   => 'Mahasiswa',
            'mahasiswa' => $mahasiswa,
            'content' => 'admin/mahasiswa/index'
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
        $periode_id = Session::get('periode_id');
        $filter = request('filter');
        if ($filter == null) {
            $filter = 'AKTIF';
        }
        // die($filter);
        return Excel::download(new MahasiswaExport($filter, $periode_id), 'mahasiswa.xlsx');
    }

    function downloadFormat()
    {
        // return Storage::download('/public/docs/format-excel.xlsx');
        return response()->download('dokumen/format-mahasiswa.xlsx');
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

            $kelasPeserta = KelasPeserta::with('kelas')->whereNoUkg($item->no_ukg)->first();
            // dd($kelasPeserta);
            // if (isset($kelasPeserta)) {
            //     $item->kelas_name = $kelasPeserta->kelas->name;
            // }

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

    function uploadBuktiMengundurkanDiri(Request $request)
    {

        // dd($request->all());
        $mahasiswa_id = $request->mahasiswa_id;
        // $profile = Mahasiswa::whereUserId($user_id)->first();

        // $request->validate([
        //     'bukti_keaktifan'  => 'mimes:pdf',
        // ]);

        // $bukti_keaktifan = $request->hasFile('bukti_keaktifan');
        // dd($request->all());
        $profile = Mahasiswa::find($mahasiswa_id);

        if ($profile->bukti_keaktifan != null) {
            unlink($profile->bukti_keaktifan);
        }

        //masih belum bagus
        $bukti_keaktifan = $request->file('bukti_keaktifan');
        // dd($bukti_keaktifan);
        $uuid1 = Uuid::uuid4()->toString();
        $uuid2 = Uuid::uuid4()->toString();
        $file_name = $uuid1 . $uuid2 . '.' . $bukti_keaktifan->getClientOriginalExtension();

        $storage = 'uploads/bukti_keaktifan/';
        $bukti_keaktifan->move($storage, $file_name);
        // $data['path'] = $storage;
        $data['bukti_keaktifan'] =  $storage . $file_name;
        $profile->update($data);
        Alert::success('Sukses', 'Berkas diupload');
        return redirect('/account/verifikasi/biodata/' . $profile->user_id);
    }

    function updateAlasan(Request $request)
    {
        // dd($request->all());
        $profile = Mahasiswa::find($request->mahasiswa_id);
        // dd($profile);
        $data = [
            'alasan'    => $request->alasan
        ];
        $profile->update($data);
        Alert::success('Sukses', 'Berkas diupload');
        return redirect('/account/verifikasi/biodata/' . $profile->user_id);
    }

    function sinkron()
    {
        $this->updateNameById();
        return redirect('/account/mahasiswa/kemendikbud');
    }
}
