<x-app-layout>
    <div id="toastAlert" class="fixed top-3 right-3 z-[99999] space-y-3">

    </div>
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
            <div class="px-5 py-3 bg-gray-100 rounded-t-lg border-b border-gray-300 flex justify-between">
                <div class="flex gap-1 items-center">
                    <i class="fa-solid fa-info-circle text-gray-400"></i>
                    <p class="text-sm">Data Istri / Suami Pegawai </p>
                </div>
                <button data-modal-target="edit-istri" data-modal-toggle="edit-istri"
                    class="bg-bay-950 hover:bg-opacity-80 text-white py-2 px-4 rounded-lg flex items-center gap-2 text-xs shadow-md"
                    type="button">
                    <i class="fa-solid fa-pen"></i>

                    <p>Edit Data Istri/Suami</p>
                </button>
                <x-modal.edit-istri :id="$pegawai->pegawai->id" :keluarga="$pegawai->pegawai->keluarga ? $pegawai->pegawai->keluarga : null" />
            </div>
            <div class="px-6 py-6 text-sm text-gray-700 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex items-start gap-3 p-4 bg-gray-50 border border-gray-200 rounded-xl shadow-sm">
                        <div class="text-bay-950 text-lg">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div>
                            <p class="text-[11px] uppercase tracking-wide text-gray-500 font-semibold">Nama</p>
                            <p class="text-gray-800 font-medium text-base">
                                {{ $pegawai->pegawai->keluarga ? $pegawai->pegawai->keluarga->nmistri : '-' }}</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 p-4 bg-gray-50 border border-gray-200 rounded-xl shadow-sm">
                        <div class="text-bay-950 text-lg">
                            <i class="fa-solid fa-id-card"></i>
                        </div>
                        <div>
                            <p class="text-[11px] uppercase tracking-wide text-gray-500 font-semibold">NIP</p>
                            <p class="text-gray-800 font-medium text-base">
                                {{ $pegawai->pegawai->keluarga ? $pegawai->pegawai->keluarga->nipistri : '-' }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 p-4 bg-gray-50 border border-gray-200 rounded-xl shadow-sm">
                        <div class="text-bay-950 text-lg">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div>
                            <p class="text-[11px] uppercase tracking-wide text-gray-500 font-semibold">Tempat Lahir</p>
                            <p class="text-gray-800 font-medium text-base">
                                {{ $pegawai->pegawai->keluarga ? $pegawai->pegawai->keluarga->tempat : '-' }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 p-4 bg-gray-50 border border-gray-200 rounded-xl shadow-sm">
                        <div class="text-bay-950 text-lg">
                            <i class="fa-solid fa-calendar"></i>
                        </div>
                        <div>
                            <p class="text-[11px] uppercase tracking-wide text-gray-500 font-semibold">Tanggal Lahir</p>
                            <p class="text-gray-800 font-medium text-base">
                                {{ $pegawai->pegawai->keluarga ? $pegawai->pegawai->keluarga->tgllhr : '-' }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 p-4 bg-gray-50 border border-gray-200 rounded-xl shadow-sm">
                        <div class="text-bay-950 text-lg">
                            <i class="fa-solid fa-briefcase"></i>
                        </div>
                        <div>
                            <p class="text-[11px] uppercase tracking-wide text-gray-500 font-semibold">Status Pekerjaan
                            </p>
                            <p class="text-gray-800 font-medium text-base">
                                {{ $pegawai->pegawai->keluarga ? $pegawai->pegawai->keluarga->pekerjaan : '-' }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 p-4 bg-gray-50 border border-gray-200 rounded-xl shadow-sm">
                        <div class="text-bay-950 text-lg">
                            <i class="fa-solid fa-building"></i>
                        </div>
                        <div>
                            <p class="text-[11px] uppercase tracking-wide text-gray-500 font-semibold">Instansi</p>
                            <p class="text-gray-800 font-medium text-base">
                                {{ $pegawai->pegawai->keluarga ? $pegawai->pegawai->keluarga->instansi : '-' }}</p>
                        </div>
                    </div>

                    <div
                        class="flex items-start gap-3 p-4 bg-gray-50 border border-gray-200 rounded-xl shadow-sm md:col-span-2">
                        <div class="text-bay-950 text-lg">
                            <i class="fa-solid fa-note-sticky"></i>
                        </div>
                        <div>
                            <p class="text-[11px] uppercase tracking-wide text-gray-500 font-semibold">Keterangan</p>
                            <p class="text-gray-800 font-medium text-base" id="view-ket">
                                {{ $pegawai->pegawai->keluarga ? $pegawai->pegawai->keluarga->ket : '-' }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="border border-gray-300 shadow-lg rounded-lg w-full mb-3">
            <div class="px-5 py-3 bg-gray-100 rounded-t-lg border-b border-gray-300">
                <div class="flex justify-between">
                    <div class="flex gap-1 items-center">
                        <i class="fa-solid fa-info-circle text-gray-400"></i>
                        <p class="text-sm">Daftar Anak Pegawai</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <button id="button-submit-tambah-anak"
                            class="bg-green-500 hover:bg-opacity-80 text-white py-2 px-4 rounded-lg flex items-center gap-1 text-xs shadow-md"
                            type="button">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="4" d="M5 11.917 9.724 16.5 19 7.5" />
                            </svg>

                            <p>Simpan</p>
                        </button>
                        <div>
                            <button type="button" data-modal-target="tambah-anak" data-modal-toggle="tambah-anak"
                                class="text-xs bg-bay-950 text-white rounded-lg shadow-lg px-3 py-2 hover:opacity-90 duration-300 transition-all">
                                Tambah Anak
                            </button>
                            <x-modal.tambah-anak />
                        </div>
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
    $(document).ready(function() {
        function showToastError(message) {
            console.log(message);

            const toastId = 'toast-' + Date.now();
            $('#toast-danger').remove();

            $('#toastAlert').append(
                `<div id="${toastId}" 
                    class="flex items-center w-full max-w-sm px-4 py-2 text-body bg-red-200 rounded-lg shadow-xs border border-red-700 mt-2"
                    role="alert">
                        <div class="text-sm text-red-700">
                            ${message}
                        </div>
                        <button type="button"
                            class="ms-auto flex items-center justify-center text-body bg-transparent border border-transparent font-medium rounded text-sm h-8 w-8 focus:outline-none"
                            data-dismiss-target="#${toastId}" aria-label="Close">
                                <i class="fa-solid fa-x text-red-700"></i>
                        </button>
                </div>`
            );
            setTimeout(() => {
                $(`#${toastId}`).fadeOut(300, function() {
                    $(this).remove();
                });
            }, 3000);
        }
        $(document).on('click', '[data-dismiss-target]', function() {
            const target = $(this).data('dismiss-target');
            $(target).remove();
        });

        function getPendidikan(id) {
            if (id == 1) return '1 - BELUM SEKOLAH';
            else if (id == 2) return '2 - TK / PLAY GROUP';
            else if (id == 3) return '3 - SEKOLAH DASAR';
            else if (id == 4) return '4 - SMP (SEDERAJAT)';
            else if (id == 5) return '5 - SMU (SEDERAJAT)';
            else if (id == 6) return '6 - DIPLOMA (I/II/III)';
            else if (id == 7) return '7 - SARJANA S1';
            else if (id == 8) return '8 - LULUS (TAMAT)';
        }

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
                    className: '!text-center',
                    orderable: false
                },
                {
                    targets: 1,
                    className: '!text-left',
                    orderable: false
                },
                {
                    targets: 2,
                    className: '!text-center',
                    orderable: false
                },
                {
                    targets: 3,
                    className: '!text-center',
                    orderable: true
                },
                {
                    targets: 4,
                    className: '!text-left',
                    orderable: false
                },
                {
                    targets: 5,
                    className: '!text-left',
                    orderable: false
                },
                {
                    targets: 6,
                    className: '!text-left',
                    orderable: false
                },
                {
                    targets: 7,
                    className: '!text-left',
                    orderable: false
                },
                {
                    targets: 8,
                    className: '!text-center',
                    orderable: false
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
        $('#button-submit-tambah-anak').on('click', function(e) {
            e.preventDefault();

            let semuaAnak = [];

            table.rows().every(function(rowIdx, tableLoop, rowLoop) {
                let data = this.data();
                semuaAnak.push({
                    nama: data[1],
                    hubung: data[2],
                    tgllhr: data[3],
                    didik: data[4],
                    instansi: data[5],
                    nmayah: data[6],
                    nmibu: data[7],
                    tunj: data[8]
                });
            });
            if (semuaAnak.length == 0) {
                showToastError("Mohon tambahkan data anak sebelum menyimpan.");
            } else {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: `{{ route('keluarga.anak', $pegawai->id) }}`,
                    method: 'POST',
                    data: {
                        anak: semuaAnak
                    },
                    success: function(response) {
                        console.log(response);
                        // window.location = `{{ route('keluarga.index') }}`
                    },
                    error: function(err) {
                        console.error(err);
                    }
                });
            }
        });
    });
</script>
