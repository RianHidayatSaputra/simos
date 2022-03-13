<?php

namespace App\Imports;

use App\Models\Guru;
use App\Models\Orangtua;
use App\Models\OrangtuasModel;
use App\Models\Rayon;
use App\Models\Rombel;
use App\Models\Siswa;
use App\Models\User;
use App\Repositories\SiswaRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        $orang_tua = Orangtua::where('nama_ortu', 'like', $row['nama_ortu'])->first();
        if(!$orang_tua){
            $orang_tua = Orangtua::create([
                'nama_ortu' => $row['nama_ortu'],
                'alamat'    => $row['alamat'],
                'no_telp'   => $row['no_telepon'],
                'username'  => $row['nama_ortu'],
            ]);
        }

        $rayon = Rayon::where('rayon', 'like', $row['rayon'])->first();
        if(!$rayon){
            $rayon = Rayon::create([
                'rayon' => $row['rayon'],
            ]);
        }

        $rombel = Rombel::where('rombel', 'like', $row['rombel'])->first();
        if(!$rombel){
            $rombel = Rombel::create([
                'rombel' => $row['rombel'],
            ]);
        }

        $guru = Guru::where('name', 'like', $row['nama_guru'])->first();
        if(!$guru){
            $guru = Guru::create([
                'name'    => $row['nama_guru'],
                'alamat' => 'alamat',
                'no_ktp'  => 'no_ktp' ,
                'username' => 'username',
                'password' => 'password',
                'level' => 'level',
            ]);
        }

        $data = [
            'nis' => $row['nis'],
            'name' => $row['nama'],
            'alamat' => $row['alamat'],
            'no_telp' => $row['no_telepon'],
            'id_rombel' => $rombel->id,
            'username' => $row['username'],
            'password' => Hash::make('123456'),
            'id_ortu' => $orang_tua->id,
            'id_rayon' => $rayon->id,
            'id_guru' => $guru->id,
        ];
        return Siswa::create($data);
        // return SiswaRepository::adddata($data);
    }
    public function headingRow(): int
    {
        return 1;
    }
}
