<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $guarded = [];

    function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class);
    }
}
