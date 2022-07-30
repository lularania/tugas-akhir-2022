<?php

namespace App\Http\Controllers\kemahasiswaan;

use App\Http\Controllers\Controller;
use App\Models\Kemahasiswaan;
use App\Models\Mahasiswa;
use App\Models\TenagaKesehatan;
use App\Models\JenisLayanan;
use App\Models\PermohonanLayanan;
use App\Models\User;
use App\Models\Dokter;
use App\Models\Psikolog;
use App\Models\PengurusUKMTekkes;

class KemahasiswaanHomeController extends Controller
{
    public function __construct()
    {
        $this->user = new User();
        $this->kemahasiswaan = new Kemahasiswaan();
        $this->mahasiswa = new Mahasiswa();
        $this->tenagakesehatan = new TenagaKesehatan();
        $this->permohonan = new PermohonanLayanan();
        $this->dokter = new Dokter();
        $this->psikolog = new Psikolog();
        $this->tekkes = new PengurusUKMTekkes();
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
            'kemahasiswaan' => $this->kemahasiswaan->countKemahasiswaan(),
            'mahasiswa' => $this->mahasiswa->countMahasiswa(),
            'tenagakesehatan' => $this->tenagakesehatan->countTenagaKesehatan(),
            'permohonan' => $this->permohonan->countPermohonan(),
            'tekkes' => $this->tekkes->countTekkes(),
            'axisAllPermohonan' => collect($grafikAllPermohonan)->keys()->all(),
            'jumlahAllPermohonan' => $this->countData($grafikAllPermohonan),
            'axis1' => collect($grafik[1])->keys()->all(),
            'jumlah1' => $this->countData($grafik[1]),
            'axis2' => collect($grafik[2])->keys()->all(),
            'jumlah2' => $this->countData($grafik[2]),
            'axis3' => collect($grafik[3])->keys()->all(),
            'jumlah3' => $this->countData($grafik[3]),
            'axis4' => collect($grafik[4])->keys()->all(),
            'jumlah4' => $this->countData($grafik[4]),
            'axis5' => collect($grafik[5])->keys()->all(),
            'jumlah5' => $this->countData($grafik[5]),
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
}