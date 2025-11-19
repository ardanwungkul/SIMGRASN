@props(['id', 'keluarga'])
<div id="edit-istri" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%)] max-h-full bg-black/30 backdrop-blur-sm">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <!-- Modal content -->
        <div class="border border-gray-300 shadow-lg rounded-lg w-full mb-3 bg-white">
            <form id="form-edit-istri" method="POST" action="{{ route('keluarga.istri-suami', $id) }}">
                @csrf
                @method('POST')
                <!-- Modal header -->
                <div
                    class="px-5 py-3 bg-gray-100 rounded-t-lg border-b border-gray-300 flex items-center justify-between">
                    <div class="flex gap-1 items-center">
                        <p class="text-base font-medium">Edit Data Istri / Suami</p>
                    </div>
                    <button type="button"
                        class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="edit-istri">
                        <i class="fa-solid fa-x text-gray-400"></i>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-5">

                    <div class="grid grid-cols-2 gap-3 text-xs">
                        <div class="flex flex-col gap-1 col-span-2">
                            <label for="kerja">Status Pekerjaan</label>
                            <select id="kerja" name="kerja" required
                                class="w-full rounded-lg text-xs bg-gray-100 border border-gray-300 select2">
                                <option value="" selected disabled>Pilih Status Pekerjaan</option>
                                <option {{ $keluarga && $keluarga->kerja == 1 ? 'selected' : '' }} value="1">1 -
                                    ASN
                                    Satu Daerah</option>
                                <option {{ $keluarga && $keluarga->kerja == 2 ? 'selected' : '' }} value="2">2 -
                                    ASN
                                    Luar Daerah</option>
                                <option {{ $keluarga && $keluarga->kerja == 3 ? 'selected' : '' }} value="3">3 -
                                    Honorer Daerah</option>
                                <option {{ $keluarga && $keluarga->kerja == 4 ? 'selected' : '' }} value="4">4 -
                                    TNI
                                    / Polri</option>
                                <option {{ $keluarga && $keluarga->kerja == 5 ? 'selected' : '' }} value="5">5 -
                                    BUMN
                                    / BUMD</option>
                                <option {{ $keluarga && $keluarga->kerja == 6 ? 'selected' : '' }} value="6">6 -
                                    Karyawan Swasta</option>
                                <option {{ $keluarga && $keluarga->kerja == 7 ? 'selected' : '' }} value="7">7 -
                                    Wiraswasta</option>
                                <option {{ $keluarga && $keluarga->kerja == 8 ? 'selected' : '' }} value="8">8 -
                                    Buruh / Tani / Nelayan</option>
                                <option {{ $keluarga && $keluarga->kerja == 9 ? 'selected' : '' }} value="9">9 -
                                    Tidak Bekerja</option>
                                <option {{ $keluarga && $keluarga->kerja == 10 ? 'selected' : '' }} value="10">10 -
                                    Lainnya</option>
                            </select>
                        </div>
                        <div class="flex flex-col gap-1 col-span-2">
                            <label for="nipistri">NIP. (Jika PNS)</label>
                            <input type="text" id="nipistri" name="nipistri"
                                value="{{ $keluarga ? $keluarga->nipistri : '' }}"
                                class="w-full rounded-lg text-xs border border-gray-300 shadow-lg"
                                placeholder="Masukkan NIP">
                        </div>
                        <div class="flex flex-col gap-1 col-span-2">
                            <label for="nmistri">Nama Istri / Suami</label>
                            <input type="text" id="nmistri" name="nmistri" required
                                value="{{ $keluarga ? $keluarga->nmistri : '' }}"
                                class="w-full rounded-lg text-xs border border-gray-300 shadow-lg"
                                placeholder="Masukkan Nama Istri / Suami">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="tempat">Tempat Lahir</label>
                            <input type="text" id="tempat" name="tempat" required
                                value="{{ $keluarga ? $keluarga->tempat : '' }}"
                                class="w-full rounded-lg text-xs border border-gray-300 shadow-lg"
                                placeholder="Masukkan Tempat Kelahiran">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="tgllhr">Tanggal Lahir</label>
                            <input type="date" id="tgllhr" name="tgllhr" required
                                value="{{ $keluarga ? $keluarga->tgllhr : '' }}"
                                class="w-full rounded-lg text-xs border border-gray-300 shadow-lg">
                        </div>
                        <div class="flex flex-col gap-1 col-span-2">
                            <label for="instansi">Instansi</label>
                            <input type="text" id="instansi" name="instansi"
                                value="{{ $keluarga ? $keluarga->instansi : '' }}"
                                class="w-full rounded-lg text-xs border border-gray-300 shadow-lg" required
                                placeholder="Masukkan Nama Instansi">
                        </div>
                        <div class="flex flex-col gap-1 col-span-2">
                            <label for="ket">Keterangan</label>
                            <input type="text" id="ket" name="ket"
                                value="{{ $keluarga ? $keluarga->ket : '' }}"
                                class="w-full rounded-lg text-xs border border-gray-300 shadow-lg"
                                placeholder="Masukkan Keterangan">
                        </div>
                    </div>

                </div>
                <!-- Modal footer -->
                <div
                    class="px-5 py-3 bg-gray-100 rounded-b-lg border-t border-gray-300 flex items-center justify-end gap-3 ">
                    <button id="close-button-edit-istri" type="button"
                        class="bg-bay-950 hover:bg-opacity-80 text-white py-2 px-4 rounded-lg flex items-center gap-1 text-xs shadow-md"
                        data-modal-hide="edit-istri">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                d="M6 18 17.94 6M18 18 6.06 6" />
                        </svg>

                        <p>Batal</p>
                    </button>
                    <button
                        class="bg-green-500 hover:bg-opacity-80 text-white py-2 px-4 rounded-lg flex items-center gap-1 text-xs shadow-md"
                        type="submit">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="4" d="M5 11.917 9.724 16.5 19 7.5" />
                        </svg>

                        <p>Simpan</p>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
