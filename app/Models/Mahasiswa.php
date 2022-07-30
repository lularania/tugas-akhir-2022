<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Mahasiswa extends Model
{
    use HasFactory;

    public $table = 'mahasiswas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'id_role',
        'prodi',
        'nrp',
        'nama',
        'angkatan',
        'kelas',
        'alamat',
        'created_by',
        'updated_by',
    ];

    public function getData()
    {
        return DB::table('mahasiswas')
            ->join('users', 'users.id', '=', 'mahasiswas.id_user')
            ->join('roles', 'roles.id', '=', 'users.id_role')
            ->join('prodi', 'prodi.prodi', '=', 'mahasiswas.prodi')
            ->join('kelas', 'kelas.kelas', '=', 'mahasiswas.kelas')
            ->join('angkatan', 'angkatan.angkatan', '=', 'mahasiswas.angkatan')
            ->select('mahasiswas.*', 'users.email', 'users.id_role', 'users.password', 'roles.name', 'prodi.prodi', 'kelas.kelas', 'angkatan.angkatan')
            ->get();
    }

    public function detailData($id)
    {
        return $this->getData()
            ->where('id', $id)
            ->first();
    }

    // public function rekamMedis()
    // {
    //     return DB::table('mahasiswas')
    //     ->join('permohonan_layanans','mahasiswas.id', '=', 'permohonan_layanans.id_mahasiswa')
    //     ->select('nama', 'nrp')->where('id_mahasiswa')
    //     ->distinct();
    //     // ->join('mahasiswas','mahasiswas.id', '=', 'permohonan_layanans.id_mahasiswa');
    // }

    public function addData($data)
    {
        return DB::table('mahasiswas')->insert($data);
    }

    public function allData()
    {
        return DB::table('mahasiswas')->get();
    }

    public function allData2()
    {
        return DB::table('mahasiswas')
        ->join('users', 'users.id', '=', 'mahasiswas.id_user')
        ->join('roles', 'roles.id', '=', 'users.id_role')
        ->join('prodi', 'prodi.prodi', '=', 'mahasiswas.prodi')
        ->join('kelas', 'kelas.kelas', '=', 'mahasiswas.kelas')
        ->join('angkatan', 'angkatan.angkatan', '=', 'mahasiswas.angkatan')
        ->select('mahasiswas.*', 'users.email', 'users.id_role', 'users.password', 'roles.name', 'prodi.prodi', 'kelas.kelas', 'angkatan.angkatan');
    }

    public function countMahasiswa()
    {
        $data = DB::table('mahasiswas')->count();
        return $data;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // public function mahasiswa()
    // {
    //     return $this->belongsTo(PermohonanLayanan::class, 'id_mahasiswa');
    // }

    public function permohonan()
    {
        return $this->hasMany(PermohonanLayanan::class, 'id_mahasiswa');
    }
}