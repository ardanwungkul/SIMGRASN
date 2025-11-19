<x-app-layout>
    <div class="grid md:grid-cols-4 gap-3 pb-3">
        <div
            class="bg-gradient-to-r from-widow-700/80 to-widow-500 rounded-lg p-5 text-white cursor-pointer hover:opacity-90 transition-all duration-300 shadow-lg">
            <div class="flex gap-3 items-center">
                <div class="bg-white rounded-full w-9 h-9 flex items-center justify-center">
                    <i class="fa-solid fa-calendar text-widow-700"></i>
                </div>
                <div>
                    <p class="text-xl text-white font-bold leading-none">
                        {{ \App\Helpers\FormatHelper::formatThnBln(session('default')) }}
                    </p>
                    <p class="text-sm text-gray-200 font-bold">Bulan Transaksi Default</p>
                </div>
            </div>
        </div>
        <div
            class="bg-gradient-to-r from-bay-700/80 to-bay-500 rounded-lg p-5 text-white cursor-pointer hover:opacity-90 transition-all duration-300 shadow-lg">
            <div class="flex gap-3 items-center">
                <div class="bg-white rounded-full w-9 h-9 flex items-center justify-center">
                    <i class="fa-solid fa-clock text-bay-700"></i>
                </div>
                <div>
                    <p class="text-xl text-white font-bold leading-none">
                        {{ \App\Helpers\FormatHelper::formatThnBln(session('thnbln')) }}
                    </p>
                    <p class="text-sm text-gray-200 font-bold">Bulan Transaksi Aktif</p>
                </div>
            </div>
        </div>
        <div
            class="bg-gradient-to-r from-pumpkin-700/80 to-pumpkin-500 rounded-lg p-5 text-white cursor-pointer hover:opacity-90 transition-all duration-300 shadow-lg">
            <div class="flex gap-3 items-center">
                <div class="bg-white rounded-full w-9 h-9 flex items-center justify-center">
                    <i class="fa-solid fa-arrow-up text-pumpkin-700"></i>
                </div>
                <div>
                    <p class="text-xl text-white font-bold leading-none">
                        {{ $config->tgl_rapel !== '0000-00-00 00:00:00' ? 'Aktif' : 'Tidak Aktif' }}</p>
                    <p class="text-sm text-gray-200 font-bold">Status Rapel</p>
                </div>
            </div>
        </div>
        <div
            class="bg-gradient-to-r from-teal-700/80 to-teal-500 rounded-lg p-5 text-white cursor-pointer hover:opacity-90 transition-all duration-300 shadow-lg">
            <div class="flex gap-3 items-center">
                <div class="bg-white rounded-full w-9 h-9 flex items-center justify-center">
                    <i class="fa-solid fa-coins text-teal-700"></i>
                </div>
                <div>
                    <p class="text-xl text-white font-bold leading-none">
                        {{ $config->tgl_tpp !== '0000-00-00 00:00:00' ? 'Aktif' : 'Tidak Aktif' }}</p>
                    <p class="text-sm text-gray-200 font-bold">Status TPP</p>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>
