<?php
namespace App\Repositories;

use App\Models\PrayonsModel;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Guru;
use App\Models\Rayon;

class PrayonRepository extends PrayonsModel
{
    // TODO : Make your own query methods
    public static function getAll(){
        return DB::table('prayons')
        ->join('rayons','rayons.id', '=', 'prayons.id_rayon')
        ->join('gurus','gurus.id','=','prayons.id_guru')
        ->select('rayons.rayon','gurus.name as perayon','prayons.*')
        ->get();
    }

    public static function reladd(){
        $data['rayon'] = Rayon::get();
        $data['guru'] = Guru::get();
        return $data;
    }

    public static function relupdate($id){
        $data['prayon'] = PrayonsModel::findById($id);
        $data['rayon'] = Rayon::get();
        $data['guru'] = Guru::get();

        return $data;
    }

    public static function adddata(Request $request){
        DB::table('prayons')->insert([
            'id_rayon' => $request->id_rayon,
            'id_guru' => $request->id_guru,
        ]);
    }

    public static function updatedata(Request $request){
        DB::table('prayons')->where('id', $request->id)->update([
            'id_rayon' => $request->id_rayon,
            'id_guru' => $request->id_guru,
        ]);
        
    }

    public static function deletedata($id){
        DB::table('prayons')->where('id',$id)->delete();
    }
}