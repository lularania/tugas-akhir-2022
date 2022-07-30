<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class JenisLayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $layanan = [
            [
                'layanan' => 'Layanan Kesehatan',
            ],
            [
                'layanan' => 'Layanan Konseling',
            ],
        ];

        foreach ($layanan as $layanan) {
            DB::table('jenis_layanan')->insert($layanan);
        }
    }
}
