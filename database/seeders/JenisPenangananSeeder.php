<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class JenisPenangananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $penanganan = [
            [
                'jenis_penanganan' => 'Via Media Online Conference Off-Camera',
            ],
            [
                'jenis_penanganan' => 'Via Media Online Conference On-Camera',
            ],
            [
                'jenis_penanganan' => 'Via Offline Tatap Muka',
            ],
        ];

        foreach ($penanganan as $penanganan) {
            DB::table('jenis_penanganan')->insert($penanganan);
        }
    }
}
