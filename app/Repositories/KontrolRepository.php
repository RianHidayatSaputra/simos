<?php
namespace App\Repositories;

use App\Models\KontrolsModel;
use App\Models\SiswasModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KontrolRepository extends KontrolsModel
{
    // TODO : Make your own query methods
    public static function indexdata(){
        return DB::table('kontrols')
            ->join('siswas','siswas.id', '=', 'kontrols.id_siswa')
            ->select('siswas.nis','kontrols.*')->get();
    }

    public static function createdata(){
        $data['siswa'] = SiswasModel::latest();
        return $data;
    }

    public static function adddata(Request $request){
        DB::table('kontrols')->insert([
            'id_siswa' => $request->id_siswa,
            'catatan' => $request->catatan,
            'image' => $request->file('image')->store('picture'),
        ]);
    }
}