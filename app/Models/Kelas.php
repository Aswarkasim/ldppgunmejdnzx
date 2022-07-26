<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $guarded = [];

    function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'no_ukg', 'no_ukg');
    }
}
