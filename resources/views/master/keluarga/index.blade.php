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
    <div class="border border-gray-300 shadow-lg rounded-lg w-full mb-3">
        <div class="px-5 py-3 bg-gray-100 rounded-t-lg border-b border-gray-300">
            <div class="flex gap-1 items-center">
                <i class="fa-solid fa-info-circle text-gray-400"></i>
                <p class="text-sm">Filter Berdasarkan Unit Kerja</p>
            </div>
        </div>
        <div class="bg-white px-5 py-5 rounded-b-lg text-xs">
            <div class="grid grid-cols-2 gap-3">
                <div class="space-y-1">
                    <label for="skpd">SKPD</label>
                    <select name="skpd" id="skpd"
                        class="w-full rounded-lg text-xs bg-gray-100 border border-gray-300 select2">
                        <option value="" selected disabled>Pilih SKPD</option>
                        @foreach ($skpd as $item)
                            <option value="{{ $item->kdskpd }}">{{ $item->kdskpd }} - {{ $item->uraian }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="space-y-1">
                    <label for="unit_kerja">Unit Kerja</label>
                    <select name="unit_kerja" id="unit_kerja"
                        class="w-full rounded-lg text-xs bg-gray-100 border border-gray-300 select2">
                        <option value="" selected disabled>Pilih Unit Kerja</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="border border-gray-300 shadow-lg rounded-lg w-full">
        <div class="px-5 py-3 bg-gray-100 rounded-t-lg border-b border-gray-300">
            <div class="flex gap-1 items-center">
                <i class="fa-solid fa-info-circle text-gray-400"></i>
                <p class="text-sm">Data Keluarga Pegawai</p>
            </div>
        </div>
        <div class="bg-white px-5 py-5 rounded-b-lg">
            <div class="relative pb-20">
                <div class="rounded-lg overflow-hidden shadow-lg border border-gray-300 mt-12">
                    <table id="datatable" class="text-sm hover stripe row-border">
                        <thead class="bg-bay-950 text-white font-bold">
                            <tr>
                                <td class="text-xs !text-center w-10">No.</td>
                                <td class="text-xs">Nama Pegawai</td>
                                <td class="text-xs">Status</td>
                                <td class="text-xs">Nama Istri/Suami</td>
                                <td class="text-xs">Nama Anak</td>
                                <td class="text-xs">Tanggal Lahir</td>
                                <td class="text-xs">Hubungan</td>
                                <td class="text-xs">Pendidikan</td>
                                <td class="text-xs">Tunjangan</td>
                                <td class="text-xs w-32"></td>
                            </tr>
                        </thead>
                        <tbody class="text-secondary-2 text-xs">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script type="module">
    $(document).ready(function() {
        $('.select2').select2({
            dropdownCssClass: "text-xs",
            selectionCssClass: 'text-xs'
        });
        let table = $('#datatable').DataTable({
            info: false,
            lengthChange: false,
            searching: true,
            deferRender: true,
            paging: true,
            language: {
                search: '',
                emptyTable: "Tidak ada data tersedia",
                searchPlaceholder: 'Cari...'
            },
            ordering: false,
            responsive: true,
            columnDefs: [{
                targets: '_all',
                className: 'dt-head-left',
            }]
        });
        $('#skpd').on('select2:select', function() {
            $('#loadingIndicator').removeClass('hidden')
            $.ajax({
                url: `{{ route('get.unit-kerja.by.skpd') }}`,
                type: 'GET',
                data: {
                    kdskpd: $(this).val()
                },
                success: function(response) {
                    $('#unit_kerja').empty();
                    $('#unit_kerja').append(
                        '<option value="" selected disabled>Pilih Unit Kerja</option>'
                    );

                    if (response.length > 0) {
                        $.each(response, function(index, data) {
                            $('#unit_kerja').append('<option value="' +
                                data.kdskpd + '">' + data.kdskpd +
                                ' - ' + data
                                .uraian +
                                '</option>');
                        });
                    } else {
                        $('#unit_kerja').append(
                            '<option value="" disabled>Tidak ada Unit Kerja tersedia</option>'
                        );
                    }
                },
                complete: function() {
                    $('#loadingIndicator').addClass('hidden')
                }
            });
        })
        $('#unit_kerja').on('select2:select', function() {
            $('#loadingIndicator').removeClass('hidden')
            $.ajax({
                url: `{{ route('get.pegawai.by.unit-kerja') }}`,
                type: 'GET',
                data: {
                    kdskpd: $(this).val()
                },
                success: function(response) {
                    table.clear().draw();

                    if (response.length > 0) {
                        $.each(response, function(index, data) {

                            let namaAnakHtml = '';
                            let tanggalLahirAnakHtml = '';
                            let hubunganAnakHtml = '';
                            let pendidikanAnakHtml = '';
                            let tunjanganAnakHtml = '';
                            if (data.pegawai.keluarga_anak && data.pegawai
                                .keluarga_anak.length > 0) {
                                namaAnakHtml = data.pegawai.keluarga_anak
                                    .map(item =>
                                        `<p class="text-center whitespace-nowrap">${item.nama}</p>`
                                    )
                                    .join('');
                                tanggalLahirAnakHtml = data.pegawai.keluarga_anak
                                    .map(item =>
                                        `<p class="text-center whitespace-nowrap">${item.tgllhr}</p>`
                                    )
                                    .join('');
                                hubunganAnakHtml = data.pegawai.keluarga_anak
                                    .map(item =>
                                        `<p class="text-center whitespace-nowrap">${item.hubung}</p>`
                                    )
                                    .join('');
                                pendidikanAnakHtml = data.pegawai.keluarga_anak
                                    .map(item =>
                                        `<p class="text-center whitespace-nowrap">${item.pendidikan}</p>`
                                    )
                                    .join('');
                                tunjanganAnakHtml = data.pegawai.keluarga_anak
                                    .map(item =>
                                        `<p class="text-center whitespace-nowrap">${item.tunj == 1 ? 'DAPAT' : 'TIDAK'}</p>`
                                    )
                                    .join('');
                            }
                            table.row.add([
                                index + 1,
                                `<div data-id="${data.pegawai.id}" class="double-click-button">
                                    <p class="text-center whitespace-nowrap">${data.pegawai.nama}</p>
                                    <p class="text-center whitespace-nowrap">${data.pegawai.nip}</p>
                                </div>`,
                                `<div data-id="${data.pegawai.id}" class="double-click-button">
                                    <p class="text-center">${data.kawin}</p>
                                    <p class="text-center whitespace-nowrap">${data.status}</p>
                                </div>`,
                                `<div data-id="${data.pegawai.id}" class="double-click-button">
                                    <p class="text-center whitespace-nowrap">${data.pegawai.keluarga ? data.pegawai.keluarga.nmistri : ''}</p>
                                    <p class="text-center whitespace-nowrap">${data.pegawai.keluarga ? data.pegawai.keluarga.nipistri : ''}</p>
                                    <p class="text-center whitespace-nowrap">${data.pegawai.keluarga ? data.pegawai.keluarga.pekerjaan : ''}</p>
                                    <p class="text-center whitespace-nowrap">${data.pegawai.keluarga ? data.pegawai.keluarga.ket : ''}</p>
                                </div>`,
                                `<div data-id="${data.pegawai.id}" class="double-click-button">
                                    ${namaAnakHtml}
                                </div>`,
                                `<div data-id="${data.pegawai.id}" class="double-click-button">
                                    ${tanggalLahirAnakHtml}
                                </div>`,
                                `<div data-id="${data.pegawai.id}" class="double-click-button">
                                    ${hubunganAnakHtml}
                                </div>`,
                                `<div data-id="${data.pegawai.id}" class="double-click-button">
                                    ${pendidikanAnakHtml}
                                </div>`,
                                `<div data-id="${data.pegawai.id}" class="double-click-button">
                                    ${tunjanganAnakHtml}
                                </div>`,
                                `<div data-id="${data.pegawai.id}" class="double-click-button">
                                    <a href="{{ route('keluarga.create', ['id' => '___id___']) }}"
                                        class="bg-blue-100 border border-blue-700 rounded-lg text-blue-700 px-3 py-1">
                                            <i class="fa-solid fa-pen"></i>
                                    </a>
                                </div>`.replace('___id___', data.pegawai.id),
                            ]).draw(false);
                        });
                    }

                },
                complete: function() {
                    $('#loadingIndicator').addClass('hidden')
                }
            });
        })
        $(document).on('dblclick', '.double-click-button', function() {
            const id = $(this).data('id');
            const url = `{{ route('keluarga.create', ['id' => '__ID__']) }}`.replace('__ID__', id);

            window.location = url;
        });
    });
</script>
