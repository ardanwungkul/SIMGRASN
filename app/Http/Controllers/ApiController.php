<?php

namespace App\Http\Controllers;

use App\Helpers\FormatHelper;
use App\Models\RefFungsional;
use App\Models\RefPangkat;
use App\Models\RefPokok;
use App\Models\RefStruktural;
use App\Models\TableKelompokFungsional;
use App\Models\TableSertifikasi;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getPangkatByJenisPegawai(Request $request)
    {
        $request->validate([
            'jenis_pegawai_id' => 'required'
        ]);

        $jenis_pegawai = $request->jenis_pegawai_id == 1 || $request->jenis_pegawai_id == 2 ? 1 : 2;

        $data = RefPangkat::where('jnspeg', $jenis_pegawai)->get();
        return response()->json($data);
    }
    public function getMasaByKodeGolongan(Request $request)
    {
        $request->validate([
            'kode_golongan' => 'required',
            'jenis_pegawai_id' => 'required'
        ]);
        $jenis_pegawai = $request->jenis_pegawai_id == 1 || $request->jenis_pegawai_id == 2 ? 1 : 2;
        $data = RefPokok::where('jnspeg', $jenis_pegawai)->where('kdgol', $request->kode_golongan)->where('thnbln', session('thnbln'))->get();
        return response()->json($data);
    }
    public function getKelompokFungsional()
    {
        $data = TableKelompokFungsional::all();
        return response()->json($data);
    }
    public function getStruktural()
    {
        $data = RefStruktural::where('tahun', FormatHelper::getTahun(session('thnbln')))->get();
        return response()->json($data);
    }
    public function getSertifikasi()
    {
        $data = TableSertifikasi::all();
        return response()->json($data);
    }
    public function getJabatanFungsionalByKelompokFungsional(Request $request)
    {
        $data = RefFungsional::where('tahun', FormatHelper::getTahun(session('thnbln')))
            ->where('kdkel', $request->kelompok_fungsional)
            ->where(function ($q) use ($request) {
                $q->where('kdgol', $request->kode_golongan)
                    ->orWhere('kdgol', 'NON');
            })->get();
        return response()->json($data);
    }
}
