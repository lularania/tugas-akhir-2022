<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Psikolog extends Model
{
    use HasFactory;

    public $table = 'psikologs';
    protected $primaryKey = 'id';
    protected $fillable = ['id_user', 'id_tenaga_kesehatan', 'created_by', 'updated_by'];

    public function getData()
    {
        return DB::table('psikologs')
            ->leftJoin('tenaga_kesehatans', 'psikologs.id_tenaga_kesehatan', '=', 'tenaga_kesehatans.id')
            ->leftJoin('users', 'tenaga_kesehatans.id_user', '=', 'users.id')
            ->select('psikologs.*', 'tenaga_kesehatans.nama', 'tenaga_kesehatans.jabatan', 'users.email', 'users.password', 'users.id_role')
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
        DB::table('psikologs')->insert($data);
    }

    public function updateData($id, $data)
    {
        DB::table('psikologs')
            ->where('id', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        DB::table('psikologs')
            ->where('id', $id)
            ->delete();
    }

    public function countPsikolog()
    {
        $data = DB::table('psikologs')->count();
        return $data;
    }

    // public function totalPermohonan()
    // { 
    //     $data = DB::table('permohonans')->count();
    //     return $data;
    // } 

    // public function totalDiajukan()
    // {
    //     $data = DB::table('permohonans')
    //     ->leftJoin('statuses', 'statuses.id', '=', 'permohonans.id_status')
    //     ->where('permohonans.id_status', 1)->count();
    //     return $data;
    // }

    // public function totalDikerjakan()
    // {
    //     $data = DB::table('permohonans')
    //     ->leftJoin('statuses', 'statuses.id', '=', 'permohonans.id_status')
    //     ->where('permohonans.id_status', 3)->count();
    //     return $data;
    // }

    // public function dataBulanan(){
    //     $data = DB::table('permohonans')
    //     ->whereMonth('created_at', Carbon::now()->month)
    //     ->count();

    //     return $data;
    // }

    public function tenagakesehatan()
    {
        return $this->belongsTo(TenagaKesehatan::class, 'id_tenaga_kesehatan');
    }
}
