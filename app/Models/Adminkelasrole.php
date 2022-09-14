<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adminkelasrole extends Model
{
    use HasFactory;

    protected $guarded = [''];

    function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }
}
