<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'kemahasiswaan',
                'guard_name' => 'web',
            ],
            [
                'name' => 'mahasiswa',
                'guard_name' => 'web',
            ],
            [
                'name' => 'dokter',
                'guard_name' => 'web',
            ],
            [
                'name' => 'psikolog',
                'guard_name' => 'web',
            ],
            [
                'name' => 'pengurus_tekkes',
                'guard_name' => 'web',
            ],
        ];

        foreach ($roles as $role) {
            DB::table('roles')->insert($role);
        }
    }
}
