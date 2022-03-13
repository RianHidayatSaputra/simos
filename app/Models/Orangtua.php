<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orangtua extends Model
{
    use HasFactory;
protected $table = 'orangtuas';
    protected $fillable = [
        'nama_ortu',
        'alamat',
        'no_telp',
        'username',
        'password',

    ];

}
