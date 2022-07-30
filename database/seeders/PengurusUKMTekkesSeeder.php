<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengurusUKMTekkesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tekkes = [
            [
                'id_user' => 5,                         
                'nrp' => '11222',
                'nama' => 'Billa',
                'jabatan' => 'Ketua',
            ],
        ];

        foreach ($tekkes as $tekkes) {
            DB::table('pengurus_ukm_tekkes')->insert($tekkes);
        }
    }
}