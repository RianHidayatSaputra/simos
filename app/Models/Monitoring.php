<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kode;
use App\Models\Siswa;
class Monitoring extends Model
{
    use HasFactory;
    protected $table = 'monitorings';
    protected $fillable = [
        'id_siswa',
	    'id_kode',
	    'tgl',
	    'keterangan',
    ];
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id'); // touch_points's model name.
    }
    public function kodes()
    {
        return $this->belongsTo(Kode::class,'id_kode','id'); // t_categories model name.
    }
    public function siswas(){
        return $this->hasMany(Siswa::class,'id')->selectRaw('siswas.*,sum(nis) as sum')->groupBy('nis');
    }
}
