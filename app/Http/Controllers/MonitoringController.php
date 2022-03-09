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
        
        // $data = Monitoring::with('siswas')->get()->toArray();
        // $data = Monitoring::kode()->get();
        $data['monitoring'] = MonitoringRepository::getAll();
        $data['details'] = MonitoringRepository::shownis();
        // $data['monitoring'] = Monitoring::all();
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
        $detail['details'] = MonitoringRepository::details($nis);
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

    
}
