<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PengurusUKMTekkes extends Model
{
    use HasFactory;
    public $table = 'pengurus_ukm_tekkes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'nrp',
        'nama',
        'jabatan',
        'created_by',
        'updated_by',
    ];

    public function getData()
    {
        return DB::table('pengurus_ukm_tekkes')
            ->join('users', 'pengurus_ukm_tekkes.id_user', '=', 'users.id')
            ->join('roles', 'users.id_role', '=', 'roles.id')
            ->select('pengurus_ukm_tekkes.*', 'users.email', 'users.id_role', 'users.password', 'roles.name')
            ->get();
    }

    public function detailData($id)
    {
        return $this->getData()
            ->where('id', $id)
            ->first();
    }

    public function addData($data)
    {
        return DB::table('pengurus_ukm_tekkes')->insert($data);
    }

    public function allData()
    {
        return DB::table('pengurus_ukm_tekkes')->get();
    }

    public function allData2()
    {
        return DB::table('pengurus_ukm_tekkes')
            ->join('users', 'pengurus_ukm_tekkes.id_user', '=', 'users.id')
            ->join('roles', 'users.id_role', '=', 'roles.id')
            ->select('pengurus_ukm_tekkes.*', 'users.email', 'users.id_role', 'users.password', 'roles.name');
    }

    public function countTekkes()
    {
        $data = DB::table('pengurus_ukm_tekkes')->count();
        return $data;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
