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
        return redirect()->route('login.view');
    }

}
