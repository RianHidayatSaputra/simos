<?php
namespace App\Repositories;

use App\Models\KontrolsModel;
use App\Models\SiswasModel;
<<<<<<< HEAD
use App\Models\Siswa;
use App\Models\Kontrol;
=======
>>>>>>> 5b97afaff48f1bb31fcece06fba09d08afa33ae7
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

<<<<<<< HEAD
    public static function editdata($id){
        $data['kontrol'] = KontrolsModel::findById($id);
        $data['siswa'] = Siswa::get();
        return $data;
    }

=======
>>>>>>> 5b97afaff48f1bb31fcece06fba09d08afa33ae7
    public static function adddata(Request $request){
        DB::table('kontrols')->insert([
            'id_siswa' => $request->id_siswa,
            'catatan' => $request->catatan,
<<<<<<< HEAD
            'image' => $request->file('image')->store('image', 'public'),
        ]);
    }

    public static function updatedata(Request $request){
        DB::table('kontrols')->where('id',$request->id)->update([
            'id_siswa' => $request->id_siswa,
            'catatan' => $request->catatan,
            'image' => $request->file('image')->store('image', 'public'),
        ]);
    }

    public static function deletedata($id){
        DB::table('kontrols')->where('id',$id)->delete();
    }
=======
            'image' => $request->file('image')->store('picture'),
        ]);
    }
>>>>>>> 5b97afaff48f1bb31fcece06fba09d08afa33ae7
}