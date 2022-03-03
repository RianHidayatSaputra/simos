<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;
use App\Models\RombelsModel;
use App\Models\OrangtuasModel;
use App\Models\RayonsModel;
use App\Models\GurusModel;

class SiswasModel extends Model
{
    
	public $id;
	public $nis;
    public $name;
    public $alamat;
    public $no_telp;
    public $id_rombel;
    public $username;
    public $password;
    public $id_ortu;
    public $id_rayon;
    public $id_guru;
	public $created_at;
	public $updated_at;

	public function Rombel(){
        return RombelsModel::find($this->id_rombel);
    }
    public function Ortu(){
    	return OrangtuasModel::find($this->id_ortu);
    }
    public function Rayon(){
    	return RayonsModel::find($this->id_rayon);
    }
    public function Guru(){
    	return GurusModel::find($this->id_guru);
    }
}