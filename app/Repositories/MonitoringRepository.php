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
        // return Kode::query()
        //     ->selectRaw('siswas.nis, siswas.name as name, sum(kodes.skor) as skor,monitorings.*,kodes.jenis')
        //     ->join( 'monitorings','monitorings.id_kode', '=','kodes.id')
        //     ->join( 'siswas','siswas.id','=','monitorings.id_siswa')
        //     ->groupBy('siswas.nis')
        //     ->get();
        return Monitoring::query()
        // ->selectRaw('siswas.nis, siswas.name as name, sum(kodes.skor) as skor,monitorings.*,kodes.jenis')
        ->selectRaw('siswas.id as id,siswas.nis as nis, siswas.name as name, sum(kodes.skor) as skor, kodes.jenis as jenis')
        // ->join( 'monitorings','monitorings.id_kode', '=','kodes.id')
            ->join('kodes','kodes.id','=','monitorings.id_kode')
            ->join( 'siswas','siswas.id','=','monitorings.id_siswa')
            // ->where('jenis','kodes.jenis')
            ->groupBy('siswas.id','siswas.nis','kodes.jenis','siswas.name')
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
    public static function details($nis){
        $detail = DB::table('monitorings')
            ->join('siswas','siswas.id' , '=' , 'monitorings.id_siswa')
            ->join('kodes','kodes.id', '=' , 'monitorings.id_kode')
            ->select('siswas.*','kodes.*','monitorings.*')
            ->where('siswas.nis','=',$nis)
            // ->where('jenis',)
            ->get();
        return $detail;
    }
    public static function shownis(){

        // return Kode::query()
        //     ->selectRaw('siswas.nis, siswas.name as name, sum(kodes.skor) as skor,monitorings.*,kodes.jenis,kodes.kode')
        //     ->join(
        //         'monitorings',
        //         'monitorings.id_kode',
        //         '=',
        //         'kodes.id'
        //     )
        //     ->join(
        //         'siswas',
        //         'siswas.id',
        //         '=',
        //         'monitorings.id_siswa'
        //     )
        //     ->groupBy('siswas.nis','kodes.jenis')
        //     ->get();
        return Monitoring::query()
                ->selectRaw('siswas.nis as nis, siswas.name as name, sum(kodes.skor)as skor, kodes.jenis, monitorings.*,kodes.*')
                ->join('siswas','siswas.id','=','monitorings.id_siswa')
                ->join('kodes','kodes.id','=','monitorings.id_kode')
                ->groupBy('siswas.nis','kodes.jenis')
                ->get();
    }
    public static function keseluruhan(){
        return Monitoring::query()
                // ->selectRaw('monitorings.*,siswas.*,kodes.*,sum(kodes.skor) as skor,kodes.jenis as jenis')
                // ->join('siswas','siswas.id','=','monitorings.id_siswa')
                // ->join('kodes','kodes.id','=','monitorings.id_kode')
                // ->where('kodes.jenis')
                // ->groupBy('siswas.nis')
                // ->get();
                ->selectRaw('siswas.nis as nis,kodes.kode as kode,sum(kodes.skor) as skor,kodes.jenis as jenis')
                ->join('siswas','siswas.id','=','monitorings.id_siswa')
                ->join('kodes','kodes.id','=','monitorings.id_kode')
                // ->where('kodes.jenis')
                ->groupBy('siswas.nis','kodes.kode','kodes.jenis')
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

    public static function monitor(){
        return Kode::query()
            ->selectRaw('siswas.nis, siswas.name as name, sum(kodes.skor) as skor,monitorings.tgl as tgl')
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
            ->groupBy('siswas.nis','siswas.name','kodes.jenis','monitorings.tgl')
            ->get();
        // return Monitoring::query()
        //     ->selectRaw('siswas.nis, siswas.name as name, sum(kodes.skor) as skor,monitorings.tgl as tgl, kodes.kode kode')
        //     ->join(
        //         'kodes',
        //         'kodes.id',
        //         '=',
        //         'monitorings.id_kode'
        //         )
        //     ->join(
        //         'siswas',
        //         'siswas.id',
        //         '=',
        //         'monitorings.id_siswa'
        //         )
        //     ->groupBy('siswas.nis','siswas.name','kodes.jenis','monitorings.tgl','kodes.kode')
        //     ->get();
    }

    /**
     * --------------------------------
     * detail where jenis
     * --------------------------------
     * detail where Jenis
     */
    // public static function detailWherejenis1($nis)
    // {
    //     $detail = DB::table('monitorings')
    //         ->join('siswas','siswas.id' , '=' , 'monitorings.id_siswa')
    //         ->join('kodes','kodes.id', '=' , 'monitorings.id_kode')
    //         ->select('siswas.*','kodes.*','monitorings.*')
    //         ->where('siswas.nis','=',$nis)
    //         ->where('jenis','pelanggaran')
    //         ->get();
    //     return $detail;
    // }
    // public static function detailWherejenis2($nis)
    // {
    //     $detail = DB::table('monitorings')
    //         ->join('siswas','siswas.id' , '=' , 'monitorings.id_siswa')
    //         ->join('kodes','kodes.id', '=' , 'monitorings.id_kode')
    //         ->select('siswas.*','kodes.*','monitorings.*')
    //         ->where('siswas.nis','=',$nis)
    //         ->where('jenis','pelanggaran')
    //         ->get();
    //     return $detail;
    // }


}