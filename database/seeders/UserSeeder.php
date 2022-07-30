<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id_role' => 1,                         // * Kemahasiswaan
                'email' => 'hendrik@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'kemahasiswaan',
            ],
            [
                'id_role' => 2,                         // * Mahasiswa
                'email' => 'lula@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'mahasiswa',
            ],
            [
                'id_role' => 3,                         // * Dokter
                'email' => 'rania@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'dokter',
            ],
            [
                'id_role' => 4,                         // * Psikolog
                'email' => 'salsa@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'psikolog',
            ],
            [
                'id_role' => 5,                         // * UKM
                'email' => 'billa@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'pengurus_tekkes',
            ],
            [
                'id_role' => 2,                         // * Mahasiswa
                'email' => 'char@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'mahasiswa',
            ],
            [
                'id_role' => 3,                         // * Dokter
                'email' => 'gerald@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'dokter',
            ],
            [
                'id_role' => 4,                         // * Dokter
                'email' => 'rizky@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'psikolog',
            ],
        ];

        foreach ($users as $data) {
            $user = User::create([
                'id_role' => $data['id_role'],
                'email' => $data['email'],
                'password' => $data['password'],
            ]);
            $user->assignRole($data['role']);
        }
    }
}