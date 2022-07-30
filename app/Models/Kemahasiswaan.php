<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kemahasiswaan extends Model
{
    use HasFactory;
    public $table = 'kemahasiswaans'; 
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'nip',
        'nama',
        'jabatan',
        'created_by',
        'updated_by',
    ];

    public function getData()
    {
        return DB::table('kemahasiswaans')
            ->join('users', 'kemahasiswaans.id_user', '=', 'users.id')
            ->join('roles', 'users.id_role', '=', 'roles.id')
            ->select('kemahasiswaans.*', 'users.email', 'users.id_role', 'users.password', 'roles.name')
            ->get();
    }

    public function allData2()
    {
        return DB::table('kemahasiswaans')
            ->join('users', 'kemahasiswaans.id_user', '=', 'users.id')
            ->join('roles', 'users.id_role', '=', 'roles.id')
            ->select('kemahasiswaans.*', 'users.email', 'users.id_role', 'users.password', 'roles.name');
    }

    public function detailData($id)
    {
        return $this->getData()
            ->where('id', $id)
            ->first();
    }

    public function addData($data)
    {
        return DB::table('kemahasiswaans')->insert($data);
    }

    public function allData()
    {
        return DB::table('kemahasiswaans')->get();
    }

    public function countKemahasiswaan()
    {
        $data = DB::table('kemahasiswaans')->count();
        return $data;
    }

    public function histories()
    {
        return $this->hasMany(History::class, 'id_kemahasiswaan');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
