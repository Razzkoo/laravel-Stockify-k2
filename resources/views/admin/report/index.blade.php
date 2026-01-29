@extends('dashboard.admin.layout')

@section('title', 'Laporan Sistem')

@section('content')

<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
        Laporan Sistem
    </h1>
    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
        Ringkasan dan akses laporan sistem persediaan barang
    </p>
</div>

<!-- SUMMARY -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="p-5 bg-white border border-gray-200 rounded-lg shadow
                dark:bg-gray-800 dark:border-gray-700">
        <p class="text-sm text-gray-500 dark:text-gray-400">
            Total Produk
        </p>
        <p class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">
            {{ $totalProduk }}
        </p>
    </div>
    <div class="p-5 bg-white border border-gray-200 rounded-lg shadow
                dark:bg-gray-800 dark:border-gray-700">
        <p class="text-sm text-gray-500 dark:text-gray-400">
            Jumlah Stok
        </p>
        <p class="mt-2 text-3xl font-bold text-indigo-600">
            {{ $totalStok }}
        </p>
    </div>
    <div class="p-5 bg-white border border-gray-200 rounded-lg shadow
                dark:bg-gray-800 dark:border-gray-700">
        <p class="text-sm text-gray-500 dark:text-gray-400">
            Transaksi Bulan Ini
        </p>
        <p class="mt-2 text-3xl font-bold text-indigo-600">
            {{ $transaksiBulanIni }}
        </p>
    </div>
    <div class="p-5 bg-white border border-gray-200 rounded-lg shadow
                dark:bg-gray-800 dark:border-gray-700">
        <p class="text-sm text-gray-500 dark:text-gray-400">
            Jumlah Pengguna
        </p>
        <p class="mt-2 text-3xl font-bold text-green-600">
            {{ $penggunaAktif }}
        </p>
    </div>
</div>

<!-- MENU -->
<div class="grid grid-cols-1 gap-6 md:grid-cols-3">
    <!-- LAPORAN STOK -->
    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow
                hover:shadow-lg transition
                dark:bg-gray-800 dark:border-gray-700">
        <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">
            Laporan Stok 
        </h2>

        <p class="mb-4 text-sm text-gray-500 dark:text-gray-400">
            Menampilkan seluruh data stok barang yang tersedia.
        </p>

        <a href="{{ route('admin.report.stok') }}"
           class="inline-flex items-center px-4 py-2 text-sm font-medium
                  text-white bg-indigo-600 rounded-lg
                  hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300">
            Lihat Laporan
        </a>
    </div>
    
    <!-- LAPORAN TRANSAKSI-->
    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow
                hover:shadow-lg transition
                dark:bg-gray-800 dark:border-gray-700">
        <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">
            Laporan Transaksi
        </h2>

        <p class="mb-4 text-sm text-gray-500 dark:text-gray-400">
            Menampilkan transaksi barang masuk dan keluar.
        </p>

        <a href="{{ route('admin.report.transaction') }}"
           class="inline-flex items-center px-4 py-2 text-sm font-medium
                  text-white bg-indigo-600 rounded-lg
                  hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300">
            Lihat Laporan
        </a>
    </div>

    <!-- LAPORAN AKTIVITAS -->
    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow
                hover:shadow-lg transition
                dark:bg-gray-800 dark:border-gray-700">
        <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">
            Laporan Aktivitas Pengguna
        </h2>

        <p class="mb-4 text-sm text-gray-500 dark:text-gray-400">
            Menampilkan riwayat aktivitas pengguna.
        </p>

        <a href="{{ route('admin.report.activity') }}"
           class="inline-flex items-center px-4 py-2 text-sm font-medium
                  text-white bg-indigo-600 rounded-lg
                  hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300">
            Lihat Laporan
        </a>
    </div>

</div>

@endsection
