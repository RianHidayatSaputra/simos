<?php
namespace App\Repositories;

use App\Models\RayonsModel;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RayonRepository extends RayonsModel
{
    // TODO : Make your own query methods
    public static function adddata(Request $request){
        DB::table('rayons')->insert([
            'rayon' => $request->rayon,
        ]);
    }

    public static function updatedata(Request $request){
        DB::table('rayons')->where('id', $request->id)->update([
            'rayon' => $request->rayon,
        ]);
    }

    public static function deletedata($id){
        DB::table('rayons')->where('id', $id)->delete();
    }
}