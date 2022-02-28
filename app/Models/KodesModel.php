<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class KodesModel extends Model
{
    
	public $id;
	public $kode;
	public $deskripsi;
	public $skor;
	public $jenis;
	public $created_at;
	public $updated_at;

}