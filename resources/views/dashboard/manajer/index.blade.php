@extends('layouts.dashboard')

@section('title', 'Dashboard Manajer')

@section('content')

<!-- HEADER DASHBOARD -->
<div class="bg-white p-6 rounded-lg shadow mb-8">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        <!-- LEFT -->
        <div>
            <h1 class="text-2xl font-semibold text-gray-800">
                Dashboard Manajer
            </h1>
            <p class="text-sm text-gray-500 mt-1">
                Ringkasan kondisi stok dan aktivitas barang hari ini
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
</div>

<!-- SUMMARY UTAMA -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

    <!-- STOK MENIPIS -->
    <div class="bg-white p-6 rounded-xl shadow border-l-4 border-orange-500 hover:shadow-md transition">
        <div class="flex justify-between items-start">
            <p class="text-sm text-gray-500">Stok Menipis</p>
            <span class="p-2 bg-red-100 rounded-lg text-red-600"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
</svg>
</span>
        </div>
        <h2 class="text-4xl font-bold text-orange-600 mt-2">7</h2>
        <p class="text-xs text-gray-400 mt-1">
            Barang perlu segera ditindaklanjuti
        </p>
    </div>

    <!-- BARANG MASUK -->
    <div class="bg-white p-6 rounded-xl shadow border-l-4 border-green-500 hover:shadow-md transition">
        <div class="flex justify-between items-start">
            <p class="text-sm text-gray-500">Barang Masuk Hari Ini</p>
            <span class="p-2 bg-green-100 rounded-lg text-green-600"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
</svg>
</span>
        </div>
        <h2 class="text-4xl font-bold text-green-600 mt-2">12</h2>
        <p class="text-xs text-gray-400 mt-1">
            Transaksi barang masuk
        </p>
    </div>

    <!-- BARANG KELUAR -->
    <div class="bg-white p-6 rounded-xl shadow border-l-4 border-red-500 hover:shadow-md transition">
        <div class="flex justify-between items-start">
            <p class="text-sm text-gray-500">Barang Keluar Hari Ini</p>
            <span class="p-2 bg-orange-100 rounded-lg text-orange-600"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
</svg>
</span>
        </div>
        <h2 class="text-4xl font-bold text-red-600 mt-2">9</h2>
        <p class="text-xs text-gray-400 mt-1">
            Distribusi barang ke unit/divisi
        </p>
    </div>

</div>

<!-- INFO TAMBAHAN -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

    <!-- RINGKASAN STOK -->
    <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">
            Ringkasan Stok Barang
        </h3>

        <div class="space-y-4 text-sm">
            <div class="flex justify-between border-b pb-2">
                <span class="text-gray-600">Total Produk</span>
                <span class="font-semibold text-gray-800">128</span>
            </div>

            <div class="flex justify-between border-b pb-2">
                <span class="text-gray-600">Produk Aktif</span>
                <span class="font-semibold text-green-600">120</span>
            </div>

            <div class="flex justify-between">
                <span class="text-gray-600">Produk Tidak Aktif</span>
                <span class="font-semibold text-gray-500">8</span>
            </div>
        </div>
    </div>

    <!-- PERINGATAN -->
    <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">
            Peringatan Sistem
        </h3>

        <ul class="space-y-4 text-sm">
            <li class="flex items-start gap-3">
                <span class="w-2 h-2 mt-2 bg-orange-500 rounded-full"></span>
                <span class="text-gray-600">
                    Terdapat <b class="text-orange-600">7 barang</b> dengan stok di bawah batas minimum.
                </span>
            </li>

            <li class="flex items-start gap-3">
                <span class="w-2 h-2 mt-2 bg-green-500 rounded-full"></span>
                <span class="text-gray-600">
                    Barang masuk hari ini telah tercatat dengan baik.
                </span>
            </li>

            <li class="flex items-start gap-3">
                <span class="w-2 h-2 mt-2 bg-red-500 rounded-full"></span>
                <span class="text-gray-600">
                    Pastikan barang keluar sesuai permintaan resmi.
                </span>
            </li>
        </ul>
    </div>

</div>

@endsection
