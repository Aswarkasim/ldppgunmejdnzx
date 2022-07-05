<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;

    protected $guarded = [];

    function jenisPpg()
    {
        return $this->belongsTo(JenisPpg::class);
    }
}
