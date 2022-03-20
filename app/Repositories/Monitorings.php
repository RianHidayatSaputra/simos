<?php
namespace App\Repositories;

use App\Models\MonitoringsModel;
use App\Models\Monitoring;
use App\Models\Kode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class Monitorings extends MonitoringsModel
{
    // TODO : Make your own query methods

    /**
     * --------------------------------
     * laporan monitoring pie
     * --------------------------------
     * jumlah skor
     */
    public static function dataAll()
    {
        $data =  Monitoring::query()
                    ->selectRaw('sum(kodes.skor) as skor, kodes.jenis')
                    ->join('siswas','siswas.id','=','monitorings.id_siswa')
                    // ->join('kodes','kodes.id','=','monitorings.id_kode')
                    ->join('kodes','kodes.id','=','monitorings.id_kode')
                    ->groupBy('jenis')
                    ->get();
        return $data;
    }

    /**
     * --------------------------------
     * search query
     * --------------------------------
     * function query
     */
    public static function searchQuery(Request $request)
    {
        // $data = Kode::query()
        $data = DB::table('monitorings')->selectRaw(
            'sum(kodes.skor) as skor,
            kodes.jenis as jenis',
        )->join('siswas','siswas.id','=','monitorings.id_siswa')
        ->join('kodes','kodes.id','=','monitorings.id_kode')
        ->where('nis',$_GET['nis'])->groupBy('kodes.jenis')->get();
        return $data;
    }

    /**
     * --------------------------------
     * get highest achievement
     * --------------------------------
     * for frontend data
     */
    public static function getHeightAchievement()
    {
        return Monitoring::query()
                ->selectRaw('siswas.nis as nis, siswas.name as name, sum(kodes.skor) as skor')
                ->join('siswas','siswas.id','=','monitorings.id_siswa')
                ->join('kodes','kodes.id','=','monitorings.id_kode')
                ->where('kodes.jenis','prestasi')
                ->groupBy('siswas.nis')
                ->orderBy('kodes.skor','asc')
                ->paginate(3);
    }

}