<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ppi extends Model
{
    use HasFactory;

    protected $guarded = [];

    function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    function kabupaten()
    {
        return $this->belongsTo(Regency::class);
    }

    function periode()
    {
        return $this->belongsTo(Periode::class)->with('jenisPpg');
    }
}
