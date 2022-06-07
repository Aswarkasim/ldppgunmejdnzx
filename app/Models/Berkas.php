<?php

namespace App\Models;

use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Berkas extends Model
{
    use HasFactory;

    protected $guarded = [];

    function kelengkapan()
    {
        return $this->belongsTo(Kelengkapan::class);
    }

    function user()
    {
        return $this->belongsTo(User::class)->with('mahasiswa');
    }
}
