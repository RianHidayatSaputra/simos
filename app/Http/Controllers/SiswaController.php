<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiswasModel;
use App\Models\RombelsModel;
use App\Models\OrangtuasModel;
use App\Models\RayonsModel;
use App\Models\GurusModel;
use App\Models\Rombel;
use App\Models\Orangtua;
use App\Models\Rayon;
use App\Models\Guru;
use App\Repositories\SiswaRepository;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['siswa'] = SiswaRepository::getAll();
        return view('siswa.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['rombel'] = RombelsModel::latest();
        $data['ortu'] = OrangtuasModel::latest();
        $data['rayon'] = RayonsModel::latest();
        $data['guru'] = GurusModel::latest();
        return view('siswa.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SiswaRepository::adddata($request);
        return redirect('siswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['siswa'] = SiswasModel::findById($id);
        $data['rombel'] = Rombel::get();
        $data['ortu'] = Orangtua::get();
        $data['rayon'] = Rayon::get();
        $data['guru'] = Guru::get();

        // $data['rombel'] = RombelsModel::latest();
        // $data['ortu'] = OrangtuasModel::latest();
        // $data['rayon'] = RayonsModel::latest();
        // $data['guru'] = GurusModel::latest();
        // dd($data);
        return view('siswa.edit',$data);
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
        SiswaRepository::updatedata($request);
        return redirect('siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SiswaRepository::deletedata($id);
        return redirect('siswa');
    }
}
