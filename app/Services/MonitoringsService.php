<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Repositories\Monitorings;

class MonitoringsService extends Monitorings
{
    // TODO : Make your own service method

    /**
     * --------------------------------
     * query build getJenisKode
     * --------------------------------
     */
    public static function getJenisKode()
    {
        $data = DB::table('kodes')
            ->select('jenis')
            ->groupBy('jenis')
            ->get();
        return $data;
    }
}