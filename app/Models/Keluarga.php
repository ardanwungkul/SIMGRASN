<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory;
    protected $table = 'klrgmain';
    protected $primaryKey = 'nip';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $appends = ['pekerjaan'];
    public function getPekerjaanAttribute()
    {
        if ($this->kerja == 1) return 'ASN Satu Daerah';
        if ($this->kerja == 2) return 'ASN Luar Daerah';
        if ($this->kerja == 3) return 'Honorer Daerah';
        if ($this->kerja == 4) return 'TNI / Polri';
        if ($this->kerja == 5) return 'BUMN / BUMD';
        if ($this->kerja == 6) return 'Karyawan Swasta';
        if ($this->kerja == 7) return 'Wiraswasta';
        if ($this->kerja == 8) return 'Buruh / Tani / Nelayan';
        if ($this->kerja == 9) return 'Tidak Bekerja';
        if ($this->kerja == 10) return 'Lainnya';
        return null;
    }
}
