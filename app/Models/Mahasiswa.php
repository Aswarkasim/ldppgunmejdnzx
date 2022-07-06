<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Polyfill\Intl\Idn\Resources\unidata\Regex;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function bidang_studi()
    {
        return $this->belongsTo(BidangStudi::class);
    }

    function periode()
    {
        return $this->belongsTo(Periode::class);
    }

    function provinceBydomisili()
    {
        return $this->belongsTo(Province::class, 'provinsi_tempat_tinggal');
    }

    function kabupatenByDomisili()
    {
        return $this->belongsTo(Regency::class, 'kabupaten_tempat_tinggal');
    }
}
