@extends('layouts.dashboard')

@section('title', 'Pengaturan Aplikasi')

@section('content')

<!-- HEADER -->
<div class="mb-8">
    <h1 class="text-2xl font-semibold text-gray-800">Pengaturan Aplikasi</h1>
    <p class="text-sm text-gray-500">
        Kelola informasi dasar aplikasi inventori
    </p>
</div>

<!-- GRID UTAMA -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">

    <!-- INFO APLIKASI -->
    <div class="lg:col-span-2 bg-white rounded-xl shadow p-6 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-indigo-50 to-transparent"></div>

        <div class="relative flex items-start gap-6">
            <!-- LOGO -->
            <div class="flex-shrink-0">
                <img src="{{ asset('images/logo.png') }}"
                     class="w-24 h-24 rounded-lg border bg-white p-2 shadow object-contain"
                     alt="Logo">
            </div>

            <!-- INFO -->
            <div class="flex-1">
                <h2 class="text-xl font-semibold text-gray-800 mb-1">
                    Sistem Inventori 
                </h2>
                <p class="text-sm text-gray-500 mb-4">
                    Aplikasi manajemen stock, transaksi, dan laporan barang 
                </p>

                <button id="openModal"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white text-sm rounded-lg hover:bg-indigo-700 transition">
                    Edit Pengaturan
                </button>
            </div>
        </div>
    </div>

    <!-- RINGKASAN -->
    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-sm font-semibold text-gray-700 mb-4">
            Ringkasan Sistem
        </h3>

        <div class="space-y-3 text-sm">
            <div class="flex justify-between">
                <span class="text-gray-500">Versi Aplikasi</span>
                <span class="font-medium text-gray-700">v1.0.0</span>
            </div>

            <div class="flex justify-between">
                <span class="text-gray-500">Status Sistem</span>
                <span class="px-2 py-1 text-xs bg-green-100 text-green-600 rounded">
                    Aktif
                </span>
            </div>

            <div class="flex justify-between">
                <span class="text-gray-500">Terakhir Diperbarui</span>
                <span class="text-gray-700">12 Jan 2025</span>
            </div>
        </div>
    </div>

</div>

<!-- SECTION INFO TAMBAHAN -->
<div class="bg-white rounded-xl shadow p-6 max-w-4xl">
    <h3 class="text-lg font-semibold text-gray-800 mb-2">
        Informasi Aplikasi
    </h3>
    <p class="text-sm text-gray-500 mb-4">
        Informasi ini akan ditampilkan pada halaman login dan header aplikasi
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
        <div class="border rounded-lg p-4">
            <p class="text-gray-500 mb-1">Nama Aplikasi</p>
            <p class="font-medium text-gray-800">
                Sistem Inventori Barang
            </p>
        </div>

        <div class="border rounded-lg p-4">
            <p class="text-gray-500 mb-1">Logo</p>
            <p class="font-medium text-gray-800">
                logo.png
            </p>
        </div>
    </div>
</div>

<!-- ================= MODAL EDIT ================= -->
<div id="settingsModal"
     class="fixed inset-0 bg-black bg-opacity-40 hidden items-center justify-center z-50">

    <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-6 animate-fadeIn">

        <h3 class="text-lg font-semibold text-gray-800 mb-4">
            Edit Pengaturan Aplikasi
        </h3>

        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Nama -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Nama Aplikasi
                </label>
                <input type="text"
                       class="w-full border rounded-lg px-3 py-2 text-sm focus:ring focus:ring-indigo-200"
                       value="Sistem Inventori Barang">
            </div>

            <!-- Logo -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Logo Aplikasi
                </label>
                <input type="file" class="w-full text-sm">
            </div>

            <!-- BUTTON -->
            <div class="flex justify-end gap-2 mt-6">
                <button type="button" id="closeModal"
                    class="px-4 py-2 text-sm bg-gray-100 rounded hover:bg-gray-200">
                    Batal
                </button>
                <button type="submit"
                    class="px-4 py-2 text-sm bg-indigo-600 text-white rounded hover:bg-indigo-700">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- SCRIPT MODAL -->
<script>
    const modal = document.getElementById('settingsModal');
    document.getElementById('openModal').onclick = () => modal.classList.remove('hidden');
    document.getElementById('closeModal').onclick = () => modal.classList.add('hidden');
    modal.onclick = e => { if (e.target === modal) modal.classList.add('hidden') }
</script>

<style>
@keyframes fadeIn {
    from { opacity: 0; transform: scale(0.95); }
    to { opacity: 1; transform: scale(1); }
}
.animate-fadeIn {
    animation: fadeIn .2s ease-out;
}
</style>

@endsection
