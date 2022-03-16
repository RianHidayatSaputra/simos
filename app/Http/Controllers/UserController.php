<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user'] = UsersModel::latest();
        return view('user.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        UsersRepository::adddata($request);
        return redirect('user');
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
        $data['user'] = UsersModel::findById($id);
        return view('user.edit',$data);
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
        UsersRepository::updatedata($request);
        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UsersRepository::deletedata($id);
        return redirect('user');
    }

        /**
     * ---------------------------------
     * login controller
     * ---------------------------------
     * dashboard too
     */
    public function getLoginAdmin()
    {
        return view('backend.login');
    }

    public function getAdminAction(Request $request)
    {
        $rules = ['email'=>'required','password'=>'required'];
        $message = ['email.required'=>'email Wajib Di Isi','password.required'=>'Password wajib Di Isi'];
        $valit = Validator::make($request->all(),$rules,$message);
        $email = $request->input('email');
        $password = $request->input('password');
        $users = DB::table('users')->where(['email'=>$email])->first();
        
        if($users->email == $email AND Hash::check($password, $users->password)){
            Session::put('email',$users->email);
            session::put('login','berhasil login');
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('admin.login')->with('gagal masuk');
        }
        // if($valit->fails())
        // {
        //     return redirect()
		// 			->back()
		// 			->withErrors($valit)
		// 			->withInput($request->all());
            
        // }

        // // data input
        // $data = 
        // [
        //     'email' => $request->input('email'),
        //     'password' => $request->input('password'),
        // ];

        // // check login
        // Auth::guard('web')->attempt($data);

        // // login check 
        // if(Auth::check())
        // {
        //     return redirect()->route('admin.dashboard');
        // }
        // else
        // {
        //     Session::flash('error','Email atau password salah');
        //     return redirect()
		// 			->route('login')
		// 			->with('status','gagal untuk login, tunggu beberapa saat lagi');
        // }
    }
    public function getAdminDashboard()
    {
        $cek = session::get('email');
        if($cek != null){
            $dataLogin['dataLogin'] = DB::table('users')->where('email',$cek)->get();
            $data = UsersRepository::hitung();
            // dd($data);
            return view('backend.dashboard',$dataLogin,$data);
        }else{
            return back();
        }
        // if(Auth::check())
    	// {
    	// 	return redirect()
		// 			->route('admin.dashboard');
    	// }
    	// else
    	// {
    	// 	return view('backend.dashboard');
    	// }
    }
    public function adminLogout()
    {
        Session::flush();
        return redirect()->route('admin.login');
        // Auth::logout();
        // return redirect()->route('login');
    }
}
