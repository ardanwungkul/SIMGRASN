<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;
    protected $table = 'gajibulan';
    public $timestamps = false;
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id');
    }
    public function pangkat()
    {
        return $this->belongsTo(RefPangkat::class, 'kdgol', 'kdgol');
    }
    public function struktural()
    {
        return $this->belongsTo(RefStruktural::class, 'kdstruk', 'kdstruk');
    }

    public function fungsional()
    {
        return $this->belongsTo(RefFungsional::class, 'kdfung', 'kdfung');
    }
    public function skpd()
    {
        return $this->belongsTo(RefSkpd::class, 'kdskpd', 'kdskpd');
    }
}
