@extends('dashboard.admin.layout')

@section('title', 'Transaksi Keluar')

@section('content')
<div class="p-6 space-y-8">
    
    <div>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
            Transaksi Keluar
        </h1>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            Riwayat transaksi barang keluar
        </p>
    </div>
    <!-- SUMMARY -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Produk</p>
            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">
                {{ $totalProducts }}
            </p>
        </div>

        <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Barang Masuk Hari Ini</p>
            <p class="text-2xl font-bold text-green-600 mt-2">
                {{ $masukToday }}
            </p>
        </div>

        <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Barang Keluar Hari Ini</p>
            <p class="text-2xl font-bold text-red-600 mt-2">
                {{ $keluarToday }}
            </p>
        </div>

        <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Menunggu Konfirmasi</p>
            <p class="text-2xl font-bold text-yellow-600 mt-2">
                {{ $menungguKonfirmasi }}
            </p>
        </div>
    </div>
    <!-- TABLE -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">Tanggal Keluar</th>
                    <th class="px-6 py-3">Supplier</th>
                    <th class="px-6 py-3">Produk</th>
                    <th class="px-6 py-3">SKU</th>
                    <th class="px-6 py-3 text-center">Jumlah</th>
                    <th class="px-6 py-3 text-center">Status</th>
                </tr>
            </thead>
            <tbody>
            @forelse($transactions as $transaction)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700
                           hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                        {{ \Carbon\Carbon::parse($transaction->date)->format('d M Y') }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $transaction->product->supplier->name ?? 'N/A' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $transaction->product->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $transaction->product->sku ?? 'N/A' }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{ $transaction->quantity }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if($transaction->status === 'pending')
                            <span class="bg-orange-100 text-orange-800 text-xs font-medium px-2.5 py-0.5 rounded
                                        dark:bg-orange-900 dark:text-orange-300">
                                Pending
                            </span>
                        @elseif($transaction->status === 'diterima')
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded
                                        dark:bg-blue-900 dark:text-blue-300">
                                Diterima
                            </span>
                        @elseif($transaction->status === 'ditolak')
                            <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded
                                        dark:bg-red-900 dark:text-red-300">
                                Ditolak
                            </span>
                        @elseif($transaction->status === 'checked_staff')
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded
                                        dark:bg-green-900 dark:text-green-300">
                                Dicek Staff
                            </span>
                        @elseif($transaction->status === 'checked_admin')
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded
                                        dark:bg-green-900 dark:text-green-300">
                                Dicek Admin
                            </span>
                        @else
                            <span class="bg-orange-100 text-orange-800 text-xs font-medium px-2.5 py-0.5 rounded
                                        dark:bg-orange-900 dark:text-orange-300">
                                {{ ucfirst($transaction->status) }}
                            </span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                        Tidak ada data transaksi keluar
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
