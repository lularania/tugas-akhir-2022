<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'statuses';
    protected $primaryKey = 'id';

    public function histories()
    {
        return $this->hasMany(History::class, 'id_status');
    }

    public function permohonan()
    {
        return $this->hasMany(PermohonanLayanan::class, 'id_permohonan');
    }
}