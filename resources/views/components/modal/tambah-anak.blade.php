<div id="tambah-anak" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%)] max-h-full bg-black/30 backdrop-blur-sm">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <!-- Modal content -->
        <div class="border border-gray-300 shadow-lg rounded-lg w-full mb-3 bg-white">
            <form id="form-tambah-anak">
                <!-- Modal header -->
                <div
                    class="px-5 py-3 bg-gray-100 rounded-t-lg border-b border-gray-300 flex items-center justify-between">
                    <div class="flex gap-1 items-center">
                        <i class="fa-solid fa-circle-plus text-gray-400"></i>
                        <p class="text-base font-medium">Tambah Anak</p>
                    </div>
                    <button type="button"
                        class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="tambah-anak">
                        <i class="fa-solid fa-x text-gray-400"></i>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-5">

                    <div class="grid grid-cols-2 gap-3 text-xs">
                        <div class="flex flex-col gap-1 col-span-2">
                            <label for="anak_nama">Nama Anak</label>
                            <input type="text" id="anak_nama" name="anak_nama" required
                                class="w-full rounded-lg text-xs border border-gray-300 shadow-lg"
                                placeholder="Masukkan Nama Anak">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="anak_hubung">Hubungan</label>
                            <select id="anak_hubung" name="anak_hubung" required
                                class="w-full rounded-lg text-xs shadow-lg border border-gray-300 select2">
                                <option value="" selected disabled>Pilih Hubungan</option>
                                <option value="Anak Kandung">Anak Kandung</option>
                            </select>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="anak_tgllahir">Tanggal Lahir</label>
                            <input type="date" id="anak_tgllahir" name="anak_tgllahir" required
                                class="w-full rounded-lg text-xs border border-gray-300 shadow-lg h-full">
                        </div>
                        <div class="flex flex-col gap-1 col-span-2">
                            <label for="anak_didik">Pendidikan</label>
                            <select id="anak_didik" name="anak_didik" required
                                class="w-full rounded-lg text-xs shadow-lg border border-gray-300 select2">
                                <option value="" selected disabled>Pilih Pendidikan</option>
                                <option value="1">1 - BELUM SEKOLAH</option>
                                <option value="2">2 - TK / PLAY GROUP</option>
                                <option value="3">3 - SEKOLAH DASAR</option>
                                <option value="4">4 - SMP (SEDERAJAT)</option>
                                <option value="5">5 - SMU (SEDERAJAT)</option>
                                <option value="6">6 - DIPLOMA (I/II/III)</option>
                                <option value="7">7 - SARJANA S1</option>
                                <option value="8">8 - LULUS (TAMAT)</option>
                            </select>
                        </div>
                        <div class="flex flex-col gap-1 col-span-2">
                            <label for="anak_instansi">Instansi</label>
                            <input type="text" id="anak_instansi" name="anak_instansi" required
                                class="w-full rounded-lg text-xs border border-gray-300 shadow-lg"
                                placeholder="Masukkan Nama Instansi">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="anak_nm_ayah">Nama Ayah</label>
                            <input type="text" id="anak_nm_ayah" name="anak_nm_ayah" required
                                class="w-full rounded-lg text-xs border border-gray-300 shadow-lg"
                                placeholder="Masukkan Nama Ayah">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="anak_nm_ibu">Nama Ibu</label>
                            <input type="text" id="anak_nm_ibu" name="anak_nm_ibu" required
                                class="w-full rounded-lg text-xs border border-gray-300 shadow-lg"
                                placeholder="Masukkan Nama Ibu">
                        </div>
                        <div class="flex flex-col gap-1 col-span-2">
                            <label for="anak_ket">Keterangan</label>
                            <input type="text" id="anak_ket" name="anak_ket"
                                class="w-full rounded-lg text-xs border border-gray-300 shadow-lg"
                                placeholder="Masukkan Keterangan">
                        </div>
                        <div class="flex gap-1 col-span-2">
                            <input type="checkbox" id="anak_tunj" name="anak_tunj" value="1"
                                class="rounded-full border border-gray-300" placeholder="Masukkan Keterangan">
                            <label for="anak_tunj">Tunjangan Keluarga</label>
                        </div>
                    </div>

                </div>
                <!-- Modal footer -->
                <div
                    class="px-5 py-3 bg-gray-100 rounded-b-lg border-t border-gray-300 flex items-center justify-end gap-3 ">
                    <button id="close-button-tambah-anak"
                        class="bg-bay-950 hover:bg-opacity-80 text-white py-2 px-4 rounded-lg flex items-center gap-1 text-xs shadow-md"
                        data-modal-hide="tambah-anak">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="4" d="M6 18 17.94 6M18 18 6.06 6" />
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
