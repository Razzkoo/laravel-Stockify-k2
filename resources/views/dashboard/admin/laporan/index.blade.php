@extends('layouts.dashboard')

@section('title', 'Laporan Sistem')

@section('content')

<!-- HEADER -->
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">
        Laporan Sistem
    </h1>
    <p class="text-sm text-gray-500 mt-1">
        Ringkasan dan akses laporan sistem persediaan barang
    </p>
</div>

<!-- SUMMARY -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
    <div class="bg-white p-5 rounded-lg shadow">
        <p class="text-sm text-gray-500">Total Barang</p>
        <p class="text-3xl font-bold text-gray-800">120</p>
    </div>

    <div class="bg-white p-5 rounded-lg shadow">
        <p class="text-sm text-gray-500">Transaksi Bulan Ini</p>
        <p class="text-3xl font-bold text-indigo-600">45</p>
    </div>

    <div class="bg-white p-5 rounded-lg shadow">
        <p class="text-sm text-gray-500">Pengguna Aktif</p>
        <p class="text-3xl font-bold text-green-600">12</p>
    </div>
</div>

<!-- LAPORAN MENU -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <!-- LAPORAN STOK -->
    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
        <h2 class="text-lg font-semibold text-gray-800 mb-2">
            Laporan Stok & Transaksi
        </h2>

        <p class="text-sm text-gray-500 mb-4">
            Menampilkan data stok barang serta transaksi masuk dan keluar secara keseluruhan.
        </p>

        <a href="{{ url('dashboard/admin/laporan/stock') }}"
           class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700">
            Lihat Laporan
        </a>
    </div>

    <!-- LAPORAN PER PERIODE (BARU) -->
    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition border border-indigo-100">
        <h2 class="text-lg font-semibold text-gray-800 mb-2">
            Laporan Per Periode
        </h2>

        <p class="text-sm text-gray-500 mb-4">
            Menampilkan laporan stok dan transaksi barang berdasarkan periode waktu dan kategori.
        </p>

        <a href="{{ url('dashboard/admin/laporan/periode') }}"
           class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700">
            Pilih Periode
        </a>
    </div>

    <!-- LAPORAN AKTIVITAS -->
    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
        <h2 class="text-lg font-semibold text-gray-800 mb-2">
            Laporan Aktivitas Pengguna
        </h2>

        <p class="text-sm text-gray-500 mb-4">
            Menampilkan riwayat aktivitas pengguna seperti input, perubahan, dan persetujuan data.
        </p>

        <a href="{{ url('dashboard/admin/laporan/aktivitas') }}"
           class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700">
            Lihat Laporan
        </a>
    </div>

</div>

@endsection
