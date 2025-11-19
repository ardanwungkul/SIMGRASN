<x-app-layout>
    <div class="border border-gray-300 shadow-lg rounded-lg w-full">
        <div class="px-5 py-3 bg-gray-100 rounded-t-lg border-b border-gray-300">
            <div class="flex gap-1 items-center">
                <i class="fa-solid fa-info-circle text-gray-400"></i>
                <p class="text-sm">Data Pokok Pegawai</p>
            </div>
        </div>
        <div class="bg-white px-5 py-5 rounded-b-lg">
            <div class="flex items-center justify-between mb-5">
                <a href="{{ route('pegawai.create') }}"
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
                <form action="{{ route('pegawai.index') }}" method="GET">
                    <div class="flex gap-2 items-center">
                        <div>
                            <div class="border border-gray-300 p-2 rounded-lg shadow-lg cursor-pointer flex items-center gap-10 w-36 justify-between"
                                id="dropdownCheckboxButton" data-dropdown-toggle="dropdownDefaultCheckbox">
                                <p class="text-xs text-gray-500">Jenis :
                                    <span>{{ request('filter-jenis-pegawai') ?? 'ASN' }}</span>
                                </p>
                                <i class="fa-solid fa-chevron-down text-[10px] text-gray-500"></i>
                            </div>

                            <div id="dropdownDefaultCheckbox"
                                class="z-10 hidden bg-white border border-gray-300 rounded-lg shadow-lg w-36">
                                <ul class="p-1 text-sm text-body font-medium space-y-1"
                                    aria-labelledby="dropdownCheckboxButton">
                                    <li>
                                        <div class="flex items-center">
                                            <label for="ASN"
                                                class="text-xs font-medium flex items-center gap-2 bg-gray-100 w-full py-2 px-2 rounded-lg cursor-pointer">
                                                <input checked id="ASN" type="radio" name="filter-jenis-pegawai"
                                                    value="ASN" class="w-3 h-3 !rounded-lg"
                                                    {{ request('filter-jenis-pegawai') == 'ASN' || !request()->has('filter-jenis-pegawai') ? 'checked' : '' }}>
                                                <p>Pegawai ASN</p>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex items-center">
                                            <label for="PPPK"
                                                class="text-xs font-medium flex items-center gap-2 bg-gray-100 w-full py-2 px-2 rounded-lg cursor-pointer hover:opacity-90 duration-300 transition-all">
                                                <input id="PPPK" type="radio" name="filter-jenis-pegawai"
                                                    value="PPPK" class="w-3 h-3 !rounded-lg"
                                                    {{ request('filter-jenis-pegawai') == 'PPPK' ? 'checked' : '' }}>
                                                <p>Pegawai PPPK</p>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex items-center">
                                            <label for="PNS"
                                                class="text-xs font-medium flex items-center gap-2 bg-gray-100 w-full py-2 px-2 rounded-lg cursor-pointer hover:opacity-90 duration-300 transition-all">
                                                <input id="PNS" type="radio" name="filter-jenis-pegawai"
                                                    value="PNS" class="w-3 h-3 !rounded-lg"
                                                    {{ request('filter-jenis-pegawai') == 'PNS' ? 'checked' : '' }}>
                                                <p>Pegawai PNS</p>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <button type="submit"
                                            class="text-xs font-medium flex items-center gap-2 bg-bay-950 text-white w-full py-2 px-2 rounded-lg cursor-pointer justify-center hover:opacity-90 duration-300 transition-all">
                                            <i class="fa-solid fa-filter"></i>
                                            <p>Simpan</p>
                                        </button>
                                    </li>
                                </ul>
                            </div>

                        </div>


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
                                <td class="text-xs">NIP</td>
                                <td class="text-xs !w-64">Nama Pegawai</td>
                                <td class="text-xs !text-center">Tanggal Lahir</td>
                                <td class="text-xs !text-center">L/P</td>
                                <td class="text-xs !text-center">Gol</td>
                                <td class="text-xs !text-center">Status</td>
                                <td class="text-xs !text-center">Pensiun</td>
                                <td class="text-xs !text-center">DT. Awal</td>
                                <td class="text-xs !text-center">Nomor Karpeg</td>
                                <td class="text-xs w-32"></td>
                            </tr>
                        </thead>
                        <tbody class="text-secondary-2">
                            @foreach ($data as $item)
                                <tr class="text-xs">
                                    <td class="w-10">
                                        <p class="text-center">{{ $data->firstItem() + $loop->index }}</p>
                                    </td>
                                    <td>
                                        <p class="whitespace-nowrap">{{ $item->pegawai->nip }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $item->pegawai->nama }}</p>
                                    </td>
                                    <td>
                                        <p class="text-center">
                                            {{ \Carbon\Carbon::parse($item->pegawai->tgllahir)->format('d/m/Y') }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-center">
                                            {{ $item->pegawai->jnskel }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-center">
                                            {{ $item->kdgol }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-center whitespace-nowrap">
                                            {{ $item->status }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-center">
                                            {{ $item->pegawai->usiapens }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-center">
                                            {{ $item->pegawai->dtawal }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-center">
                                            {{ $item->pegawai->karpeg }}
                                        </p>
                                    </td>
                                    <td>

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
    {{-- <x-container>
        <x-slot name="content">
        </x-slot>
    </x-container> --}}
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
