<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TenagaKesehatan extends Model
{
    use HasFactory;

    public $table = 'tenaga_kesehatans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'nama_tenaga_kesehatan',
        'jabatan_tenaga_kesehatan',
        'foto_tenaga_kesehatan',
        'link_meeting'
    ];

    public function addData($data)
    {
        return DB::table('tenaga_kesehatans')->insert($data);
    }

    public function allData()
    {
        return DB::table('tenaga_kesehatans')->get();
    }

    public function allData2()
    {
        return DB::table('tenaga_kesehatans')
        ->join('users', 'tenaga_kesehatans.id_user', '=', 'users.id')
        ->join('roles', 'users.id_role', '=', 'roles.id')
        ->select(
            'tenaga_kesehatans.*',
            'roles.name',
            'users.email'
        )
        ->orderBy('name');
    }

    public function detailData($id)
    {
        return $this->allData()
            ->where('id', $id)
            ->first();
    }

    public function updateData($id, $data)
    {
        DB::table('tenaga_kesehatans')
            ->where('id', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        DB::table('tenaga_kesehatans')
            ->where('id', $id)
            ->delete();
    }

    public function countTenagaKesehatan()
    {
        $data = DB::table('tenaga_kesehatans')->count();
        return $data;
    }

    public function countDokter()
    {
        $data = TenagaKesehatan::allData2()->where('name', ["Dokter"])->count();
        return $data;
    }

    public function countPsikolog()
    {
        $data = TenagaKesehatan::allData2()->where('name', ["Dokter"])->count();
        return $data;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function dokter()
    {
        return $this->hasOne(UserDokter::class, 'id_tenaga_kesehatan');
    }

    public function psikolog()
    {
        return $this->hasOne(UserPsikolog::class, 'id_tenaga_kesehatan');
    }

    public function histories()
    {
        return $this->hasMany(History::class, 'id_tenaga_kesehatan');
    }

    public function countRole($id)
    {
        return User::where('id_role', [$id])->count();
    }
}
