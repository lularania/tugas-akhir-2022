<?php

namespace App\Http\Controllers\kemahasiswaan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Prodi;

class ProdiController extends Controller
{
    public function __construct()
    {
        $this->prodi = new Prodi();
    }

    public function index(Request $request)
    {
        if ($request->has('search')) {
            $prodi = $this->prodi
                ->allData2()
                ->where('prodi', 'LIKE', '%' . $request->search . '%')
                ->paginate(10);
        } else {
            $prodi = $this->prodi
                ->allData2()
                ->paginate(10);
        }

        $data = [
            'prodi' => $prodi,
        ];

        return view('kemahasiswaan.prodi.index', $data);
    }

    public function add()
    {
        return view('kemahasiswaan.prodi.add');
    }

    public function show($id)
    {
        if (!$this->prodi->detailData($id)) {
            abort(404);
        }

        $data = [
            'prodi' => $this->prodi->detailData($id),
        ];

        return view('kemahasiswaan.prodi.detail', $data);
    }

    public function store()
    {
        Request()->validate(
            [
                'prodi' => 'required'
            ],
            [
                'prodi.required' => 'wajib diisi!'
            ]
        );

        $data = [
            'prodi' => Request()->prodi
        ];
        if ($this->prodi->addData($data)) {
            Alert::success('Sukses!', 'Data Berhasil Ditambahkan!');
        }
        return redirect('/kemahasiswaan/prodi');
    }

    public function edit($id)
    {
        $prodi = Prodi::findOrFail($id);

        $data = [
            'prodi' => $prodi,
        ];
        return view('kemahasiswaan.prodi.edit', $data);
    }

    public function update($id)
    {
        Request()->validate(
            [
                'prodi' => 'required'
            ],
            [
                'prodi.required' => 'wajib diisi!'
            ]
        );

        $data = [
            'prodi' => Request()->prodi
        ];
        $prodi = $this->prodi->updateData($id, $data);
        if ($prodi) {
            Alert::success('Sukses!', 'Data Berhasil Diupdate!');
        }
        return redirect('/kemahasiswaan/prodi');
    }

    public function destroy($id)
    {
        if ($this->prodi->deleteData($id)) {
            Alert::success('Sukses!', 'Data Berhasil Dihapus!');
        }
        return redirect('/kemahasiswaan/prodi');
    }
}
