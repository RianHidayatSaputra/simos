<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MonitoringRepository;
use App\Models\MonitoringsModel;
use App\Models\SiswasModel;
use App\Models\KodesModel;
use App\Models\Siswa;
use App\Models\Kode;
use App\Models\Monitoring;
use Illuminate\Support\Facades\DB;

class MonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['monitoring'] = MonitoringRepository::getAll();
        $data['details'] = MonitoringRepository::shownis();
        // dd($data);
        return view('monitoring.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['siswa'] = SiswasModel::latest();
        $data['kode'] = KodesModel::latest();
        return view('monitoring.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MonitoringRepository::adddata($request);
        return redirect('monitoring');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nis)
    {
        $detail['details'] = MonitoringRepository::details($nis)->where('jenis','pelanggaran');
        // dd($detail);
        return view('monitoring.detail',$detail);
    }
    public function show2($nis)
    {
        $detail['details'] = MonitoringRepository::details($nis)->where('jenis','prestasi');
        // dd($detail);
        return view('monitoring.detail',$detail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['monitoring'] = MonitoringsModel::findById($id);
        $data['siswa'] = Siswa::get();
        $data['kode'] = Kode::get();
        return view('monitoring.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        MonitoringRepository::updatedata($request);
        return redirect('monitoring');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MonitoringRepository::deletedata($id);
        return redirect('monitoring');
    }

    public function fetch_data(Request $request)
    {
        if($request->ajax()){
            if($request->from_date != '' && $request->to_date != ''){
                $data = DB::table('monitorings')
                    ->join('siswas','siswas.id' , '=' , 'monitorings.id_siswa')
                    ->join('kodes','kodes.id', '=' , 'monitorings.id_kode')
                    ->select('siswas.*','kodes.*','monitorings.*')
                    ->whereBetween('tgl', array($request->from_date, $request->to_date))
                    ->get();
        }else{
    //    $data = DB::table('monitorings')
    //     ->join('siswas','siswas.id' , '=' , 'monitorings.id_siswa')
    //     ->join('kodes','kodes.id', '=' , 'monitorings.id_kode')
    //     ->select('siswas.*','kodes.*','monitorings.*')
    //     ->orderBy('tgl', 'desc')
    //     ->get();
            $data = MonitoringRepository::keseluruhan();
        }
      return json_encode($data);
    // dd($data);
    //  if($request->ajax())
    //  {
    //   if($request->from_date != '' && $request->to_date != '')
    //   {
    //    $data = Monitoring::query()
    //    ->selectRaw('siswas.nis as nis, siswas.name as name, sum(kodes.skor)as skor, kodes.jenis, monitorings.*,kodes.*')
    //    ->join('siswas','siswas.id','=','monitorings.id_siswa')
    //    ->join('kodes','kodes.id','=','monitorings.id_kode')
    //    ->groupBy('siswas.nis','kodes.jenis')
    //    ->whereBetween('tgl', array($request->from_date, $request->to_date))
    //    ->get();
    //   }
    //   else
    //   {
    //    $data = Monitoring::query()
    //    ->selectRaw('siswas.nis as nis, siswas.name as name, sum(kodes.skor)as skor, kodes.jenis, monitorings.*,kodes.*')
    //    ->join('siswas','siswas.id','=','monitorings.id_siswa')
    //    ->join('kodes','kodes.id','=','monitorings.id_kode')
    //    ->groupBy('siswas.nis','kodes.jenis')
    //    ->get();
    //   }
    //   return json_encode($data);
     }
    }

    public static function siswa($id){
        // $ortu = Siswa::FindOrFail($id);
        $ortu = DB::table('siswas')
                ->join('orangtuas','orangtuas.id','=','siswas.id_ortu')
                ->select('orangtuas.*')
                ->where('siswas.id',$id)
                ->get()
                ->toJson();
        // dd($ortu);
        return $ortu;
    }

    
}
