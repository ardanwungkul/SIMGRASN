@php
    $items = [
        [
            'isGroup' => false,
            'icon' => 'fa-grid-2',
            'label' => 'Dashboard',
            'route' => 'dashboard',
        ],
        [
            'isGroup' => true,
            'title' => 'DATA PENGGAJIAN',
            'group' => [
                [
                    'icon' => 'fa-building-user',
                    'label' => 'Data Pokok Pegawai',
                    'route' => 'pegawai.index',
                ],
                [
                    'icon' => 'fa-money-bill-transfer',
                    'label' => 'Perubahan Gaji',
                    'route' => 'perubahan-gaji.index',
                ],
                [
                    'icon' => 'fa-list',
                    'label' => 'Daftar Gaji (Form B)',
                    'route' => 'dashboard',
                ],
                [
                    'icon' => 'fa-file-invoice',
                    'label' => 'Rekapitulasi Penggajian',
                    'route' => 'dashboard',
                ],
                [
                    'icon' => 'fa-family',
                    'label' => 'Data Keluarga Pegawai',
                    'route' => 'keluarga.index',
                ],
                [
                    'icon' => 'fa-credit-card',
                    'label' => 'Kartu Gaji Per SKPD',
                    'route' => 'dashboard',
                ],
                [
                    'icon' => 'fa-credit-card',
                    'label' => 'Kartu Gaji Perorangan',
                    'route' => 'dashboard',
                ],
                [
                    'icon' => 'fa-chart-column',
                    'label' => 'Keterangan Penghasilan',
                    'route' => 'dashboard',
                ],
                [
                    'icon' => 'fa-file',
                    'label' => 'Pembuatan SKPP',
                    'route' => 'dashboard',
                ],
            ],
        ],
        [
            'isGroup' => true,
            'title' => 'PENDATAAN RAPEL',
            'group' => [
                [
                    'icon' => 'fa-database',
                    'label' => 'Data Pokok Rapel',
                    'route' => 'dashboard',
                ],
                [
                    'icon' => 'fa-list',
                    'label' => 'Daftar Rapel (Form B)',
                    'route' => 'dashboard',
                ],
                [
                    'icon' => 'fa-file-invoice',
                    'label' => 'Rekapitulasi Daftar Rapel',
                    'route' => 'dashboard',
                ],
                [
                    'icon' => 'fa-magic',
                    'label' => 'Rapel Otomatis (Wizard)',
                    'route' => 'dashboard',
                ],
            ],
        ],
        [
            'isGroup' => true,
            'title' => 'TRANSAKSI TPP',
            'group' => [
                [
                    'icon' => 'fa-exchange-alt',
                    'label' => 'Transaksi TPP',
                    'route' => 'dashboard',
                ],
                [
                    'icon' => 'fa-download',
                    'label' => 'Penarikan Data SKP',
                    'route' => 'dashboard',
                ],
                [
                    'icon' => 'fa-edit',
                    'label' => 'Penyesuaian SKP',
                    'route' => 'dashboard',
                ],
                [
                    'icon' => 'fa-check-circle',
                    'label' => 'Verifikasi SKP',
                    'route' => 'dashboard',
                ],
                [
                    'icon' => 'fa-download',
                    'label' => 'Penarikan Data Presensi',
                    'route' => 'dashboard',
                ],
                [
                    'icon' => 'fa-edit',
                    'label' => 'Penyesuaian Presensi',
                    'route' => 'dashboard',
                ],
                [
                    'icon' => 'fa-check-circle',
                    'label' => 'Verifikasi Presensi',
                    'route' => 'dashboard',
                ],
            ],
        ],
        [
            'isGroup' => true,
            'title' => 'PELAPORAN',
            'group' => [
                [
                    'icon' => 'fa-file-alt',
                    'label' => 'Daftar Hasil Pungutan',
                    'route' => 'dashboard',
                ],
                [
                    'icon' => 'fa-file-invoice',
                    'label' => 'Pembuatan Billing PFK',
                    'route' => 'dashboard',
                ],
                [
                    'icon' => 'fa-file-upload',
                    'label' => 'Lampiran Data SIPD',
                    'route' => 'dashboard',
                ],
                [
                    'icon' => 'fa-database',
                    'label' => 'Buat Database Sinergi',
                    'route' => 'dashboard',
                ],
                [
                    'icon' => 'fa-money-bill-wave',
                    'label' => 'Realisasi Gaji',
                    'route' => 'dashboard',
                ],
            ],
        ],
        [
            'isGroup' => true,
            'title' => 'MONITORING',
            'group' => [
                [
                    'icon' => 'fa-user-tie',
                    'label' => 'Pegawai Pensiun',
                    'route' => 'dashboard',
                ],
                [
                    'icon' => 'fa-child',
                    'label' => 'Batas Usia Anak',
                    'route' => 'dashboard',
                ],
            ],
        ],
        [
            'isGroup' => true,
            'title' => 'MASTER REFERENSI',
            'group' => [
                [
                    'icon' => 'fa-layer-group',
                    'label' => 'Referensi Golongan',
                    'route' => 'golongan.index',
                ],
                [
                    'icon' => 'fa-money-bill',
                    'label' => 'Referensi Gaji Pokok',
                    'route' => 'gaji-pokok.index',
                ],
                [
                    'icon' => 'fa-sitemap',
                    'label' => 'Referensi Struktural',
                    'route' => 'struktural.index',
                ],
                [
                    'icon' => 'fa-briefcase',
                    'label' => 'Referensi Fungsional',
                    'route' => 'fungsional.index',
                ],
                [
                    'icon' => 'fa-building',
                    'label' => 'Referensi OPD/SKPD',
                    'route' => 'skpd.index',
                ],
                [
                    'icon' => 'fa-sliders-h',
                    'label' => 'Variabel Peritungan',
                    'route' => 'dashboard',
                ],
            ],
        ],
        [
            'isGroup' => true,
            'title' => 'UTILITAS APLIKASI',
            'group' => [
                [
                    'icon' => 'fa-calendar-check',
                    'label' => 'Tutup Buku Akhir Bulan',
                    'route' => 'dashboard',
                ],
                [
                    'icon' => 'fa-calculator',
                    'label' => 'Hitung Ulang Data Gaji',
                    'route' => 'dashboard',
                ],
                [
                    'icon' => 'fa-cogs',
                    'label' => 'Konfigurasi Laporan',
                    'route' => 'dashboard',
                ],
                [
                    'icon' => 'fa-tools',
                    'label' => 'Konfigurasi Aplikasi',
                    'route' => 'dashboard',
                ],
                [
                    'icon' => 'fa-user-cog',
                    'label' => 'Personalisasi User',
                    'route' => 'dashboard',
                ],
                [
                    'icon' => 'fa-users',
                    'label' => 'Otorisasi Pemakai',
                    'route' => 'user.index',
                ],
                [
                    'icon' => 'fa-server',
                    'label' => 'Backup Database',
                    'route' => 'dashboard',
                ],
            ],
        ],
    ];
    $groupColor = [
        'text-bay-300/80',
        'text-green-300/80',
        'text-orange-300/80',
        'text-purple-300/80',
        'text-teal-300/80',
        'text-pink-300/80',
        'text-yellow-300/80',
        'text-indigo-300/80',
        'text-red-300/80',
        'text-gray-300/80',
    ];
    $groupIndex = 0;
