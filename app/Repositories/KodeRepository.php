<?php
namespace App\Repositories;

use App\Models\KodesModel;

use \Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KodeRepository extends KodesModel
{
    // TODO : Make your own query methods
    public static function adddata(Request $request){
        DB::table('kodes')->insert([
            'kode' => $request->kode,
            'deskripsi' => $request->deskripsi,
            'skor' => $request->skor,
            'jenis' => $request->jenis,
        ]);
    }

    public static function updatedata(Request $request){
        DB::table('kodes')->where('id', $request->id)->update([
            'kode' => $request->kode,
            'deskripsi' => $request->deskripsi,
            'skor' => $request->skor,
            'jenis' => $request->jenis,
        ]);
    }

    public static function deletedata($id){
        DB::table('kodes')->where('id', $id)->delete();
    }
}