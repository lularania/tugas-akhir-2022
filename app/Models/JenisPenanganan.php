<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JenisPenanganan extends Model
{
    use HasFactory;

    protected $table = 'jenis_penanganan';
    protected $primaryKey = 'id';
    protected $fillable = ['jenis_penanganan'];

    public function allData()
    {
        return DB::table('jenis_penanganan')->get();
    }

    public function allData2()
    {
        return DB::table('jenis_penanganan')->paginate(10);
    }

    public function detailData($id)
    {
        return $this->allData()
            ->where('id', $id)
            ->first();
    }

    public function addData($data)
    {
        return DB::table('jenis_penanganan')->insert($data);
    }

    public function updateData($id, $data)
    {
        return DB::table('jenis_penanganan')
            ->where('id', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        return DB::table('jenis_penanganan')
            ->where('id', $id)
            ->delete();
    }

    public function countPenanganan()
    {
        $data = DB::table('jenis_penanganan')->count();
        return $data;
    }

    public function countPenangananByStatus($penanganan_id)
    {
        return PermohonanLayanan::where('jenis_penanganan', [$penanganan_id])->count();
    }
    
    public function penanganan()
    {
        return $this->hasOne(PermohonanLayanan::class, 'jenis_penanganan');
    }
}
