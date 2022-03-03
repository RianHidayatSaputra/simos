<?php
namespace App\Repositories;

use App\Models\OrangtuasModel;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OrangtuaRepository extends OrangtuasModel
{
    // TODO : Make your own query methods
    public static function adddata(Request $request){
        DB::table('orangtuas')->insert([
            'nama_ortu' => $request->nama_ortu,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'username' => $request->username,
            'password' => Hash::make($request->passowrd),
        ]);
    }

    public static function updatedata(Request $request){
        DB::table('orangtuas')->where('id', $request->id)->update([
            'nama_ortu' => $request->nama_ortu,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'username' => $request->username,
            'password' => Hash::make($request->passowrd),
        ]);
    }

    public static function deletedata($id){
        DB::table('orangtuas')->where('id', $id)->delete();
    }
}