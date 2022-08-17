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
        return $this->belongsTo(Periode::class)->with('jenisPpg');
    }

    function province()
    {
        return $this->belongsTo(Province::class);
    }

    function kabupaten()
    {
        return $this->belongsTo(kabupaten::class);
    }

    function provinceBydomisili()
    {
        return $this->belongsTo(Province::class, 'provinsi_tempat_tinggal');
    }

    function kabupatenByDomisili()
    {
        return $this->belongsTo(Regency::class, 'kabupaten_tempat_tinggal');
    }

    function kabupatenByPts1()
    {
        return $this->belongsTo(Regency::class, 'kabupaten_kota_pt_s1');
    }

    function provinceByPts1()
    {
        return $this->belongsTo(Province::class, 'provinsi_pt_s1');
    }

    function kabupatenByPts2()
    {
        return $this->belongsTo(Regency::class, 'kabupaten_kota_pt_s2');
    }

    function provinceByPts2()
    {
        return $this->belongsTo(Province::class, 'provinsi_pt_s2');
    }

    function provinceByOrangtua()
    {
        return $this->belongsTo(Province::class, 'provinsi_orangtua');
    }

    function kabupatenByOrangtua()
    {
        return $this->belongsTo(Regency::class, 'kabupaten_orangtua');
    }
}
