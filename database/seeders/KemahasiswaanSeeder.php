<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KemahasiswaanSeeder extends Seeder
{
    /** 
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kemahasiswaan = [
            [
                'id_user' => 1,                         // * Kemahasiswaan
                'nip' => '11111111',
                'nama' => 'Hendrik',
                'jabatan' => 'Kemahasiswaan',
            ],
        ];

        foreach ($kemahasiswaan as $kemahasiswaan) {
            DB::table('kemahasiswaans')->insert($kemahasiswaan);
        }
    }
}