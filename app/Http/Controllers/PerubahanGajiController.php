<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Gaji;
use App\Models\RefSkpd;
use App\Models\TableAgama;
use App\Models\TableAsalPegawai;
use App\Models\TableKawin;
use App\Models\TablePendidikan;
use App\Models\TableSertifikasi;
use Illuminate\Http\Request;

class PerubahanGajiController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');
        $query = Gaji::where('thnbln', session('thnbln'))
            ->whereRaw("berubah != '' AND SUBSTR(berubah, 1, 1) <> ?", ['1'])
            ->select('id', 'kdgol', 'status', 'keterangan', 'user')
            ->with([
                'pegawai:id,nip,nama'
            ]);

        if ($keyword) {
            $query->whereHas('pegawai', function ($q) use ($keyword) {
                $q->where('nama', 'like', "%{$keyword}%")
                    ->orWhere('nip', 'like', "%{$keyword}%");
            })
                ->orWhere('kdgol', 'like', "%{$keyword}%");
        }

        $data = $query->paginate(20)->withQueryString();

        return view('master.perubahan-gaji.index', compact('data'));
    }
    public function create()
    {
        $agama = TableAgama::all();
        $pendidikan = TablePendidikan::all();
        $asal_pegawai = TableAsalPegawai::all();
        $skpd = RefSkpd::select('kdskpd', 'uraian')->whereNotNull('kdskpd')
            ->whereRaw('CHAR_LENGTH(kdskpd) > 7')
            ->get();
        $config = Config::where('thnbln', session('thnbln'))->first();
        $kawin = TableKawin::all();
        $guru = TableSertifikasi::all();
        return view('master.perubahan-gaji.create', compact('agama', 'pendidikan', 'asal_pegawai', 'skpd', 'config', 'kawin', 'guru'));
    }
}
