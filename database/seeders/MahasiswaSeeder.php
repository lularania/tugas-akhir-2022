<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mahasiswa = [
            [
                'id_user' => 2,                         
                'id_role' => 2,
                'prodi' => 'D3 Teknik Informatika',
                'nrp' => '2103191037',
                'nama' => 'Lula Rania Salsabilla',
                'angkatan' => '2019',
                'kelas' => 'Kelas B',
                'alamat' => 'Perumahan Kancil Mas Regency A9',
            ],
            [
                'id_user' => 6,                         
                'id_role' => 2,
                'prodi' => 'D3 Teknik Informatika',
                'nrp' => '2103191050',
                'nama' => 'Carissa Farry Hilmi',
                'angkatan' => '2019',
                'kelas' => 'Kelas B',
                'alamat' => 'Ngunut, Tulungagung',
            ],
        ];

        foreach ($mahasiswa as $mahasiswa) {
            DB::table('mahasiswas')->insert($mahasiswa);
        }
    }
}