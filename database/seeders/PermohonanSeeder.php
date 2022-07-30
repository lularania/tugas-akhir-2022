<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermohonanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permohonan_layanans = [
            [
                'id_mahasiswa' => 1,
                'id_layanan' => 1,
                'id_status' => 1,
                'judul_keluhan' => 'Nyeri di Perut Bagian Atas',
                'deskripsi_keluhan' => 'Kondisi ini saya alami ketika saya membawa barang berat, atau setelah makan. Sudah saya rasakan kurang lebih sekitar 2 minggu belakangan ini.',
                'berkas' => 'files/contoh-kesehatan.pdf',
                'created_by' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id_mahasiswa' => 1,
                'id_layanan' => 1,
                'id_status' => 2,
                'judul_keluhan' => 'Hidung Berdarah Ketika Terlalu Letih',
                'deskripsi_keluhan' => 'Kondisi ini saya alami ketika saya berkegiatan berat, seperti olahraga, membawa barang banyak atau setelah berpergian jauh.',
                'berkas' => 'files/contoh-kesehatan.pdf',
                'created_by' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id_mahasiswa' => 2,
                'id_layanan' => 1,
                'id_status' => 2,
                'judul_keluhan' => 'Konsultasi Mengenai Benjolan di Area Bahu',
                'deskripsi_keluhan' => 'Terdapat benjolan padat dan kecil di bagian bahu saya, apakah ini merupakan gejala penyakit berat seperti kanker dan lain lain?',
                'berkas' => 'files/contoh-kesehatan.pdf',
                'created_by' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id_mahasiswa' => 1,
                'id_layanan' => 2,
                'id_status' => 2,
                'jenis_penanganan' => 'Via Media Online Conference On-Camera',
                'judul_keluhan' => 'Susah Tidur, Overthinking',
                'deskripsi_keluhan' => 'Sering mengalami dan merasa terganggu',
                'berkas' => 'files/contoh-konseling.pdf',
                'created_by' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id_mahasiswa' => 2,
                'id_layanan' => 1,
                'id_status' => 2,
                'judul_keluhan' => 'Hidung Tersumbat Setiap Malam Hari',
                'deskripsi_keluhan' => 'Sering merasa terganggu dengan hidung tersumbat, dan mata berair.',
                'berkas' => 'files/contoh-konseling.pdf',
                'created_by' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id_mahasiswa' => 2,
                'id_layanan' => 2,
                'id_status' => 2,
                'jenis_penanganan' => 'Via Media Online Conference Off-Camera',
                'judul_keluhan' => 'Gejala Anxiety',
                'deskripsi_keluhan' => 'Ketika berada di lingkungan ramai, merasa ketakutan dan cemas.',
                'berkas' => 'files/contoh-konseling.pdf',
                'created_by' => 1,
                'created_at' => Carbon::now(),
            ],
        ];

        foreach ($permohonan_layanans as $permohonan_layanans) {
            DB::table('permohonan_layanans')->insert($permohonan_layanans);
        }
    }
}