<?php

namespace App\Http\Controllers\dokter;

use App\Http\Controllers\Controller;
use App\Models\Kemahasiswaan;
use App\Models\Mahasiswa;
use App\Models\TenagaKesehatan;
use App\Models\JenisLayanan;
use App\Models\PermohonanLayanan;
use App\Models\User;
use App\Models\Status;
use App\Models\History;

class DokterDashboardController extends Controller
{
    public function __construct()
    {
        $this->user = new User();
        $this->kemahasiswaan = new Kemahasiswaan();
        $this->mahasiswa = new Mahasiswa();
        $this->tenagakesehatan = new TenagaKesehatan();
        $this->permohonan = new PermohonanLayanan();
        $this->history = new History();
    }

    public function index()
    {
        $i = 1;
        foreach (Status::all()->toArray() as $data) {
            $grafik[$i] = $this->permohonan->getDataGrafikDokter($i);
            $i++;
        }

        $grafikAllPermohonan = $this->permohonan->getAllGrafikDokter();

        $data = [
            'permohonan3' => $this->permohonan->countPermohonanDokter(3),
            'permohonan4' => $this->permohonan->countPermohonanDokter(4),
            'permohonan5' => $this->permohonan->countPermohonanDokter(5),
            'permohonan6' => $this->permohonan->countPermohonanDokter(6),
            'permohonan7' => $this->permohonan->countPermohonanDokter(7),
            'permohonan9' => $this->permohonan->countPermohonanDokter(9),
            'permohonan10' => $this->permohonan->countPermohonanDokter(10),
            'axisAllPermohonan' => collect($grafikAllPermohonan)->keys()->all(),
            'jumlahAllPermohonan' => $this->countData($grafikAllPermohonan),
            'axis7' => collect($grafik[7])->keys()->all(),
            'jumlah7' => $this->countData($grafik[7]),
            'axis9' => collect($grafik[9])->keys()->all(),
            'jumlah9' => $this->countData($grafik[9]),
        ];
            return view('dokter.dashboard', $data);
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

        return view('/dokter/pedoman');
    }
}