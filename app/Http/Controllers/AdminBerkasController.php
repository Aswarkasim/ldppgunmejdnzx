<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use App\Models\Kelengkapan;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use RealRashid\SweetAlert\Facades\Alert;

class AdminBerkasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_id = auth()->user()->id;
        $noukg = auth()->user()->no_ukg;
        //get data mahasiswa web user id = $user_id and noukg = $noukg

        $kelengkapan = Kelengkapan::get();
        foreach ($kelengkapan as $item) {
            $cek = Berkas::whereUserId($user_id)->whereKelengkapanId($item->id)->first();
            if ($cek == false) {
                $data = [
                    'user_id'           => $user_id,
                    'kelengkapan_id'    => $item->id,
                ];
                Berkas::create($data);
            }
        }
        $berkas = Berkas::with('kelengkapan')
            ->whereUserId($user_id)
            ->get();
        $berkas->sortBy(function ($berkas) {
            return $berkas->kelengkapan->name;
        });

        $data = [
            'title'   => 'Manajemen Berkas',
            'create'  => route('kelengkapan.create'),
            // 'berkas'  => Berkas::with('kelengkapan')->whereUserId($user_id)->get(),
            'berkas' => $berkas,
            'content' => 'admin/berkas/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    function upload(Request $request)
    {

        $messages = [
            'berkas' . $request->id . '.mimes' => 'Format file harus .pdf',
        ];

        $request->validate([
            'berkas' . $request->id   => 'mimes:pdf',
        ], $messages);
        $berkasData = Berkas::find($request->id);

        if ($berkasData->berkas != null) {
            unlink($berkasData->path . $berkasData->berkas);
        }

        $berkas = $request->file('berkas' . $request->id);
        $uuid1 = Uuid::uuid4()->toString();
        $uuid2 = Uuid::uuid4()->toString();
        $file_name = $uuid1 . $uuid2 . '.' . $berkas->getClientOriginalExtension();

        $storage = 'uploads/berkas/';
        $berkas->move($storage, $file_name);
        $data['path'] = $storage;
        $data['berkas'] =  $file_name;
        $data['status'] = 'PENDING';

        $berkasData->update($data);
        Alert::success('Sukses', 'Berkas diupload');
        return redirect('/account/berkas');
    }
}
