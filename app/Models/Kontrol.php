<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontrol extends Model
{
    // use HasFactory;

    protected $table = 'kontrols';
    protected $fillable = [
            'id_siswa',
            'catatan',
            'image',
    ];
}
