<?php

namespace App\Http\Controllers\kemahasiswaan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\JenisPenanganan;
// use App\Models\PermohonanModel;

class JenisPenangananController extends Controller
{
    public function __construct()
    {
        $this->penanganan = new JenisPenanganan();
    }

    public function index()
    {
        $data = [
            'penanganan' => $this->penanganan->allData2(),
            'penangananall' => $this->penanganan->countPenanganan(),
        ];
        return view('kemahasiswaan.jenis_penanganan.index', $data);
    }

    public function add()
    {
        return view('kemahasiswaan.jenis_penanganan.add');
    }

    public function show($id)
    {
        if (!$this->penanganan->detailData($id)) {
            abort(404);
        }

        $data = [
            'penanganan' => $this->penanganan->detailData($id),
        ];

        return view('kemahasiswaan.jenis_penanganan.detail', $data);
    }

    public function store()
    {
        Request()->validate(
            [
                'penanganan' => 'required'
            ],
            [
                'penanganan.required' => 'wajib diisi!'
            ]
        );

        $data = [
            'jenis_penanganan' => Request()->penanganan
        ];
        if ($this->penanganan->addData($data)) {
            Alert::success('Sukses!', 'Data Berhasil Ditambahkan!');
        }
        return redirect('/kemahasiswaan/jenis-penanganan');
    }

    public function edit($id)
    {
        $penanganan = JenisPenanganan::findOrFail($id);

        $data = [
            'penanganan' => $penanganan,
        ];
        return view('kemahasiswaan.jenis_penanganan.edit', $data);
    }

    public function update($id)
    {
        Request()->validate(
            [
                'penanganan' => 'required'
            ],
            [
                'penanganan.required' => 'wajib diisi!'
            ]
        );

        $data = [
            'jenis_penanganan' => Request()->penanganan
        ];
        $penanganan = $this->penanganan->updateData($id, $data);
        if ($penanganan) {
            Alert::success('Sukses!', 'Data Berhasil Diupdate!');
        }
        return redirect('/kemahasiswaan/jenis-penanganan');
    }

    public function destroy($id)
    {
        if ($this->penanganan->deleteData($id)) {
            Alert::success('Sukses!', 'Data Berhasil Dihapus!');
        }
        return redirect('/kemahasiswaan/jenis-penanganan');
    }
}
