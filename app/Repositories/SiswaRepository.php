<?php
namespace App\Repositories;

use App\Models\SiswasModel;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SiswaRepository extends SiswasModel
{
    // TODO : Make your own query methods
    public static function getAll(){
        return DB::table('siswas')
            ->join('rombels', 'rombels.id', '=' , 'siswas.id_rombel')
            ->join('orangtuas', 'orangtuas.id', '=' , 'siswas.id_ortu')
            ->join('rayons','rayons.id', '=' , 'siswas.id_rayon')
            ->join('gurus','gurus.id', '=' , 'siswas.id_guru')
            ->select('rombels.rombel' , 'orangtuas.nama_ortu as ortu_name','rayons.rayon','gurus.name as guru_name' , 'siswas.*')
            ->get();
    }

    public static function adddata(Request $request){
        DB::table('siswas')->insert([
            'nis' => $request->nis,
            'name' => $request->name,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'id_rombel' => $request->id_rombel,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'id_ortu' => $request->id_ortu,
            'id_rayon' => $request->id_rayon,
            'id_guru' => $request->id_guru,
        ]);
    }

    public static function updatedata(Request $request){
        DB::table('siswas')->where('id',$request->id)->update([
            'nis' => $request->nis,
            'name' => $request->name,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'id_rombel' => $request->id_rombel,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'id_ortu' => $request->id_ortu,
            'id_rayon' => $request->id_rayon,
            'id_guru' => $request->id_guru,
        ]);
    }

    public static function deletedata($id){
        DB::table('siswas')->where('id',$id)->delete();
    }
}