<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        $kelas = ['12-TKJ1', '12-TKJ2', '12-RPL1', '12-RPL2', '12-MM'];
        $status = ['Lulus', '-'];

        $data = [
            [
                'nisn' => strval($faker->numberBetween(1000000000, 10000000000)),
                'name' => $faker->name(),
                'ttl' => $faker->city() . ', ' . $faker->dayOfMonth() . ' ' . $faker->monthName() . ' ' . $faker->year(),
                'kelas' => $kelas[$faker->numberBetween(0, 4)],
                'status' => $status[$faker->numberBetween(0, 1)]
            ],
            [
                'nisn' => strval($faker->numberBetween(1000000000, 10000000000)),
                'name' => $faker->name(),
                'ttl' => $faker->city() . ', ' . $faker->dayOfMonth() . ' ' . $faker->monthName() . ' ' . $faker->year(),
                'kelas' => $kelas[$faker->numberBetween(0, 4)],
                'status' => $status[$faker->numberBetween(0, 1)]
            ],
            [
                'nisn' => strval($faker->numberBetween(1000000000, 10000000000)),
                'name' => $faker->name(),
                'ttl' => $faker->city() . ', ' . $faker->dayOfMonth() . ' ' . $faker->monthName() . ' ' . $faker->year(),
                'kelas' => $kelas[$faker->numberBetween(0, 4)],
                'status' => $status[$faker->numberBetween(0, 1)]
            ],
            [
                'nisn' => strval($faker->numberBetween(1000000000, 10000000000)),
                'name' => $faker->name(),
                'ttl' => $faker->city() . ', ' . $faker->dayOfMonth() . ' ' . $faker->monthName() . ' ' . $faker->year(),
                'kelas' => $kelas[$faker->numberBetween(0, 4)],
                'status' => $status[$faker->numberBetween(0, 1)]
            ],
            [
                'nisn' => strval($faker->numberBetween(1000000000, 10000000000)),
                'name' => $faker->name(),
                'ttl' => $faker->city() . ', ' . $faker->dayOfMonth() . ' ' . $faker->monthName() . ' ' . $faker->year(),
                'kelas' => $kelas[$faker->numberBetween(0, 4)],
                'status' => $status[$faker->numberBetween(0, 1)]
            ]
        ];

        DB::table('students')->insert($data);
    }
}
