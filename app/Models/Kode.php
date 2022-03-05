<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kode extends Model
{
    use HasFactory;

    protected $table = 'kodes';

    protected $fillable = [
        'kode',
        'deskripsi',
        'skor',
        'jenis',
    ];

}
