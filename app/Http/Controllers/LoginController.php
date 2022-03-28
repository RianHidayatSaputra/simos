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

        /**
         * --------------------------------
         * db and session login 
         * --------------------------------
         */
        // data get 
        $guru = DB::table('gurus')->where(['username'=>$username])->first();
        $siswa = DB::table('siswas')->where(['username'=>$username])->first();
        $orangtua = DB::table('orangtuas')->where(['username'=>$username])->first();
        $admin = DB::table('users')->where(['username'=>$username])->first();
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
        }elseif($orangtua){
            if(Hash::check($password, $orangtua->password)){
                session::put('username',$orangtua->username);
                // return redirect()->route('orangtua.dashboard');
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('login.view');
            }
        }elseif($siswa){
            if(Hash::check($password, $siswa->password)){
                session::put('username',$siswa->username);
                // return redirect()->route('siswa.dashboard');
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('login.view');
            }
        }else{
            return redirect()->route('login.view')->with('status','Username atau Email yang anda masukkan salah');
        }
    }
}
