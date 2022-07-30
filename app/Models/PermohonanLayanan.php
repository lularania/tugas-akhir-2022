<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PermohonanLayanan extends Model
{
    use HasFactory;
    public $table = 'permohonan_layanans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_mahasiswa',
        'id_layanan',
        'id_status',
        'jenis_penanganan',
        'judul_keluhan',
        'deskripsi_keluhan',
        'berkas',
        'created_by',
        'updated_by',
        'updated_by_tenaga_kesehatan',
    ];

    public function allData()
    {
        return DB::table('permohonan_layanans')
            ->join('mahasiswas', 'permohonan_layanans.id_mahasiswa', '=', 'mahasiswas.id')
            ->join('jenis_layanan',  'permohonan_layanans.id_layanan', '=', 'jenis_layanan.id')
            ->join('statuses', 'permohonan_layanans.id_status', '=', 'statuses.id')
            ->select(
                'permohonan_layanans.*',
                'mahasiswas.id_user',
                'mahasiswas.nama',
                'mahasiswas.nrp',
                'mahasiswas.prodi',
                'mahasiswas.angkatan',
                'mahasiswas.kelas',
                'jenis_layanan.id',
                'jenis_layanan.layanan', 
                'statuses.status',
                // 'histories.id_tenaga_kesehatan',
                'permohonan_layanans.id_mahasiswa as id_mahasiswa',
                'permohonan_layanans.id as id_permohonan'
            );
    }

    public function allData2()
    {
        return DB::table('permohonan_layanans')
            ->join('mahasiswas', 'permohonan_layanans.id_mahasiswa', '=', 'mahasiswas.id')
            ->join('jenis_layanan',  'permohonan_layanans.id_layanan', '=', 'jenis_layanan.id')
            ->join('statuses', 'permohonan_layanans.id_status', '=', 'statuses.id')
            ->join('histories', 'histories.id_permohonan', '=', 'permohonan_layanans.id')
            ->select(
                'permohonan_layanans.*',
                'mahasiswas.id_user',
                'mahasiswas.nama',
                'mahasiswas.nrp',
                'mahasiswas.prodi',
                'mahasiswas.angkatan',
                'mahasiswas.kelas',
                'jenis_layanan.id',
                'jenis_layanan.layanan', 
                'statuses.status',
                'histories.id_tenaga_kesehatan',
                'permohonan_layanans.id_mahasiswa as id_mahasiswa',
                'permohonan_layanans.id as id_permohonan'
            );
    }

    public function detailData($id)
    {
        return DB::table('permohonan_layanans')
            ->join('mahasiswas', 'permohonan_layanans.id_mahasiswa', '=', 'mahasiswas.id')
            ->join('jenis_layanan',  'permohonan_layanans.id_layanan', '=', 'jenis_layanan.id')
            ->join('statuses', 'permohonan_layanans.id_status', '=', 'statuses.id')
            ->select('permohonan_layanans.*', 
            'mahasiswas.id_user',
            'mahasiswas.nama',
            'mahasiswas.nrp',
            'mahasiswas.prodi',
            'mahasiswas.angkatan',
            'mahasiswas.kelas',
            'jenis_layanan.id', 
            'jenis_layanan.layanan', 
            'statuses.status',
            // 'prodi.prodi',
            'permohonan_layanans.id_mahasiswa as id_mahasiswa',
            'permohonan_layanans.id as id_permohonan'
            )
            ->where('permohonan_layanans.id', $id)->first();
    }

    public function detailData2($id)
    {
        return DB::table('permohonan_layanans')
            ->join('mahasiswas', 'permohonan_layanans.id_mahasiswa', '=', 'mahasiswas.id')
            ->join('jenis_layanan',  'permohonan_layanans.id_layanan', '=', 'jenis_layanan.id')
            ->join('statuses', 'permohonan_layanans.id_status', '=', 'statuses.id')
            ->join('histories', 'histories.id_permohonan', '=', 'permohonan_layanans.id')
            ->join('tenaga_kesehatans', 'tenaga_kesehatans.id', '=', 'histories.id_tenaga_kesehatan')
            ->select('permohonan_layanans.*', 
            'mahasiswas.id_user',
            'mahasiswas.nama',
            'mahasiswas.nrp',
            'mahasiswas.prodi',
            'mahasiswas.angkatan',
            'mahasiswas.kelas',
            'jenis_layanan.id', 
            'jenis_layanan.layanan', 
            'statuses.status',
            'histories.id_tenaga_kesehatan',
            'tenaga_kesehatans.link_meeting',
            // 'prodi.prodi',
            'permohonan_layanans.id_mahasiswa as id_mahasiswa',
            'permohonan_layanans.id as id_permohonan'
            )
            ->where('permohonan_layanans.id', $id)->first();
    }

    public function getDataDetail($id)
    {
       return DB::table('permohonan_layanans')
       ->join('statuses', 'permohonan_layanans.id_status', '=', 'statuses.id')
       ->where('permohonan_layanans.id',$id)
       ->first();
    }

    public function addData($data)
    {
        return DB::table('permohonan_layanans')->insert($data);
    }

    public function editData($id, $data)
    {
        return DB::table('permohonan_layanans')
            ->where('permohonan_layanans.id', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        return DB::table('permohonan_layanans')
            ->where('id', $id)
            ->delete();
    }

    public function rekamMedisKesehatan()
    {
        return DB::table('permohonan_layanans')
        ->join('mahasiswas','mahasiswas.id', '=', 'permohonan_layanans.id_mahasiswa')
        ->select('nama', 'nrp', 'id_mahasiswa', 'prodi')->where('id_layanan', [1])
        ->whereIn('id_status', [7,9])
        ->distinct('id_mahasiswa');
        // ->join('mahasiswas','mahasiswas.id', '=', 'permohonan_layanans.id_mahasiswa');
    }

    public function detailRekamMedisKesehatan($id)
    {
        return DB::table('permohonan_layanans')
            ->join('mahasiswas', 'permohonan_layanans.id_mahasiswa', '=', 'mahasiswas.id')
            ->join('jenis_layanan',  'permohonan_layanans.id_layanan', '=', 'jenis_layanan.id')
            ->join('statuses', 'permohonan_layanans.id_status', '=', 'statuses.id')
            ->join('histories', 'histories.id_permohonan', '=', 'permohonan_layanans.id')
            ->join('tenaga_kesehatans', 'tenaga_kesehatans.id', '=', 'histories.id_tenaga_kesehatan')
            // ->join('prodi', 'permohonan_layanans.prodi', '=', 'prodi.prodi')
            ->select(
                'permohonan_layanans.*',
                'mahasiswas.*',
                'mahasiswas.id_user',
                'mahasiswas.nama',
                'mahasiswas.nrp',
                'mahasiswas.prodi',
                'mahasiswas.angkatan',
                'mahasiswas.kelas',
                'jenis_layanan.id',
                'jenis_layanan.layanan', 
                'statuses.status',
                'histories.*',
                'histories.penanganan',
                'tenaga_kesehatans.nama_tenaga_kesehatan',
                'tenaga_kesehatans.jabatan_tenaga_kesehatan',
                'permohonan_layanans.id_mahasiswa as id_mahasiswa',
                'permohonan_layanans.id as id_permohonan'
            )
        ->where('permohonan_layanans.id_mahasiswa', $id)
        ->whereIn('histories.id_status', [7,9])
        ->whereNotIn('permohonan_layanans.id_layanan', [2])
        ->orderBy('permohonan_layanans.updated_at', 'desc');
    }

    public function rekamMedisKonseling()
    {
        return DB::table('permohonan_layanans')
        ->join('mahasiswas','mahasiswas.id', '=', 'permohonan_layanans.id_mahasiswa')
        ->select('nama', 'nrp', 'id_mahasiswa', 'prodi')->where('id_layanan', [2])
        ->whereIn('id_status', [7,9])
        ->distinct('id_mahasiswa');
        // ->join('mahasiswas','mahasiswas.id', '=', 'permohonan_layanans.id_mahasiswa');
    }

    public function detailRekamMedisKonseling($id)
    {
        return DB::table('permohonan_layanans')
            ->join('mahasiswas', 'permohonan_layanans.id_mahasiswa', '=', 'mahasiswas.id')
            ->join('jenis_layanan',  'permohonan_layanans.id_layanan', '=', 'jenis_layanan.id')
            ->join('statuses', 'permohonan_layanans.id_status', '=', 'statuses.id')
            ->join('histories', 'histories.id_permohonan', '=', 'permohonan_layanans.id')
            ->join('tenaga_kesehatans', 'tenaga_kesehatans.id', '=', 'histories.id_tenaga_kesehatan')
            // ->join('prodi', 'permohonan_layanans.prodi', '=', 'prodi.prodi')
            ->select(
                'permohonan_layanans.*',
                'mahasiswas.*',
                'mahasiswas.id_user',
                'mahasiswas.nama',
                'mahasiswas.nrp',
                'mahasiswas.prodi',
                'mahasiswas.angkatan',
                'mahasiswas.kelas',
                'jenis_layanan.id',
                'jenis_layanan.layanan', 
                'statuses.status',
                'histories.*',
                'histories.penanganan',
                'tenaga_kesehatans.nama_tenaga_kesehatan',
                'tenaga_kesehatans.jabatan_tenaga_kesehatan',
                //'histories.id_tenaga_kesehatan = tenaga_kesehatans.id',
                //'prodi.prodi',
                'permohonan_layanans.id_mahasiswa as id_mahasiswa',
                'permohonan_layanans.id as id_permohonan'
            )
        ->where('permohonan_layanans.id_mahasiswa', $id)
        ->whereIn('histories.id_status', [7,9])
        // ->distinct('permohonan_layanans.id_mahasiswa')
        ->whereNotIn('permohonan_layanans.id_layanan', [1])
        ->orderBy('permohonan_layanans.updated_at', 'desc');
    }

    public function countPermohonan()
    {
        return PermohonanLayanan::whereNotIn('id_status', [1])->count();
    }

    public function countPermohonanByStatus($status_id)
    {
        return PermohonanLayanan::where('id_status', [$status_id])->count();
    }

    public function countPermohonanMahasiswa($status_id)
    {
        return $this->allData()->get()
            ->where('id_mahasiswa', Mahasiswa::where('id_user', Auth::user()->id)->first()->id)
            ->where('id_status', $status_id)
            ->count();
    }

    public function countPermohonanDokter($status_id)
    {
        return $this->allData()->get()
            ->wherenotIn('id_layanan', [2])
            ->where('id_status', $status_id)
            ->count();
    }

    public function countPermohonanPsikolog($status_id)
    {
        return $this->allData()->get()
            ->wherenotIn('id_layanan', [1])
            ->where('id_status', $status_id)
            ->count();
    }

    public function getAllGrafik()
    {
        return
            PermohonanLayanan::whereYear('created_at', Carbon::now()->year)
            ->whereNotIn('id_status', [8])
            ->orderBy('created_at', 'asc')
            ->get()
            ->groupBy(
                function ($date) {
                    return Carbon::parse($date->created_at)
                        ->format('M');
                }
            );
    }

    public function getAllGrafikMahasiswa()
    {
        return
            PermohonanLayanan::whereYear('created_at', Carbon::now()->year)
            ->whereNotIn('id_status', [8])
            ->where('id_mahasiswa', Mahasiswa::where('id_user', Auth::user()->id)->first()->id)
            ->orderBy('created_at', 'asc')
            ->get()
            ->groupBy(
                function ($date) {
                    return Carbon::parse($date->created_at)
                        ->format('M');
                }
            );
    }

    public function getAllGrafikDokter()
    {
        return
            PermohonanLayanan::whereYear('created_at', Carbon::now()->year)
            ->whereNotIn('id_layanan', [2])
            ->orderBy('created_at', 'asc')
            ->get()
            ->groupBy(
                function ($date) {
                    return Carbon::parse($date->created_at)
                        ->format('M');
                }
            );
    }

    public function getAllGrafikPsikolog()
    {
        return
            PermohonanLayanan::whereYear('created_at', Carbon::now()->year)
            ->whereNotIn('id_layanan', [1])
            ->orderBy('created_at', 'asc')
            ->get()
            ->groupBy(
                function ($date) {
                    return Carbon::parse($date->created_at)
                        ->format('M');
                }
            );
    }

    public function getDataGrafik($layanan_id)
    {
        return
            PermohonanLayanan::whereYear('created_at', Carbon::now()->year)
            ->whereNotIn('id_status', [8])
            ->where('id_layanan', $layanan_id)
            ->orderBy('created_at', 'asc')
            ->get()
            ->groupBy(
                function ($date) {
                    return Carbon::parse($date->created_at)
                        ->format('M');
                }
            );
    }

    public function getDataGrafikDokter($status_id)
    {
        return
            PermohonanLayanan::whereYear('created_at', Carbon::now()->year)
            ->whereNotIn('id_layanan', [2])
            ->where('id_status', $status_id)
            ->orderBy('created_at', 'asc')
            ->get()
            ->groupBy(
                function ($date) {
                    return Carbon::parse($date->created_at)
                        ->format('M');
                }
            );
    }

    public function getDataGrafikPsikolog($status_id)
    {
        return
            PermohonanLayanan::whereYear('created_at', Carbon::now()->year)
            ->whereNotIn('id_layanan', [1])
            ->where('id_status', $status_id)
            ->orderBy('created_at', 'asc')
            ->get()
            ->groupBy(
                function ($date) {
                    return Carbon::parse($date->created_at)
                        ->format('M');
                }
            );
    }

    public function getDataGrafikMahasiswa($layanan_id)
    {
        return
            PermohonanLayanan::whereYear('created_at', Carbon::now()->year)
            ->whereNotIn('id_status', [8])
            ->where('id_layanan', $layanan_id)
            ->where('id_mahasiswa', Mahasiswa::where('id_user', Auth::user()->id)->first()->id)
            ->orderBy('created_at', 'asc')
            ->get()
            ->groupBy(
                function ($date) {
                    return Carbon::parse($date->created_at)
                        ->format('M');
                }
            );
    }

    public function histories()
    {
        return $this->hasMany(History::class, 'id_permohonan');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status');
    }

    public function layanan()
    {
        return $this->belongsTo(JenisLayanan::class, 'id_layanan');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }

}
