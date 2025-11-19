<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Keluarga;
use App\Models\RefSkpd;
use Illuminate\Http\Request;

class KeluargaController extends Controller
{
    public function index()
    {
        $skpd = RefSkpd::select('kdskpd', 'uraian', 'tahun')
            ->where('tahun', session('tahun'))
            ->whereNotNull('kdskpd')
            ->whereRaw('CHAR_LENGTH(kdskpd) <= 7')->get();
        $data = Keluarga::paginate(10);
        return view('master.keluarga.index', compact('data', 'skpd'));
    }
    public function create($id)
    {
        $pegawai = Gaji::where('id', $id)
            ->where('thnbln', session('thnbln'))
            ->with('pegawai:nip,id,nama')
            ->first();
        return view('master.keluarga.create', compact('pegawai'));
    }
}
