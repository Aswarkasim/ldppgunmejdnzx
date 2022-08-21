<?php

namespace App\Exports;

use App\Models\Pamong;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class PamongExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function view(): View
    {
        $data['pamong'] = Pamong::all();
        return view('admin.pamong.export', $data);
    }
}
