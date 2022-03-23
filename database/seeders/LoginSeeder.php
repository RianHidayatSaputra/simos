<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Orangtua;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user  = new User;
        $user->name = 'admin';
        $user->email = 'admin@email.com';
        $user->username = 'admin';
        $user->password = Hash::make('123456');
        $user->save();

        $guru = new Guru;
        $guru->name = 'guru';
        $guru->alamat = 'jl localhost, rt 80 rw 00, localhost:8000';
        $guru->no_ktp = '118002342345';
        $guru->username = 'guru';
        $guru->password = Hash::make('123456');
        $guru->level = 'guru';
        $guru->save();


    }
}
