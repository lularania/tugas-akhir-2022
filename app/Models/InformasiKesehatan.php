<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InformasiKesehatan extends Model
{
    use HasFactory;
    public $table = 'informasi_kesehatan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_tenaga_kesehatan',
        'id_status',
        'judul',
        'deskripsi',
        'gambar',
        'sumber',
        'created_by',
        'updated_by',
    ];

    public function allData()
    {
        return DB::table('informasi_kesehatan')
            ->join('tenaga_kesehatans', 'informasi_kesehatan.id_tenaga_kesehatan', '=', 'tenaga_kesehatans.id')
            ->join('statuses', 'informasi_kesehatan.id_status', '=', 'statuses.id')
            ->select(
                'informasi_kesehatan.*',
                'tenaga_kesehatans.nama_tenaga_kesehatan',
                'tenaga_kesehatans.jabatan_tenaga_kesehatan',
                'statuses.status'
            );
    }

    public function detailData($id)
    {
        return DB::table('informasi_kesehatan')
            ->join('tenaga_kesehatans', 'informasi_kesehatan.id_tenaga_kesehatan', '=', 'tenaga_kesehatans.id')
            ->join('statuses', 'informasi_kesehatan.id_status', '=', 'statuses.id')
            ->select(
                'informasi_kesehatan.*',
                'tenaga_kesehatans.nama_tenaga_kesehatan',
                'tenaga_kesehatans.jabatan_tenaga_kesehatan',
                'statuses.status',
            )->where('informasi_kesehatan.id', $id)->first();
    }

    public function addData($data)
    {
        return DB::table('informasi_kesehatan')->insert($data);
    }

    public function editData($id, $data)
    {
        return DB::table('informasi_kesehatan')
            ->where('informasi_kesehatan.id', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        return DB::table('informasi_kesehatan')
            ->where('id', $id)
            ->delete();
    }

    public function countInformasi()
    {
        return InformasiKesehatan::whereNotIn('id_status', [2,3,4,5,6,7])->count();
    }

    public function countInformasiByStatus($status_id)
    {
        return InformasiKesehatan::where('id_status', [$status_id])->count();
    }

    public function getAllGrafik()
    {
        return
           InformasiKesehatan::whereYear('created_at', Carbon::now()->year)
            ->whereNotIn('id_status', [2,3,4,5,6,7])
            ->orderBy('created_at', 'asc')
            ->get()
            ->groupBy(
                function ($date) {
                    return Carbon::parse($date->created_at)
                        ->format('M');
                }
            );
    }

    public function getAxisGrafik()
    {
        return
           InformasiKesehatan::whereMonth('created_at', Carbon::now()->month)
            ->whereNotIn('id_status', [2,3,4,5,6,7])
            ->orderBy('created_at', 'asc')
            ->get();
    }

    public function getDataGrafik($status_id)
    {
        return
           InformasiKesehatan::whereYear('created_at', Carbon::now()->year)
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

    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status');
    }
}
