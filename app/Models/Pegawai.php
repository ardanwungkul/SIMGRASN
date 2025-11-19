<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'gajimain';
    public function keluarga()
    {
        return $this->hasOne(Keluarga::class, 'nip', 'nip');
    }
    public function keluarga_anak()
    {
        return $this->hasMany(KeluargaAnak::class, 'nip', 'nip');
    }
}
