<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeluargaAnak extends Model
{
    use HasFactory;
    protected $table = 'klrganak';
    protected $primaryKey = 'nip';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;


    protected $appends = ['pendidikan'];
    public function getPendidikanAttribute()
    {
        if ($this->didik == 1) return '1 - BELUM SEKOLAH';
        if ($this->didik == 2) return '2 - TK / PLAY GROUP';
        if ($this->didik == 3) return '3 - SEKOLAH DASAR';
        if ($this->didik == 4) return '4 - SMP (SEDERAJAT)';
        if ($this->didik == 5) return '5 - SMU (SEDERAJAT)';
        if ($this->didik == 6) return '6 - DIPLOMA (I/II/III)';
        if ($this->didik == 7) return '7 - SARJANA S1';
        if ($this->didik == 8) return '8 - LULUS (TAMAT)';
        return null;
    }
}
