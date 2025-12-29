@extends('layouts.dashboard')

@section('title', 'Ganti Password')

@section('content')

<!-- HEADER -->
<div class="mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">
        Ganti Password
    </h1>
    <p class="text-sm text-gray-500">
        Perbarui keamanan akun kamu
    </p>
</div>

<!-- CARD -->
<div class="bg-white p-6 rounded-xl shadow max-w-xl">

    <form method="POST" action="#">
        @csrf

        <!-- PASSWORD LAMA -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Password Lama
            </label>

            <div class="relative">
                <input
                    type="password"
                    id="old_password"
                    placeholder="Masukkan password lama"
                    class="w-full border border-gray-300 px-3 py-2 rounded-lg pr-10 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >

                <button type="button"
                        onclick="togglePassword('old_password')"
                        class="absolute inset-y-0 right-3 text-gray-400 text-sm">
                    👁️
                </button>
            </div>
        </div>

        <!-- PASSWORD BARU -->
        <div class="mb-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Password Baru
            </label>

            <div class="relative">
                <input
                    type="password"
                    id="new_password"
                    onkeyup="checkStrength()"
                    placeholder="Minimal 8 karakter"
                    class="w-full border border-gray-300 px-3 py-2 rounded-lg pr-10 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >

                <button type="button"
                        onclick="togglePassword('new_password')"
                        class="absolute inset-y-0 right-3 text-gray-400 text-sm">
                    👁️
                </button>
            </div>
        </div>

        <!-- STRENGTH BAR -->
        <div class="mb-4">
            <div class="w-full h-2 bg-gray-200 rounded">
                <div id="strengthBar" class="h-2 rounded transition-all"></div>
            </div>
            <p id="strengthText" class="text-xs mt-1 text-gray-500"></p>
        </div>

        <!-- KONFIRMASI -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Konfirmasi Password Baru
            </label>

            <div class="relative">
                <input
                    type="password"
                    id="confirm_password"
                    placeholder="Ulangi password baru"
                    class="w-full border border-gray-300 px-3 py-2 rounded-lg pr-10 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >

                <button type="button"
                        onclick="togglePassword('confirm_password')"
                        class="absolute inset-y-0 right-3 text-gray-400 text-sm">
                    👁️
                </button>
            </div>
        </div>

        <!-- BUTTON -->
        <div class="flex justify-end gap-3">
            <a href="/dashboard/profile"
               class="px-5 py-2 rounded-lg border text-gray-600 hover:bg-gray-100 transition">
                Batal
            </a>

            <button
                type="submit"
                class="px-6 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 transition">
                Simpan Password
            </button>
        </div>

    </form>
</div>

<!-- SCRIPT -->
<script>
    function togglePassword(id) {
        const input = document.getElementById(id);
        input.type = input.type === "password" ? "text" : "password";
    }

    function checkStrength() {
        const password = document.getElementById("new_password").value;
        const bar = document.getElementById("strengthBar");
        const text = document.getElementById("strengthText");

        let strength = 0;

        if (password.length >= 8) strength++;
        if (/[A-Z]/.test(password)) strength++;
        if (/[0-9]/.test(password)) strength++;
        if (/[^A-Za-z0-9]/.test(password)) strength++;

        if (strength === 0) {
            bar.style.width = "0%";
            text.textContent = "";
        } else if (strength === 1) {
            bar.style.width = "25%";
            bar.className = "h-2 bg-red-500 rounded";
            text.textContent = "Password lemah";
        } else if (strength === 2) {
            bar.style.width = "50%";
            bar.className = "h-2 bg-yellow-400 rounded";
            text.textContent = "Password cukup";
        } else if (strength === 3) {
            bar.style.width = "75%";
            bar.className = "h-2 bg-blue-500 rounded";
            text.textContent = "Password kuat";
        } else {
            bar.style.width = "100%";
            bar.className = "h-2 bg-green-500 rounded";
            text.textContent = "Password sangat kuat 🔐";
        }
    }
</script>

@endsection
