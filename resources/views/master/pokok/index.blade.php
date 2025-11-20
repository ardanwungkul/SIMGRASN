<x-app-layout>
    <div class="border border-gray-300 shadow-lg rounded-lg w-full">
        <div class="px-5 py-3 bg-gray-100 rounded-t-lg border-b border-gray-300">
            <div class="flex gap-1 items-center">
                <i class="fa-solid fa-info-circle text-gray-400"></i>
                <p class="text-sm">Data Referensi Gaji Pokok</p>
            </div>
        </div>
        <div class="bg-white px-5 py-5 rounded-b-lg">
            <div class="flex items-center justify-between mb-5">
                <a href="{{ route('gaji-pokok.create') }}"
                    class="bg-bay-950 text-white rounded-lg px-3 py-2 text-xs border border-secondary-4 shadow-lg flex gap-1 items-center justify-center whitespace-nowrap w-min font-medium">
                    <svg viewBox="0 0 24 24" fill="none" class="w-3 h-3 stroke-white"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 12H20M12 4V20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                    </svg>
                    <p>
                        Tambah
                    </p>
                </a>
                <form action="{{ route('gaji-pokok.index') }}" method="GET">
                    <div class="flex gap-2 items-center">
                        <div class="input-group">
                            <input type="text" name="search"
                                class="rounded-lg text-xs border border-gray-300 p-2 shadow-lg w-36"
                                placeholder="Cari..." value="{{ request('search') }}">
                        </div>
                    </div>
                </form>
            </div>
            <div class="relative">
                <div class="rounded-lg overflow-hidden shadow-lg border border-gray-300">
                    <table id="datatable" class="text-sm hover stripe row-border">
                        <thead class="bg-bay-950 text-white font-bold">
                            <tr>
                                <td class="text-xs !text-center w-10">No.</td>
                                <td class="text-xs !text-center whitespace-nowrap">Kode Golongan</td>
                                <td class="text-xs !text-center">Masa</td>
                                <td class="text-xs !text-center">Gaji Pokok</td>
                                <td class="text-xs !text-center">Jenis Pegawai</td>
                            </tr>
                        </thead>
                        <tbody class="text-secondary-2">
                            @foreach ($data as $item)
                                <tr class="text-xs">
                                    <td class="w-10">
                                        <p class="text-center">{{ $data->firstItem() + $loop->index }}</p>
                                    </td>
                                    <td>
                                        <p class="text-center">{{ $item->kdgol }}</p>
                                    </td>
                                    <td>
                                        <p class="text-center">{{ $item->masa }} Tahun</p>
                                    </td>
                                    <td>
                                        <p class="text-center">Rp. {{ number_format($item->rp_pokok, 0, ',', '.') }}</p>
                                    </td>
                                    <td>
                                        <p class="text-center">
                                            {{ $item->jnspeg == 1 ? 'PNS' : ($item->jnspeg == 2 ? 'CPNS' : ($item->jnspeg == 3 ? 'PPPK' : '')) }}
                                        </p>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($data->total() > $data->perPage())
                        <div class="p-4">
                            {{ $data->links('pagination::tailwind') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script type="module">
    $(document).ready(function() {
        $('#datatable').DataTable({
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
            ordering: false,
            responsive: true,
            columnDefs: [{
                targets: '_all',
                className: 'dt-head-left',
            }]
        });
    });
</script>
