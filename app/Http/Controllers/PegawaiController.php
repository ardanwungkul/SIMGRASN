<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Gaji;
use App\Models\Pegawai;
use App\Models\RefPangkat;
use App\Models\RefSkpd;
use App\Models\TableAgama;
use App\Models\TableAsalPegawai;
use App\Models\TablePendidikan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{

    public function searchPegawaiByTahunBulan(Request $request)
    {
        $search = $request->get('search');
        $tahun_bulan = session('thnbln');

        if (substr($tahun_bulan, 4, 2) == '01') {
            $tahun = (int)substr($tahun_bulan, 0, 4) - 1;
            $thnbln = $tahun . '12';
        } else {
            $tahun = substr($tahun_bulan, 0, 4);
            $bulan = (int)substr($tahun_bulan, 4, 2) - 1;
            $thnbln = $tahun . str_pad($bulan, 2, '0', STR_PAD_LEFT);
        }

        $data = Gaji::where('thnbln', $thnbln)->select('id')
            ->with(['pegawai:id,nip,nama'])
            ->when($search, function ($query) use ($search) {
                return $query->whereHas('pegawai', function ($q) use ($search) {
                    $q->where('nama', 'like', "%{$search}%")
                        ->orWhere('nip', 'like', "%{$search}%");
                });
            })
            ->get();
        $formattedData = $data->map(function ($gaji) {
            return [
                'id' => $gaji->pegawai->id,
                'text' => $gaji->pegawai->nip . ' - ' . $gaji->pegawai->nama,
                'nama' => $gaji->pegawai->nama,
                'nip' => $gaji->pegawai->nip,
                'thnbln' => $gaji->thnbln,
            ];
        });
        return response()->json([
            'results' => $formattedData,
            'pagination' => [
                'more' => false
            ]
        ]);
    }
    public function getPegawaiBulanLaluBulanIni(Request $request)
    {
        $thnbln_ini = session('thnbln');
        if (substr($thnbln_ini, 4, 2) == '01') {
            $tahun = (int)substr($thnbln_ini, 0, 4) - 1;
            $thnbln_lalu = $tahun . '12';
        } else {
            $tahun = substr($thnbln_ini, 0, 4);
            $bulan = (int)substr($thnbln_ini, 4, 2) - 1;
            $thnbln_lalu = $tahun . str_pad($bulan, 2, '0', STR_PAD_LEFT);
        }

        $pegawai_bulan_lalu = Gaji::where('id', $request->id)->where('thnbln', $thnbln_lalu)
            ->with([
                'pegawai:id,nip,nama',
                'pangkat:id,kdgol,uraian',
                'struktural' => function ($q) use ($thnbln_lalu) {
                    $q->where('tahun', substr($thnbln_lalu, 0, 4));
                },
                'fungsional' => function ($q) use ($thnbln_lalu) {
                    $q->where('tahun', substr($thnbln_lalu, 0, 4));
                },
                'fungsional.kelompok',
                'skpd' => function ($q) use ($thnbln_lalu) {
                    $q->where('tahun', substr($thnbln_lalu, 0, 4));
                },
            ])->first();


        $pegawai_bulan_ini = Gaji::where('id', $request->id)->where('thnbln', $thnbln_ini)
            ->with([
                'pegawai:id,nip,nama',
                'pangkat:id,kdgol,uraian',
                'struktural' => function ($q) use ($thnbln_ini) {
                    $q->where('tahun', substr($thnbln_ini, 0, 4));
                },
                'fungsional' => function ($q) use ($thnbln_ini) {
                    $q->where('tahun', substr($thnbln_ini, 0, 4));
                },
                'fungsional.kelompok',
                'skpd' => function ($q) use ($thnbln_ini) {
                    $q->where('tahun', substr($thnbln_ini, 0, 4));
                },
            ])->first();


        return response()->json([
            'success' => true,
            'data' => [
                'bulan_lalu' => $pegawai_bulan_lalu,
                'bulan_ini' => $pegawai_bulan_ini,
            ],
            'periode' => [
                'bulan_lalu' => $thnbln_lalu,
                'bulan_ini' => $thnbln_ini
            ]
        ]);
    }
    // ORDER kdgol DESC, masa DESC, rp_bersih DESC, nama ASC
    public function index(Request $request)
    {
        $keyword = $request->input('search');
        $filterJenisPegawaiInput = $request->input('filter-jenis-pegawai');
        $query = Gaji::where('thnbln', session('thnbln'))
            ->select('id', 'kdgol', 'status')
            ->with([
                'pegawai:id,nip,nama,tgllahir,jnskel,usiapens,dtawal,karpeg'
            ]);

        if ($filterJenisPegawaiInput) {
            if ($filterJenisPegawaiInput == 'PPPK') {
                $query->where('stspns', 'PPPK');
            } elseif ($filterJenisPegawaiInput == 'PNS') {
                $query->where('stspns', 'PNS');
            }
        }

        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->whereRelation('pegawai', 'nama', 'like', "%{$keyword}%")
                    ->orWhereRelation('pegawai', 'nip', 'like', "%{$keyword}%")
                    ->orWhere('kdgol', 'like', "%{$keyword}%");
            });
        }



        $query->orderBy('kdgol', 'DESC')
            ->orderBy('masa', 'DESC')
            ->orderBy('rp_bersih', 'DESC')
            ->orderBy(
                DB::raw('(SELECT nama FROM gajimain WHERE gajimain.id = gajibulan.id)'),
                'ASC'
            );
        $data = $query->paginate(20)->withQueryString();

        return view('master.pegawai.index', compact('data'));
    }
    public function create()
    {
        $agama = TableAgama::all();
        $pendidikan = TablePendidikan::all();
        $skpd = RefSkpd::select('kdskpd', 'uraian')->where('tahun', session('tahun'))->whereNotNull('kdskpd')
            ->whereRaw('CHAR_LENGTH(kdskpd) > 7')
            ->get();
        $asal_pegawai = TableAsalPegawai::all();
        $config = Config::where('thnbln', session('thnbln'))->first();
        return view('master.pegawai.create', compact('agama', 'pendidikan', 'skpd', 'asal_pegawai', 'config'));
    }


    public function store(Request $request)
    {
        $lastId = DB::table('gajimain')->max('id');
        $newId = $lastId ? $lastId + 1 : 1;

        $pegawai = new Pegawai();
        $pegawai->id = $newId;
        $pegawai->nip = $request->nip;
        $pegawai->nama = $request->nama;
        $pegawai->kelahiran = $request->kelahiran;
        $pegawai->tgllahir = $request->tgllahir;
        $pegawai->jnskel = $request->jnskel;
        $pegawai->agama = $request->agama;
        $pegawai->asalpeg = $request->asalpeg;
        $pegawai->pdidik = $request->pdidik;
        $pegawai->nokk = $request->nokk ?? '';
        $pegawai->nik = $request->nik ?? '';
        $pegawai->npwp = $request->npwp ?? '';
        $pegawai->rekbank = $request->rekbank ?? '';
        $pegawai->nmbank = $request->nmbank ?? '';
        $pegawai->nohp = $request->nohp ?? '';
        $pegawai->email = $request->email ?? '';
        $pegawai->alamat = $request->alamat ?? '';
        $pegawai->karpeg = $request->karpeg ?? '';
        $pegawai->kerja = 3;
        $pegawai->nipistri = '';
        $pegawai->nmistri = '';
        $pegawai->usiapens = $request->usiapens;
        if ($request->jnspeg == 1) {
            $pegawai->pns_tgl = $request->sk_tanggal;
            $pegawai->pns_tmt = $request->sk_tmt;
            $pegawai->pns_sk = $request->sk_nomor;
            $pegawai->pns_ket = $request->sk_dari;

            $pegawai->cpns_tgl = '0000-00-00';
            $pegawai->cpns_tmt = '0000-00-00';
            $pegawai->cpns_sk = '';
            $pegawai->cpns_ket = '';
        } else if ($request->jnspeg == 2) {
            $pegawai->cpns_tgl = $request->sk_tanggal;
            $pegawai->cpns_tmt = $request->sk_tmt;
            $pegawai->cpns_sk = $request->sk_nomor;
            $pegawai->cpns_ket = $request->sk_dari;

            $pegawai->pns_tgl = '0000-00-00';
            $pegawai->pns_tmt = '0000-00-00';
            $pegawai->pns_sk = '';
            $pegawai->pns_ket = '';
        } else {
            $pegawai->cpns_tgl = '0000-00-00';
            $pegawai->cpns_tmt = '0000-00-00';
            $pegawai->cpns_sk = '';
            $pegawai->cpns_ket = '';

            $pegawai->pns_tgl = '';
            $pegawai->pns_tmt = '';
            $pegawai->pns_sk = '';
            $pegawai->pns_ket = '';
        }
        $pegawai->dtawal = '';
        $pegawai->dtakhir = '';
        $pegawai->pensjns = '';
        $pegawai->pensskpp = '';
        $pegawai->save();

        $gaji = new gaji();
        $gaji->thnbln = session('thnbln');
        $gaji->id = $newId;
        $gaji->kdskpd = $request->kdskpd;
        $gaji->kdgol = $request->kdgol;
        $gaji->masa = $request->masa;
        $gaji->persen = $request->jnspeg == 2 ? 80 : 100;
        if ($request->jnsjab == 1) {
            $gaji->kdstruk = $request->kdstruk;
            $gaji->kdfung = '';
        } else if ($request->jnsjab == 2) {
            $gaji->kdstruk = '';
            $gaji->kdfung = $request->kdfung;
        }
        $gaji->jnspeg = $request->jnspeg == 1 || $request->jnspeg == 2 ? 1 : 2;
        $gaji->jnsjab = $request->jnsjab;
        $gaji->jnsnakes = '';
        $gaji->sertguru = $request->sertguru ?? '';
        $gaji->stsgaji = 1;
        if ($request->jnspeg == 1) {
            $gaji->stspns = 'PNS';
        } else if ($request->jnspeg == 2) {
            $gaji->stspns = 'CPNS';
        } else if ($request->jnspeg == 3) {
            $gaji->stspns = 'PPPK';
        }
        $gaji->status = $request->status;
        $gaji->kawin = $request->kawin;
        $gaji->peg = '';
        $gaji->anak = $request->anak;

        $gaji->rp_pokok = (int) preg_replace('/\D/', '', $request->gaji_pokok);

        $gaji->rp_istri = (int) preg_replace('/\D/', '', $request->istri_suami);
        $gaji->rp_anak = (int) preg_replace('/\D/', '', $request->tunjangan_anak);
        $gaji->rp_struk = (int) preg_replace('/\D/', '', $request->tunjangan_struktural);
        $gaji->rp_fung = (int) preg_replace('/\D/', '', $request->tunjangan_fungsional);
        $gaji->rp_umum = (int) preg_replace('/\D/', '', $request->tunjangan_umum);
        $gaji->rp_tambah = (int) preg_replace('/\D/', '', $request->tambahan_tunjangan);
        $gaji->rp_bulat = (int) preg_replace('/\D/', '', $request->pembulatan);
        $gaji->rp_beras = (int) preg_replace('/\D/', '', $request->tunjangan_beras);
        $gaji->rp_pajak = (int) preg_replace('/\D/', '', $request->tunjangan_pajak_pph);
        $gaji->rp_kotor = (int) preg_replace('/\D/', '', $request->penghasilan);
        $gaji->pot_iwp = 0;
        $gaji->pot_iwp8 = 0;
        $gaji->pot_iwp1 = 0;
        $gaji->pot_iwp4 = 0;
        $gaji->pot_pajak = (int) preg_replace('/\D/', '', $request->pajak_pph);
        $gaji->pot_tapera = (int) preg_replace('/\D/', '', $request->potongan_taperum);
        $gaji->pot_sewa = (int) preg_replace('/\D/', '', $request->sewa_rumah);
        $gaji->pot_lebih = (int) preg_replace('/\D/', '', $request->lebih_bayar);
        $gaji->pot_lain2 = (int) preg_replace('/\D/', '', $request->potongan_lain_lain);
        $gaji->pot_total = (int) preg_replace('/\D/', '', $request->potongan);
        $gaji->rp_bersih = (int) preg_replace('/\D/', '', $request->gaji_bersih);

        $gaji->terusan = '';
        $gaji->berubah = 10000000000;

        $gaji->jabatan = $request->jabatan ?? '';
        $gaji->keterangan = $request->keterangan ?? '';
        $gaji->user = Auth::user()->name;
        $gaji->updated_at = now();
        $gaji->save();

        return redirect()->route('pegawai.index')->with(['success' => 'Berhasil Menambahkan Pegawai']);
    }
}
