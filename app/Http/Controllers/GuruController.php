<?php

namespace App\Http\Controllers;

use App\Models\GurusModel;
use App\Repositories\GuruRepository;
use App\Repositories\UsersRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\support\Facades\Hash;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['guru'] = GurusModel::latest();
        return view('guru.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validasi = $request->validate([
            'name' => 'min:4',
            'email' => 'unique:users,email',
            'password' => 'min:6',
        ]);
         GuruRepository::adddata($request);
         return redirect('guru');
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
        $data['guru'] = GurusModel::findById($id);
        return view('guru.edit', $data);
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
        $validasi = $request->validate([
            'name' => 'min:4',
            'email' => 'unique:users,email',
            'password' => 'min:6',
        ]);
         GuruRepository::updatedata($request);
         return redirect('guru');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        GuruRepository::deletedata($id);
        return redirect('guru');
    }

    /**
     * ---------------------------------
     * login controller
     * ---------------------------------
     * dashboard too
     */
    public function getLoginGuru()
    {
        // if(Session::)
        // {
        //     return redirect()->route('simos');
        // }else{
        // }
        return view('guru.login');
    }
    public function getGuruAction(Request $request)
    {
        $rules = ['username' => 'required','password' => 'required'];
        $rules = ['email'=>'required','password'=>'required'];
        $message = ['username.required'=>'Username Wajib Di Isi','password.required' =>'Password Wajib Di Isi'];
        $valit = Validator::make($request->all(),$rules,$message);
        $username = $request->input('username');
        $password = $request->input('password');
        $email = $request->input('username');

        // dd($username);
        $guru = DB::table('gurus')->where(['username'=> $username])->first();
        $siswa = DB::table('siswas')->where(['username'=>$username])->first();
        $ortu = DB::table('orangtuas')->where(['username'=>$username])->first();
        $users = DB::table('users')->where(['email'=>$email])->first();
        $data = UsersRepository::hitung();
        dd($data);

        if($users->email == $email AND Hash::check($password, $users->password)){
            Session::put('email',$users->email);
            session::put('login','berhasil login');
            return redirect()->route('admin.dashboard');
        }else if($guru->username == $username AND Hash::check($password, $guru->password)){
            Session::put('username',$guru->username);
            Session::put('login','Berhasil login');
            return redirect()->route('guru.dashboard');
        }else if($siswa->username == $username AND Hash::check($password, $siswa->password)){
            Session::put('username',$siswa->username);
            session::put('login','berhasil login');
            return redirect()->route('siswa.dashboard');
        } else if($ortu->username == $username AND Hash::check($password, $ortu->password)){
            Session::put('username',$ortu->username);
            session::put('login','berhasil login');
            return redirect()->route('ortu.dashboard');
        }else{
            return redirect()->route('guru.login')->with('gagal masuk');
        }


    }
    public function getGuruDashboard()
    {
        $cek = Session::get('username');
        if($cek != null){
            $dataLogin['dataLogin'] = DB::table('gurus')->where('username', $cek)->get();
            return view('guru.dashboard.dashboard',$dataLogin);
        }else{
            return back();
        };
    }
    public function guruLogout()
    {
        Session::flush();
        return redirect()->route('guru.login');
    }

}
