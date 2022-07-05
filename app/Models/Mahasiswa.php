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

    function province()
    {
        return $this->belongsTo(Province::class, 'provinsi_tempat_tinggal');
    }

    function kabupaten()
    {
        return $this->belongsTo(Regency::class, 'provinsi_tempat_tinggal');
    }
}
