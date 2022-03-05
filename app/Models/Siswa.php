<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rombel;
use App\Models\Guru;
use App\Models\Orangtua;
use App\Models\Rayon;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas';

    protected $fillable = [
        'nis',
        'name',
        'alamat',
        'no_telp',
        'id_rombel',
        'username',
        'password',
        'id_ortu',
        'id_rayon',
        'id_guru',
    ];

    public function rombel(){
        return $this->belongsTo(Rombel::class, 'id_rombel', 'id');
    }
    public function guru(){
        return $this->belongsTo(Guru::class, 'id_guru', 'id');
    }
    public function ortu(){
        return $this->belongsTo(Orangtua::class, 'id_guru', 'id');
    }
    public function rayon(){
        return $this->belongsTo(Rayon::class, 'id_guru', 'id');
    }
}   

