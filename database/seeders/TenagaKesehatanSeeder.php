<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class TenagaKesehatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenaga_kesehatans = [
            [
                'nama_tenaga_kesehatan' => 'Rania',                    // * User Dokter
                'id_user' => 3,
                'jabatan_tenaga_kesehatan' => 'Dokter Jaga',
                'foto_tenaga_kesehatan' => 'files/team-2.jpg',
                'link_meeting' => 'https://meet.google.com/hwx-pzdt-jss'
            ],
            [
                'nama_tenaga_kesehatan' => 'Rizky',                    // * User Psikolog
                'id_user' => 8,
                'jabatan_tenaga_kesehatan' => 'Psikolog Jaga',
                'foto_tenaga_kesehatan' => 'files/team-1.jpg',
                'link_meeting' => 'https://meet.google.com/hwx-pzdt-jss'
            ],
            [
                'nama_tenaga_kesehatan' => 'Salsa',                    // * User Psikolog
                'id_user' => 4,
                'jabatan_tenaga_kesehatan' => 'Psikolog Jaga',
                'foto_tenaga_kesehatan' => 'files/team-4.jpg',
                'link_meeting' => 'https://meet.google.com/hwx-pzdt-jss'
            ],
            [
                'nama_tenaga_kesehatan' => 'Gerald',                    // * User Psikolog
                'id_user' => 7,
                'jabatan_tenaga_kesehatan' => 'Dokter Magang',
                'foto_tenaga_kesehatan' => 'files/team-3.jpg',
                'link_meeting' => 'https://meet.google.com/hwx-pzdt-jss'
            ],
            
        ];

        foreach ($tenaga_kesehatans as $tenaga_kesehatans) {
            DB::table('tenaga_kesehatans')->insert($tenaga_kesehatans);
        }
    }
}