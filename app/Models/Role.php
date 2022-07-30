<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
    use HasFactory;

    public $table = 'roles';
    protected $primaryKey = 'id';

    public function addData($data)
    {
        return DB::table('roles')->insert($data);
    }

    //* has many through relationship
    public function userTekkes()
    {
        return $this->hasManyThrough(
            PengurusUKMTekkes::class,
            User::class,
            'id_role',  // * foreign key on User table
            'id_user',  // * foreign key on UserPimpinan table
            'id', // * local key on Role table
            'id', // * local key on User table
        );
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id_role');
    }

    public function userKemahasiswaan()
    {
        return $this->hasManyThrough(
            Kemahasiswaan::class,
            User::class,
            'id_role',
            'id_user',
            'id',
            'id',
        );
    }

    public function userTenagaKesehatan()
    {
        return $this->hasOneThrough(
            TenagaKesehatan::class,
            User::class,
            'id_role',
            'id_user',
            'id',
            'id',
        );
    }
}