@extends('layouts.dashboard')

@section('title', 'Dashboard Admin')

@section('content')

<!-- HEADER DASHBOARD -->
<div class="bg-white p-6 rounded-lg shadow mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">

    <!-- LEFT -->
    <div>
        <h1 class="text-2xl font-semibold text-gray-800">
            Dashboard Admin
        </h1>
        <p class="text-sm text-gray-500">
            Pantau stok, aktivitas, dan laporan secara real-time
        </p>
    </div>

    <!-- RIGHT -->
    <div class="text-sm text-gray-500 flex items-center gap-2">
        <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
</svg>
</span>
        <span>{{ date('l, d M Y') }}</span>
    </div>

</div>

<!-- SUMMARY CARDS -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">

    <!-- Produk -->
    <div class="bg-white p-5 rounded-lg shadow hover:shadow-lg transition border-l-4 border-blue-500">
        <div class="flex items-center justify-between">
            <p class="text-sm text-gray-500">Total Produk</p>
            <span class="p-2 bg-blue-100 rounded-lg text-blue-600"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
</svg>
</span>
        </div>
        <h2 class="text-3xl font-bold mt-2 text-gray-800">128</h2>
    </div>

    <!-- Barang Masuk -->
    <div class="bg-white p-5 rounded-lg shadow hover:shadow-lg transition border-l-4 border-green-500">
        <div class="flex items-center justify-between">
            <p class="text-sm text-gray-500">Barang Masuk</p>
            <span class="p-2 bg-green-100 rounded-lg text-green-600"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
</svg>
</span>
        </div>
        <h2 class="text-3xl font-bold text-green-600 mt-2">+42</h2>
        <p class="text-xs text-gray-400">Bulan ini</p>
    </div>

    <!-- Barang Keluar -->
    <div class="bg-white p-5 rounded-lg shadow hover:shadow-lg transition border-l-4 border-red-500">
        <div class="flex items-center justify-between">
            <p class="text-sm text-gray-500">Barang Keluar</p>
            <span class="p-2 bg-red-100 rounded-lg text-red-600"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
</svg>
</span>
        </div>
        <h2 class="text-3xl font-bold text-red-600 mt-2">-35</h2>
        <p class="text-xs text-gray-400">Bulan ini</p>
    </div>

    <!-- Stok Menipis -->
    <div class="bg-white p-5 rounded-lg shadow hover:shadow-lg transition border-l-4 border-orange-500">
        <div class="flex items-center justify-between">
            <p class="text-sm text-gray-500">Stok Menipis</p>
            <span class="p-2 bg-orange-100 rounded-lg text-orange-600"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
</svg>
</span>
        </div>
        <h2 class="text-3xl font-bold text-orange-600 mt-2">7</h2>
        <p class="text-xs text-gray-400">Perlu perhatian</p>
    </div>

</div>

<!-- MAIN CONTENT -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    <!-- GRAFIK STOK -->
    <div class="bg-white p-6 rounded-lg shadow lg:col-span-2">
        <div class="flex items-center justify-between mb-4">
            <h3 class="font-semibold text-gray-800">
                Grafik Stok Barang
            </h3>
            <span class="text-sm text-gray-400">Bulanan</span>
        </div>

        <!-- Placeholder Grafik -->
        <div class="h-56 flex flex-col items-center justify-center border border-dashed rounded text-gray-400 text-sm">
            <span class="text-3xl mb-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0 0 20.25 18V6A2.25 2.25 0 0 0 18 3.75H6A2.25 2.25 0 0 0 3.75 6v12A2.25 2.25 0 0 0 6 20.25Z" />
</svg>
</span>
            Grafik stok akan ditampilkan di sini
        </div>

        <p class="text-xs text-gray-400 mt-3">
            * Grafik dapat difilter berdasarkan produk atau kategori
        </p>
    </div>

    <!-- AKTIVITAS TERBARU -->
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="font-semibold text-gray-800 mb-4">
            Aktivitas Terbaru
        </h3>

        <ul class="space-y-4 text-sm">
            <li class="flex items-start gap-3">
                <span class="mt-1 h-2 w-2 bg-blue-600 rounded-full"></span>
                <div>
                    <p class="text-gray-800">
                        Admin menambahkan produk <b>Beras Premium</b>
                    </p>
                    <span class="text-xs text-gray-400">10 menit lalu</span>
                </div>
            </li>

            <li class="flex items-start gap-3">
                <span class="mt-1 h-2 w-2 bg-green-600 rounded-full"></span>
                <div>
                    <p class="text-gray-800">
                        Barang masuk sebanyak <b>+20</b>
                    </p>
                    <span class="text-xs text-gray-400">1 jam lalu</span>
                </div>
            </li>

            <li class="flex items-start gap-3">
                <span class="mt-1 h-2 w-2 bg-red-600 rounded-full"></span>
                <div>
                    <p class="text-gray-800">
                        Barang keluar <b>-5</b> (Penjualan)
                    </p>
                    <span class="text-xs text-gray-400">3 jam lalu</span>
                </div>
            </li>

            <li class="flex items-start gap-3">
                <span class="mt-1 h-2 w-2 bg-gray-400 rounded-full"></span>
                <div>
                    <p class="text-gray-800">
                        User staff login
                    </p>
                    <span class="text-xs text-gray-400">Hari ini</span>
                </div>
            </li>
        </ul>
    </div>

</div>

@endsection
