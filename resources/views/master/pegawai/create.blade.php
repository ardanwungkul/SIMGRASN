<x-app-layout>
    <x-slot name="header">
        Tambah Pegawai
    </x-slot>
    <div id="toastAlert" class="fixed top-3 right-3 z-[99999] space-y-3">

    </div>
    <x-container>
        <x-slot name="content">
            <form action="{{ route('pegawai.store') }}" id="formSubmit" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="mb-4 border-default hidden">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center max-w-xl mx-auto" id="pegawai-tab"
                        data-tabs-toggle="#pegawai-tab-content" role="tablist">
                        <li class="me-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-base" id="bio-tab"
                                data-tabs-target="#bio" type="button" role="tab" aria-controls="profile"
                                aria-selected="false">Profile</button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button
                                class="inline-block p-4 border-b-2 rounded-t-base hover:text-fg-brand hover:border-brand"
                                id="gaji-tab" data-tabs-target="#gaji" type="button" role="tab"
                                aria-controls="gaji" aria-selected="false">Gaji</button>
                        </li>
                    </ul>
                </div>
                <div id="pegawai-tab-content">
                    <div class="hidden" id="bio" role="tabpanel" aria-labelledby="bio-tab">
                        <div class="grid grid-cols-3 gap-5">
                            <div class="text-xs md:text-sm grid grid-cols-2 gap-3 w-full mx-auto col-span-2">
                                <div class="flex flex-col gap-1 col-span-2">
                                    <label for="nip">Nomor Induk Pegawai</label>
                                    <input type="text" id="nip" name="nip"
                                        class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                                        value="{{ old('nip') }}" placeholder="Masukkan Nomor Induk Pegawai" required>
                                </div>
                                <div class="flex flex-col gap-1 col-span-2">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" id="nama" name="nama"
                                        class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                                        value="{{ old('nama') }}" placeholder="Masukkan Nama Pegawai" required>
                                </div>
                                <div class="flex flex-col gap-1 col-span-2">
                                    <label for="kelahiran">Tempat Kelahiran</label>
                                    <input type="text" id="kelahiran" name="kelahiran"
                                        class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                                        value="{{ old('kelahiran') }}" placeholder="Masukkan Tempat Kelahiran" required>
                                </div>
                                <div class="flex flex-col gap-1 col-span-2 md:col-span-1">
                                    <label for="tgllahir">Tanggal Lahir</label>
                                    <input type="date" id="tgllahir" name="tgllahir"
                                        class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                                        value="{{ old('tgllahir') }}" required>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <label for="usiapens">Pensiun Pada Usia</label>
                                    <select name="usiapens" id="usiapens"
                                        class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md" required>
                                        <option value="" selected disabled>Pilih Usia Pensiun</option>
                                        @for ($i = 55; $i <= 65; $i++)
                                            <option value="{{ $i }}"
                                                {{ old('usiapens') == $i ? 'selected' : '' }}>
                                                {{ $i }} Tahun
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <label for="jnskel">Jenis Kelamin</label>
                                    <select name="jnskel" id="jnskel"
                                        class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md" required>
                                        <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                        <option value="L">L - Laki Laki</option>
                                        <option value="P">P - Perempuan</option>
                                    </select>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <label for="agama">Agama</label>
                                    <select name="agama" id="agama"
                                        class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md" required>
                                        <option value="" selected disabled>Pilih Agama</option>
                                        @foreach ($agama as $item)
                                            <option value="{{ $item->id }}">{{ $item->uraian }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex flex-col gap-1 col-span-2">
                                    <label for="pdidik">Pendidikan Terakhir</label>
                                    <select name="pdidik" id="pdidik"
                                        class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md" required>
                                        <option value="" selected disabled>Pilih Pendidikan Terakhir</option>
                                        @foreach ($pendidikan as $item)
                                            <option value="{{ $item->id }}">{{ $item->uraian }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="border-b border-gray-200 col-span-2 pt-2"></div>

                                <div class="flex flex-col gap-1 col-span-2 md:col-span-1">
                                    <label for="nik">NIK Sesuai KTP</label>
                                    <input type="text" id="nik" name="nik" placeholder="Masukkan NIK"
                                        maxlength="16"
                                        class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                        value="{{ old('nik') }}">
                                </div>
                                <div class="flex flex-col gap-1 col-span-2 md:col-span-1">
                                    <label for="karpeg">Kartu Pegawai</label>
                                    <input type="text" id="karpeg" name="karpeg"
                                        placeholder="Masukkan Kartu Pegawai"
                                        class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                                        maxlength="8" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                        value="{{ old('karpeg') }}">
                                </div>
                                <div class="flex flex-col gap-1 col-span-2 md:col-span-1">
                                    <label for="npwp">NPWP</label>
                                    <input type="text" id="npwp" name="npwp"
                                        placeholder="Masukkan Nomor NPWP" maxlength="15"
                                        class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                        value="{{ old('npwp') }}">
                                </div>
                                <div class="flex flex-col gap-1 col-span-2 md:col-span-1">
                                    <label for="nokk">Nomor Kartu Keluarga</label>
                                    <input type="text" id="nokk" name="nokk"
                                        placeholder="Masukkan Nomor Kartu Keluarga" maxlength="16"
                                        class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                        value="{{ old('nokk') }}">
                                </div>

                                <div class="border-b border-gray-200 col-span-2 pt-2"></div>

                                <div class="flex flex-col gap-1 col-span-2 md:col-span-1">
                                    <label for="nmbank">Nama Bank</label>
                                    <input type="text" id="nmbank" name="nmbank"
                                        placeholder="Masukkan Nama Bank" maxlength="30"
                                        class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                                        value="{{ old('nmbank') }}">
                                </div>
                                <div class="flex flex-col gap-1 col-span-2 md:col-span-1">
                                    <label for="rekbank">Nomor Rekening</label>
                                    <input type="text" id="rekbank" name="rekbank"
                                        placeholder="Masukkan Nomor Rekening"
                                        class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                                        maxlength="20" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                        value="{{ old('rekbank') }}">
                                </div>
                                <div class="flex flex-col gap-1 col-span-2 md:col-span-1">
                                    <label for="nohp">Nomor Handphone</label>
                                    <input type="text" id="nohp" name="nohp"
                                        placeholder="Masukkan Nomor Handphone"
                                        class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                                        maxlength="15" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                        value="{{ old('nohp') }}">
                                </div>
                                <div class="flex flex-col gap-1 col-span-2 md:col-span-1">
                                    <label for="email">Alamat Email</label>
                                    <input type="email" id="email" name="email"
                                        placeholder="Masukkan Alamat Email"
                                        class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                                        maxlength="50" value="{{ old('email') }}">
                                </div>
                                <div class="flex flex-col gap-1 col-span-2">
                                    <label for="alamat">Alamat/Domisili</label>
                                    <textarea name="alamat" id="alamat" rows="3"
                                        class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md" placeholder="Masukkan Alamat"></textarea>
                                </div>

                                <div class="border-b border-gray-200 col-span-2 pt-2"></div>

                                <div class="flex flex-col gap-1 col-span-2">
                                    <label for="asalpeg">Asal Pegawai</label>
                                    <select name="asalpeg" id="asalpeg"
                                        class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md select2"
                                        required>
                                        <option value="" selected disabled>Pilih Asal Pegawai</option>
                                        @foreach ($asal_pegawai as $item)
                                            <option value="{{ $item->id }}">{{ $item->uraian }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div
                                    class="flex md:justify-end justify-between items-center md:gap-4 gap-1 col-span-2">
                                    <a class="bg-bay-950 hover:bg-opacity-80 text-white py-2 px-4 rounded-lg flex items-center gap-1 text-xs md:text-sm shadow-md"
                                        href="{{ route('pegawai.index') }}">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="4"
                                                d="M6 18 17.94 6M18 18 6.06 6" />
                                        </svg>

                                        <p>Batal</p>
                                    </a>
                                    <button id="buttonNext"
                                        class="bg-green-500 hover:bg-opacity-80 text-white py-2 px-4 rounded-lg flex items-center gap-1 text-xs md:text-sm shadow-md"
                                        type="button">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="4"
                                                d="M5 11.917 9.724 16.5 19 7.5" />
                                        </svg>

                                        <p>Selanjutnya</p>
                                    </button>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-center items-center gap-2 flex-col">
                                    <div class="relative rounded-lg">
                                        <img id="fotoPegawai"
                                            class="object-cover w-40 h-40 rounded-lg border border-gray-300 cursor-pointer"
                                            src="{{ asset('storage/images/placeholder-image.jpg') }}" alt="">
                                        <div
                                            class="absolute z-10 top-0 rounded-lg opacity-0 hover:opacity-100 cursor-pointer">
                                            <label for="fotoPegawaiInput" class="rounded-lg cursor-pointer">
                                                <div
                                                    class="w-40 h-40 bg-black opacity-60 flex items-center rounded-lg">
                                                    <p class="text-center w-full"><i class="fa-solid fa-pen"
                                                            style="color: #ffffff;"></i>
                                                    </p>
                                                </div>
                                                <input accept=".jpg,.jpeg,.png" type="file" name="foto"
                                                    class="hidden" id="fotoPegawaiInput" />
                                            </label>
                                        </div>

                                        <script>
                                            const defaultSrc = fotoPegawai.src;
                                            fotoPegawaiInput.onchange = evt => {
                                                const [file] = fotoPegawaiInput.files
                                                const maxSize = 1 * 1024 * 1024;

                                                if (file) {
                                                    if (file.size > maxSize) {
                                                        document.getElementById("fotoError").textContent =
                                                            "Ukuran file terlalu besar!";
                                                        fotoPegawaiInput.value = "";
                                                        fotoPegawai.src = defaultSrc
                                                        return;
                                                    }

                                                    document.getElementById("fotoError").textContent = "";
                                                    fotoPegawai.src = URL.createObjectURL(file);
                                                }
                                            }
                                        </script>
                                    </div>
                                    <div class="w-full max-w-40">
                                        <p id="fotoError" class="text-red-500 text-[10px] my-1 text-center"></p>
                                        <label for="fotoPegawaiInput"
                                            class="block bg-bay-950 text-white w-full text-center rounded-lg py-1 px-2 text-sm cursor-pointer">Pilih
                                            File</label>
                                        <p class="text-[10px] text-gray-700 mt-1 text-center">*Unggah gambar dengan
                                            format <span class="font-bold">JPG</span>,
                                            <span class="font-bold">JPEG</span>, atau
                                            <span class="font-bold">PNG</span>.
                                        </p>
                                        <p class="text-[10px] text-gray-700 mt-1 text-center">*Ukuran file maksimal
                                            <span class="font-bold">1 MB</span>
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden" id="gaji" role="tabpanel" aria-labelledby="gaji-tab">
                        <div class="text-xs flex items-start gap-3">
                            <div class="border border-gray-300 shadow-lg rounded-lg w-full max-w-[60%]">
                                <div class="px-5 py-3 bg-gray-100 rounded-t-lg border-b border-gray-300">
                                    <div class="flex gap-1 items-center">
                                        <i class="fa-solid fa-info-circle text-gray-400"></i>
                                        <p>Data Pokok Gaji</p>
                                    </div>
                                </div>
                                <div class="bg-white px-5 py-3 rounded-b-lg">
                                    <ul class="list-decimal ml-2 space-y-3">
                                        <li class="pl-2">
                                            <div class="grid grid-cols-2 gap-3">
                                                <div class="flex flex-col gap-1 col-span-2">
                                                    <label for="jnspeg" class="font-extrabold">Jenis Pegawai</label>
                                                    <select name="jnspeg" id="jnspeg"
                                                        class="select2 text-xs rounded-lg border border-gray-300 shadow-md">
                                                        <option value="" selected disabled>Pilih Jenis Pegawai
                                                        </option>
                                                        <option value="1">PNS - Gaji Pokok 100%</option>
                                                        <option value="2">CPNS - Gaji Pokok 80%</option>
                                                        <option value="3">PPPK - Gaji Pokok 100%</option>
                                                    </select>
                                                </div>
                                                <div class="flex flex-col gap-1">
                                                    <label for="sk_tanggal">SK. Tanggal</label>
                                                    <input type="date" id="sk_tanggal" name="sk_tanggal"
                                                        class="text-xs rounded-lg border border-gray-300 shadow-md"
                                                        value="{{ old('sk_tanggal') }}">
                                                </div>
                                                <div class="flex flex-col gap-1">
                                                    <label for="sk_tmt">TMT. SK</label>
                                                    <input type="date" id="sk_tmt" name="sk_tmt"
                                                        class="text-xs rounded-lg border border-gray-300 shadow-md"
                                                        value="{{ old('sk_tmt') }}">
                                                </div>
                                                <div class="flex flex-col gap-1 col-span-2">
                                                    <label for="sk_nomor">SK. Nomor</label>
                                                    <input type="text" id="sk_nomor" name="sk_nomor"
                                                        class="text-xs rounded-lg border border-gray-300 shadow-md"
                                                        value="{{ old('sk_nomor') }}">
                                                </div>
                                                <div class="flex flex-col gap-1 col-span-2">
                                                    <label for="sk_dari">SK Dari</label>
                                                    <input type="text" id="sk_dari" name="sk_dari"
                                                        class="text-xs rounded-lg border border-gray-300 shadow-md"
                                                        value="{{ old('sk_dari') }}">
                                                </div>
                                            </div>
                                        </li>
                                        <li class="pl-2">
                                            <div class="grid grid-cols-2 gap-3">
                                                <div class="flex flex-col gap-1 col-span-2">
                                                    <label for="kdgol" class="font-extrabold">Gaji Pokok
                                                        (Golongan)</label>
                                                    <select name="kdgol" id="kdgol"
                                                        class="select2 text-xs rounded-lg border border-gray-300 shadow-md">
                                                        <option value="" selected disabled>Pilih Golongan
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="flex flex-col gap-1 col-span-2">
                                                    <label for="masa">Masa Kerja / Pesen Gaji</label>
                                                    <select name="masa" id="masa"
                                                        class="select2 text-xs rounded-lg border border-gray-300 shadow-md">
                                                        <option value="" selected disabled>Pilih Masa Kerja
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="pl-2">
                                            <div class="grid grid-cols-2 gap-3">
                                                <div class="flex flex-col gap-1 col-span-2">
                                                    <label for="kdgol" class="font-extrabold">Status
                                                        Keluarga</label>
                                                    <div class="grid grid-cols-3 gap-3">
                                                        <div>
                                                            <input type="text" id="kawin" name="kawin"
                                                                value="TK"
                                                                class="text-xs rounded-lg border border-gray-300 shadow-md bg-gray-200"
                                                                readonly>
                                                        </div>
                                                        <div>
                                                            <input type="text" id="anak" name="anak"
                                                                value="0"
                                                                class="text-xs rounded-lg border border-gray-300 shadow-md bg-gray-200"
                                                                readonly>
                                                        </div>
                                                        <div>
                                                            <input type="text" id="status" name="status"
                                                                value="TK1000"
                                                                class="text-xs rounded-lg border border-gray-300 shadow-md bg-gray-200"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="pl-2">
                                            <div class="grid grid-cols-2 gap-3">
                                                <div class="flex flex-col gap-1 col-span-2">
                                                    <label for="jnsjab" class="font-extrabold">Tunjangan
                                                        Jabatan</label>
                                                    <select name="jnsjab" id="jnsjab"
                                                        class="select2 text-xs rounded-lg border border-gray-300 shadow-md">
                                                        <option value="" selected disabled>Pilih Jenis Jabatan
                                                        </option>
                                                        <option value="1">Tunjangan Struktural</option>
                                                        <option value="2">Tunjangan Fungsional</option>
                                                        <option value="3">Tunjangan Umum</option>
                                                        <option value="4">Tidak dapat Tunjangan</option>
                                                    </select>
                                                </div>
                                                <div class="flex flex-col gap-1 col-span-2">
                                                    <label for="kdstruk">Jabatan Struktural</label>
                                                    <select name="kdstruk" id="kdstruk"
                                                        class="text-xs rounded-lg border border-gray-300 shadow-md select2"
                                                        disabled>
                                                        <option value="" selected disabled>Pilih Jabatan
                                                            Struktural
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="flex flex-col gap-1 col-span-2">
                                                    <label for="kelfung">Kelompok Fungsional</label>
                                                    <select name="kelfung" id="kelfung"
                                                        class="text-xs rounded-lg border border-gray-300 shadow-md select2"
                                                        disabled>
                                                        <option value="" selected disabled>Pilih Kelompok
                                                            Fungsional
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="flex flex-col gap-1 col-span-2">
                                                    <label for="kdfung">Jabatan Fungsional</label>
                                                    <select name="kdfung" id="kdfung"
                                                        class="text-xs rounded-lg border border-gray-300 shadow-md select2"
                                                        disabled>
                                                        <option value="" selected disabled>Pilih Jabatan
                                                            Fungsional
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="flex flex-col gap-1 col-span-2">
                                                    <label for="sertguru">Sertifikasi Guru</label>
                                                    <select name="sertguru" id="sertguru"
                                                        class="text-xs rounded-lg border border-gray-300 shadow-md select2"
                                                        disabled>
                                                        <option value="" selected disabled>Pilih Sertifikasi Guru
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="pl-2">
                                            <div class="grid grid-cols-2 gap-3">
                                                <div class="flex flex-col gap-1 col-span-2">
                                                    <label for="kdskpd" class="font-extrabold">SKPD (Unit
                                                        Kerja)</label>
                                                    <select name="kdskpd" id="kdskpd"
                                                        class="select2 text-xs rounded-lg border border-gray-300 shadow-md">
                                                        <option value="" selected disabled>Pilih Unit</option>
                                                        @foreach ($skpd as $item)
                                                            <option value="{{ $item->kdskpd }}">{{ $item->uraian }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="flex flex-col gap-1 col-span-2">
                                                    <label for="jabatan">Jabatan</label>
                                                    <input type="text" id="jabatan" name="jabatan"
                                                        class="text-xs rounded-lg border border-gray-300 shadow-md">
                                                </div>
                                                <div class="flex flex-col gap-1 col-span-2">
                                                    <label for="keterangan">Keterangan</label>
                                                    <textarea name="keterangan" id="keterangan" rows="3"
                                                        class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md" placeholder="Masukkan Keterangan"></textarea>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="border border-gray-300 shadow-lg rounded-lg w-full max-w-[40%]">
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
                                            <input type="text" name="gaji_pokok" id="gaji_pokok" readonly
                                                value="0"
                                                class="text-xs rupiah rounded-lg border border-gray-300 shadow-md bg-gray-200 text-end">
                                        </div>
                                        <div class="grid grid-cols-2 gap-1">
                                            <label for="" class="self-center">Istri/Suami</label>
                                            <input type="text" name="istri_suami" id="istri_suami" readonly
                                                value="0"
                                                class="text-xs rupiah rounded-lg border border-gray-300 shadow-md bg-gray-200 text-end">
                                        </div>
                                        <div class="grid grid-cols-2 gap-1">
                                            <label for="" class="self-center">Tunjangan Anak</label>
                                            <input type="text" name="tunjangan_anak" id="tunjangan_anak" readonly
                                                value="0"
                                                class="text-xs rupiah rounded-lg border border-gray-300 shadow-md bg-gray-200 text-end">
                                        </div>
                                        <div class="grid grid-cols-2 gap-1">
                                            <label for="" class="self-center">Tunjangan Struktural</label>
                                            <input type="text" name="tunjangan_struktural"
                                                id="tunjangan_struktural" readonly value="0"
                                                class="text-xs rupiah rounded-lg border border-gray-300 shadow-md bg-gray-200 text-end">
                                        </div>
                                        <div class="grid grid-cols-2 gap-1">
                                            <label for="" class="self-center">Tunjangan Fungsional</label>
                                            <input type="text" name="tunjangan_fungsional"
                                                id="tunjangan_fungsional" readonly value="0"
                                                class="text-xs rupiah rounded-lg border border-gray-300 shadow-md bg-gray-200 text-end">
                                        </div>
                                        <div class="grid grid-cols-2 gap-1">
                                            <label for="" class="self-center">Tunjangan Umum</label>
                                            <input type="text" name="tunjangan_umum" id="tunjangan_umum" readonly
                                                value="0"
                                                class="text-xs rupiah rounded-lg border border-gray-300 shadow-md bg-gray-200 text-end">
                                        </div>
                                        <div class="grid grid-cols-2 gap-1">
                                            <label for="" class="self-center">Tambahan Tunjangan</label>
                                            <input type="text" name="tambahan_tunjangan" id="tambahan_tunjangan"
                                                readonly value="0"
                                                class="text-xs rupiah rounded-lg border border-gray-300 shadow-md bg-gray-200 text-end">
                                        </div>
                                        <div class="grid grid-cols-2 gap-1">
                                            <label for="" class="self-center">Tunjangan Beras</label>
                                            <input type="text" name="tunjangan_beras" id="tunjangan_beras"
                                                readonly value="0"
                                                class="text-xs rupiah rounded-lg border border-gray-300 shadow-md bg-gray-200 text-end">
                                        </div>
                                        <div class="grid grid-cols-2 gap-1">
                                            <label for="" class="self-center">Tunjangan Pajak PPh</label>
                                            <input type="text" name="tunjangan_pajak_pph" id="tunjangan_pajak_pph"
                                                readonly value="0"
                                                class="text-xs rupiah rounded-lg border border-gray-300 shadow-md bg-gray-200 text-end">
                                        </div>
                                        <div class="grid grid-cols-2 gap-1">
                                            <label for="" class="self-center">Pembulatan</label>
                                            <input type="text" name="pembulatan" id="pembulatan" readonly
                                                value="0"
                                                class="text-xs rupiah rounded-lg border border-gray-300 shadow-md bg-gray-200 text-end">
                                        </div>
                                        <div class="grid grid-cols-2 gap-1">
                                            <label for=""
                                                class="font-extrabold self-center">PENGHASILAN</label>
                                            <input type="text" name="penghasilan" id="penghasilan" readonly
                                                value="0"
                                                class="font-extrabold text-xs rupiah rounded-lg border border-gray-300 shadow-md bg-gray-200 text-end">
                                        </div>
                                        <div class="grid grid-cols-2 gap-1">
                                            <label for="" class="self-center">Potongan Taspen</label>
                                            <input type="text" name="potongan_taspen" id="potongan_taspen"
                                                readonly value="0"
                                                class="text-xs rupiah rounded-lg border border-gray-300 shadow-md bg-gray-200 text-end">
                                        </div>
                                        <div class="grid grid-cols-2 gap-1">
                                            <label for="" class="self-center">BPJS Kesehatan</label>
                                            <input type="text" name="bpjs_kesehatan" id="bpjs_kesehatan" readonly
                                                value="0"
                                                class="text-xs rupiah rounded-lg border border-gray-300 shadow-md bg-gray-200 text-end">
                                        </div>
                                        <div class="grid grid-cols-2 gap-1">
                                            <label for="" class="self-center">Pajak PPh. 21</label>
                                            <input type="text" name="pajak_pph" id="pajak_pph" readonly
                                                value="0"
                                                class="text-xs rupiah rounded-lg border border-gray-300 shadow-md bg-gray-200 text-end">
                                        </div>
                                        <div class="grid grid-cols-2 gap-1">
                                            <label for="" class="self-center">Potongan Taperum</label>
                                            <input type="text" name="potongan_taperum" id="potongan_taperum"
                                                readonly value="0"
                                                class="text-xs rupiah rounded-lg border border-gray-300 shadow-md bg-gray-200 text-end">
                                        </div>
                                        <div class="grid grid-cols-2 gap-1">
                                            <label for="" class="self-center">Sewa Rumah</label>
                                            <input type="text" name="sewa_rumah" id="sewa_rumah" value="0"
                                                class="text-xs rupiah rounded-lg border border-gray-300 shadow-md text-end">
                                        </div>
                                        <div class="grid grid-cols-2 gap-1">
                                            <label for="" class="self-center">Lebih Bayar</label>
                                            <input type="text" name="lebih_bayar" id="lebih_bayar" value="0"
                                                class="text-xs rupiah rounded-lg border border-gray-300 shadow-md text-end">
                                        </div>
                                        <div class="grid grid-cols-2 gap-1">
                                            <label for="" class="self-center">Potongan Lain Lain</label>
                                            <input type="text" name="potongan_lain_lain" id="potongan_lain_lain"
                                                value="0"
                                                class="text-xs rupiah rounded-lg border border-gray-300 shadow-md text-end">
                                        </div>
                                        <div class="grid grid-cols-2 gap-1">
                                            <label for="" class="font-extrabold self-center">POTONGAN</label>
                                            <input type="text" name="potongan" id="potongan" readonly
                                                value="0"
                                                class="font-extrabold text-xs rupiah rounded-lg border border-gray-300 shadow-md text-end bg-gray-200">
                                        </div>
                                        <div class="grid grid-cols-2 gap-1">
                                            <label for="" class="font-extrabold self-center">GAJI
                                                BERSIH</label>
                                            <input type="text" name="gaji_bersih" id="gaji_bersih" readonly
                                                value="0"
                                                class="font-extrabold text-xs rupiah rounded-lg border border-gray-300 shadow-md text-end bg-gray-200">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="text-xs md:text-sm mt-3">
                            <div class="flex md:justify-end justify-between items-center md:gap-4 gap-1 col-span-2">
                                <button
                                    class="bg-bay-950 hover:bg-opacity-80 text-white py-2 px-4 rounded-lg flex items-center gap-1 text-xs md:text-sm shadow-md"
                                    onclick="document.getElementById('bio-tab').click()">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="4" d="M6 18 17.94 6M18 18 6.06 6" />
                                    </svg>

                                    <p>Kembali</p>
                                </button>
                                <button
                                    class="bg-green-500 hover:bg-opacity-80 text-white py-2 px-4 rounded-lg flex items-center gap-1 text-xs md:text-sm shadow-md"
                                    type="submit">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="4" d="M5 11.917 9.724 16.5 19 7.5" />
                                    </svg>

                                    <p>Simpan</p>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </x-slot>
    </x-container>
</x-app-layout>
<x-pegawai.js.create :config="$config" />
