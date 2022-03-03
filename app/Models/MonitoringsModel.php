<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;
use App\Models\SiswasModel;

class MonitoringsModel extends Model
{
    
	public $id;
	public $id_siswa;
	public $id_kode;
	public $tgl;
	public $keterangan;
	public $created_at;
	public $updated_at;

	public function Siswa(){
        return SiswaModel::find($this->id_siswa);
    }
}