<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\TenagaKesehatan;
use App\Models\PermohonanLayanan;
use App\Models\InformasiKesehatan;
use Illuminate\Support\Facades\Session;

class LandingPageController extends Controller
{
    public function __construct()
    {
        $this->mahasiswa = new Mahasiswa();
        $this->tenagakesehatan = new TenagaKesehatan();
        $this->permohonan = new PermohonanLayanan();
        $this->informasi = new InformasiKesehatan;
        $this->user = new User();
    }

    public function index()
    {
        $informasi = $this->informasi->allData()->where('id_status', [8])->paginate(9);
        $tenagakesehatan = $this->tenagakesehatan->allData2()->paginate(4);
        $data = [
            'mahasiswa' => $this->mahasiswa->countMahasiswa(),
            'tenagakesehatan' => $this->tenagakesehatan->countTenagaKesehatan(),
            'permohonan' => $this->permohonan->countPermohonan(),
            'informasi' => $this->informasi->countInformasi(),
            'informasi2' => $informasi,
            'tenagakesehatan3' => $tenagakesehatan,
        ];
        return view('index', $data);
    }
}
