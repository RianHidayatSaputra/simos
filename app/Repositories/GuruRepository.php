<?php
namespace App\Repositories;

use App\Models\GurusModel;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class GuruRepository extends GurusModel
{
    public static function adddata(Request $request){
        DB::table('gurus')->insert([
            'name' => $request->name,
            'alamat' => $request->alamat,
            'no_ktp' => $request->no_ktp,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'level' => $request->level,
        ]);
    }

    public static function updatedata(Request $request){
        DB::table('gurus')->where('id', $request->id)->update([
            'name' => $request->name,
            'alamat' => $request->alamat,
            'no_ktp' => $request->no_ktp,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'level' => $request->level,
        ]);
    }

    public static function deletedata($id){
        DB::table('gurus')->where('id', $id)->delete();
    }

}