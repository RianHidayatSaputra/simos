<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Guru;
use App\Models\Rayon;

class Prombel extends Model
{
    use HasFactory;

    public function rayon(){
        return $this->belongsTo(Rayon::class, 'id_rayon', 'id');
    }
    public function guru(){
        return $this->belongsTo(Guru::class, 'id_guru', 'id');
    }
}
