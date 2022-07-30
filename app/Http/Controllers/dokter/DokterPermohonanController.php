<?php

namespace App\Http\Controllers\dokter;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\TenagaKesehatan;
use App\Models\History;
use App\Models\JenisLayanan;
use App\Models\PermohonanLayanan;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class DokterPermohonanController extends Controller
{
    public function __construct()
    {
        $this->permohonan = new PermohonanLayanan();
        $this->layanan = new JenisLayanan();
        $this->mahasiswa = new Mahasiswa();
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
                ->whereNotIn('permohonan_layanans.id_status', [1,2,4,5,6,7,8,9,10])
                ->where('permohonan_layanans.id_layanan', [1])
                // ->where('id_tenaga_kesehatan', [Auth::user()->tenagakesehatan->id])
                ->paginate(20);
        } else {
            $permohonan = $this->permohonan
                ->allData()
                ->whereNotIn('permohonan_layanans.id_status', [1,2,4,5,6,7,8,9,10])
                ->where('permohonan_layanans.id_layanan', [1])
                ->paginate(20);
        }

        $data = [
            'permohonan' => $permohonan,
            'colors' => $colors,
            'opsi_status' => Status::all(),
        ];

        return view('/dokter/permohonan-layanan/index', $data);
    }

    public function indexDitangani(Request $request)
    {
        $colors = [
            'danger', 'info', 'primary', 'warning', 'primary', 'danger', 'success', 'success', 'info', 'danger'        ];

        if ($request->has('search')) {
            $permohonan = $this->permohonan
                ->allData2()
                ->where('nrp', 'LIKE', '%' . $request->search . '%')
                ->whereNotIn('permohonan_layanans.id_status', [1,2,3,6,7,8,9,10])
                ->where('permohonan_layanans.id_layanan', [1])
                ->where('id_tenaga_kesehatan', [Auth::user()->tenagakesehatan->id])
                ->paginate(20);
        } else {
            $permohonan = $this->permohonan
                ->allData2()
                ->whereNotIn('permohonan_layanans.id_status', [1,2,3,6,7,8,9,10])
                ->where('permohonan_layanans.id_layanan', [1])
                ->where('id_tenaga_kesehatan', [Auth::user()->tenagakesehatan->id])
                ->paginate(20);
        }

        $data = [
            'permohonan' => $permohonan,
            'colors' => $colors,
            'opsi_status' => Status::all(),
        ];

        return view('/dokter/permohonan-layanan/index-ditangani', $data);
    }

    public function indexSelesai(Request $request)
    {
        $colors = [
            'danger', 'info', 'primary', 'warning', 'primary', 'danger', 'success', 'success', 'info', 'danger'
        ];

        if ($request->has('search')) {
            $permohonan = $this->permohonan
                ->allData2()
                ->where('nrp', 'LIKE', '%' . $request->search . '%')
                ->whereNotIn('permohonan_layanans.id_status', [1,2,3,4,5,6,8,9])
                ->where('permohonan_layanans.id_layanan', [1])
                ->where('id_tenaga_kesehatan', [Auth::user()->tenagakesehatan->id])
                ->paginate(20);
        } else {
            $permohonan = $this->permohonan
                ->allData2()
                ->whereNotIn('permohonan_layanans.id_status', [1,2,3,4,5,6,8,9])
                ->where('permohonan_layanans.id_layanan', [1])
                ->where('id_tenaga_kesehatan', [Auth::user()->tenagakesehatan->id])
                ->paginate(20);
        }

        $data = [
            'permohonan' => $permohonan,
            'colors' => $colors,
            'opsi_status' => Status::all(),
        ];

        return view('/dokter/permohonan-layanan/index-selesai', $data);
    }

    public function indexHasil(Request $request)
    {
        $colors = [
            'danger', 'info', 'primary', 'warning', 'primary', 'danger', 'success', 'success', 'info', 'danger'
        ];

        if ($request->has('search')) {
            $permohonan = $this->permohonan
                ->allData2()
                ->where('nrp', 'LIKE', '%' . $request->search . '%')
                ->whereNotIn('permohonan_layanans.id_status', [1,2,3,4,5,6,7,10])
                ->where('permohonan_layanans.id_layanan', [1])
                ->where('id_tenaga_kesehatan', [Auth::user()->tenagakesehatan->id])
                ->paginate(20);
        } else {
            $permohonan = $this->permohonan
                ->allData2()
                ->whereNotIn('permohonan_layanans.id_status', [1,2,3,4,5,6,7,10])
                ->where('permohonan_layanans.id_layanan', [1])
                ->where('id_tenaga_kesehatan', [Auth::user()->tenagakesehatan->id])
                ->paginate(20);
        }

        $data = [
            'permohonan' => $permohonan,
            'colors' => $colors,
            'opsi_status' => Status::all(),
        ];

        return view('/dokter/permohonan-layanan/index-hasil-pemeriksaan', $data);
    }

    public function rekamMedis(Request $request)
    {

        if ($request->has('search')) {
            $permohonan = $this->permohonan
                ->rekamMedisKesehatan()
                ->where('nrp', 'LIKE', '%' . $request->search . '%')
                ->paginate(20);
        } else {
            $permohonan = $this->permohonan
            ->rekamMedisKesehatan()
            ->paginate(20);
        }

        $data = [
            'permohonan' => $permohonan,
        ];

        return view('/dokter/permohonan-layanan/rekam-medis', $data);
    }

    public function detailMedis($id){

        $permohonan = $this->permohonan->detailRekamMedisKesehatan($id)->whereNotIn('permohonan_layanans.id_status', [1,2,3,4,5,6,8])->paginate(5);
        $permohonans = $this->permohonan->detailRekamMedisKesehatan($id)->first();

        $colors = [
            'info', 'primary', 'success', 'warning', 'success', 'danger',
        ];

        // dd($permohonan);

        $data = [
            'permohonan' => $permohonan,
            'permohonans' => $permohonans,
            'colors' => $colors,
            'tangani' => History::where('id_permohonan', $id)->whereNotNull('penanganan')->orderBy('id', 'desc')->get(),
            'tolak' => History::where('id_permohonan', $id)->whereNotNull('alasan')->orderBy('id', 'desc')->get(),
        ];
        return view('/dokter/permohonan-layanan/detail-rekam-medis', $data);
    }

    public function add()
    {
        $data = [
            'layanan' => $this->layanan->allData(),
            'mahasiswa' => $this->mahasiswa->allData(),
            'prodi' => DB::table('prodi')->get(),
            'status' => Status::all()->whereNotIn('id', [1,2,3,4,5,6,10]),
        ];

        return view('/dokter/permohonan-layanan/add', $data);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'judul_keluhan' => 'required',
                'deskripsi_keluhan' => 'max:1000',
                'penanganan' => 'required',
            ],
            [
                'judul_keluhan.required' => 'Wajib terisi',
                'deskripsi_keluhan.max' => 'Anda telah mencapai kata-kata maksimum.',
                'penanganan.required' => 'Wajib terisi',
            ]
        );

        $permohonan = PermohonanLayanan::create([
            'id_mahasiswa' => Request()->id_mahasiswa,
            'id_layanan' => Request()->id_layanan,
            'id_status' => 9,
            'judul_keluhan' => Request()->judul_keluhan,
            'deskripsi_keluhan' => Request()->deskripsi_keluhan,
            // 'prodi' => Request()->prodi,
            'berkas' => 'nullable',
        ]);

        $history = History::create([
        'id_permohonan' => $permohonan->id,
        'id_tenaga_kesehatan' => TenagaKesehatan::where('id_user', Auth::user()->id)->first()->id,
        'id_status' => 9,
        'penanganan' => Request()->penanganan,
        ]);

        if ($permohonan && $history) {
            Alert::success('Sukses!', 'Data Berhasil Ditambahkan!');
        }

        return redirect('/dokter/permohonan-layanan-hasil-pemeriksaan-langsung');
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
            $profile = TenagaKesehatan::where('id', $permohonan->created_by)->first();
        }

        $data = [
            'permohonan' => $this->permohonan->detailData($id),
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

        // dd($data);

        return view('/dokter/permohonan-layanan/detail', $data);
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
            $permohonan->updated_by = TenagaKesehatan::where('id_user', Auth::user()->id)->first()->id;
            // $penanganan = null;
            if ($request->has('penanganan')) {
                $request->validate(
                    [
                        'penanganan' => 'required',
                    ],
                    [
                        'penanganan.required' => 'Mohon isi hasil penanganan.',
                    ]
                );
                $penanganan = $request->penanganan;
            }
            $history = History::create([
                'id_permohonan' => $request->id_permohonan,
                'id_tenaga_kesehatan' => TenagaKesehatan::where('id_user', Auth::user()->id)->first()->id,
                'id_status' => $request->id_status,
                'penanganan' => $penanganan,
            ]);
        }

        if ($history && $permohonan->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Status permohonan Berhasil Diubah!',
            ]);
        }
    }

    public function online($id, Request $request)
    {
        $permohonan = PermohonanLayanan::findOrFail($request->id_permohonan);

        if ($permohonan->id_status != ((int)$request->id_status)) {
            $permohonan->id_status = $request->id_status;
            $permohonan->updated_by = TenagaKesehatan::where('id_user', Auth::user()->id)->first()->id;
            // $penanganan = null;
            if ($request->has('feedback')) {
                $request->validate(
                    [
                        'feedback' => 'required',
                    ],
                    [
                        'feedback.required' => 'Mohon isi Feedback.',
                    ]
                );
                $feedback = $request->feedback;
            }
            $permohonan2 = PermohonanLayanan::where('id', $id)->update([
                'catatan' => $request->catatan,
            ]);
            $history = History::create([
                'id_permohonan' => $request->id_permohonan,
                'id_tenaga_kesehatan' => TenagaKesehatan::where('id_user', Auth::user()->id)->first()->id,
                'id_status' => $request->id_status,
                'feedback' => $feedback,
            ]);
        }

        if ($history && $permohonan2 && $permohonan->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Status Permohonan Berhasil Diubah!',
            ]);
        }
    }

    public function offline($id, Request $request)
    {
        $permohonan = PermohonanLayanan::findOrFail($request->id_permohonan);

        if ($permohonan->id_status != ((int)$request->id_status)) {
            $permohonan->id_status = $request->id_status;
            $permohonan->updated_by = TenagaKesehatan::where('id_user', Auth::user()->id)->first()->id;
            // $penanganan = null;
            if ($request->has('feedback')) {
                $request->validate(
                    [
                        'feedback' => 'required',
                    ],
                    [
                        'feedback.required' => 'Mohon isi Feedback.',
                    ]
                );
                $feedback = $request->feedback;
            }
            $permohonan2 = PermohonanLayanan::where('id', $id)->update([
                'catatan' => $request->catatan,
            ]);
            $history = History::create([
                'id_permohonan' => $request->id_permohonan,
                'id_tenaga_kesehatan' => TenagaKesehatan::where('id_user', Auth::user()->id)->first()->id,
                'id_status' => $request->id_status,
                'feedback' => $feedback,
            ]);
        }

        if ($history && $permohonan2 && $permohonan->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Status Permohonan Berhasil Diubah!',
            ]);
        }
    }
    public function reject(Request $request)
    {
        $permohonan = PermohonanLayanan::findOrFail($request->id_permohonan);

        if ($permohonan->id_status != ((int)$request->id_status)) {
            $permohonan->id_status = $request->id_status;
            $permohonan->updated_by = TenagaKesehatan::where('id_user', Auth::user()->id)->first()->id;
            // $penanganan = null;
            if ($request->has('alasan')) {
                $request->validate(
                    [
                        'alasan' => 'required',
                    ],
                    [
                        'alasan.required' => 'Mohon isi Alasan.',
                    ]
                );
                $alasan = $request->alasan;
            }
            $history = History::create([
                'id_permohonan' => $request->id_permohonan,
                'id_tenaga_kesehatan' => TenagaKesehatan::where('id_user', Auth::user()->id)->first()->id,
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