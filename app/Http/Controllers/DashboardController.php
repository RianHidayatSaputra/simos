<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kode;
use App\Models\Siswa;

use App\Repositories\UsersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $year = ['2015','2016','2017','2018','2019','2020'];

        $user = [];
        foreach ($year as $key => $value) {
            $user[] = User::where(DB::raw("DATE_FORMAT(created_at, '%Y')"),$value)->count();
        }
        // ->with('year',json_encode($year,JSON_NUMERIC_CHECK))->with('user',json_encode($user,JSON_NUMERIC_CHECK))

        // $dataQuery['diagdata'] = Kode::query()->select('jenis','sum(kodes.skor) as skor')->groupBy('jenis');
        // $dataJenis['kodeJenis'] = Kode::selectRaw('kodes.jenis')->groupBy('kodes.jenis')->get();
        // $dataJenis = Kode::select('jenis')->groupBy('jenis')->get();
        $dataJenis['jenis'] = DB::table('kodes')->select('jenis')->groupByRaw('jenis')->get();
        // $dataJenis = DB::table('kodes')->select('skor')->groupByRaw('jenis')->get();
        // dd($dataJenis);
    	return view('backend.dashboard',$dataJenis)->with('year',json_encode($year,JSON_NUMERIC_CHECK))->with('user',json_encode($user,JSON_NUMERIC_CHECK));
        // $keyword = $request->get('keyword');
        // $data = Siswa::where('name','like',"%".$keyword."%")->
    }
    public function searchData(Request $request)
    {
        // $keywordTglAwal = $request->get('tanggal_awal');
        // $keywordTglAkhir = $request->get('tanggal_akhir');
        // $keywordNis = $request->get('nis');
        // $keywordRayon = $request->get('rayon');
        // $dataSeach = Kode::query()
        // ->selectRaw(
        //     'sum(kodes.skor) as skor',
        //     'kodes.jenis as jenis',
        // )
        // ->join('siswas','siswas.id','=','kodes.id')
        // // ->join('')
        // ->wheredate('created_at','>=',$keywordTglAwal)
        // ->whereDate('created_at','<=',$keywordTglAkhir)
        // ->where('nis','like','%'.$keywordNis.'%')
        // ->where('rayon','$keywordRayon')
        // // ->where('')
        // ->get()
        // ;
    }
    public function test()
    {
        $kodeModel = DB::table('kodes')->select('jenis')->groupBy('jenis')->get();
        $array = [];
        // $dataJenis = Kode::select('jenis')->groupBy('jenis')->get();
        // $dataJenis = Kode::select('jenis')->groupByRaw('jenis')->get();
        foreach($kodeModel as $itemData){
            $array[] = $itemData->jenis;
        }
        // dd(json_encode($array));
        $data = UsersRepository::hitung();
        // dd($data);

    	// return view('backend.dashboard',$data);
    }
}
