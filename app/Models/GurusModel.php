<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class GurusModel extends Model
{
    
	public $id;
	public $name;
	public $alamat;
	public $no_ktp;
	public $username;
	public $password;
	public $level;
	public $created_at;
	public $updated_at;

}