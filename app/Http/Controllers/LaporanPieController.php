<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Monitorings as MonitoringDataRepo;
use App\Services\MonitoringsService as MonitoringDataServi;

class LaporanPieController extends Controller
{
    // get All Data
    public function getIndex()
    {
        // vardata
        $dataMonitorAll = MonitoringDataRepo::dataAll();
        $dataJenisAll = MonitoringDataServi::getJenisKode();

        // var array
        $arrayDataAll = [];
        $arrayJenisAll = [];

        // loop
        foreach($dataMonitorAll as $monitorAll){
            $arrayDataAll[] = $monitorAll->skor;
        }
        foreach($dataJenisAll as $jenisAll){
            $arrayJenisAll[] = $jenisAll->jenis;
        }

        return view('laporan.pie.index',['jenis'=>$arrayJenisAll,'skor'=>$arrayDataAll]);
    }

    // get Search 
    public function searchData(Request $request)
    {
        // $query
        $dataSearch = MonitoringDataRepo::searchQuery($request);
        // $dataSearchSkor = MonitoringDataRepo::searchQuery($request);
        // array
        // $arrayDataAll = [];
        // $arrayJenisAll = [];
        // // loop
        // foreach($dataSearch as $itemSearchSkor){
        //     $arrayDataAll[] = $itemSearchSkor->skor;
        // }
        // foreach($dataSearch as $itemSearch){
        //     $arrayJenisAll[] = $itemSearch->jenis;
        // }
        // dd($arrayDataAll,$arrayJenisAll);
        dd($dataSearch);
        // return view('laporan.pie.index',['jenis'=>$arrayJenisAll,'skor'=>$arrayDataAll]);
    }
}
