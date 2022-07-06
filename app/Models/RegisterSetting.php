<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterSetting extends Model
{
    use HasFactory;

    function periode()
    {
        return $this->belongsTo(Periode::class);
    }

    function jenis_ppg()
    {
        return $this->belongsTo(JenisPpg::class);
    }
}
