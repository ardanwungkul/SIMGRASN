<x-app-layout>
    <x-slot name="header">
        Tambah User
    </x-slot>
    <x-container>
        <x-slot name="content">
            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="text-xs md:text-sm space-y-3 max-w-xl mx-auto">
                    <div class="flex flex-col gap-1">
                        <label for="name">Nama</label>
                        <input type="text" id="name" name="name"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            value="{{ old('name') }}" placeholder="Masukkan Nama User" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            autocomplete="new-username" value="{{ old('username') }}" placeholder="Masukkan Username"
                            required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            autocomplete="new-email" value="{{ old('email') }}" placeholder="Masukkan Email" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            autocomplete="new-password" value="{{ old('password') }}" placeholder="Password" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="level">Role/Level</label>
                        <select name="level" id="level"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md w-full select2"
                            required>
                            <option value="" selected disabled> Pilih Role/Level</option>
                            <option value="1">User</option>
                            <option value="2">Supervisor</option>
                            <option value="3">Administrator</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="grup">Grup</label>
                        <select name="grup" id="grup"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md w-full select2"
                            required>
                            <option value="" selected disabled> Pilih Grup</option>
                            <option value="1">BKAD</option>
                            <option value="2">BKPSDM</option>
                            <option value="3">DISDIK</option>
                            <option value="4">SKLH</option>
                            <option value="5">DINKES</option>
                            <option value="6">PKM</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="skpd">SKPD</label>
                        <select name="skpd" id="skpd"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md w-full select2"
                            required>
                            <option value="" selected disabled> Pilih SKPD</option>
                            @foreach ($skpd as $item)
                                <option value="{{ $item->kdskpd }}">{{ $item->kdskpd }} - {{ $item->uraian }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex md:justify-end justify-between items-center md:gap-4 gap-1">
                        <button
                            class="bg-green-500 hover:bg-opacity-80 text-white py-2 px-4 rounded-lg flex items-center gap-1 text-xs md:text-sm shadow-md"
                            type="submit">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="4" d="M5 11.917 9.724 16.5 19 7.5" />
                            </svg>

                            <p>Simpan</p>
                        </button>
                        <a class="bg-bay-950 hover:bg-opacity-80 text-white py-2 px-4 rounded-lg flex items-center gap-1 text-xs md:text-sm shadow-md"
                            href="{{ route('user.index') }}">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="4" d="M6 18 17.94 6M18 18 6.06 6" />
                            </svg>

                            <p>Kembali</p>
                        </a>
                    </div>
                </div>
            </form>
        </x-slot>
    </x-container>
</x-app-layout>
<script type="module">
    $(document).ready(function() {
        $('.select2').select2({
            dropdownCssClass: "text-xs md:text-sm",
            selectionCssClass: 'text-xs md:text-sm',
        });
    })
</script>
