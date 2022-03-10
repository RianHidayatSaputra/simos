<?php
namespace App\Repositories;

use App\Models\Kode;
use App\Models\MonitoringsModel;
use \Illuminate\Http\Request;
use App\Models\Monitoring;
use Illuminate\Support\Facades\DB;

class MonitoringRepository extends MonitoringsModel
{
    // TODO : Make your own query methods
    public static function getAll(){
       return Kode::query()
    ->selectRaw('siswas.nis, siswas.name as name, sum(kodes.skor) as skor,monitorings.*')
    ->join(
        'monitorings',
        'monitorings.id_kode',
        '=',
        'kodes.id'
    )
    ->join(
        'siswas',
        'siswas.id',
        '=',
        'monitorings.id_siswa'
    )
    ->groupBy('siswas.nis')
    ->get();
//     return Monitoring::select(DB::raw('count(*) as count'), 'siswas.nis')
//   ->join('kodes', 'monitorings.id_kode', '=', 'kodes.id')
//   ->join('siswas', 'monitorings.id_siswa', '=', 'siswas.id')
//   ->select('siswas.*')
//   ->groupBy('siswas.nis')
//   ->get();

        // Monitoring::select("*", DB::raw("count(*) as monitoring_count"))
        //                 ->groupBy('id_siswa')
        //                 ->get();
    }

    public static function adddata(Request $request){
        DB::table('monitorings')->insert([
            'id_siswa' => $request->id_siswa,
            'id_kode' => $request->id_kode,
            'tgl' => $request->tgl,
            'keterangan' => $request->keterangan,

        ]);
    }
    public static function details($nis){
        $detail = DB::table('monitorings')
        ->join('siswas','siswas.id' , '=' , 'monitorings.id_siswa')
        ->join('kodes','kodes.id', '=' , 'monitorings.id_kode')
        ->select('siswas.*','kodes.*','monitorings.*')
        ->where('siswas.nis','=',$nis)
        ->get();
        return $detail;
    }
    public static function shownis(){
        // $detail = DB::table('monitorings')
        // ->join('siswas','siswas.id' , '=' , 'monitorings.id_siswa')
        // ->join('kodes','kodes.id', '=' , 'monitorings.id_kode')
        // ->select('siswas.*','kodes.*','monitorings.*')
        // ->get();
        // return $detail;

        return Kode::query()
    ->selectRaw('siswas.nis, siswas.name as name, sum(kodes.skor) as skor,monitorings.*')
    ->join(
        'monitorings',
        'monitorings.id_kode',
        '=',
        'kodes.id'
    )
    ->join(
        'siswas',
        'siswas.id',
        '=',
        'monitorings.id_siswa'
    )
    ->groupBy('siswas.nis')
    ->get();
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