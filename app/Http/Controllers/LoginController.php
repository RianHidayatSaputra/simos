<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Guru;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('backend.login');
    }
    public function getLoginPost(Request $request)
    {
        /**
         * --------------------------------
         * validate
         * --------------------------------
         */
        $rules = [
            'username'=>'required',
            'password'=>'required',
        ];
        $message = [
            'username.required'=>'username wajib di isi',
            'password.required'=>'password wajib di isi',
        ];
        $validate = Validator::make($request->all(),$rules,$message);

        /**
         * --------------------------------
         * req input
         * --------------------------------
         */
        $username = $request->input('username');
        $password = $request->input('password');
        $passwordOrtu = $request->get('password');

        /**
         * --------------------------------
         * db and session login 
         * --------------------------------
         */
        // data get 
        $guru = DB::table('gurus')->where(['username'=>$username])->first();
        $siswa = DB::table('siswas')->where(['username'=>$username])->first();
        $orangtua = DB::table('orangtuas')->where(['username'=>$request->get('username')])->first();
        $admin = DB::table('users')->where(['username'=>$username])->first();
        $pembimbingRayon = DB::table('prayons')->where(['username'=>$username])->first();

        /**
         * --------------------------------
         * query build
         * --------------------------------
         * $get ortus nis
         */

        if($admin){
            if(Hash::check($password,$admin->password)){
                session::put('username',$admin->username);
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('login.view');
            }
        }elseif($guru){
            if(Hash::check($password,$guru->password)){
                session::put('username',$guru->username);
                // return redirect()->route('guru.dashboard');
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('login.view');
            }
        }elseif($siswa){
            if(Hash::check($password, $siswa->password)){
                session::put('username',$siswa->username);
                session::put('nis',$siswa->nis);
                // return redirect()->route('siswa.dashboard');
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('login.view');
                // dd($siswa);
            }
        }elseif($orangtua){
            if(Hash::check($passwordOrtu, $orangtua->password)){
                session::put('username',$orangtua->username);
                session::put('ortuId',$orangtua->id);
                // return redirect()->route('guru.dashboard');
                return redirect()->route('admin.dashboard');
            }else{
                // return redirect()->route('login.view');
                session::put('ortuId',$orangtua->id);
                session::put('username',$orangtua->username);
                return redirect()->route('admin.dashboard');
                // dd($orangtua->password);
            }
        }elseif($pembimbingRayon){
            if(Hash::check($password,$pembimbingRayon->password)){
                session::put('username',$pembimbingRayon->username);
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('login.view');
            }
        }else{
            return redirect()->route('login.view')->with('status','Username atau Email yang anda masukkan salah');
            // dd($orangtua);
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('login.view');
    }
}
