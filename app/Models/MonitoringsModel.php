<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class MonitoringsModel extends Model
{
    
	public $id;
	public $id_siswa;
	public $id_kode;
	public $tgl;
	public $keterangan;
	public $created_at;
	public $updated_at;

}