<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefFungsional extends Model
{
    use HasFactory;
    protected $table = 'ref_fungsi';

    public function kelompok()
    {
        return $this->belongsTo(TableKelompokFungsional::class, 'kdkel', 'kdkel');
    }
}
