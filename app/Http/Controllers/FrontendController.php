<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Monitoring as monitorModel;
use App\Repositories\Monitorings as monitoringRepo;
use App\Services\MonitoringsService as monitoringService;

class FrontendController extends Controller
{
    public function getIndex()
    {
        return view('frontend.index');
    }

    public function getGrafik()
    {
        $dataPie= monitoringRepo::dataAll();
        $arrayPieJenis = [];
        foreach($dataPie as $dataJenis){
            $arrayPieJenis[] = $dataJenis->jenis;
        }
        $arrayPieSkor = [];
        foreach($dataPie as $dataSkor){
            $arrayPieSkor[] = $dataSkor->skor;
        }
        return view('frontend.grafik.index',['pieJenis'=>$arrayPieJenis,'pieSkor'=>$arrayPieSkor]);
    }

    public function highestAchievement()
    {
        $data = monitoringRepo::getHeightAchievement();
        return view('frontend.prestasi.index',['prestasiTertinggi'=>$data]);
    }
}
