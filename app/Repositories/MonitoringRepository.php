<?php
namespace App\Repositories;

use App\Models\MonitoringsModel;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonitoringRepository extends MonitoringsModel
{
    // TODO : Make your own query methods
    public static function getAll(){
       return DB::table('monitorings')
        ->join('siswas','siswas.id' , '=' , 'monitorings.id_siswa')
        ->join('kodes','kodes.id', '=' , 'monitorings.id_kode')
        ->select('siswas.nis','kodes.kode','monitorings.*')
        ->get();
    }

    public static function adddata(Request $request){
        DB::table('monitorings')->insert([
            'id_siswa' => $request->id_siswa,
            'id_kode' => $request->id_kode,
            'tgl' => $request->tgl,
            'keterangan' => $request->keterangan,

        ]);
    }

    public static function updatedata(Request $request){
        DB::table('monitorings')->where('id', $request->id)->update([
            'id_siswa' => $request->id_siswa,
            'id_kode' => $request->id_kode,
            'tgl' => $request->tgl,
            'keterangan' => $request->keterangan,
        ]);
    }

    public static function deletedata($id){
        DB::table('monitorings')->where('id',$id)->delete();
    }
}