<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InformasiKesehatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $informasi_kesehatan = [
            [
                'id_tenaga_kesehatan' => 1,                    
                'id_status' => 8,
                'judul' => 'Mengatasi Covid-19',
                'deskripsi' => 
                '1. Hubungi penyedia layanan kesehatan atau hotline COVID-19 untuk mendapatkan informasi terkait tempat dan waktu untuk menjalani tes. <br>
                2. Taati prosedur pelacakan kontak untuk menghentikan penyebaran virus. <br>
                3. Jika tes tidak tersedia, tetaplah di rumah dan jangan lakukan kontak dengan orang lain selama 14 hari. <br>
                4. Selama masa karantina, jangan pergi ke kantor, sekolah, atau tempat-tempat umum. Mintalah seseorang mencukupi kebutuhan Anda. <br>
                5. Jaga jarak minimal 1 meter dari orang lain, termasuk anggota keluarga Anda. <br>
                6. Kenakan masker medis untuk melindungi orang lain, termasuk jika/ketika Anda perlu meminta perawatan medis. <br>
                7. Cuci tangan Anda secara rutin. <br>
                8. Gunakan ruangan yang terpisah dari anggota keluarga lain, dan jika tidak memungkinkan, selalu kenakan masker medis. <br>
                9. Pastikan ventilasi ruangan selalu baik. <br>
                10. Jika menggunakan kamar bersama orang lain, beri jarak antar-tempat tidur minimal 1 meter. <br>
                11. Amati diri Anda sendiri apakah ada gejala apa pun selama 14 hari. <br>
                12. Segera hubungi penyedia layanan kesehatan jika Anda mengalami salah satu tanda bahaya berikut: sulit bernapas, sulit berbicara atau bergerak, bingung, atau merasakan nyeri di dada. <br>
                13. Tetaplah positif dengan terus berinteraksi dengan orang-orang terdekat melalui telepon atau internet, dan dengan berolahraga di rumah.', 
                'gambar' => 'files/covid-19.jpg',
                'sumber' => 'google.com'
            ],
            [
                'id_tenaga_kesehatan' => 2,               
                'id_status' => 8,
                'judul' => 'Anxiety Disorder',
                'deskripsi' => 'Gangguan kesehatan mental yang ditandai dengan perasaan khawatir, cemas, atau takut yang cukup kuat untuk mengganggu aktivitas sehari-hari 
                Contoh gangguan kecemasan yaitu serangan panik, gangguan obsesif-kompulsif, dan gangguan stres pascatrauma. 
                Gejala berupa stres yang tidak sesuai dengan dampak peristiwa, ketidakmampuan untuk menepis kekhawatiran, dan gelisah.
                Perawatan termasuk konseling atau obat, termasuk antidepresan.
                Biasanya dapat didiagnosis sendiri
                Gejala berupa stres yang tidak sesuai dengan dampak peristiwa, ketidakmampuan untuk menepis kekhawatiran, dan gelisah. 
                Orang mungkin mengalami:
                Perilaku: gelisah, iritabilitas atau kewaspadaan berlebihan 
                Kognitif: kehilangan konsentrasi, perubahan pola pikir atau pikiran yang tidak diinginkan 
                Seluruh tubuh: kelelahan atau berkeringat 
                Juga umum: kegelisahan, cemas berlebihan, gemetaran, insomnia (kesulitan tidur), jantung berdetak cepat (palpitasi), ketakutan, merasa akan terkena musibah atau mual',
                'gambar' => 'files/anxiety.jpg',
                'sumber' => 'google.com'
            ],
            [
                'id_tenaga_kesehatan' => 2,               
                'id_status' => 8,
                'judul' => 'Apa itu Bipolar?',
                'deskripsi' => 'Suatu gangguan yang berhubungan dengan perubahan suasana hati mulai dari posisi terendah depresif/tertekan ke tertinggi/manik. 
                Penyebab pasti gangguan bipolar tidak diketahui, namun kombinasi genetika, lingkungan, serta struktur dan senyawa kimia pada otak yang berubah mungkin berperan atas terjadinya gangguan. 
                Episode manik dapat mencakup gejala seperti energi tinggi, jam tidur yang kurang, dan sering berkhayal. Episode depresi dapat meliputi gejala seperti energi rendah, motivasi rendah, dan kehilangan minat dalam aktivitas sehari-hari. Episode mood terjadi selama beberapa hari hingga berbulan-bulan sekaligus dan mungkin juga terkait dengan pikiran untuk bunuh diri. 
                Penanganan biasanya seumur hidup dan sering melibatkan kombinasi obat serta psikoterapis.',
                'gambar' => 'files/bipolar.jpg',
                'sumber' => 'google.com'
            ],
            
        ];

        foreach ($informasi_kesehatan as $informasi_kesehatan) {
            DB::table('informasi_kesehatan')->insert($informasi_kesehatan);
        }
    }
}