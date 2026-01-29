@extends('dashboard.manajer.layout')

@section('title', 'Stock Opname - Manajer')

@section('content')
<div class="p-6 space-y-8">

    <div>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
            Stock Opname
        </h1>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            Konfirmasi hasil Stock Opname
        </p>
    </div>

    <!-- SUMMARY -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 w-full">
        <div class="p-5 bg-white border rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <p class="text-sm text-gray-500">Total Produk</p>
            <p class="mt-2 text-2xl font-semibold dark:text-white">{{ $totalProducts }}</p>
        </div>
        <div class="p-5 bg-white border rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <p class="text-sm text-gray-500">Diopname</p>
            <p class="mt-2 text-2xl font-semibold text-green-600">{{ $totalChecked }}</p>
        </div>
        <div class="p-5 bg-white border rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <p class="text-sm text-gray-500">Sudah Disetujui</p>
            <p class="mt-2 text-2xl font-semibold text-green-500">{{ $totalApproved }} Produk</p>
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
                            <th class="px-6 py-3 text-center">Hasil Opname</th>
                            <th class="px-6 py-3 text-center">Selisih</th>
                            <th class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($transactionsMasuk as $trx)
                        @php
                            $stokSistem = $trx->product->stock;
                            $stokFisik  = $trx->physical_stock;
                            $stokSeharusnya = $stokSistem + $trx->quantity;
                            $selisih = is_null($stokFisik) ? null : ($stokFisik - $stokSeharusnya);
                        @endphp
                        <tr class="border-t dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-6 py-4 font-medium dark:text-white">{{ $trx->product->supplier->name ?? 'N/A' }}</td>
                            <td class="px-6 py-4 font-medium dark:text-white">
                                {{ $trx->product->name }}
                            </td>
                            <td class="px-6 py-4 font-medium dark:text-white">
                                {{ $trx->product->sku }}
                            </td>
                            <td class="px-6 py-4 text-center dark:text-white">
                                {{ $stokSeharusnya }}
                            </td>

                            <td class="px-6 py-4 text-center dark:text-white">
                                {{ $stokFisik ?? '-' }}
                            </td>

                            <td class="px-6 py-4 text-center font-semibold
                                {{ $selisih < 0 ? 'text-red-600' : 'text-green-600' }}">
                                {{ $stokFisik !== null ? $selisih : '-' }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="inline-flex gap-2">
                                    <form action="{{ route('manajer.stock.approve') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="transaction_id" value="{{ $trx->id }}">
                                        <button
                                            type="submit"
                                            class="px-3 py-1 text-xs font-medium text-white bg-green-600 rounded hover:bg-green-700">
                                            Setujui
                                        </button>
                                    </form>
                                    <button
                                        type="button"
                                        onclick="openRejectModal({{ $trx->id }})"
                                        class="px-3 py-1 text-xs font-medium text-white bg-red-600 rounded hover:bg-red-700">
                                        Tolak
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-gray-500">
                            Tidak ada data
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
                            <th class="px-6 py-3 text-center">Stok Diatur</th>
                            <th class="px-6 py-3 text-center">Keluar</th>
                            <th class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($transactionsKeluar as $trx)
                        @php
                            $stokSistem = $trx->product->stock;
                            $quantity   = $trx->quantity;
                            $stokFisik  = $trx->physical_stock;
                            $stokSeharusnya = $stokSistem - $trx->quantity;
                            $selisih = is_null($stokFisik) ? null : ($stokFisik - $stokSeharusnya);
                        @endphp
                        <tr class="border-t dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-6 py-4 font-medium dark:text-white">{{ $trx->product->supplier->name ?? 'N/A' }}</td>
                            <td class="px-6 py-4 font-medium dark:text-white">
                                {{ $trx->product->name }}
                            </td>
                            <td class="px-6 py-4 font-medium dark:text-white">
                                {{ $trx->product->sku }}
                            </td>
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
                                <div class="inline-flex gap-2">
                                    <form action="{{ route('manajer.stock.approve') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="transaction_id" value="{{ $trx->id }}">
                                        <button
                                            type="submit"
                                            class="px-3 py-1 text-xs font-medium text-white bg-green-600 rounded hover:bg-green-700">
                                            Setujui
                                        </button>
                                    </form>
                                    <button
                                        type="button"
                                        onclick="openRejectModal({{ $trx->id }})"
                                        class="px-3 py-1 text-xs font-medium text-white bg-red-600 rounded hover:bg-red-700">
                                        Tolak
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-gray-500">
                            Tidak ada data
                        </td>
                    </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--MODAL TOLAK-->
<div id="rejectModal"
     class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm">

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg w-full max-w-md">
        <div class="flex justify-between items-center px-6 py-4 border-b dark:border-gray-700">
            <h3 class="text-lg font-semibold dark:text-white">
                Tolak Stock Opname
            </h3>
            <button onclick="closeRejectModal()"
                    class="text-gray-400 hover:text-gray-600 dark:hover:text-white">✕</button>
        </div>
        <form action="{{ route('manajer.stock.reject') }}" method="POST" class="px-6 py-5 space-y-4">
            @csrf
            <input type="hidden" name="transaction_id" id="reject_transaction_id">

            <div>
                <label class="block mb-2 text-sm font-medium dark:text-white">
                    Alasan Penolakan
                </label>
                <textarea name="notes" required rows="3"
                    class="w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    placeholder="Opsional"></textarea>
            </div>
            <div class="flex justify-end gap-2 pt-4 border-t dark:border-gray-700">
                <button type="button"
                        onclick="closeRejectModal()"
                        class="px-4 py-2 rounded-lg bg-gray-200 dark:bg-gray-700 dark:text-white">
                    Batal
                </button>
                <button type="submit"
                        class="px-4 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700">
                    Tolak
                </button>
            </div>
        </form>
    </div>
</div>

<!-- MODAL -->
@foreach(['Masuk','Keluar'] as $type)
<div id="minimumModal{{ $type }}" class="fixed inset-0 hidden z-50 items-center justify-center bg-black/50">
    <div class="bg-white dark:bg-gray-800 rounded-lg w-full max-w-md p-6">
        <h3 class="mb-4 text-lg font-semibold dark:text-white">
            Atur Stok Minimum (Barang {{ $type }})
        </h3>
        <form>
            <label class="block mb-2 text-sm">Produk</label>
            <select class="w-full mb-4 rounded-lg border-gray-300 dark:bg-gray-700 dark:border-gray-600">
                <option>Produk Contoh</option>
            </select>

            <label class="block mb-2 text-sm">Stok Minimum</label>
            <input type="number"
                class="w-full mb-6 rounded-lg border-gray-300 dark:bg-gray-700 dark:border-gray-600">

            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeAllModal()" class="px-4 py-2 border rounded-lg">
                    Batal
                </button>
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg">
                    Simpan
                </button>
            </div>
        </form>
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
function openRejectModal(id) {
    document.getElementById('reject_transaction_id').value = id
    document.getElementById('rejectModal').classList.remove('hidden')
}

function closeRejectModal() {
    document.getElementById('rejectModal').classList.add('hidden')
}
</script>

<script>
let currentTab = 'masuk';

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

function openModal(id) {
    const modal = document.getElementById(id);
    modal.classList.remove('hidden');
    modal.classList.add('flex');

    if (id.includes('Masuk')) {
        activateTab('masuk');
    } else if (id.includes('Keluar')) {
        activateTab('keluar');
    }
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
