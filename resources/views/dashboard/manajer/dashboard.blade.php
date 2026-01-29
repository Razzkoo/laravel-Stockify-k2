@extends('dashboard.manajer.layout')

@section('title', 'Dashboard Manajer')

@section('content')

<div class="space-y-8">

    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700
                rounded-xl p-6 shadow-sm">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">
                    Dashboard Manajer
                </h1>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Ringkasan kondisi stok dan aktivitas barang hari ini
                </p>
            </div>
            <div class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span>{{ date('l, d M Y') }}</span>
            </div>

        </div>
    </div>

    <!-- ================= SUMMARY ================= -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700
                    rounded-xl p-6 shadow-sm hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <p class="text-sm text-gray-500 dark:text-gray-400">Stok Menipis</p>
                <span class="p-2 rounded-lg bg-orange-100 text-orange-600 dark:bg-orange-900 dark:text-orange-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                    </svg>
                </span>
            </div>

            <h2 class="mt-3 text-4xl font-bold text-orange-600">
                {{ $stokMenipis }}
            </h2>
            <p class="mt-1 text-xs text-gray-400">
                Barang perlu segera ditindaklanjuti
            </p>
        </div>
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700
                    rounded-xl p-6 shadow-sm hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <p class="text-sm text-gray-500 dark:text-gray-400">Barang Masuk Hari Ini</p>
                <span class="p-2 rounded-lg bg-green-100 text-green-600 dark:bg-green-900 dark:text-green-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25 12 21m0 0-3.75-3.75M12 21V3" />
                    </svg>
                </span>
            </div>
            <h2 class="mt-3 text-4xl font-bold text-green-600">
                {{ $barangMasukHariIni }}
            </h2>
            <p class="mt-1 text-xs text-gray-400">
                Transaksi barang masuk
            </p>
        </div>
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700
                    rounded-xl p-6 shadow-sm hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <p class="text-sm text-gray-500 dark:text-gray-400">Barang Keluar Hari Ini</p>
                <span class="p-2 rounded-lg bg-red-100 text-red-600 dark:bg-red-900 dark:text-red-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75 12 3m0 0 3.75 3.75M12 3v18" />
                    </svg>
                </span>
            </div>
            <h2 class="mt-3 text-4xl font-bold text-red-600">
                {{ $barangKeluarHariIni }}
            </h2>
            <p class="mt-1 text-xs text-gray-400">
                Distribusi ke unit/divisi
            </p>
        </div>
    </div>

    <!-- ================= DETAIL ================= -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700
                    rounded-xl p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                Ringkasan Stok Barang
            </h3>

            <div class="space-y-3 text-sm">
                <div class="flex justify-between border-b pb-2 dark:border-gray-700">
                    <span class="text-gray-500">Total Produk</span>
                    <span class="font-medium text-gray-900 dark:text-white">
                        {{ $totalProduk }}
                    </span>
                </div>

                <div class="flex justify-between border-b pb-2 dark:border-gray-700">
                    <span class="text-gray-500">Total Stok</span>
                    <span class="font-medium text-green-600">
                        {{ $totalStok }}
                    </span>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700
                    rounded-xl p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                Peringatan Sistem
            </h3>
            <ul class="space-y-4 text-sm">
                @forelse ($peringatanSistem as $peringatan)

                    <li class="flex gap-3">
                        <span class="w-2 h-2 mt-2 rounded-full
                            @if($peringatan['type'] === 'warning') bg-orange-500
                            @elseif($peringatan['type'] === 'success') bg-green-500
                            @elseif($peringatan['type'] === 'danger') bg-red-500
                            @else bg-blue-500
                            @endif"></span>
                        <p class="text-gray-600 dark:text-gray-400">
                            @if($peringatan['type'] === 'warning')
                                <b class="text-orange-600">
                                    {{ $stokMenipis }}
                                </b>
                            @endif
                            {{ $peringatan['message'] }}
                        </p>
                    </li>
                @empty
                    <p class="text-sm text-gray-400">
                        Tidak ada peringatan sistem hari ini.
                    </p>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection
