<?php

namespace App\Exports;

use App\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class SiswaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Siswa::all();

        $siswa = DB::table('siswa')->select('nama', 'nis', 'alamat')->get();
        return $siswa ;
    }

    public function headings(): array {
        return [
            'Nama',
            'Nis',
            'Alamat'
        ];
    }
}
