<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kode;
class Monitoring extends Model
{
    use HasFactory;

    public function rayon(){
        return $this->belongsTo(Kode::class, 'id_kode', 'id');
    }
}
