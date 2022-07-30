<?php

namespace App\Http\Controllers\kemahasiswaan;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Kemahasiswaan;
use App\Models\History;
use App\Models\Prodi;
use App\Models\JenisLayanan;
use App\Models\PermohonanLayanan;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class KemahasiswaanPermohonanController extends Controller
{
    public function __construct()
    {
        $this->permohonan = new PermohonanLayanan();
        $this->layanan = new JenisLayanan();
        $this->mahasiswa = new Mahasiswa();
        $this->kemahasiswaan = new Kemahasiswaan();
        $this->histories = new History();
    }

    public function index(Request $request)
    {
        $colors = [
            'danger', 'info', 'primary', 'warning', 'primary', 'danger', 'success', 'success', 'info', 'danger'
        ];

        if ($request->has('search')) {
            $permohonan = $this->permohonan
                ->allData()
                ->where('nrp', 'LIKE', '%' . $request->search . '%')
                ->whereIn('id_status', [2])
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        } else {
            $permohonan = $this->permohonan
                ->allData()
                ->whereIn('id_status', [2])
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        }

        $data = [
            'permohonan' => $permohonan, 
            'colors' => $colors,
            'opsi_status' => Status::all(),
            'mahasiswa' => $this-> mahasiswa -> allData(),
        ];

        return view('/kemahasiswaan/permohonan-layanan/index', $data);
    }

    public function indexRiwayat(Request $request)
    {
        $colors = [
            'danger', 'info', 'primary', 'warning', 'primary', 'danger', 'success', 'success', 'info', 'danger'
        ];

        if ($request->has('search')) {
            $permohonan = $this->permohonan
                ->allData()
                ->where('nrp', 'LIKE', '%' . $request->search . '%')
                ->whereNotIn('id_status', [1,2])
                ->orderBy('updated_at', 'desc')
                ->paginate(20);
        } else {
            $permohonan = $this->permohonan
                ->allData()
                ->whereNotIn('id_status', [1,2])
                ->orderBy('updated_at', 'desc')
                ->paginate(20);
        }

        $data = [
            'permohonan' => $permohonan, 
            'colors' => $colors,
            'opsi_status' => Status::all(),
            'mahasiswa' => $this-> mahasiswa -> allData(),
        ];

        return view('/kemahasiswaan/permohonan-layanan/riwayat', $data);
    }

    public function add()
    {
        $data = [
            'layanan' => $this->layanan->allData(),
            'mahasiswa' => $this->mahasiswa->allData(),
            //'prodi' => DB::table('prodi')->get(),
            'status' => Status::all()->whereNotIn('id', [1,2,4,5,6,7,8,9,10]),
        ];

        return view('/kemahasiswaan/permohonan-layanan/add', $data);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'judul_keluhan' => 'required',
                'deskripsi_keluhan' => 'required|max:1000',
                'berkas' => 'required|file|max:2048|mimes:jpeg,jpg,png,pdf',
            ],
            [
                'judul_keluhan.required' => 'Wajib terisi',
                'deskripsi_keluhan.max' => 'Anda telah mencapai kata-kata maksimum.',
                'berkas.required' => 'Mohon unggah berkas permohonan.',
                'berkas.max' => 'Ukuran maksimal 2 Mb.',
                'berkas.mimes' => 'Unggah file dalam format JPEG, JPG, PNG, dan PDF.',
            ]
        );

        $berkas = $request->berkas->store('files', 'public');

        $permohonan = PermohonanLayanan::create([
            'id_mahasiswa' => Request()->id_mahasiswa,
            'id_layanan' => Request()->id_layanan,
            'id_status' => Request()->id_status,
            'judul_keluhan' => Request()->judul_keluhan,
            'deskripsi_keluhan' => Request()->deskripsi_keluhan,
            'berkas' => $berkas,
            'created_by' => Kemahasiswaan::where('id_user', Auth::user()->id)->first()->id,
        ]);

        $history = History::create([
            'id_permohonan' => $permohonan->id,
            'id_kemahasiswaan' => Kemahasiswaan::where('id_user', Auth::user()->id)->first()->id,
            'id_status' => Request()->id_status,
            ]);

        if ($permohonan) {
            Alert::success('Sukses!', 'Data Berhasil Ditambahkan!');
        }

        return redirect('/kemahasiswaan/permohonan-layanan');
    }

    public function detail($id)
    {
        if ((!$this->permohonan->detailData($id)) || ($this->permohonan->detailData($id)->id_status == 1)) {
            abort(404);
        }

        $histories = $this->histories->getData($id)
            ->groupBy(function ($date) {
                return Carbon::parse($date->updated_at)
                    ->format('d-F-Y');
            });

        $permohonan = $this->permohonan->detailData($id);
        $profile = Mahasiswa::where('id', $permohonan->id_mahasiswa)->first();

        if (is_null($permohonan->id_mahasiswa)) {
            $profile = Kemahasiswaan::where('id', $permohonan->created_by)->first();
        }

        $data = [
            'permohonan' => $this->permohonan->detailData($id),
            'berkas' => Storage::url('public/' . $this->permohonan->detailData($id)->berkas),
            // 'tolak' => History::where('id_permohonan', $id)->whereNotNull('alasan')->orderBy('id', 'desc')->first(),
            'tangani' => History::where('id_permohonan', $id)->whereNotNull('penanganan')->orderBy('id', 'desc')->first(),
            'tolak' => History::where('id_permohonan', $id)->whereNotNull('alasan')->orderBy('id', 'desc')->first(),
            'online' => History::where('id_permohonan', $id)->whereNotNull('feedback')->orderBy('id', 'desc')->first(),
            'offline' => History::where('id_permohonan', $id)->whereNotNull('feedback')->orderBy('id', 'desc')->first(),
            'batal' => History::where('id_permohonan', $id)->whereNotNull('alasan')->orderBy('id', 'desc')->first(),
            'histories' => $histories,
            'dateHistories' => array_keys($histories->all()),
            'profile' => $profile,
        ];

        return view('/kemahasiswaan/permohonan-layanan/detail', $data);
    }

    public function approve($id)
    {
        $permohonan = PermohonanLayanan::findOrFail($id);

        if ($permohonan->id_status == 2) {
            $data = [
                'id_status' => 3,
                'updated_by' => Kemahasiswaan::where('id_user', Auth::user()->id)->first()->id,
            ];

            $update = $permohonan->update($data);
            $history = History::create([
                'id_permohonan' => $permohonan->id,
                'id_kemahasiswaan' => Kemahasiswaan::where('id_user', Auth::user()->id)->first()->id,
                'id_status' => 3,
            ]);
        } else {
            abort(404);
        }

        if ($history && $update) {
            Alert::success('Sukses!', 'Permohonan Berhasil Disetujui!');
        }

        return redirect()->back();
    }

    public function viewFile($id)
    {
        $permohonan = PermohonanLayanan::findOrFail($id);
        return response()->file(storage_path('app/public' . '/' . $permohonan->berkas));
    }

    public function generateFile($id)
    {
        $permohonan = PermohonanLayanan::findOrFail($id);
        return response()->download(storage_path('app/public' . '/' . $permohonan->berkas));
    }

    public function updateStatus(Request $request)
    {
        $permohonan = PermohonanLayanan::findOrFail($request->id_permohonan);

        if ($permohonan->id_status != ((int)$request->id_status)) {
            $permohonan->id_status = $request->id_status;
            $permohonan->updated_by = Kemahasiswaan::where('id_user', Auth::user()->id)->first()->id;
            $alasan = null;
            if ($request->has('alasan')) {
                $request->validate(
                    [
                        'alasan' => 'required',
                    ],
                    [
                        'alasan.required' => 'Mohon isi alasan penolakan.',
                    ]
                );
                $alasan = $request->alasan;
            }
            $history = History::create([
                'id_permohonan' => $request->id_permohonan,
                'id_kemahasiswaan' => Kemahasiswaan::where('id_user', Auth::user()->id)->first()->id,
                'id_status' => $request->id_status,
                'alasan' => $alasan,
            ]);
        }

        if ($history && $permohonan->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Status Permohonan Berhasil Diubah!',
            ]);
        }
    }
}

