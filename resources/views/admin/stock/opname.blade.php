@extends('dashboard.admin.layout')

@section('title', 'Stock Opname - Admin')

@section('content')
<div class="p-6 space-y-8">

    <div>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
            Stock Opname
        </h1>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            Monitoring stok sistem dan pencocokan dengan stok fisik
        </p>
    </div>
    <!-- SUMMARY-->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 w-full">
        <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Produk</p>
            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">{{ $totalProducts }}</p>
        </div>

        <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Opname</p>
            <p class="text-2xl font-bold text-gray-600 dark:text-white mt-2">{{ $totalChecked }}</p>
        </div>

        <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Sudah Diopname</p>
            <p class="text-2xl font-semibold text-green-500 mt-2">{{ $totalWithDifference }} Produk</p>
        </div>
    </div>
    
    <div class="bg-white border rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <div class="border-b border-gray-700">
            <ul class="flex text-sm font-semibold">
                <li>
                    <button id="btn-masuk" onclick="showTransaksi('masuk')"
                        class="tab-btn tab-active">
                        Barang Masuk
                    </button>
                </li>
                <li>
                    <button id="btn-keluar" onclick="showTransaksi('keluar')"
                        class="tab-btn tab-inactive">
                        Barang Keluar
                    </button>
                </li>
            </ul>
        </div>
        <!-- TABLE MASUK -->
        <div id="view-masuk" class="p-6">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                        <tr>
                            <th class="px-6 py-3">Supplier</th>
                            <th class="px-6 py-3">Produk</th>
                            <th class="px-6 py-3">SKU</th>
                            <th class="px-6 py-3 text-center">Stok Masuk</th>
                            <th class="px-6 py-3 text-center">Stok Fisik</th>
                            <th class="px-6 py-3 text-center">Selisih</th>
                            <th class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($transactionsMasuk as $transaction)
                    @php
                        $stokSistem = $transaction->system_stock;
                        $quantity   = $transaction->quantity;
                        $stokFisik  = $transaction->physical_stock;

                        $stokSeharusnya = $stokSistem + $quantity;
                        $selisih = is_null($stokFisik) ? null : ($stokFisik - $stokSeharusnya);
                    @endphp
                    <tr class="border-t dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <td class="px-6 py-4 font-medium dark:text-white">{{ $transaction->product->supplier->name ?? 'N/A' }}</td>
                        <td class="px-6 py-4 font-medium dark:text-white">{{ $transaction->product->name }}</td>
                        <td class="px-6 py-4 font-medium dark:text-white">{{ $transaction->product->sku ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-center font-medium dark:text-white">
                            {{ $quantity }}
                        </td>
                        <td class="px-6 py-4 text-center font-medium dark:text-white">
                            {{ $stokFisik ?? '-' }}
                        </td>
                        <td class="px-6 py-4 text-center font-semibold
                            @if(!is_null($selisih))
                                {{ $selisih < 0 ? 'text-red-600' : 'text-green-600' }}
                            @endif">
                            {{ is_null($selisih) ? '-' : $selisih }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            <button
                                onclick="openModal('minimumModalMasuk', {{ $transaction->id }}, {{ $transaction->product_id }})"
                                class="px-3 py-1 text-xs bg-orange-600 text-white rounded hover:bg-orange-700">
                                Atur Stok
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                            Tidak ada transaksi masuk.
                        </td>
                    </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <!-- TABLE KELUAR -->
        <div id="view-keluar" class="hidden p-6">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                        <tr>
                            <th class="px-6 py-3">Supplier</th>
                            <th class="px-6 py-3">Produk</th>
                            <th class="px-6 py-3">SKU</th>
                            <th class="px-6 py-3 text-center">Stok Sistem</th>
                            <th class="px-6 py-3 text-center">Sisa Stok</th>
                            <th class="px-6 py-3 text-center">keluar</th>
                            <th class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($transactionsKeluar as $transaction)
                    @php
                        $stokSistem = $transaction->system_stock;
                        $quantity   = $transaction->quantity;
                        $stokFisik  = $transaction->physical_stock;

                        $stokSeharusnya = $stokSistem - $quantity;
                        $selisih = is_null($stokFisik) ? null : ($stokFisik - $quantity);
                    @endphp
                    <tr class="border-t dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <td class="px-6 py-4 font-medium dark:text-white">{{ $transaction->product->supplier->name ?? 'N/A' }}</td>
                        <td class="px-6 py-4 font-medium dark:text-white">{{ $transaction->product->name }}</td>
                        <td class="px-6 py-4 font-medium dark:text-white">{{ $transaction->product->sku ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-center font-medium dark:text-white">
                            {{ $stokSistem ?? '-' }}
                        </td>
                        <td class="px-6 py-4 text-center font-medium dark:text-white">
                            {{ $stokFisik ?? '-' }}
                        </td>
                        <td class="px-6 py-4 text-center font-medium dark:text-white">
                            {{ $quantity }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            <button
                                onclick="openModal('minimumModalMasuk', {{ $transaction->id }}, {{ $transaction->product_id }})"
                                class="px-3 py-1 text-xs bg-orange-600 text-white rounded hover:bg-orange-700">
                                Atur Stok
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                            Tidak ada transaksi masuk.
                        </td>
                    </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<!-- MODAL -->
@foreach(['Masuk','Keluar'] as $type)
<div id="minimumModal{{ $type }}"
     tabindex="-1"
     aria-hidden="true"
     class="fixed inset-0 z-50 hidden flex items-center justify-center
            bg-black/40 backdrop-blur-sm">

    <div class="relative w-full max-w-md mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg">
            <div class="flex items-center justify-between px-6 py-4
                        border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Atur Stok Minimum
                </h3>
                <button type="button"
                        onclick="closeAllModal()"
                        class="inline-flex items-center justify-center w-8 h-8
                               text-gray-400 rounded-lg
                               hover:bg-gray-100 hover:text-gray-700
                               dark:hover:bg-gray-700 dark:hover:text-white">
                    ✕
                </button>
            </div>
            <form action="{{ route('admin.stock.opname.store') }}" method="POST">
                @csrf
                <input type="hidden" name="transaction_id">
                <input type="hidden" name="product_id">
                <div class="px-6 py-5 space-y-4 text-sm">
                    <div>
                        <label class="block mb-1 text-gray-600 dark:text-gray-400">
                            Stok Minimum
                        </label>
                        <input type="number"
                               name="minimum_stock"
                               required
                               class="w-full rounded-lg border-gray-300
                                      dark:bg-gray-700 dark:border-gray-600
                                      dark:text-white focus:ring-indigo-500
                                      focus:border-indigo-500">
                    </div>
                </div>
                <div class="flex justify-end gap-3 px-6 py-4
                            border-t border-gray-200 dark:border-gray-700">
                    <button type="button"
                            onclick="closeAllModal()"
                            class="px-5 py-2 text-sm font-medium
                                   text-gray-700 bg-gray-100 rounded-lg
                                   hover:bg-gray-200
                                   dark:bg-gray-700 dark:text-white
                                   dark:hover:bg-gray-600">
                        Batal
                    </button>
                    <button type="submit"
                            class="px-5 py-2 text-sm font-medium
                                   text-white bg-indigo-600 rounded-lg
                                   hover:bg-indigo-700">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<style>
.tab-btn {
    padding: 0.75rem 1.75rem;
    border-top-left-radius: 0.75rem;
    border-top-right-radius: 0.75rem;
    font-weight: 600;
    background: transparent;
    color: #9ca3af; /* gray-400 */
    transition: all 0.2s ease;
    position: relative;
    top: 1px;
}

.tab-btn:hover {
    color: #ffffff;
}

.tab-active {
    background-color: #2563eb; /* blue-600 */
    color: #ffffff;
}

.dark .tab-btn {
    color: #9ca3af;
}

.dark .tab-btn:hover {
    color: #ffffff;
}
</style>

<script>
let currentTab = 'masuk'; // default

function showTransaksi(view) {
    currentTab = view;

    ['masuk', 'keluar'].forEach(v => {
        document.getElementById('view-' + v).classList.add('hidden');

        const btn = document.getElementById('btn-' + v);
        btn.classList.remove('tab-active');
    });

    document.getElementById('view-' + view).classList.remove('hidden');
    document.getElementById('btn-' + view).classList.add('tab-active');
}

function openModal(id, transactionId, productId) {
    const modal = document.getElementById(id);
    modal.classList.remove('hidden');
    modal.classList.add('flex');

    modal.querySelector('input[name="transaction_id"]').value = transactionId;
    modal.querySelector('input[name="product_id"]').value = productId;

    if (id.includes('Masuk')) activateTab('masuk');
    if (id.includes('Keluar')) activateTab('keluar');
}


function activateTab(tab) {
    currentTab = tab;

    ['masuk', 'keluar'].forEach(v => {
        document.getElementById('btn-' + v).classList.remove('tab-active');
    });

    document.getElementById('btn-' + tab).classList.add('tab-active');
}

function closeAllModal() {
    document.querySelectorAll('[id^="minimumModal"]').forEach(modal => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    });

    activateTab(currentTab);
}
</script>

@endsection
