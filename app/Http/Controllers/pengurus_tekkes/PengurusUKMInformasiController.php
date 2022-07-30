<?php

namespace App\Http\Controllers\pengurus_tekkes;

use App\Http\Controllers\Controller;
use App\Models\TenagaKesehatan;
use App\Models\InformasiKesehatan;
use App\Models\PengurusUKMTekkes;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PengurusUKMInformasiController extends Controller
{
    public function __construct()
    {
        $this->informasi = new InformasiKesehatan();
        $this->tenagakesehatan = new TenagaKesehatan();
        $this->tekkes = new PengurusUKMTekkes();
        $this->status = new Status();
    }

    public function index(Request $request)
    {
        $colors = [
            'danger', 'primary', 'primary','primary','primary','primary','primary','primary'
        ];

        if ($request->has('search')) {
            $informasi = $this->informasi
                ->allData()
                ->where('judul', 'LIKE', '%' . $request->search . '%')
                ->paginate(20);
        } else {
            $informasi = $this->informasi
                ->allData()
                ->paginate(20);
        }

        $data = [
            'informasi' => $informasi,
            'colors' => $colors
        ];

        return view('/pengurus_tekkes/kelola-informasi/index', $data);
    }

    public function add()
    {
        $data = [
            'status' => Status::all()->whereNotIn('id', [3,4,5,6,7]),
            'tenagakesehatan' => $this->tenagakesehatan->allData(),
        ];

        return view('/pengurus_tekkes/kelola-informasi/add', $data);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                // 'id_tenaga_kesehatan' => 'required',
                'judul' => 'required',
                // 'deskripsi' => 'required',
                'editor1' => 'required',
                'sumber' => 'required',
                'gambar' => 'required|file|max:2048|mimes:jpeg,jpg,png',                            // ! TODO : PDF
            ],
            [
                // 'id_tenaga_kesehatan.required' => 'Wajib terisi',
                'judul.required' => 'Wajib terisi',
                'sumber.required' => 'Wajib terisi',
                'gambar.required' => 'Mohon unggah gambar informasi.',
                'gambar.max' => 'Ukuran maksimal 2 Mb.',
                'gambar.mimes' => 'Unggah file dalam format JPEG, JPG, dan PNG.',
                // 'deskripsi' => 'Wajib terisi',
                'editor1' => 'Wajib terisi',
            ]
        );

        $gambar = $request->gambar->store('files', 'public');

        $informasi = InformasiKesehatan::create([
            'id_tenaga_kesehatan' => Request()->id_tenaga_kesehatan,
            'id_status' => 1,
            'judul' => Request()->judul,
            'deskripsi' => Request()->editor1,
            'sumber' => Request()->sumber,
            'gambar' => $gambar,
        ]);

        if ($informasi) {
            Alert::success('Sukses!', 'Draft Informasi Kesehatan Berhasil Ditambahkan!');
        }

        return redirect('/pengurus-tekkes/kelola-informasi');
    }

    public function detail($id)
    {
        if (!$this->informasi->detailData($id)) {
            abort(404);
        }

        $informasi = $this->informasi->detailData($id);

        $data = [
            'informasi' => $this->informasi->detailData($id),
            'gambar' => Storage::url('public/' . $this->informasi->detailData($id)->gambar),
            // 'profile' => $profile,
        ];

        return view('pengurus_tekkes/kelola-informasi/detail', $data);
    }

    public function edit($id)
    {
        $informasi = $this->informasi->detailData($id);
        if ((!$informasi) || ($informasi->id_status != 1)) {
            abort(404);
        }

        $informasi = InformasiKesehatan::find($id);
        //$gambar = Storage::url('public/' . $this->informasi->detailData($id)->gambar);

        $data = [
            'informasi' => $informasi,
            'status' => Status::all()->whereNotIn('id', [3,4,5,6,7]),
            'tenagakesehatan' => $this->tenagakesehatan->allData(),
            //'gambar' => $gambar,
        ];

        return view('/pengurus_tekkes.kelola-informasi.edit', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate(
            [
                // 'id_tenaga_kesehatan' => 'required',
                'judul' => 'required',
                // 'deskripsi' => 'required',
                'sumber' => 'required',
                'gambar' => 'required|file|max:2048|mimes:jpeg,jpg,png',  
                'editor1' => 'required',                          // ! TODO : PDF
            ],
            [
                // 'id_tenaga_kesehatan.required' => 'Wajib terisi',
                'judul.required' => 'Wajib terisi',
                'sumber.required' => 'Wajib terisi',
                'gambar.required' => 'Mohon unggah gambar informasi.',
                'gambar.max' => 'Ukuran maksimal 2 Mb.',
                'gambar.mimes' => 'Unggah file dalam format JPEG, JPG, dan PNG.',
                'editor1' => 'Wajib terisi',
            ]
        );

        $file = InformasiKesehatan::where('id', $id)->first()->gambar;

        if ($request->hasFile('gambar')) {
            if ($file != null) {
                $oldfilepath = storage_path('app/public' . '/' . $file);
                unlink($oldfilepath);
            }
            $gambar = $request->gambar->store('files', 'public');
        } else {
            $gambar = $file;
        }

        $data = [
            'id_tenaga_kesehatan' => Request()->id_tenaga_kesehatan,
            'id_status' => 1,
            'judul' => Request()->judul,
            'deskripsi' => Request()->editor1,
            'sumber' => Request()->sumber,
            'gambar' => $gambar,
        ];

        $informasi = InformasiKesehatan::where('id', $id)->update($data);

        if ($informasi) {
            Alert::success('Sukses!', 'Data Informasi Kesehatan Berhasil Diubah!');
        }

        return redirect('/pengurus-tekkes/kelola-informasi');
    }

    public function destroy($id)
    {
        if ((!InformasiKesehatan::where('id', $id)->first()) || (InformasiKesehatan::where('id', $id)->first()->id_status != 1)) {
            abort(404);
        }

        $filename = InformasiKesehatan::where('id', $id)->first()->gambar;

        if ($filename) {
            $file = storage_path('app/public' . '/' . $filename);
            unlink($file);
        }

        $informasi = $this->informasi->deleteData($id);

        if ($informasi) {
            Alert::success('Sukses!', 'Data Berhasil Dihapus!');
        }
        return redirect('pengurus-tekkes/kelola-informasi');
    }

    public function apply($id)
    {
        $data = [
            'id_status' => 8,
            'created_at' => Carbon::now(),
        ];

        $informasi = InformasiKesehatan::where('id', $id);
        if ($informasi->first()->id_status == 1) {
            $update = $informasi->update($data);
        } else {
            abort(404);
        }

        if ($update) {
            Alert::success('Sukses!', 'Informasi Kesehatan Berhasil Diunggah!');
        }

        return redirect()->back();
    }

    public function viewFile($id)
    {
        $informasi = $this->informasi->detailData($id);
        return response()->file(storage_path('app/public' . '/' . $informasi->gambar));
    }

    public function generateFile($id)
    {
        $informasi = $this->informasi->detailData($id);
        return response()->download(storage_path('app/public' . '/' . $informasi->gambar));
    }

    public function informasi()
    {
        $informasi = $this->informasi->allData()->where('id_status', [8])->paginate(12);

        $data = [
            'informasi' => $informasi,
        ];

        return view('/pengurus_tekkes/informasi/index', $data);
    }

    public function informasiDetail($id)
    {
        if ((!$this->informasi->detailData($id)) || ($this->informasi->detailData($id)->id_status == 1)) {
            abort(404);
        }

        $data = [
            'informasi' => $this->informasi->detailData($id),
        ];
        
        return view('/pengurus_tekkes/informasi/detail', $data);
        // return view('/mahasiswa/informasi-kesehatan');
    }
}