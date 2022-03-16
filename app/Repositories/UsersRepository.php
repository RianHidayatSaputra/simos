<?php
namespace App\Repositories;

use App\Models\Kode;
use App\Models\Monitoring;
use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Siswa;
use Illuminate\Support\Facades\Hash;

class UsersRepository extends UsersModel
{
    // TODO : Make your own query methods
    public static function hitung(){
       $data['siswa'] = DB::table('siswas')->count();
       $data['guru'] =DB::table('gurus')->count();
       $data['ortu'] = DB::table('orangtuas')->count();
       $data['prayon'] = DB::table('prayons')->count();
       $data['pelanggaran'] = Kode::query()
       ->selectRaw('siswas.nis, siswas.name as name, sum(kodes.skor) as skor,monitorings.*,kodes.jenis')
       ->join( 'monitorings','monitorings.id_kode', '=','kodes.id')
       ->join( 'siswas','siswas.id','=','monitorings.id_siswa')
       ->groupBy('kodes.jenis')
       ->get();
       $data['prestasi'] = Monitoring::query()
       ->join( 'kodes','kodes.id', '=','monitorings.id_kode')
       ->join( 'siswas','siswas.id','=','monitorings.id_siswa')
       ->select('kodes.jenis as prestasi')
       ->count();
       return $data;
    }
    public static function adddata(Request $request){
        return DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),    
        ]);
    }
    public static function updatedata(Request $request){
        return DB::table('users')->where('id',$request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),    
        ]);
    }
    public static function deletedata($id){
        return DB::table('users')->where('id',$id)->delete();
    }
    public function queryPie()
    {
        return Monitoring::query()->selectRaw('sum(kodes.skor) as skor, kodes.jenis')
            ->join('siswas','siswas.id', '=','monitorings.id_siswa')
            ->join('kodes','kodes.id','=' ,'monitorings.id_kode')
            // ->sum('kodes.skor')
            ->groupBy('jenis')
            ->get();
    }
}