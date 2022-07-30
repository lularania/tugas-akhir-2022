<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'status' => 'Draft',
            ],
            [
                'status' => 'Diajukan',   
            ],
            [
                'status' => 'Dikonfirmasi',
            ],
            [
                'status' => 'Penanganan Online',
            ],
            [
                'status' => 'Penanganan Offline',
            ],
            [
                'status' => 'Ditolak',
            ],
            [
                'status' => 'Selesai Ditangani',
            ],
            [
                'status' => 'Diunggah',
            ],
            [
                'status' => 'Hasil Pemeriksaan Langsung',
            ],
            [
                'status' => 'Batal Ditangani',
            ],
        ];

        foreach ($statuses as $statuses) {
            DB::table('statuses')->insert($statuses);
        }
    }
}
