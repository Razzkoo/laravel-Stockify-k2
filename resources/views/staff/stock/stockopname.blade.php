@extends('dashboard.staff.layout')

@section('title', 'Konfirmasi Masuk - Staff')

@section('content')
<div class="p-6 space-y-8">

    <div>
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">
            Konfirmasi Barang Masuk
        </h1>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            Menghitung jumlah barang yang masuk dan konfirmasi
        </p>
    </div>

    <!-- SUMMARY -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="p-5 bg-white border rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <p class="text-sm text-gray-500 dark:text-gray-400">Produk Dicek</p>
            <p class="mt-2 text-2xl font-semibold text-gray-900 dark:text-white">{{ $totalProducts }}</p>
        </div>
        <div class="p-5 bg-white border rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <p class="text-sm text-gray-500 dark:text-gray-400">Menunggu Konfirmasi</p>
            <p class="mt-2 text-2xl font-semibold text-amber-600 dark:text-amber-400">{{ $totalPending }}</p>
        </div>
        <div class="p-5 bg-white border rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <p class="text-sm text-gray-500 dark:text-gray-400">Sudah Dicek</p>
            <p class="mt-2 text-2xl font-semibold text-green-600 dark:text-green-400">{{ $totalChecked }}</p>
        </div>
    </div>

    <!-- TABLE -->
    <div class="bg-white border rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 p-6">
        <h2 class="mb-4 font-semibold text-gray-900 dark:text-white">
            Daftar Barang Masuk
        </h2>

        <div class="relative overflow-x-auto border rounded-lg dark:border-gray-700">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-300">
                    <tr>
                        <th class="px-6 py-3">Supplier</th>
                        <th class="px-6 py-3">Produk</th>
                        <th class="px-6 py-3">SKU</th>
                        <th class="px-6 py-3 text-center">Stok Sistem</th>
                        <th class="px-6 py-3 text-center">Stok Fisik</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($transactions as $transaction)
                    <tr class="bg-white border-t dark:bg-gray-800 dark:border-gray-700">
                        <form action="{{ route('staff.stock.stockopname.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">

                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                {{ $transaction->product->supplier->name ?? 'N/A' }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                {{ $transaction->product->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $transaction->product->sku ?? 'N/A' }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ $transaction->quantity }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <input
                                    type="number"
                                    name="physical_stock"
                                    value="{{ $transaction->system_stock + $transaction->quantity }}"
                                    min="0"
                                    required
                                    class="w-20 text-center border rounded-md px-2 py-1
                                        dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                />
                            </td>
                            <td class="px-6 py-4 text-center">
                                <button type="submit"
                                    class="px-3 py-1.5 text-xs font-medium text-white
                                           bg-emerald-600 rounded-lg
                                           hover:bg-emerald-700
                                           focus:ring-4 focus:ring-emerald-300">
                                    Konfirmasi
                                </button>
                            </td>
                        </form>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                            Tidak ada transaksi yang perlu dicek.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
