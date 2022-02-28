<?php
namespace App\Repositories;

use App\Models\RombelsModel;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RombelRepository extends RombelsModel
{
    // TODO : Make your own query methods
    public static function adddata(Request $request){
        DB::table('rombels')->insert([
            'rombel' => $request->rombel,
        ]);
    }

    public static function updatedata(Request $request){
        DB::table('rombels')->where('id', $request->id)->update([
            'rombel' => $request->rombel,
        ]);
    }

    public static function deletedata($id){
        DB::table('rombels')->where('id',$id)->delete();
    }

}