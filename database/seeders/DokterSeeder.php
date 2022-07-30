<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dokter = [
            [
                'id_user' =>3,
                'id_tenaga_kesehatans' => 1,
            ],
        ];

        foreach ($dokter as $dokter) {
            DB::table('dokters')->insert($dokter);
        }
    }
}