@endphp

{{-- Header --}}
<div class="flex gap-4 items-center pb-3 border-b border-bay-900/50">
    <div>
        <div class="rounded-lg border border-white w-10 h-10 flex items-center justify-center">
            <p class="text-white font-extrabold">L</p>
        </div>
    </div>
    <div class="w-full">
        <p class="text-white font-medium leading-none">APP</p>
        <p class="text-xs text-bay-400/90 tracking-wide leading-4">Virtual Environment</p>
        <p class="text-xs text-orange-300 line-clamp-1">Dashboard</p>
    </div>
</div>
{{-- Items --}}
<div class="py-3 space-y-1 overflow-y-scroll h-full no-scrollbar" id="accordion-collapse" data-accordion="collapse">
    @foreach ($items as $index => $item)
        @if ($item['isGroup'] == false)
            <a href="{{ route($item['route']) }}"
                class="w-full flex items-center gap-3 group hover:bg-white px-3 py-2 rounded-lg transition-all duration-300 {{ $loop->first ? 'mb-3' : '' }}">
                <i
                    class="fa-regular {{ $item['icon'] }} text-white group-hover:text-bay-950 transition-all duration-300"></i>
                <p class="text-white group-hover:text-bay-950 font-medium transition-all duration-300 text-sm">
                    {{ $item['label'] }}</p>
            </a>
        @else
            @php
                $color = $groupColor[$groupIndex % count($groupColor)];
                $groupIndex++;
            @endphp
            <h2 id="accordion-collapse-heading-{{ $index }}" x-data="{ open: false }">
                <button type="button" @click="open = !open"
                    class="flex items-center justify-between w-full gap-3 px-3 py-2">
                    <p class="{{ $color }} text-sm">{{ $item['title'] }}</p>
                    <svg :class="{ 'rotate-180': open }"
                        class="w-4 h-4 shrink-0 text-white transition-transform duration-300" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m5 15 7-7 7 7" />
                    </svg>
                </button>

                <div x-show="open" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 max-h-0" x-transition:enter-end="opacity-100 max-h-96"
                    x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 max-h-96"
                    x-transition:leave-end="opacity-0 max-h-0" class="overflow-hidden"
                    aria-labelledby="accordion-collapse-heading-{{ $index }}">
                    <div class="space-y-1">
                        @foreach ($item['group'] as $subItem)
                            <a href="{{ route($subItem['route']) }}"
                                class="w-full flex items-center gap-3 group hover:bg-white px-3 py-2 rounded-lg transition-all duration-300 {{ $loop->first ? 'mt-1' : '' }}">
                                <i
                                    class="fa-regular {{ $subItem['icon'] }} {{ $color }} group-hover:text-bay-950 transition-all duration-300"></i>
                                <p
                                    class="text-white/70 group-hover:text-bay-950 font-medium transition-all duration-300 text-sm">
                                    {{ $subItem['label'] }}
                                </p>
                            </a>
                        @endforeach
                    </div>
                </div>
            </h2>
        @endif
        @if (!$loop->last)
            <div class="border-b border-bay-900/30 !my-1"></div>
        @endif
    @endforeach
</div>

{{-- Session --}}
<div class="flex gap-3 pt-2">
    <div class="rounded-full bg-white/20 w-9 h-9 flex items-center justify-center flex-none">
        <i class="fa-regular fa-user text-white/70"></i>
    </div>
    <div>
        <p class="text-sm text-white/70 line-clamp-1">{{ Auth::user()->name }}</p>
        <p class="text-xs text-white/30 leading-none line-clamp-1">System Admin</p>
    </div>
</div>
