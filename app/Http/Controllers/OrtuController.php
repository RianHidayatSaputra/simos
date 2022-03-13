<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrangtuasModel;
use App\Repositories\OrangtuaRepository;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class OrtuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['ortu'] = OrangtuasModel::latest();
        return view('ortu.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ortu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        OrangtuaRepository::adddata($request);
        return redirect('ortu');
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
        $data['ortu'] = OrangtuasModel::findById($id);
        return view('ortu.edit',$data);
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
        OrangtuaRepository::updatedata($request);
        return redirect('ortu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        OrangtuaRepository::deletedata($id);
        return redirect('ortu');
    }

    /**
     * ---------------------------------
     * login controller
     * ---------------------------------
     * dashboard too
     */
    public function getLoginOrtu()
    {
        return view('ortu.login');
    }

    public function getOrtuAction(Request $request)
    {
        $rules = ['username'=>'required','password'=>'required'];
        $message = ['username.required'=>'Username Wajib Di Isi','password.required'=>'Password wajib Di Isi'];
        $valit = Validator::make($request->all(),$rules,$message);
        $username = $request->input('username');
        $password = $request->input('password');
        $ortu = DB::table('orangtuas')->where(['username'=>$username])->first();
        if($ortu->username == $username AND Hash::check($password, $ortu->password)){
            Session::put('username',$ortu->username);
            session::put('login','berhasil login');
        }else{
            return redirect()->route('ortu.login')->with('gagal masuk');
        }
    }
    public function getOrtuDashboard()
    {
        $cek = session::get('username');
        if($cek != null){
            $dataLogin['dataLogin'] = DB::table('orangtuas')->where('username',$cek)->get();
            return view('ortu.dashboard.dashboard',$dataLogin);
        }else{
            return back();
        }
    }
    public function ortuLogout()
    {
        Session::flush();
        return redirect()->route('ortu.login');
    }

}
