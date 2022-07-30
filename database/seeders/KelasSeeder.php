<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kelas = [
            [
                'kelas' => 'Kelas A',
            ],
            [
                'kelas' => 'Kelas B',
            ],
        ];

        foreach ($kelas as $kelas) {
            DB::table('kelas')->insert($kelas);
        }
    }
}
