<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prodi = [
            [
                'prodi' => 'D3 Teknik Elektronika',
            ],
            [
                'prodi' => 'D3 Teknik Telekomunikasi',
            ],
            [
                'prodi' => 'D3 Teknik Elektro Industri',
            ],
            [
                'prodi' => 'D3 Teknik Informatika',
            ],
            [
                'prodi' => 'D3 PJJ Teknik Telekomunikasi',
            ],
            [
                'prodi' => 'D3 Teknik Informatika PSDKU Lamongan',
            ],
            [
                'prodi' => 'D3 Teknik Informatika PSDKU Sumenep',
            ],
            [
                'prodi' => 'D3 Teknologi Multimedia dan Broadcasting',
            ],
            [
                'prodi' => 'D3 Teknologi Multimedia dan Broadcasting PSDKU Lamongan',
            ],
            [
                'prodi' => 'D3 Teknologi Multimedia dan Broadcasting PSDKU Sumenep',
            ],
            [
                'prodi' => 'D4 Teknik Elektronika',
            ],
            [
                'prodi' => 'D4 Teknik Telekomunikasi',
            ],
            [
                'prodi' => 'D4 Teknik Elektro Industri',
            ],
            [
                'prodi' => 'D4 PJJ Teknik Telekomunikasi',
            ],
            [
                'prodi' => 'D4 Teknik Informatika',
            ],
            [
                'prodi' => 'D4 Teknik Komputer',
            ],
            [
                'prodi' => 'D4 Teknik Mekatronika',
            ],
            [
                'prodi' => 'D4 Sistem Pembangkit Energi',
            ],
            [
                'prodi' => 'D4 Teknologi Game',
            ],
            [
                'prodi' => 'D4 Teknologi Rekayasa Internet',
            ],
            [
                'prodi' => 'D4 Sains Data Terapan',
            ],
            [
                'prodi' => 'D4 Teknologi Rekayasa Multimedia',
            ],
            [
                'prodi' => 'S2 Teknik Elektro',
            ],
            [
                'prodi' => 'S2 Teknik Informatika dan Komputer',
            ],
        ];

        foreach ($prodi as $prodi) {
            DB::table('prodi')->insert($prodi);
        }
    }
}
