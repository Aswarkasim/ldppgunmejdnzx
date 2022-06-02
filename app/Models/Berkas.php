<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    use HasFactory;

    protected $guarded = [];

    function kelengkapan()
    {
        return $this->belongsTo(Kelengkapan::class);
    }
}
