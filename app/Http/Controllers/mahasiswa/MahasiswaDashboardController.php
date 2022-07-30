<?php

namespace App\Http\Controllers\mahasiswa;

use App\Models\JenisLayanan;
use App\Models\PermohonanLayanan;
use App\Models\InformasiKesehatan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class MahasiswaDashboardController extends Controller
{
    public function __construct()
    {
        $this->permohonan = new PermohonanLayanan();
        $this->layanan = new JenisLayanan();
        $this->informasi = new InformasiKesehatan();  
    }

    public function index()
    {
        $i = 1;
        foreach (JenisLayanan::all()->toArray() as $data) {
            $grafik[$i] = $this->permohonan->getDataGrafikMahasiswa($i);
            $i++;
        }

        $grafikAllPermohonan = $this->permohonan->getAllGrafikMahasiswa();

        $data = [
            'permohonan1' => $this->permohonan->countPermohonanMahasiswa(1),
            'permohonan2' => $this->permohonan->countPermohonanMahasiswa(2),
            'permohonan3' => $this->permohonan->countPermohonanMahasiswa(3),
            'permohonan4' => $this->permohonan->countPermohonanMahasiswa(4),
            'permohonan5' => $this->permohonan->countPermohonanMahasiswa(5),
            'permohonan6' => $this->permohonan->countPermohonanMahasiswa(6),
            'permohonan7' => $this->permohonan->countPermohonanMahasiswa(7),
            'permohonan9' => $this->permohonan->countPermohonanMahasiswa(9),
            'permohonan9' => $this->permohonan->countPermohonanMahasiswa(10),
            'axisAllPermohonan' => collect($grafikAllPermohonan)->keys()->all(),
            'jumlahAllPermohonan' => $this->countData($grafikAllPermohonan),
            'axis1' => collect($grafik[1])->keys()->all(),
            'jumlah1' => $this->countData($grafik[1]),
            'axis2' => collect($grafik[2])->keys()->all(),
            'jumlah2' => $this->countData($grafik[2]),
        ];

        return view('mahasiswa.dashboard', $data);
        //return view('mahasiswa.dashboard');
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

    // public function pedoman() {
    //     return view('admin_opd.pedoman');
    // }

    public function informasi()
    {
        $informasi = $this->informasi->allData()->where('id_status', [8])->paginate(12);

        $data = [
            'informasi' => $informasi,
        ];

        return view('/mahasiswa/informasi-kesehatan/index', $data);
    }

    public function informasidetail($id)
    {
        if ((!$this->informasi->detailData($id)) || ($this->informasi->detailData($id)->id_status == 1)) {
            abort(404);
        }

        // Session::set('informasiDetail', '/mahasiswa/informasi-kesehatan/detail/'.$id);

        $data = [
            'informasi' => $this->informasi->detailData($id),
        ];
        
        return view('/mahasiswa/informasi-kesehatan/detail', $data);
    }

    public function pedoman()
    {

        return view('/mahasiswa/pedoman');
    }
    public function downloadBerkas()
    {
        return response()->download('assets/img/contoh-berkas.pdf');
    }
}