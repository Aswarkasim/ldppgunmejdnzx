<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Ramsey\Uuid\Uuid;
use RealRashid\SweetAlert\Facades\Alert;

class AdminSuratController extends Controller
{
    //

    function ppi()
    {
        $periode_id = Session::get('periode_id');
        $surat = Surat::whereName('PPI')->wherePeriodeId($periode_id)->first();
        if ($surat == null) {
            $dataSurat = [
                'name'  => 'PPI',
                'periode_id' => $periode_id
            ];
            Surat::create($dataSurat);
        }

        $surat = Surat::whereName('PPI')->wherePeriodeId($periode_id)->first();

        $data = [
            'title'   => 'Surat PPI',
            'surat' => $surat,
            'content' => 'admin/surat/ppi'
        ];
        return view('admin/layouts/wrapper', $data);
    }


    function skbs()
    {
        $periode_id = Session::get('periode_id');
        $surat = Surat::whereName('SKBS')->wherePeriodeId($periode_id)->first();
        if ($surat == null) {
            $dataSurat = [
                'name'  => 'SKBS',
                'periode_id' => $periode_id
            ];
            Surat::create($dataSurat);
        }

        $surat = Surat::whereName('SKBS')->wherePeriodeId($periode_id)->first();

        $data = [
            'title'   => 'Surat SKBS',
            'surat' => $surat,
            'content' => 'admin/surat/skbs'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    function savePpi(Request $request, $id)
    {
        // die('masuk');
        $surat = Surat::find($id);
        $data = $request->validate([
            // 'perihal'           => 'required',
            'nomor_surat_awal'   => 'required',
            'nomor_surat_akhir'  => 'required',
            'jabatan_ttd'        => 'required',
            'nama_ttd'        => 'required',
            'nip'                => 'required',
            // 'body'               => 'required',
        ]);

        $data['perihal']   = $request->perihal;
        $data['body']   = $request->body;
        $data['tembusan_kemendikbud']   = $request->tembusan_kemendikbud;
        $data['tembusan_kemenag']       = $request->tembusan_kemenag;
        $data['point_mk_kemendikbud']   = $request->point_mk_kemendikbud;
        $data['point_mk_kemenag']       = $request->point_mk_kemenag;

        $typesurat = $request->name;
        $surat->update($data);

        Alert::success('Sukses', 'Surat Disimpan');
        return redirect('/account/surat/' . $typesurat);
    }




    function uploadTtd(Request $request)
    {
        // die('masuk');
        $request->validate([
            'ttd'    => 'mimes:png',
        ]);
        $name = $request->name;
        $surat = Surat::find($request->id);

        if ($surat->ttd != null) {
            unlink($surat->path . $surat->ttd);
        }

        $ttd = $request->file('ttd');
        $uuid1 = Uuid::uuid4()->toString();
        $uuid2 = Uuid::uuid4()->toString();
        $file_name = $uuid1 . $uuid2 . '.' . $ttd->getClientOriginalExtension();

        $storage = 'uploads/images/';
        $ttd->move($storage, $file_name);
        $data['ttd'] =  $storage . $file_name;

        $surat->update($data);
        Alert::success('Sukses', 'Surat diupload');
        return redirect('/account/surat/' . $name . '?type=' . $name);
    }


    function uploadParaf(Request $request)
    {
        // die('masuk');
        $request->validate([
            'paraf'    => 'mimes:png',
        ]);
        $surat = Surat::find($request->id);

        $name = $request->name;
        if ($surat->paraf != null) {
            unlink($surat->paraf);
        }

        $paraf = $request->file('paraf');
        $uuid1 = Uuid::uuid4()->toString();
        $uuid2 = Uuid::uuid4()->toString();
        $file_name = $uuid1 . $uuid2 . '.' . $paraf->getClientOriginalExtension();

        $storage = 'uploads/images/';
        $paraf->move($storage, $file_name);
        $data['paraf'] =  $storage . $file_name;

        $surat->update($data);
        Alert::success('Sukses', 'Surat diupload');
        return redirect('/account/surat/' . $name . '?type=' . $name);
    }

    function previewPpi($id)
    {
        // $periode_id = Session::get('periode_id');

        $data['surat'] = Surat::find($id);
        return view('admin.ppi.cetak_surat', $data);
    }

    function previewSkbs($id)
    {
        // $periode_id = Session::get('periode_id');

        $data['surat'] = Surat::find($id);
        return view('admin.mahasiswa.cetak_skbs', $data);
    }

    function downloadTtd()
    {
        $ttd = request('ttd');

        return response()->download($ttd);
        // return redirect('/account/kelas/' . $kelas_id);
    }
}
