@extends('layouts.dashboard')

@section('title', 'Laporan Manajer')

@section('content')
<div class="p-6 space-y-6">

    <!-- HEADER -->
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Laporan</h1>
        <p class="text-sm text-gray-500">
            Ringkasan laporan stok dan transaksi barang
        </p>
    </div>

    <!-- CARD MENU -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- LAPORAN STOK -->
        <div class="bg-white rounded-xl shadow p-6 flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between mb-4">
                    <span class="p-2 bg-blue-100 text-blue-600 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 2.994v2.25m10.5-2.25v2.25m-14.252 13.5V7.491a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v11.251m-18 0a2.25 2.25 0 0 0 2.25 2.25h13.5a2.25 2.25 0 0 0 2.25-2.25m-18 0v-7.5a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v7.5m-6.75-6h2.25m-9 2.25h4.5m.002-2.25h.005v.006H12v-.006Zm-.001 4.5h.006v.006h-.006v-.005Zm-2.25.001h.005v.006H9.75v-.006Zm-2.25 0h.005v.005h-.006v-.005Zm6.75-2.247h.005v.005h-.005v-.005Zm0 2.247h.006v.006h-.006v-.006Zm2.25-2.248h.006V15H16.5v-.005Z" />
</svg>
</span>
                    <span class="text-xs bg-blue-50 text-blue-600 px-3 py-1 rounded-full">
                        STOK
                    </span>
                </div>

                <h3 class="text-lg font-semibold text-gray-800">
                    Laporan Stok Barang
                </h3>
                <p class="text-sm text-gray-500 mt-1">
                    Laporan stok per periode dan kategori
                </p>
            </div>

            <a href="/dashboard/manajer/laporan/stock"
               class="mt-4 bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg text-center">
                Lihat Laporan Stock
            </a>
        </div>

        <!-- LAPORAN TRANSAKSI -->
        <div class="bg-white rounded-xl shadow p-6 flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between mb-4">
                    <span class="p-2 bg-green-100 text-green-600 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
</svg>
</span>
                    <span class="text-xs bg-green-50 text-green-600 px-3 py-1 rounded-full">
                        TRANSAKSI
                    </span>
                </div>

                <h3 class="text-lg font-semibold text-gray-800">
                    Laporan Transaksi
                </h3>
                <p class="text-sm text-gray-500 mt-1">
                    Barang masuk dan keluar
                </p>
            </div>

            <a href="/dashboard/manajer/laporan/transaksi"
               class="mt-4 bg-green-600 hover:bg-green-700 text-white text-sm px-4 py-2 rounded-lg text-center">
                Lihat Laporan Transaksi
            </a>
        </div>

    </div>
</div>
@endsection
