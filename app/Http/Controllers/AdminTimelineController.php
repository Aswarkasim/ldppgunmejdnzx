<?php

namespace App\Http\Controllers;

use App\Models\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AdminTimelineController extends Controller
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

        if ($cari) {
            $timeline = Timeline::where('title', 'like', '%' . $cari . '%')->latest()->paginate(10);
        } else {
            $timeline = Timeline::latest()->paginate(10);
        }
        $data = [
            'title'   => 'Timeline',
            'create'  => route('timeline.create'),
            'timeline' => $timeline,
            'content' => 'admin/timeline/index'
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
            'title'   => 'Tambah Timeline',
            'store'    => route('timeline.store'),
            'content' => 'admin/timeline/add'
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
            'title'              => 'required',
            'desc'              => 'required|min:3',
            'start'              => 'required',
            'is_done'              => 'required',
        ]);
        $data['end']    = $request->end;

        Timeline::create($data);
        Alert::success('Sukses', 'Timeline telah ditambahkan');
        return redirect('/account/timeline');
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
            'title'   => 'Tambah Timeline',
            'timeline' => Timeline::find($id),
            'store'    => route('timeline.store'),
            'content' => 'admin/timeline/add'
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
        $timeline = Timeline::find($id);
        $data = $request->validate([
            'title'              => 'required',
            'desc'              => 'required|min:3',
            'start'              => 'required',
            'is_done'              => 'required',
        ]);
        $data['end']    = $request->end;
        $timeline->update($data);
        Alert::success('Sukses', 'Kategori telah diubah');
        return redirect('/account/timeline');
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
        DB::table('timelines')->delete($id);
        Alert::success('success', 'Timeline telah dihapus');
        return redirect('/account/timeline');
    }
}
