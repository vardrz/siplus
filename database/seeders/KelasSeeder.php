<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'kelas' => '12-TKJ1',
                'jurusan' => 'Teknik Komputer & Jaringan'
            ],
            [
                'kelas' => '12-TKJ2',
                'jurusan' => 'Teknik Komputer & Jaringan'
            ],
            [
                'kelas' => '12-RPL1',
                'jurusan' => 'Rekayasa Perangkat Lunak'
            ],
            [
                'kelas' => '12-RPL2',
                'jurusan' => 'Rekayasa Perangkat Lunak'
            ],
            [
                'kelas' => '12-MM',
                'jurusan' => 'Multimedia'
            ],
        ];

        DB::table('kelas')->insert($data);
    }
}
