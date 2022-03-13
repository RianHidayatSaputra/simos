<?php

namespace App\Exports;

use App\Models\Rombel;
use App\Models\Siswa;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromQuery, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return DB::table('siswas')
            ->join('orangtuas','orangtuas.id','=','siswas.id_ortu')
            ->join('rayons','rayons.id','=','siswas.id_rayon')
            ->join('gurus','gurus.id','=','siswas.id_guru')
            ->join('rombels', 'rombels.id','=','siswas.id_rombel')
            ->select('siswas.name','siswas.nis','siswas.alamat','siswas.no_telp','siswas.username','orangtuas.nama_ortu','rayons.rayon','rombels.rombel','gurus.name as name_guru')
            ->orderBy('nis');
    }

    public function headings(): array
    {
        return [
            'Nama',
            'NIS',
            'Alamat',
            'Nomer Telepon',
            'Rombel',
            'Username',
            'Nama Orang Tua',
            'Rayon',
            'Nama Guru',
        ];
    }

    public function map($data): array
    {
        // This example will return 3 rows.
        // First row will have 2 column, the next 2 will have 1 column
        return [
            $data->name,
            $data->nis,
            $data->alamat,
            $data->no_telp,
            $data->rombel,
            $data->username,
            $data->nama_ortu,
            $data->rayon,
            $data->name_guru,
        ];
    }
}
