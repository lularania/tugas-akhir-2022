<?php

namespace App\Http\Controllers\pengurus_tekkes;

use App\Http\Controllers\Controller;
use App\Models\TenagaKesehatan;
use App\Models\Status;
use App\Models\InformasiKesehatan;
use App\Models\User;
use Carbon\Carbon;

class PengurusUKMDashboardController extends Controller
{
    public function __construct()
    {
        $this->tenagakesehatan = new TenagaKesehatan();
        $this->informasi = new InformasiKesehatan();
        $this->status = new Status();
    }

    public function index()
    {
        foreach (Status::all()->toArray() as $data) {
            $grafik[1] = $this->informasi->getDataGrafik(1);
            $grafik[8] = $this->informasi->getDataGrafik(8);
        }

        $grafikAllInformasi = $this->informasi->getAllGrafik();

        $data = [
            'informasi1' => $this->informasi->countInformasiByStatus(1),
            'informasi8' => $this->informasi->countInformasiByStatus(8),
            'informasi' => $this->informasi->countInformasi(),
            'axisAllInformasi' => $this->informasi->getAxisGrafik(),
            'jumlahAllInformasi' => $this->countData($grafikAllInformasi),
            'jumlah1' => $this->countData($grafik[1]),
            'jumlah8' => $this->countData($grafik[8]),
        ]; 
        //dd($grafik[8]);
    return view('pengurus_tekkes.dashboard', $data);
}

    public function countData($grafik)
    {
        $i=0;
        if (!$grafik->isEmpty()) {
            foreach ($grafik as $key => $value) {
                $jumlah[$i] = $value->count();
                // $jumlah[8] = $value->count();
                $i++;
            }
        } else {
            $jumlah = [];
        }
        return $jumlah;
    }

    public function pedoman()
    {

        return view('/pengurus_tekkes/pedoman');
    }
}