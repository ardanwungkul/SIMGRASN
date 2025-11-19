<x-app-layout>
    <div class="fixed top-0 right-0 w-full h-screen bg-black/20 backdrop-blur-sm z-50 hidden" id="loadingIndicator">
        <div class="banter-loader">
            <div class="banter-loader__box"></div>
            <div class="banter-loader__box"></div>
            <div class="banter-loader__box"></div>
            <div class="banter-loader__box"></div>
            <div class="banter-loader__box"></div>
            <div class="banter-loader__box"></div>
            <div class="banter-loader__box"></div>
            <div class="banter-loader__box"></div>
            <div class="banter-loader__box"></div>
        </div>
    </div>
    <form action="{{ route('perubahan-gaji.store') }}" id="formSubmit" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="border border-gray-300 bg-white w-full p-3 shadow-lg mb-3 rounded-lg">
            <select id="cari_pegawai" class="w-full rounded-lg text-xs bg-gray-100 border border-gray-300 select2">
                <option value="" selected disabled>Cari Pegawai</option>
            </select>
        </div>

        <div class="border border-gray-300 shadow-lg rounded-lg w-full mb-3 text-xs">
            <div class="px-5 py-3 bg-gray-100 rounded-t-lg border-b border-gray-300">
                <div class="flex gap-1 items-center">
                    <i class="fa-solid fa-info-circle text-gray-400"></i>
                    <p>Buat Perubahan</p>
                </div>
            </div>
            <div class="p-3 bg-white rounded-b-lg">
                <div class="grid grid-cols-4 gap-3">
                    <button type="button"
                        class="bg-gray-200 text-gray-400 font-bold px-3 py-2 rounded-lg shadow-lg cursor-not-allowed text-center transition-all duration-300 hover:opacity-90"
                        disabled id="button-pns">
                        <p>CPNS/PNS</p>
                    </button>
                    <button type="button"
                        class="bg-gray-200 text-gray-400 font-bold px-3 py-2 rounded-lg shadow-lg cursor-not-allowed text-center transition-all duration-300 hover:opacity-90"
                        disabled id="button-pangkat">
                        <p>PANGKAT</p>
                    </button>

                    <button type="button"
                        class="bg-gray-200 text-gray-400 font-bold px-3 py-2 rounded-lg shadow-lg cursor-not-allowed text-center transition-all duration-300 hover:opacity-90"
                        disabled id="button-berkala">
                        <p>BERKALA</p>
                    </button>

                    <button type="button"
                        class="bg-gray-200 text-gray-400 font-bold px-3 py-2 rounded-lg shadow-lg cursor-not-allowed text-center transition-all duration-300 hover:opacity-90"
                        disabled id="button-keluarga">
                        <p>TUNJANGAN KELUARGA</p>
                    </button>

                    <button type="button"
                        class="bg-gray-200 text-gray-400 font-bold px-3 py-2 rounded-lg shadow-lg cursor-not-allowed text-center transition-all duration-300 hover:opacity-90"
                        disabled id="button-eselon">
                        <p>ESELON</p>
                    </button>

                    <button type="button"
                        class="bg-gray-200 text-gray-400 font-bold px-3 py-2 rounded-lg shadow-lg cursor-not-allowed text-center transition-all duration-300 hover:opacity-90"
                        disabled id="button-fungsional">
                        <p>FUNGSIONAL</p>
                    </button>

                    <button type="button"
                        class="bg-gray-200 text-gray-400 font-bold px-3 py-2 rounded-lg shadow-lg cursor-not-allowed text-center transition-all duration-300 hover:opacity-90"
                        disabled id="button-skpd">
                        <p>SKPD</p>
                    </button>

                    <button type="button"
                        class="bg-gray-200 text-gray-400 font-bold px-3 py-2 rounded-lg shadow-lg cursor-not-allowed text-center transition-all duration-300 hover:opacity-90"
                        disabled id="button-potongan">
                        <p>POTONGAN</p>
                    </button>
                </div>
            </div>
        </div>

        <div class="text-xs flex flex-col md:flex-row items-start gap-3">
            <div class="border border-gray-300 shadow-lg rounded-lg w-full md:max-w-[65%]">
                <div class="px-5 py-3 bg-gray-100 rounded-t-lg border-b border-gray-300">
                    <div class="flex gap-1 items-center">
                        <i class="fa-solid fa-info-circle text-gray-400"></i>
                        <p>Data Pokok Gaji</p>
                    </div>
                </div>
                <div class="bg-white px-5 py-3 rounded-b-lg">
                    <ul class="list-decimal">
                        <div class="flex gap-2 mb-3 border-b pb-3">
                            <div class="bg-bay-950 text-white rounded-lg py-2 w-full">
                                <p class="text-center text-xs">Jenis Perubahan</p>
                            </div>
                            <div class="bg-bay-950 text-white rounded-lg py-2 w-full">
                                <p class="text-center text-xs">Data Bulan Lalu</p>
                            </div>
                            <div class="bg-bay-950 text-white rounded-lg py-2 w-full">
                                <p class="text-center text-xs">Data Bulan Ini</p>
                            </div>
                        </div>
                        <table class="w-full table-fixed" id="tablePokokGaji">
                            <tbody>
                                <tr>
                                    <td class="self-center w-1/3 py-1">
                                        <li class="list-decimal space-y-3 font-bold ml-1">
                                            Status CPNS/PNS
                                        </li>
                                    </td>
                                    <td class="px-1 !w-1/3 py-1">
                                        <input type="text" id="last_stspns" readonly
                                            class="rounded-lg w-full text-xs bg-gray-100 border border-gray-300 shadow-lg">
                                    </td>
                                    <td class="px-1 !w-1/3 py-1">
                                        <input type="text" id="current_stspns" readonly
                                            class="rounded-lg w-full text-xs bg-gray-100 border border-gray-300 shadow-lg">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="self-center w-1/3 py-1">
                                        <li class="list-decimal space-y-3 font-bold ml-1">
                                            Gaji Pokok
                                        </li>
                                    </td>
                                    <td class="px-1 !w-1/3 py-1">
                                        <input type="text" id="last_persen" readonly
                                            class="rounded-lg w-full text-xs bg-gray-100 border border-gray-300 shadow-lg">
                                    </td>
                                    <td class="px-1 !w-1/3 py-1">
                                        <input type="text" id="current_persen" readonly
                                            class="rounded-lg w-full text-xs bg-gray-100 border border-gray-300 shadow-lg">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="self-center w-1/3 py-1 pl-1">Golongan / Pangkat
                                    </td>
                                    <td class="px-1 !w-1/3 py-1">
                                        <input type="text" id="last_kdgol" readonly
                                            class="rounded-lg w-full text-xs bg-gray-100 border border-gray-300 shadow-lg">
                                    </td>
                                    <td class="px-1 !w-1/3 py-1">
                                        <input type="text" id="current_kdgol" readonly
                                            class="rounded-lg w-full text-xs bg-gray-100 border border-gray-300 shadow-lg">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="self-center w-1/3 py-1 pl-1">Masa Kerja (Tahun)
                                    </td>
                                    <td class="px-1 !w-1/3 py-1">
                                        <input type="text" id="last_masa" readonly
                                            class="rounded-lg w-full text-xs bg-gray-100 border border-gray-300 shadow-lg">
                                    </td>
                                    <td class="px-1 !w-1/3 py-1">
                                        <input type="text" id="current_masa" readonly
                                            class="rounded-lg w-full text-xs bg-gray-100 border border-gray-300 shadow-lg">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="self-center w-1/3 py-1">
                                        <li class="list-decimal space-y-3 font-bold ml-1">
                                            Tunjangan Keluarga
                                        </li>
                                    </td>
                                    <td class="px-1 !w-1/3 py-1">
                                        <input type="text" id="last_status" readonly
                                            class="rounded-lg w-full text-xs bg-gray-100 border border-gray-300 shadow-lg">
                                    </td>
                                    <td class="px-1 !w-1/3 py-1">
                                        <select name="current_status" id="current_status"
                                            class="rounded-lg w-full text-xs bg-gray-100 select2">
                                            <option value="">Pilh Tunjangan Keluarga</option>
                                            @foreach ($kawin as $item)
                                                <option value="{{ $item->kawin }}">{{ $item->kawin }} -
                                                    {{ $item->uraian }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="self-center w-1/3 py-1 pl-1">Jumlah Anak</td>
                                    <td class="px-1 !w-1/3 py-1">
                                        <input type="text" id="last_anak" readonly
                                            class="rounded-lg w-full text-xs bg-gray-100 border border-gray-300 shadow-lg">
                                    </td>
                                    <td class="px-1 !w-1/3 py-1">
                                        <select name="current_anak" id="current_anak"
                                            class="rounded-lg w-full text-xs bg-gray-100 select2">
                                            <option value="" selected disabled>Pilh Anak</option>
                                            <option value="0">0 Anak</option>
                                            <option value="1">1 Anak</option>
                                            <option value="2">2 Anak</option>
                                            <option value="3">3 Anak</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="self-center w-1/3 py-1">
                                        <li class="list-decimal space-y-3 font-bold ml-1">
                                            Tunjangan Jabatan
                                        </li>
                                    </td>
                                    <td class="px-1 !w-1/3 py-1">
                                        <input type="text" id="last_jnsjab" readonly
                                            class="rounded-lg w-full text-xs bg-gray-100 border border-gray-300 shadow-lg">
                                    </td>
                                    <td class="px-1 !w-1/3 py-1">
                                        <select name="current_jnsjab" id="current_jnsjab"
                                            class="rounded-lg w-full text-xs bg-gray-100 select2">
                                            <option value="" selected disabled>Pilih Tunjangan</option>
                                            <option value="1">1 - Tunjangan Struktural</option>
                                            <option value="2">2 - Tunjangan Fungsional</option>
                                            <option value="3">3 - Tunjangan Umum</option>
                                            <option value="4">4 - Tidak dapat Tunjangan</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="self-center w-1/3 py-1 pl-1">Jabatan Struktural
                                    </td>
                                    <td class="px-1 !w-1/3 py-1">
                                        <input type="text" id="last_kdstruk" readonly
                                            class="rounded-lg w-full text-xs bg-gray-100 border border-gray-300 shadow-lg">
                                    </td>
                                    <td class="px-1 !w-1/3 py-1">
                                        <input type="text" id="current_kdstruk" readonly
                                            class="rounded-lg w-full text-xs bg-gray-100 border border-gray-300 shadow-lg">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="self-center w-1/3 py-1 pl-1">Kelompok
                                        Fungsional</td>
                                    <td class="px-1 !w-1/3 py-1">
                                        <input type="text" id="last_kelfung" readonly
                                            class="rounded-lg w-full text-xs bg-gray-100 border border-gray-300 shadow-lg">
                                    </td>
                                    <td class="px-1 !w-1/3 py-1">
                                        <input type="text" id="current_kelfung" readonly
                                            class="rounded-lg w-full text-xs bg-gray-100 border border-gray-300 shadow-lg">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="self-center w-1/3 py-1 pl-1">Jabatan Fungsional
                                    </td>
                                    <td class="px-1 !w-1/3 py-1">
                                        <input type="text" id="last_kdfung" readonly
                                            class="rounded-lg w-full text-xs bg-gray-100 border border-gray-300 shadow-lg">
                                    </td>
                                    <td class="px-1 !w-1/3 py-1">
                                        <input type="text" id="current_kdfung" readonly
                                            class="rounded-lg w-full text-xs bg-gray-100 border border-gray-300 shadow-lg">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="self-center w-1/3 py-1 pl-1">Sertifikasi Guru
                                    </td>
                                    <td class="px-1 !w-1/3 py-1">
                                        <input type="text" id="last_sertguru" readonly
                                            class="rounded-lg w-full text-xs bg-gray-100 border border-gray-300 shadow-lg">
                                    </td>
                                    <td class="px-1 !w-1/3 py-1">
                                        <select name="current_sertguru" id="current_sertguru"
                                            class="rounded-lg w-full text-xs bg-gray-100 select2">
                                            <option value="" selected disabled>Pilih Sertifikasi Guru</option>
                                            @foreach ($guru as $item)
                                                <option value="{{ $item->kode }}">{{ $item->kode }} -
                                                    {{ $item->uraian }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="self-center w-1/3 py-1 pl-1">Keterangan Jabatan
                                    </td>
                                    <td class="px-1 !w-1/3 py-1" colspan="2">
                                        <input type="text" id="jabatan"
                                            class="rounded-lg w-full text-xs border border-gray-300 shadow-lg">

                                    </td>
                                </tr>
                                <tr>
                                    <td class="self-center w-1/3 py-1">
                                        <li class="list-decimal space-y-3 font-bold ml-1">
                                            Status Pembayaran Gaji
                                        </li>
                                    </td>
                                    <td class="px-1 !w-1/3 py-1" colspan="2">
                                        <select name="stsgaji" id="stsgaji"
                                            class="rounded-lg text-xs bg-gray-100 w-full select2" style="width: 100%">
                                            <option value="" selected disabled>
                                                Pilh Status Pembayaran Gaji
                                            </option>
                                            <option value="1">1 - Normal (Gaji dan Tunjangan Dibayar)</option>
                                            <option value="2">2 - Gaji dan Tunjangan Tidak Dibayar</option>
                                            <option value="3">3 - Hanya Gaji yang Dibayarkan</option>
                                            <option value="4">4 - Hanya Tunjangan yang Dibayarkan</option>
                                            <option value="5">5 - Pembayaran Gaji Terusan (Meninggal Dunia)
                                            </option>
                                            <option value="6">6 - Pemberhentian Sementara (Gaji Pokok
                                                Sebagian)
                                            </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="self-center w-1/3 py-1">
                                        <li class="list-decimal space-y-3 font-bold ml-1">
                                            OPD / SKPD Semula
                                        </li>
                                    </td>
                                    <td class="px-1 !w-1/3 py-1" colspan="2">
                                        <input type="text" id="last_kdskpd" readonly
                                            class="rounded-lg w-full text-xs bg-gray-100 border border-gray-300 shadow-lg">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="self-center w-1/3 py-1 pl-1">Pindah ke OPD /
                                        SKPD</td>
                                    <td class="px-1 !w-1/3 py-1" colspan="2">
                                        <input type="text" id="current_kdskpd" readonly
                                            class="rounded-lg w-full text-xs bg-gray-100 border border-gray-300 shadow-lg">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="self-center w-1/3 py-1">
                                        <li class="list-decimal space-y-3 font-bold ml-1">
                                            Keterangan
                                        </li>
                                    </td>
                                    <td class="px-1 !w-1/3 py-1" colspan="2">
                                        <input type="text" id="keterangan"
                                            class="rounded-lg w-full text-xs border border-gray-300 shadow-lg">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </ul>
                </div>
            </div>
            <div class="border border-gray-300 shadow-lg rounded-lg w-full md:max-w-[35%]">
                <div class="px-5 py-3 bg-gray-100 rounded-t-lg border-b border-gray-300">
                    <div class="flex gap-1 items-center">
                        <i class="fa-solid fa-info-circle text-gray-400"></i>
                        <p>Perhitungan Gaji</p>
                    </div>
                </div>
                <div class="bg-white px-5 py-3 rounded-b-lg">
                    <div class="space-y-1">
                        <div class="grid grid-cols-2 gap-1">
                            <label for="" class="self-center">Gaji Pokok</label>
                            <input type="text" name="gaji_pokok" id="gaji_pokok" readonly value="0"
                                class="text-xs rupiah rounded-lg border border-gray-300 shadow-md bg-gray-200 text-end">
                        </div>
                        <div class="grid grid-cols-2 gap-1">
                            <label for="" class="self-center">Istri/Suami</label>
                            <input type="text" name="istri_suami" id="istri_suami" readonly value="0"
                                class="text-xs rupiah rounded-lg border border-gray-300 shadow-md bg-gray-200 text-end">
                        </div>
                        <div class="grid grid-cols-2 gap-1">
                            <label for="" class="self-center">Tunjangan Anak</label>
                            <input type="text" name="tunjangan_anak" id="tunjangan_anak" readonly value="0"
                                class="text-xs rupiah rounded-lg border border-gray-300 shadow-md bg-gray-200 text-end">
                        </div>
                        <div class="grid grid-cols-2 gap-1">
                            <label for="" class="self-center">Tunjangan Struktural</label>
                            <input type="text" name="tunjangan_struktural" id="tunjangan_struktural" readonly
                                value="0"
                                class="text-xs rupiah rounded-lg border border-gray-300 shadow-md bg-gray-200 text-end">
                        </div>
                        <div class="grid grid-cols-2 gap-1">
                            <label for="" class="self-center">Tunjangan Fungsional</label>
                            <input type="text" name="tunjangan_fungsional" id="tunjangan_fungsional" readonly
                                value="0"
                                class="text-xs rupiah rounded-lg border border-gray-300 shadow-md bg-gray-200 text-end">
                        </div>
                        <div class="grid grid-cols-2 gap-1">
                            <label for="" class="self-center">Tunjangan Umum</label>
                            <input type="text" name="tunjangan_umum" id="tunjangan_umum" readonly value="0"
                                class="text-xs rupiah rounded-lg border border-gray-300 shadow-md bg-gray-200 text-end">
                        </div>
                        <div class="grid grid-cols-2 gap-1">
                            <label for="" class="self-center">Tambahan Tunjangan</label>
                            <input type="text" name="tambahan_tunjangan" id="tambahan_tunjangan" readonly
                                value="0"
                                class="text-xs rupiah rounded-lg border border-gray-300 shadow-md bg-gray-200 text-end">
                        </div>
                        <div class="grid grid-cols-2 gap-1">
                            <label for="" class="self-center">Tunjangan Beras</label>
                            <input type="text" name="tunjangan_beras" id="tunjangan_beras" readonly
                                value="0"
                                class="text-xs rupiah rounded-lg border border-gray-300 shadow-md bg-gray-200 text-end">
                        </div>
                        <div class="grid grid-cols-2 gap-1">
                            <label for="" class="self-center">Tunjangan Pajak PPh</label>
                            <input type="text" name="tunjangan_pajak_pph" id="tunjangan_pajak_pph" readonly
                                value="0"
                                class="text-xs rupiah rounded-lg border border-gray-300 shadow-md bg-gray-200 text-end">
                        </div>
                        <div class="grid grid-cols-2 gap-1">
                            <label for="" class="self-center">Pembulatan</label>
                            <input type="text" name="pembulatan" id="pembulatan" readonly value="0"
                                class="text-xs rupiah rounded-lg border border-gray-300 shadow-md bg-gray-200 text-end">
                        </div>
                        <div class="grid grid-cols-2 gap-1">
                            <label for="" class="font-extrabold self-center">PENGHASILAN</label>
                            <input type="text" name="penghasilan" id="penghasilan" readonly value="0"
                                class="font-extrabold text-xs rupiah rounded-lg border border-gray-300 shadow-md bg-gray-200 text-end">
                        </div>
                        <div class="grid grid-cols-2 gap-1">
                            <label for="" class="self-center">Potongan Taspen</label>
                            <input type="text" name="potongan_taspen" id="potongan_taspen" readonly
                                value="0"
                                class="text-xs rupiah rounded-lg border border-gray-300 shadow-md bg-gray-200 text-end">
                        </div>
                        <div class="grid grid-cols-2 gap-1">
                            <label for="" class="self-center">BPJS Kesehatan</label>
                            <input type="text" name="bpjs_kesehatan" id="bpjs_kesehatan" readonly value="0"
                                class="text-xs rupiah rounded-lg border border-gray-300 shadow-md bg-gray-200 text-end">
                        </div>
                        <div class="grid grid-cols-2 gap-1">
                            <label for="" class="self-center">Pajak PPh. 21</label>
                            <input type="text" name="pajak_pph" id="pajak_pph" readonly value="0"
                                class="text-xs rupiah rounded-lg border border-gray-300 shadow-md bg-gray-200 text-end">
                        </div>
                        <div class="grid grid-cols-2 gap-1">
                            <label for="" class="self-center">Potongan Taperum</label>
                            <input type="text" name="potongan_taperum" id="potongan_taperum" readonly
                                value="0"
                                class="text-xs rupiah rounded-lg border border-gray-300 shadow-md bg-gray-200 text-end">
                        </div>
                        <div class="grid grid-cols-2 gap-1">
                            <label for="" class="self-center">Sewa Rumah</label>
                            <input type="text" name="sewa_rumah" id="sewa_rumah" readonly value="0"
                                class="text-xs rupiah rounded-lg border border-gray-300 shadow-md bg-gray-200 text-end">
                        </div>
                        <div class="grid grid-cols-2 gap-1">
                            <label for="" class="self-center">Lebih Bayar</label>
                            <input type="text" name="lebih_bayar" id="lebih_bayar" readonly value="0"
                                class="text-xs rupiah rounded-lg border border-gray-300 shadow-md bg-gray-200 text-end">
                        </div>
                        <div class="grid grid-cols-2 gap-1">
                            <label for="" class="self-center">Potongan Lain Lain</label>
                            <input type="text" name="potongan_lain_lain" id="potongan_lain_lain" readonly
                                value="0"
                                class="text-xs rupiah rounded-lg border border-gray-300 shadow-md bg-gray-200 text-end">
                        </div>
                        <div class="grid grid-cols-2 gap-1">
                            <label for="" class="font-extrabold self-center">POTONGAN</label>
                            <input type="text" name="potongan" id="potongan" readonly value="0"
                                class="font-extrabold text-xs rupiah rounded-lg border border-gray-300 shadow-md text-end bg-gray-200">
                        </div>
                        <div class="grid grid-cols-2 gap-1">
                            <label for="" class="font-extrabold self-center">GAJI
                                BERSIH</label>
                            <input type="text" name="gaji_bersih" id="gaji_bersih" readonly value="0"
                                class="font-extrabold text-xs rupiah rounded-lg border border-gray-300 shadow-md text-end bg-gray-200">
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="text-xs mt-3 bg-white p-3 rounded-lg shadow-lg border border-gray-300">
            <div class="flex md:justify-end justify-between items-center md:gap-4 gap-1 col-span-2">
                <a href="{{ route('perubahan-gaji.index') }}"
                    class="bg-bay-950 hover:bg-opacity-80 text-white py-2 px-4 rounded-lg flex items-center gap-1 text-xs shadow-md">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                            d="M6 18 17.94 6M18 18 6.06 6" />
                    </svg>

                    <p>Batal</p>
                </a>
                <button
                    class="bg-green-500 hover:bg-opacity-80 text-white py-2 px-4 rounded-lg flex items-center gap-1 text-xs shadow-md"
                    type="submit">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                            d="M5 11.917 9.724 16.5 19 7.5" />
                    </svg>

                    <p>Simpan</p>
                </button>
            </div>
        </div>
    </form>
</x-app-layout>
<script type="module">
    $(document).ready(function() {
        $('.select2').select2({
            dropdownCssClass: "text-xs",
            selectionCssClass: 'text-xs'
        });

        $('#cari_pegawai').select2({
            dropdownCssClass: "text-xs",
            selectionCssClass: 'text-xs',
            language: {
                inputTooShort: function(args) {
                    var remainingChars = args.minimum - args.input.length;
                    return "Masukkan " + remainingChars + " karakter lagi";
                }
            },
            ajax: {
                url: `{{ route('search.pegawai.by.tahun-bulan') }}`,
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        search: params.term,
                        page: params.page || 1
                    };
                },
                processResults: function(data, params) {
                    return {
                        results: data.results,
                        pagination: {
                            more: data.pagination?.more || false
                        }
                    };
                },
                cache: true
            },
            minimumInputLength: 5,
            templateSelection: function(data) {
                if (data.nama && data.nip) {
                    return data.nip + ' - ' + data.nama;
                }
                return data.text;
            }
        });

        $('#cari_pegawai').on('select2:select', function(e) {

            var selectedData = e.params.data;
            $('#loadingIndicator').removeClass('hidden')

            $.ajax({
                url: '{{ route('get.pegawai.bulan-lalu.bulan-ini') }}',
                method: 'GET',
                data: {
                    id: selectedData.id,
                },
                success: function(response) {
                    console.log(response);

                    const last = response.data.bulan_lalu
                    const current = response.data.bulan_ini

                    $('#last_stspns').val(last.stspns)
                    $('#current_stspns').val(current.stspns)

                    $('#last_persen').val(last.persen + '%')
                    $('#current_persen').val(current.persen + '%')

                    $('#last_kdgol').val(last.pangkat.kdgol + ' / ' + last.pangkat.uraian)
                    $('#current_kdgol').val(current.pangkat.kdgol + ' / ' + current.pangkat
                        .uraian)

                    $('#last_masa').val(last.masa)
                    $('#current_masa').val(current.masa)

                    $('#last_status').val(last.status)
                    $('#current_status').val(current.kawin).trigger('change')

                    $('#last_anak').val(last.anak + ' Anak')
                    $('#current_anak').val(current.anak).trigger('change')

                    function getJnsJabUraian(id) {
                        if (id == 1) {
                            return 'Tunjangan Struktural';
                        } else if (id == 2) {
                            return 'Tunjangan Fungsional';
                        } else if (id == 3) {
                            return 'Tunjangan Umum';
                        } else if (id == 4) {
                            return 'Tidak dapat Tunjangan';
                        }
                    }

                    $('#last_jnsjab').val(last.jnsjab + ' - ' + getJnsJabUraian(last
                        .jnsjab))
                    $('#current_jnsjab').val(current.jnsjab).trigger('change')


                    $('#last_kdstruk').val(last.kdstruk ? last.struktural.kdstruk + ' - ' +
                        last.struktural
                        .uraian : '')
                    $('#current_kdstruk').val(current.kdstruk ? current.struktural.kdstruk +
                        ' - ' + current
                        .struktural.uraian : '')

                    $('#last_kelfung').val(last.kdfung ? last.fungsional.kelompok.kdkel +
                        ' - ' +
                        last.fungsional.kelompok.uraian : '')
                    $('#current_kelfung').val(last.kdfung ? current.fungsional.kelompok
                        .kdkel +
                        ' - ' + current.fungsional.kelompok.uraian : '')

                    $('#last_kdfung').val(last.kdfung ? last.fungsional.kdfung + ' - ' +
                        last.fungsional
                        .uraian : '')
                    $('#current_kdfung').val(last.kdfung ? current.fungsional.kdfung +
                        ' - ' + current
                        .fungsional.uraian : '')

                    function getSertGuru(id) {
                        if (id == '00') {
                            return 'NON SERTIFIKASI GURU';
                        } else if (id == '01') {
                            return 'SERTIFIKASI GURU TK';
                        } else if (id == '02') {
                            return 'SERTIFIKASI GURU SD';
                        } else if (id == '03') {
                            return 'SERTIFIKASI GURU SMP';
                        } else if (id == '04') {
                            return 'SERTIFIKASI GURU SMA';
                        }
                    }

                    $('#last_sertguru').val(last.sertguru.toString().padStart(2,
                        '0') + ' - ' + getSertGuru(last.sertguru.toString()
                        .padStart(2,
                            '0')))
                    $('#current_sertguru').val(current.sertguru.toString().padStart(2, '0'))
                        .trigger('change')

                    $('#jabatan').val(current.jabatan)

                    function getStatusGaji(id) {
                        if (id == 1) {
                            return 'Normal (Gaji dan Tunjangan Dibayar)';
                        } else if (id == 2) {
                            return 'Gaji dan Tunjangan Tidak Dibayar';
                        } else if (id == 3) {
                            return 'Hanya Gaji yang Dibayarkan';
                        } else if (id == 4) {
                            return 'Hanya Tunjangan yang Dibayarkan';
                        } else if (id == 5) {
                            return 'Pembayaran Gaji Terusan (Meninggal Dunia)';
                        } else if (id == 6) {
                            return 'Pemberhentian Sementara (Gaji Pokok Sebagian)';
                        }
                    }
                    $('#stsgaji').val(current.stsgaji).trigger('change')

                    $('#last_kdskpd').val(last.skpd.kdskpd + ' - ' + last.skpd.uraian)
                    $('#current_kdskpd').val(current.skpd.kdskpd + ' - ' + current.skpd
                        .uraian)

                    $('#keterangan').val(current.keterangan)

                    // Perhitungan Gaji

                    function formatRupiah(angka) {
                        if (!angka) return 'Rp. 0';
                        let number_string = angka.toString().replace(/[^,\d]/g, '');
                        let split = number_string.split(',');
                        let sisa = split[0].length % 3;
                        let rupiah = split[0].substr(0, sisa);
                        let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                        if (ribuan) {
                            let separator = sisa ? '.' : '';
                            rupiah += separator + ribuan.join('.');
                        }

                        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                        return 'Rp. ' + rupiah;
                    }

                    $('#gaji_pokok').val(formatRupiah(current.rp_pokok))
                    $('#istri_suami').val(formatRupiah(current.rp_istri))
                    $('#tunjangan_anak').val(formatRupiah(current.rp_anak))
                    $('#tunjangan_struktural').val(formatRupiah(current.rp_struk))
                    $('#tunjangan_fungsional').val(formatRupiah(current.rp_fung))
                    $('#tunjangan_umum').val(formatRupiah(current.rp_umum))
                    $('#tambahan_tunjangan').val(formatRupiah(current.rp_tambah))
                    $('#tunjangan_beras').val(formatRupiah(current.rp_beras))
                    $('#tunjangan_pajak_pph').val(formatRupiah(current.rp_pajak))
                    $('#pembulatan').val(formatRupiah(current.rp_bulat))
                    $('#penghasilan').val(formatRupiah(current.rp_kotor))
                    $('#potongan_taspen').val(formatRupiah(current.pot_iwp8))
                    $('#bpjs_kesehatan').val(formatRupiah(current.pot_iwp1))
                    $('#pajak_pph').val(formatRupiah(current.pot_pajak))
                    $('#potongan_taperum').val(formatRupiah(current.pot_tapera))
                    $('#sewa_rumah').val(formatRupiah(current.pot_sewa))
                    $('#lebih_bayar').val(formatRupiah(current.pot_lebih))
                    $('#potongan_lain_lain').val(formatRupiah(current.pot_lain2))
                    $('#potongan').val(formatRupiah(current.pot_total))
                    $('#gaji_bersih').val(formatRupiah(current.rp_bersih))

                    $('#button-pns').attr('disabled', false)
                        .removeClass('cursor-not-allowed bg-gray-200 text-gray-400')
                        .addClass('cursor-pointer bg-bay-950 text-white');
                    $('#button-pangkat').attr('disabled', false)
                        .removeClass('cursor-not-allowed bg-gray-200 text-gray-400')
                        .addClass('cursor-pointer bg-bay-950 text-white');
                    $('#button-berkala').attr('disabled', false)
                        .removeClass('cursor-not-allowed bg-gray-200 text-gray-400')
                        .addClass('cursor-pointer bg-bay-950 text-white');
                    $('#button-keluarga').attr('disabled', false)
                        .removeClass('cursor-not-allowed bg-gray-200 text-gray-400')
                        .addClass('cursor-pointer bg-bay-950 text-white');
                    $('#button-eselon').attr('disabled', false)
                        .removeClass('cursor-not-allowed bg-gray-200 text-gray-400')
                        .addClass('cursor-pointer bg-bay-950 text-white');
                    $('#button-fungsional').attr('disabled', false)
                        .removeClass('cursor-not-allowed bg-gray-200 text-gray-400')
                        .addClass('cursor-pointer bg-bay-950 text-white');
                    $('#button-skpd').attr('disabled', false)
                        .removeClass('cursor-not-allowed bg-gray-200 text-gray-400')
                        .addClass('cursor-pointer bg-bay-950 text-white');
                    $('#button-potongan').attr('disabled', false)
                        .removeClass('cursor-not-allowed bg-gray-200 text-gray-400')
                        .addClass('cursor-pointer bg-bay-950 text-white');

                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                },
                complete: function() {
                    $('#loadingIndicator').addClass('hidden')
                    $('#cari_pegawai').attr('disabled', true);
                }
            });
        })

    })
</script>
