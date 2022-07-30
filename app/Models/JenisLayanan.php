<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JenisLayanan extends Model
{
    use HasFactory;

    protected $table = 'jenis_layanan';
    protected $primaryKey = 'id';
    protected $fillable = ['layanan'];

    public function allData()
    {
        return DB::table('jenis_layanan')->get();
    }

    public function allData2()
    {
        return DB::table('jenis_layanan')->paginate(10);
    }

    public function detailData($id)
    {
        return $this->allData()
            ->where('id', $id)
            ->first();
    }

    public function addData($data)
    {
        return DB::table('jenis_layanan')->insert($data);
    }

    public function updateData($id, $data)
    {
        return DB::table('jenis_layanan')
            ->where('id', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        return DB::table('jenis_layanan')
            ->where('id', $id)
            ->delete();
    }

    public function countLayanan()
    {
        $data = DB::table('jenis_layanan')->count();
        return $data;
    }

    public function countLayananByStatus($layanan_id)
    {
        return PermohonanLayanan::where('id_layanan', [$layanan_id])->count();
    }
    
    public function permohonan()
    {
        return $this->hasOne(PermohonanLayanan::class, 'id_layanan');
    }
}
