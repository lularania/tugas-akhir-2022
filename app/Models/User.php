<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasRoles, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_role',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // * Using Accessors, access: Auth::user()->nama
    protected $appends = ['nama'];

    public function getNamaAttribute()
    {
        $user = Auth::user();

        // dd($user);

        if ($user->id_role == 1) {
            return Kemahasiswaan::where('id_user', $user->id)->first()->nama;
        } elseif ($user->id_role == 2) {
            return Mahasiswa::where('id_user', $user->id)->first()->nama;
        } elseif ($user->id_role == 3) {
            return TenagaKesehatan::where('id_user', $user->id)->first()->nama_tenaga_kesehatan;
        } elseif ($user->id_role == 4) {
            return TenagaKesehatan::where('id_user', $user->id)->first()->nama_tenaga_kesehatan;
        } elseif ($user->id_role == 5) {
            return PengurusUKMTekkes::where('id_user', $user->id)->first()->nama;
        } else {
            return null;
        }
    }

    public function getData()
    {
        return DB::table('users')
            ->leftJoin('roles', 'users.id_role', '=', 'roles.id')
            ->get();
    }

    public function addData($data)
    {
        return DB::table('users')->insert($data);
    }

    public function updateData($id, $data)
    {
        return DB::table('users')
            ->where('id', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        return DB::table('users')
            ->where('id', $id)
            ->delete();
    }

    public function countUser()
    {
        $data = DB::table('users')->count();
        return $data;
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }

    public function tenagakesehatan()
    {
        return $this->hasOne(TenagaKesehatan::class, 'id_user');
    }

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class, 'id_user');
    }

    public function kemahasiswaan()
    {
        return $this->hasOne(Kemahasiswaan::class, 'id_user');
    }

    public function tekkes()
    {
        return $this->hasOne(PengurusUKMTekkes::class, 'id_user');
    }
}
