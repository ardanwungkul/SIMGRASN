<x-app-layout>
    <div class="space-y-3">
        <div class="border border-gray-300 shadow-lg rounded-lg w-full mb-3">
            <div class="px-5 py-3 bg-gray-100 rounded-t-lg border-b border-gray-300">
                <div class="flex gap-1 items-center">
                    <i class="fa-solid fa-info-circle text-gray-400"></i>
                    <p class="text-sm">Pegawai</p>
                </div>
            </div>
            <div class="bg-white px-5 py-5 rounded-b-lg text-xs">
                <div class="space-y-1">
                    <input type="text" id="pegawai" name="pegawai" readonly
                        value="{{ $pegawai->pegawai->nip }} - {{ $pegawai->pegawai->nama }} - [{{ $pegawai->kawin }}]"
                        class="w-full rounded-lg text-xs bg-gray-100 border border-gray-300">
                </div>
            </div>
        </div>
        <div class="border border-gray-300 shadow-lg rounded-lg w-full mb-3">
            <div class="px-5 py-3 bg-gray-100 rounded-t-lg border-b border-gray-300">
                <div class="flex gap-1 items-center">
                    <i class="fa-solid fa-info-circle text-gray-400"></i>
                    <p class="text-sm">Data Istri / Suami Pegawai </p>
                </div>
            </div>
            <form action="">
                <div class="bg-white px-5 py-5 rounded-b-lg text-xs">
                    <div class="grid grid-cols-2 gap-3">
                        <div class="space-y-1 col-span-2">
                            <label for="kerja">Status Pekerjaan</label>
                            <select id="kerja" name="kerja"
                                class="w-full rounded-lg text-xs bg-gray-100 border border-gray-300 select2">
                                <option value="" selected disabled>Pilih Status Pekerjaan</option>
                                <option value="1">1 - ASN Satu Daerah</option>
                                <option value="2">2 - ASN Luar Daerah</option>
                                <option value="3">3 - Honorer Daerah</option>
                                <option value="4">4 - TNI / Polri</option>
                                <option value="5">5 - BUMN / BUMD</option>
                                <option value="6">6 - Karyawan Swasta</option>
                                <option value="7">7 - Wiraswasta</option>
                                <option value="8">8 - Buruh / Tani / Nelayan</option>
                                <option value="9">9 - Tidak Bekerja</option>
                                <option value="10">10 - Lainnya</option>
                            </select>
                        </div>
                        <div class="space-y-1 col-span-2">
                            <label for="nipistri">NIP. (Jika PNS)</label>
                            <input type="text" id="nipistri" name="nipistri"
                                class="w-full rounded-lg text-xs border border-gray-300 shadow-lg"
                                placeholder="Masukkan NIP">
                        </div>
                        <div class="space-y-1 col-span-2">
                            <label for="nmistri">Nama Istri / Suami</label>
                            <input type="text" id="nmistri" name="nmistri"
                                class="w-full rounded-lg text-xs border border-gray-300 shadow-lg"
                                placeholder="Masukkan Nama Istri / Suami">
                        </div>
                        <div class="space-y-1">
                            <label for="tempat">Tempat Lahir</label>
                            <input type="text" id="tempat" name="tempat"
                                class="w-full rounded-lg text-xs border border-gray-300 shadow-lg"
                                placeholder="Masukkan Tempat Kelahiran">
                        </div>
                        <div class="space-y-1">
                            <label for="tgllahir">Tanggal Lahir</label>
                            <input type="date" id="tgllahir" name="tgllahir"
                                class="w-full rounded-lg text-xs border border-gray-300 shadow-lg">
                        </div>
                        <div class="space-y-1 col-span-2">
                            <label for="instansi">Instansi</label>
                            <input type="text" id="instansi" name="instansi"
                                class="w-full rounded-lg text-xs border border-gray-300 shadow-lg"
                                placeholder="Masukkan Nama Instansi">
                        </div>
                        <div class="space-y-1 col-span-2">
                            <label for="ket">Keterangan</label>
                            <input type="text" id="ket" name="ket"
                                class="w-full rounded-lg text-xs border border-gray-300 shadow-lg"
                                placeholder="Masukkan Keterangan">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="border border-gray-300 shadow-lg rounded-lg w-full mb-3">
            <div class="px-5 py-3 bg-gray-100 rounded-t-lg border-b border-gray-300">
                <div class="flex justify-between">
                    <div class="flex gap-1 items-center">
                        <i class="fa-solid fa-info-circle text-gray-400"></i>
                        <p class="text-sm">Daftar Anak Pegawai</p>
                    </div>
                    <div>
                        <button type="button" data-modal-target="tambah-anak" data-modal-toggle="tambah-anak"
                            class="text-xs bg-bay-950 text-white rounded-lg shadow-lg px-3 py-2 hover:opacity-90 duration-300 transition-all">
                            Tambah Anak
                        </button>
                        <x-modal.tambah-anak />
                    </div>
                </div>
            </div>
            <div class="bg-white px-5 py-5 rounded-b-lg text-xs">
                <div class="relative">
                    <div class="rounded-lg overflow-hidden shadow-lg border border-gray-300">
                        <table id="datatable" class="text-sm hover stripe row-border">
                            <thead class="bg-bay-950 text-white font-bold">
                                <tr>
                                    <td class="text-xs !text-center w-10">No.</td>
                                    <td class="text-xs">Nama Anak</td>
                                    <td class="text-xs">Hubungan</td>
                                    <td class="text-xs">Tanggal Lahir</td>
                                    <td class="text-xs">Pendidikan</td>
                                    <td class="text-xs">Instansi</td>
                                    <td class="text-xs">Nama Ayah</td>
                                    <td class="text-xs">Nama Ibu</td>
                                    <td class="text-xs">Tunjangan</td>
                                </tr>
                            </thead>
                            <tbody class="text-xs">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script type="module">
    function getPendidikan(id) {
        if (id == 1) return 'BELUM SEKOLAH';
        else if (id == 2) return 'TK / PLAY GROUP';
        else if (id == 3) return 'SEKOLAH DASAR';
        else if (id == 4) return 'SMP (SEDERAJAT)';
        else if (id == 5) return 'SMU (SEDERAJAT)';
        else if (id == 6) return 'DIPLOMA (I/II/III)';
        else if (id == 7) return 'SARJANA S1';
        else if (id == 8) return 'LULUS (TAMAT)';
    }
    $(document).ready(function() {
        $('.select2').select2({
            dropdownCssClass: "text-xs",
            selectionCssClass: 'text-xs'
        });
        let table = $('#datatable').DataTable({
            info: false,
            lengthChange: false,
            searching: false,
            deferRender: true,
            paging: false,
            language: {
                search: '',
                emptyTable: "Tidak ada data tersedia",
                searchPlaceholder: 'Cari...'
            },
            ordering: true,
            responsive: true,
            columnDefs: [{
                    targets: 0,
                    className: '!text-center'
                },
                {
                    targets: 1,
                    className: '!text-left'
                },
                {
                    targets: 2,
                    className: '!text-center'
                },
                {
                    targets: 3,
                    className: '!text-center'
                },
                {
                    targets: 4,
                    className: '!text-left'
                },
                {
                    targets: 5,
                    className: '!text-left'
                },
                {
                    targets: 6,
                    className: '!text-left'
                },
                {
                    targets: 7,
                    className: '!text-left'
                },
                {
                    targets: 8,
                    className: '!text-center'
                }
            ],
            drawCallback: function(settings) {
                this.api().column(0, {
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
            }
        });


        $('#form-tambah-anak').on('submit', function(e) {
            e.preventDefault();


            let nama = $('#anak_nama').val();
            let hubung = $('#anak_hubung').val();
            let tgllahir = $('#anak_tgllahir').val();
            let didik = getPendidikan($('#anak_didik').val());
            let instansi = $('#anak_instansi').val();
            let nm_ayah = $('#anak_nm_ayah').val();
            let nm_ibu = $('#anak_nm_ibu').val();
            let tunj = $('#anak_tunj').is(':checked') ? 'DAPAT' : 'TIDAK';

            table.row.add([
                table.rows().count() + 1,
                nama,
                hubung,
                tgllahir,
                didik,
                instansi,
                nm_ayah,
                nm_ibu,
                tunj
            ]).draw(false);
            table.order([3, 'asc']).draw();

            $('#anak_nama').val('');
            $('#anak_hubung').val('').trigger('change');
            $('#anak_tgllahir').val('');
            $('#anak_didik').val('').trigger('change');
            $('#anak_instansi').val('');
            $('#anak_nm_ayah').val('');
            $('#anak_nm_ibu').val('');
            $('#anak_ket').val('');
            $('#anak_tunj').prop('checked', false);

            $('#close-button-tambah-anak').click();
        });
    });
</script>
