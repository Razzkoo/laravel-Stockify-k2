@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')

<!-- Header -->
<div class="mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">Dashboard</h1>
    <p class="text-sm text-gray-500">
        Ringkasan aktivitas dan kondisi stok
    </p>
</div>

<!-- SUMMARY CARDS -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">

    <!-- Produk -->
    <div class="bg-white p-5 rounded-lg shadow">
        <p class="text-sm text-gray-500">Total Produk</p>
        <h2 class="text-3xl font-bold mt-1">128</h2>
    </div>

    <!-- Masuk -->
    <div class="bg-white p-5 rounded-lg shadow">
        <p class="text-sm text-gray-500">Barang Masuk (Bulan Ini)</p>
        <h2 class="text-3xl font-bold text-green-600 mt-1">+42</h2>
    </div>

    <!-- Keluar -->
    <div class="bg-white p-5 rounded-lg shadow">
        <p class="text-sm text-gray-500">Barang Keluar (Bulan Ini)</p>
        <h2 class="text-3xl font-bold text-red-600 mt-1">-35</h2>
    </div>

    <!-- Stok Menipis -->
    <div class="bg-white p-5 rounded-lg shadow">
        <p class="text-sm text-gray-500">Stok Menipis</p>
        <h2 class="text-3xl font-bold text-orange-600 mt-1">7</h2>
    </div>

</div>

<!-- MAIN CONTENT -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    <!-- GRAFIK STOK -->
    <div class="bg-white p-6 rounded-lg shadow lg:col-span-2">
        <h3 class="font-semibold text-gray-800 mb-4">
            Grafik Stok Barang
        </h3>

        <!-- Placeholder Grafik -->
        <div class="h-56 flex items-center justify-center border border-dashed rounded text-gray-400 text-sm">
            Grafik stok akan ditampilkan di sini
        </div>

        <!-- note -->
        <p class="text-xs text-gray-400 mt-3">
            * Grafik bisa berdasarkan produk atau kategori
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
                    <span class="text-xs text-gray-400">
                        10 menit lalu
                    </span>
                </div>
            </li>

            <li class="flex items-start gap-3">
                <span class="mt-1 h-2 w-2 bg-green-600 rounded-full"></span>
                <div>
                    <p class="text-gray-800">
                        Barang masuk sebanyak <b>+20</b>
                    </p>
                    <span class="text-xs text-gray-400">
                        1 jam lalu
                    </span>
                </div>
            </li>

            <li class="flex items-start gap-3">
                <span class="mt-1 h-2 w-2 bg-red-600 rounded-full"></span>
                <div>
                    <p class="text-gray-800">
                        Barang keluar <b>-5</b> (Penjualan)
                    </p>
                    <span class="text-xs text-gray-400">
                        3 jam lalu
                    </span>
                </div>
            </li>

            <li class="flex items-start gap-3">
                <span class="mt-1 h-2 w-2 bg-gray-400 rounded-full"></span>
                <div>
                    <p class="text-gray-800">
                        User staff login
                    </p>
                    <span class="text-xs text-gray-400">
                        Hari ini
                    </span>
                </div>
            </li>
        </ul>
    </div>

</div>

@endsection
