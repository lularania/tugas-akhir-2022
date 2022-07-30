<?php

namespace App\Http\Controllers\mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\PermohonanLayanan;
use App\Models\JenisLayanan;
use App\Models\JenisPenanganan;
use App\Models\Mahasiswa;
use App\Models\TenagaKesehatan;
use App\Models\History;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class MahasiswaPermohonanController extends Controller
{
    public function __construct()
    {
        $this->permohonan = new PermohonanLayanan();
        $this->layanan = new JenisLayanan();
        $this->mahasiswa = new Mahasiswa();
        $this->histories = new History();
        $this->penanganan = new JenisPenanganan();
    }

    public function index(Request $request)
    {
        $colors = [
            'danger', 'info', 'primary', 'warning', 'primary', 'danger', 'success', 'success', 'info', 'danger'
        ];

        if ($request->has('search')) {
            $permohonan = $this->permohonan
                ->allData()
                ->where('judul_keluhan', 'LIKE', '%' . $request->search . '%')
                ->orderBy('created_at', 'desc')
                ->where(
                    'id_mahasiswa',
                    Mahasiswa::where('id_user', Auth::user()->id)->first()->id
                )->paginate(10);
        } else {
            $permohonan = $this->permohonan
                ->allData()
                ->orderBy('created_at', 'desc')
                ->where(
                    'id_mahasiswa',
                    Mahasiswa::where('id_user', Auth::user()->id)->first()->id
                )->paginate(10);
        }

        $data = [
            'permohonan' => $permohonan,
            'colors' => $colors
        ];

        return view('/mahasiswa/permohonan-layanan/index', $data);
    }

    public function add()
    {
        $prodi = DB::table('prodi')
            ->distinct()
            ->get();

        $data = [
            'layanan' => $this->layanan->allData(),
            'penanganan' => $this->penanganan->allData(),
            'prodi' => $prodi,
        ];

        return view('/mahasiswa/permohonan-layanan/add', $data);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'id_layanan' => 'required',
                'judul_keluhan' => 'required',
                'berkas' => 'required|file|max:2048|mimes:jpeg,jpg,png,pdf',                            // ! TODO : PDF
                'deskripsi_keluhan' => 'max:1000',
            ],
            [
                'id_layanan.required' => 'Wajib terisi',
                'judul_keluhan.required' => 'Wajib terisi',
                'berkas.required' => 'Mohon unggah berkas permohonan.',
                'berkas.max' => 'Ukuran maksimal 2 Mb.',
                'berkas.mimes' => 'Unggah file dalam format JPEG, JPG, PNG, dan PDF.',
                'deskripsi_keluhan.max' => 'Anda telah mencapai kata-kata maksimum.',
            ]
        );

        $prodi = Mahasiswa::where('id_user', Auth::user()->id)->first()->prodi;
        $berkas = $request->berkas->store('files', 'public');

        $permohonan = PermohonanLayanan::create([
            'id_mahasiswa' => Mahasiswa::where('id_user', Auth::user()->id)->first()->id,
            'id_layanan' => Request()->id_layanan,
            'id_status' => 1,
            'jenis_penanganan' => Request()->jenis_penanganan,
            'judul_keluhan' => Request()->judul_keluhan,
            'deskripsi_keluhan' => Request()->deskripsi_keluhan,
            'prodi' => $prodi,
            'berkas' => $berkas,
        ]);

        if ($permohonan) {
            Alert::success('Sukses!', 'Draft Berhasil Ditambahkan!');
        }

        return redirect('/mahasiswa/permohonan-layanan');
    }

    public function detail($id)
    {
        // if (!$this->permohonan->detailData($id)) {
        //     abort(404);
        // }

        $cekStatus = $this->permohonan->getDataDetail($id);
        if ($cekStatus->status == "Penanganan Online") {
            $permohonan = $this->permohonan->detailData2($id);
        }else{
            $permohonan = $this->permohonan->detailData($id);
        }

        $histories = $this->histories->getData($id)
            ->groupBy(function ($date) {
                return Carbon::parse($date->updated_at)
                    ->format('d-F-Y');
            });
        
        $profile = Mahasiswa::where('id', $permohonan->id_mahasiswa)->first();

        if (is_null($permohonan->id_mahasiswa)) {
            $profile = TenagaKesehatan::where('id', $permohonan->created_by)->first();
        }

        $data = [
            'permohonan' => $this->permohonan->detailData($id),
            'permohonan2' => $this->permohonan->detailData2($id),
            'berkas' => Storage::url('public/' . $this->permohonan->detailData($id)->berkas),
            'tangani' => History::where('id_permohonan', $id)->whereNotNull('penanganan')->orderBy('id', 'desc')->first(),
            'tolak' => History::where('id_permohonan', $id)->whereNotNull('alasan')->orderBy('id', 'desc')->first(),
            'online' => History::where('id_permohonan', $id)->whereNotNull('feedback')->orderBy('id', 'desc')->first(),
            'offline' => History::where('id_permohonan', $id)->whereNotNull('feedback')->orderBy('id', 'desc')->first(),
            'batal' => History::where('id_permohonan', $id)->whereNotNull('alasan')->orderBy('id', 'desc')->first(),
            'histories' => $histories,
            'dateHistories' => array_keys($histories->all()),
            'profile' => $profile,
        ];

        return view('mahasiswa/permohonan-layanan/detail', $data);
    }

    public function edit($id)
    {
        $permohonan = $this->permohonan->detailData($id);
        if ((!$permohonan) || ($permohonan->id_status != 1)) {
            abort(404);
        }

        $permohonan = PermohonanLayanan::find($id);
        $opsi_layanan = DB::table('jenis_layanan')
            ->whereNotIn('id', [$permohonan->id_layanan])
            ->get();

        $opsi_penanganan = DB::table('jenis_penanganan')
            ->whereNotIn('jenis_penanganan', [$permohonan->jenis_penanganan])
            ->get();

        $data = [
            'permohonan' => $permohonan,
            'layanan' => DB::table('jenis_layanan')->where('id', $permohonan->id_layanan)->first(),
            'penanganan' => DB::table('jenis_penanganan')->where('id', $permohonan->jenis_penanganan)->first(),
            'opsi_layanan' => $opsi_layanan->all(),
            'opsi_penanganan' => $opsi_penanganan->all(),
        ];

        return view('/mahasiswa.permohonan-layanan.edit', $data);
    }

    public function update($id, Request $request)
    {

        $request->validate(
            [
                'id_layanan' => 'required',
                'judul_keluhan' => 'required',
                'berkas' => 'required|file|max:2048|mimes:jpeg,jpg,png,pdf',                            // ! TODO : PDF
                'deskripsi_keluhan' => 'max:1000',
            ],
            [
                'id_layanan.required' => 'Wajib terisi',
                'judul_keluhan.required' => 'Wajib terisi',
                'berkas.required' => 'Mohon unggah berkas permohonan.',
                'berkas.max' => 'Ukuran maksimal 2 Mb.',
                'berkas.mimes' => 'Unggah file dalam format JPEG, JPG, PNG, dan PDF.',
                'deskripsi_keluhan.max' => 'Anda telah mencapai kata-kata maksimum.',
            ]
        );

        $file = PermohonanLayanan::where('id', $id)->first()->berkas;

        if ($request->hasFile('berkas')) {
            if ($file != null) {
                $oldfilepath = storage_path('app/public' . '/' . $file);
                unlink($oldfilepath);
            }
            $berkas = $request->berkas->store('files', 'public');
        } else {
            $berkas = $file;
        }

        $data = [
            'id_mahasiswa' => Mahasiswa::where('id_user', Auth::user()->id)->first()->id,
            // 'id_layanan' => Request()->id_layanan,
            'id_status' => 1,
            'jenis_penanganan' => Request()->jenis_penanganan,
            'judul_keluhan' => Request()->judul_keluhan,
            'deskripsi_keluhan' => Request()->deskripsi_keluhan,
            'berkas' => $berkas,
        ];

        $permohonan = PermohonanLayanan::where('id', $id)->update($data);

        if ($permohonan) {
            Alert::success('Sukses!', 'Data Berhasil Diubah!');
        }

        return redirect('/mahasiswa/permohonan-layanan');
    }

    public function destroy($id)
    {
        if ((!PermohonanLayanan::where('id', $id)->first()) || (PermohonanLayanan::where('id', $id)->first()->id_status != 1)) {
            abort(404);
        }

        $history = DB::table('histories')
            ->where('id_permohonan', $id)
            ->delete();

        $filename = PermohonanLayanan::where('id', $id)->first()->berkas;

        if ($filename) {
            $file = storage_path('app/public' . '/' . $filename);
            unlink($file);
        }

        $permohonan = $this->permohonan->deleteData($id);

        if ($permohonan) {
            Alert::success('Sukses!', 'Data Berhasil Dihapus!');
        }
        return redirect('mahasiswa/permohonan-layanan');
    }

    public function apply($id)
    {
        $data = [
            'id_status' => 2,
            'created_at' => Carbon::now(),
        ];

        $permohonan = PermohonanLayanan::where('id', $id);
        if ($permohonan->first()->id_status == 1) {
            $update = $permohonan->update($data);
        } else {
            abort(404);
        }

        if ($update) {
            Alert::success('Sukses!', 'Permohonan Layanan Berhasil Diajukan!');
        }

        return redirect()->back();
    }

    public function viewFile($id)
    {
        $permohonan = $this->permohonan->detailData($id);
        return response()->file(storage_path('app/public' . '/' . $permohonan->berkas));
    }

    public function generateFile($id)
    {
        $permohonan = $this->permohonan->detailData($id);
        return response()->download(storage_path('app/public' . '/' . $permohonan->berkas));
    }
} 