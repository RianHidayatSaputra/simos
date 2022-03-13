<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RayonsModel;
use App\Repositories\RayonRepository;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RayonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rayon'] = RayonsModel::latest();
        return view('rayon.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rayon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        RayonRepository::adddata($request);
        return redirect('rayon');
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
        $data['rayon'] = RayonsModel::findById($id);
        return view('rayon.edit', $data);
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
        RayonRepository::updatedata($request);
        return redirect('rayon');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RayonRepository::deletedata($id);
        return redirect('rayon');
    }

        /**
     * ---------------------------------
     * login controller
     * ---------------------------------
     * dashboard too
     */
    public function getLoginRayon()
    {
        return view('rayon.login');
    }

    public function getRayonAction(Request $request)
    {
        $rules = ['username'=>'required','password'=>'required'];
        $message = ['username.required'=>'Username Wajib Di Isi','password.required'=>'Password wajib Di Isi'];
        $valit = Validator::make($request->all(),$rules,$message);
        $username = $request->input('username');
        $password = $request->input('password');
        $rayon = DB::table('rayons')->where(['username'=>$username])->first();
        if($rayon->username == $username AND Hash::check($password, $rayon->password)){
            Session::put('username',$rayon->username);
            session::put('login','berhasil login');
            return redirect()->route('rayon.dashboard');
        }else{
            return redirect()->route('rayon.login')->with('gagal masuk');
        }
    }
    public function getRayonDashboard()
    {
        $cek = session::get('username');
        if($cek != null){
            $dataLogin['dataLogin'] = DB::table('rayons')->where('username',$cek)->get();
            return view('rayon.dashboard.dashboard',$dataLogin);
        }else{
            return back();
        }
    }
    public function rayonLogout()
    {
        Session::flush();
        return redirect()->route('rayon.login');
    }
}
