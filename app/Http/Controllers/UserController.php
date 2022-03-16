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
use App\Models\Monitoring;
use App\Models\Kode;
// use Illuminate\Database\Query\BuilderselectRaw();

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
    }
    public function getAdminDashboard()
    {
        $cek = session::get('email');
        if($cek != null){
            // $data = UsersRepository::hitung();
            $siswa = DB::table('siswas')->count();
            $guru = DB::table('gurus')->count();
            $ortu = DB::table('orangtuas')->count();
            $prayon = DB::table('prayons')->count();
            $pelanggaran = Kode::query()
            ->selectRaw('siswas.nis, siswas.name as name, sum(kodes.skor) as skor,monitorings.*,kodes.jenis')
            ->join( 'monitorings','monitorings.id_kode', '=','kodes.id')
            ->join( 'siswas','siswas.id','=','monitorings.id_siswa')
            ->groupBy('kodes.jenis')
            ->get();
            $prestasi = Monitoring::query()
            ->join( 'kodes','kodes.id', '=','monitorings.id_kode')
            ->join( 'siswas','siswas.id','=','monitorings.id_siswa')
            ->select('kodes.jenis as prestasi')
            ->count();
            $dataLogin['dataLogin'] = DB::table('users')->where('email',$cek)->get();
            $kodeModel = DB::table('kodes')->select('jenis')->groupBy('jenis')->get();
            $kodeModelSkor = UsersRepository::queryPie();
            $arrayPieJenis = [];
            $arrayPieSkor = [];
            foreach($kodeModel as $itemData){
                $arrayPieJenis[] = $itemData->jenis;
            }

            foreach($kodeModelSkor as $skorData){
                $arrayPieSkor[] = $skorData->skor;
            }

            // dd($data);
            return view('backend.dashboard',['dataJenisPie' => $arrayPieJenis,
                                            'dataSkorPie'=>$arrayPieSkor,
                                            'siswa' => $siswa,
                                            'guru' => $guru,
                                            'ortu' => $ortu,
                                            'prayon' => $prayon,
                                            'pelanggaran' => $pelanggaran,
                                            'prestasi' => $prestasi,
                                        ]);
            // return view('backend.dashboard',$dataLogin,$data);
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
