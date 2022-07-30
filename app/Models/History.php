<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class History extends Model
{
    use HasFactory;

    protected $table = 'histories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_permohonan',
        'id_tenaga_kesehatan',
        'id_kemahasiswaan',
        'id_status',
        'alasan',
        'feedback',
        'penanganan',
    ];

    public function allData()
    {
        return DB::table('histories')
        ->leftJoin('permohonan_layanans', 'histories.id_permohonan', '=', 'permohonan_layanans.id')
        ->leftJoin('kemahasiswaans', 'histories.id_kemahasiswaan', '=', 'kemahasiswaans.id')
        ->leftJoin('tenaga_kesehatans', 'histories.id_tenaga_kesehatan', '=', 'tenaga_kesehatans.id')
        ->leftJoin('statuses', 'histories.id_status', '=', 'statuses.id')
        ->select('histories.*', 'statuses.status', 'statuses.id', 'kemahasiswaans.nama', 'kemahasiswaans.jabatan', 'tenaga_kesehatans.nama_tenaga_kesehatan', 'tenaga_kesehatans.jabatan_tenaga_kesehatan');
    }

    public function getData($id_permohonan)
    {
        return DB::table('histories')
            ->leftJoin('permohonan_layanans', 'histories.id_permohonan', '=', 'permohonan_layanans.id')
            ->leftJoin('kemahasiswaans', 'histories.id_kemahasiswaan', '=', 'kemahasiswaans.id')
            ->leftJoin('tenaga_kesehatans', 'histories.id_tenaga_kesehatan', '=', 'tenaga_kesehatans.id')
            ->leftJoin('statuses', 'histories.id_status', '=', 'statuses.id')
            ->select('histories.*', 'statuses.status', 'statuses.id', 'kemahasiswaans.nama', 'kemahasiswaans.jabatan', 'tenaga_kesehatans.nama_tenaga_kesehatan', 'tenaga_kesehatans.jabatan_tenaga_kesehatan')
            ->where('id_permohonan', $id_permohonan)
            ->get();
    }

    public function permohonan()
    {
        return $this->belongsTo(PermohonanLayanan::class, 'id_permohonan');
    }

    public function tenagakesehatan()
    {
        return $this->belongsTo(TenagaKesehatan::class, 'id_tenaga_kesehatan');
        // return $this->hasMany(History::class, 'id_tenaga_kesehatan');
    }

    public function kemahasiswaan()
    {
        return $this->belongsTo(Kemahasiswaan::class, 'id_kemahasiswaan');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status');
    }

    public function countPermohonanTenagaKesehatan($status_id)
    {
        return $this->allData()->get()
            ->where('id_tenaga_kesehatan', TenagaKesehatan::where('id_user', Auth::user()->id)->first()->id)
            ->where('id_status', $status_id)
            ->count();
    }
}