<?php

namespace App\Http\Controllers;

use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use Illuminate\Http\Request;
use App\Models\SiswasModel;
use App\Models\Siswa; // add
use App\Models\RombelsModel;
use App\Models\OrangtuasModel;
use App\Models\RayonsModel;
use App\Models\GurusModel;
use App\Models\Rombel;
use App\Models\Orangtua;
use App\Models\Rayon;
use App\Models\Guru;
use App\Repositories\SiswaRepository;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

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
    public function import(Request $request) 
    {
        Excel::import(new SiswaImport, $request->file('file'));
        
        return redirect('siswa')->with('success', 'All good!');
    }
    public function export() 
    {
        return Excel::download(new SiswaExport, 'siswa.xlsx');
    }
    public function siswa($id){
        $siswa = Siswa::FindOrFail($id);
        return $siswa;
    }

        /**
     * ---------------------------------
     * login controller
     * ---------------------------------
     * dashboard too
     */
    public function getLoginSiswa()
    {
        return view('siswa.login');
    }

    public function getSiswaAction(Request $request)
    {
        $rules = ['username'=>'required','password'=>'required'];
        $message = ['username.required'=>'Username Wajib Di Isi','password.required'=>'Password wajib Di Isi'];
        $valit = Validator::make($request->all(),$rules,$message);
        $username = $request->input('username');
        $password = $request->input('password');
        $siswa = DB::table('siswas')->where(['username'=>$username])->first();
        if($siswa->username == $username AND Hash::check($password, $siswa->password)){
            Session::put('username',$siswa->username);
            session::put('login','berhasil login');
            return redirect()->route('siswa.dashboard');
        }else{
            return redirect()->route('siswa.login')->with('gagal masuk');
        }
    }
    public function getSiswaDashboard()
    {
        $cek = session::get('username');
        if($cek != null){
            $dataLogin['dataLogin'] = DB::table('siswas')->where('username',$cek)->get();
            return view('siswa.dashboard.dashboard',$dataLogin);
        }else{
            return back();
        }
    }

    public function siswaLogout()
    {
        Session::flush();
        return redirect()->route('login.view');
    }
}
