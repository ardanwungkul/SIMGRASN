<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Keluarga;
use App\Models\KeluargaAnak;
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
        return view('master.keluarga.index', compact('skpd'));
    }
    public function create($id)
    {
        $pegawai = Gaji::where('id', $id)
            ->where('thnbln', session('thnbln'))
            ->with('pegawai:nip,id,nama', 'pegawai.keluarga')
            ->first();
        return view('master.keluarga.create', compact('pegawai'));
    }
    public function istriSuami(Request $request, $id)
    {
        $pegawai = Gaji::where('id', $id)->where('thnbln', session('thnbln'))->first();
        $oldKeluarga = Keluarga::where('nip', $pegawai->pegawai->nip)->exists();
        if (!$oldKeluarga) {
            $keluarga = new Keluarga();
            $keluarga->nip =  $pegawai->pegawai->nip;
            $keluarga->kerja = $request->kerja;
            $keluarga->nipistri = $request->nipistri ?? '';
            $keluarga->nip2 =  '';
            $keluarga->nmistri = $request->nmistri;
            $keluarga->tempat = $request->tempat;
            $keluarga->tgllhr = $request->tgllhr;
            $keluarga->instansi = $request->instansi;
            $keluarga->ket = $request->ket;
            $keluarga->save();
        } else {
            $keluarga = Keluarga::where('nip', $pegawai->pegawai->nip)->first();
            $keluarga->nip =  $pegawai->pegawai->nip;
            $keluarga->kerja = $request->kerja;
            $keluarga->nipistri = $request->nipistri ?? '';
            $keluarga->nip2 =  '';
            $keluarga->nmistri = $request->nmistri;
            $keluarga->tempat = $request->tempat;
            $keluarga->tgllhr = $request->tgllhr;
            $keluarga->instansi = $request->instansi;
            $keluarga->ket = $request->ket;
            $keluarga->save();
        }
        return redirect()->back()->with(['success' => 'Berhasil Mengubah Data Istri']);
    }
    public function anak(Request $request, $id)
    {
        $pegawai = Gaji::where('id', $id)->where('thnbln', session('thnbln'))->first();
        foreach ($pegawai->pegawai->keluarga_anak as $keluarga_anak) {
            $keluarga_anak->delete();
        }

        foreach ($request->anak as $item) {
            $anak = new KeluargaAnak();
            $anak->nip = $pegawai->pegawai->nip;
            $anak->nama = $item['nama'];
            $anak->hubung = $item['hubung'];
            $anak->tgllhr = $item['tgllhr'];
            $anak->didik =   (int) substr($item['didik'], 0, 1);
            $anak->instansi = $item['instansi'];
            $anak->nmayah = $item['nmayah'];
            $anak->nmibu = $item['nmibu'];
            $anak->ket = $item['ket'] ?? '';
            $anak->tunj = $item['tunj'] == 'DAPAT' ? true : false;
            $anak->save();
        }
        return response()->json(['success' => 'Berhasil Menambahkan Anak']);
    }
}
