@extends('dashboard.manajer.layout')

@section('title', 'Laporan Sistem')

@section('content')

<div class="mb-8">
    <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">
        Laporan Sistem
    </h1>
    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
        Ringkasan dan akses laporan sistem persediaan barang
    </p>
</div>

<!-- SUMMARY -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm
                hover:shadow-md transition
                dark:bg-gray-800 dark:border-gray-700">
        <p class="text-sm text-gray-500 dark:text-gray-400">Total Barang</p>
        <p class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">
            {{ $totalProduk }}
        </p>
        <p class="mt-2 text-xs text-gray-400 dark:text-gray-500">
            Jumlah seluruh barang terdaftar
        </p>
    </div>
    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm
                hover:shadow-md transition
                dark:bg-gray-800 dark:border-gray-700">
        <p class="text-sm text-gray-500 dark:text-gray-400">Jumlah Stok</p>
        <p class="mt-2 text-3xl font-bold text-indigo-600">
            {{ $totalStok }}
        </p>
        <p class="mt-2 text-xs text-gray-400 dark:text-gray-500">
            Jumlah seluruh stok yang tersedia
        </p>
    </div>
    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm
                hover:shadow-md transition
                dark:bg-gray-800 dark:border-gray-700">
        <p class="text-sm text-gray-500 dark:text-gray-400">Transaksi Bulan Ini</p>
        <p class="mt-2 text-3xl font-bold text-indigo-600">
            {{ $transaksiBulanIni }}
        </p>
        <p class="mt-2 text-xs text-gray-400 dark:text-gray-500">
            Total barang masuk & keluar bulan berjalan
        </p>
    </div>
</div>

<!--MENU -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <!-- LAPORAN STOK -->
    <div
        class="flex flex-col justify-between p-6
               bg-white border border-gray-200 rounded-lg shadow-sm
               hover:shadow-md transition
               dark:bg-gray-800 dark:border-gray-700">
        <div>
            <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">
                Laporan Stok
            </h2>

            <p class="mb-6 text-sm text-gray-500 dark:text-gray-400 leading-relaxed">
                Menampilkan data stok barang.
            </p>
        </div>
        <a href="{{ route('manajer.report.stok') }}"
           class="inline-flex items-center justify-center px-4 py-2
                  text-sm font-medium text-white
                  bg-indigo-600 rounded-lg
                  hover:bg-indigo-700
                  focus:outline-none focus:ring-4 focus:ring-indigo-300
                  dark:focus:ring-indigo-800">
            Lihat Laporan
        </a>
    </div>

    <!-- LAPORAN PER PERIODE -->
    <div
        class="flex flex-col justify-between p-6
               bg-white border border-gray-200 rounded-lg shadow-sm
               hover:shadow-md transition
               dark:bg-gray-800 dark:border-gray-700">
        <div>
            <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">
                Laporan Transaksi
            </h2>

            <p class="mb-6 text-sm text-gray-500 dark:text-gray-400 leading-relaxed">
                Menampilkan transaksi barang berdasarkan periode waktu dan kategori.
            </p>
        </div>
        <a href="{{ route('manajer.report.transaction') }}"
           class="inline-flex items-center justify-center px-4 py-2
                  text-sm font-medium text-white
                  bg-indigo-600 rounded-lg
                  hover:bg-indigo-700
                  focus:outline-none focus:ring-4 focus:ring-indigo-300
                  dark:focus:ring-indigo-800">
            Lihat Laporan
        </a>
    </div>
</div>
@endsection
