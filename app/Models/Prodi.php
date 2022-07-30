<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Prodi extends Model
{
    use HasFactory;
    protected $table = 'prodi';
    protected $primaryKey = 'id';
    protected $fillable = ['prodi'];

    public function allData()
    {
        return DB::table('prodi')->get();
    }

    public function allData2()
    {
        return DB::table('prodi');
    }

    public function detailData($id)
    {
        return $this->allData()
            ->where('id', $id)
            ->first();
    }

    public function addData($data)
    {
        return DB::table('prodi')->insert($data);
    }

    public function updateData($id, $data)
    {
        return DB::table('prodi')
            ->where('id', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        return DB::table('prodi')
            ->where('id', $id)
            ->delete();
    }

    public function countProdi()
    {
        $data = DB::table('prodi')->count();
        return $data;
    }

    public function permohonan()
    {
        return $this->hasMany(PermohonanLayanan::class, 'prodi');
    }
}
