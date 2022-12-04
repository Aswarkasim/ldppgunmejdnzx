<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serdik extends Model
{
    use HasFactory;
    protected $guarded = [];

    function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'no_ukg', 'no_ukg');
    }
}
