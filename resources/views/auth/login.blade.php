@php
    $system = \App\Models\SystemApp::first();
@endphp
<x-guest-layout :system="$system">
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="space-y-2">
            <div>
                <label class="text-sm md:text-sm" for="username">Username</label>
                <input type="text"
                    class="block mt-1 w-full rounded-xl autofill:!bg-white border border-gray-300 focus:ring-0 text-sm md:text-sm"
                    name="username" id="username" :value="old('username')" required placeholder="Masukkan Username"
                    autocomplete="username">
            </div>

            <div>
                <label class="text-sm md:text-sm" for="password">Password</label>
                <input type="password"
                    class="block mt-1 w-full rounded-xl autofill:!bg-white border border-gray-300 focus:ring-0 text-sm md:text-sm"
                    name="password" id="password" :value="old('password')" placeholder="Masukkan Password" required
                    autocomplete="password">
            </div>
            <div>
                <label class="text-sm md:text-sm" for="bulan_transaksi">Bulan Transaksi</label>
                <input type="text" disabled value=" {{ \App\Helpers\FormatHelper::formatThnBln($system->thnbln) }}"
                    name="bulan_transaksi" id="bulan_transaksi"
                    class="block mt-1 w-full rounded-xl autofill:!bg-white border border-gray-300 focus:ring-0 text-sm md:text-sm"
                    required />
                <input type="text" class="hidden" name="thnbln" value="{{ $system->thnbln }}">
            </div>

            <div>
                <button type="submit" class="bg-spindle-900 text-white rounded-xl w-full py-2 px-3 text-sm mt-3">
                    Masuk
                </button>
            </div>
        </div>
    </form>
</x-guest-layout>
