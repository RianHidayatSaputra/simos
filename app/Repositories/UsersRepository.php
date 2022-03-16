<?php
namespace App\Repositories;

use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Kode;
use App\Models\Monitoring;
use App\Models\Siswa;

class UsersRepository extends UsersModel
{
    // TODO : Make your own query methods
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