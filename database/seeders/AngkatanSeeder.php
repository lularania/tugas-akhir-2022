<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class AngkatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $angkatan = [
            [
                'angkatan' => '2018',
            ],
            [
                'angkatan' => '2019',
            ],
            [
                'angkatan' => '2020',
            ],
            [
                'angkatan' => '2021',
            ],
            [
                'angkatan' => '2022',
            ],
        ];

        foreach ($angkatan as $angkatan) {
            DB::table('angkatan')->insert($angkatan);
        }
    }
}
