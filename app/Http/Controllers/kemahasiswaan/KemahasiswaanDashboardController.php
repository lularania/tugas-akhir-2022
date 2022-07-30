<?php

namespace App\Http\Controllers\kemahasiswaan;

use App\Http\Controllers\Controller;
use App\Models\Kemahasiswaan;
use App\Models\Mahasiswa;
use App\Models\TenagaKesehatan;
use App\Models\JenisLayanan;
use App\Models\PermohonanLayanan;
use App\Models\PengurusUKMTekkes;
use App\Models\User;
use App\Models\Prodi;

class KemahasiswaanDashboardController extends Controller
{

    public function __construct()
    {
        $this->user = new User();
        $this->kemahasiswaan = new Kemahasiswaan();
        $this->mahasiswa = new Mahasiswa();
        $this->tenagakesehatan = new TenagaKesehatan();
        $this->permohonan = new PermohonanLayanan();
        $this->tekkes = new PengurusUKMTekkes();
        $this->prodi = new Prodi();
    }

    public function index()
    {
        $i = 1;
        foreach (JenisLayanan::all()->toArray() as $data) {
            $grafik[$i] = $this->permohonan->getDataGrafik($i);
            $i++;
        }

        $grafikAllPermohonan = $this->permohonan->getAllGrafik();

        $data = [
            'user' => $this->user->countUser(),
            'kemahasiswaan' => $this->kemahasiswaan->countKemahasiswaan(),
            'mahasiswa' => $this->mahasiswa->countMahasiswa(),
            'dokter' => $this->tenagakesehatan->countDokter(),
            'psikolog' => $this->tenagakesehatan->countPsikolog(),
            'permohonan' => $this->permohonan->countPermohonan(),
            'permohonan2' => $this->permohonan->countPermohonanByStatus(2),
            'permohonan3' => $this->permohonan->countPermohonanByStatus(3),
            'tekkes' => $this->tekkes->countTekkes(),
            'prodi' => $this->prodi->countProdi(),
            'axisAllPermohonan' => collect($grafikAllPermohonan)->keys()->all(),
            'jumlahAllPermohonan' => $this->countData($grafikAllPermohonan),
            'axis1' => collect($grafik[1])->keys()->all(),
            'jumlah1' => $this->countData($grafik[1]),
            'axis2' => collect($grafik[2])->keys()->all(),
            'jumlah2' => $this->countData($grafik[2]),
        ];
        return view('kemahasiswaan.dashboard', $data);
    }

    public function countData($grafik)
    {
        $i = 0;
        if (!$grafik->isEmpty()) {
            foreach ($grafik as $key => $value) {
                $jumlah[$i] = $value->count();
                // $jumlah1[$key] = $value->count();
                $i++;
            }
        } else {
            $jumlah = [];
        }
        return $jumlah;
    }

    public function pedoman()
    {

        return view('/kemahasiswaan/pedoman');
    }
}
