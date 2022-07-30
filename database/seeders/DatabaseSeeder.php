<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Artisan::call('storage:link');

        $this->call([
            RoleSeeder::class,
            StatusSeeder::class,
            JenisLayananSeeder::class,
            ProdiSeeder::class,
            UserSeeder::class,
            KemahasiswaanSeeder::class,
            MahasiswaSeeder::class,
            KelasSeeder::class,
            AngkatanSeeder::class,
            PermohonanSeeder::class,
            TenagaKesehatanSeeder::class,
            PengurusUKMTekkesSeeder::class,
            InformasiKesehatanSeeder::class,
            JenisPenangananSeeder::class,
        ]);
        
    }
}
