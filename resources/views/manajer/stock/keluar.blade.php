@extends('dashboard.manajer.layout')

@section('title', 'Stock Keluar')

@section('content')
<div class="p-6 space-y-8">

    <div>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
            Manajemen Stok Keluar
        </h1>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            Input transaksi barang keluar
        </p>
    </div>

    <!--SUMMARY -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Produk</p>
            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">{{ $totalProducts }}</p>
        </div>
        <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Barang Masuk Hari Ini</p>
            <p class="text-2xl font-bold text-green-600 mt-2">{{ $masukToday }}</p>
        </div>
        <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Barang Keluar Hari Ini</p>
            <p class="text-2xl font-bold text-red-600 mt-2">{{ $keluarToday }}</p>
        </div>
        <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Menunggu Konfirmasi</p>
            <p class="text-2xl font-bold text-yellow-600 mt-2">{{ $menungguKonfirmasi }}</p>
        </div>
    </div>

    <!-- BARANG KELUAR -->
    <div class="bg-white rounded-lg border border-gray-200 shadow-sm dark:bg-gray-800 dark:border-gray-700 p-6 space-y-6">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
            Input Barang Keluar
        </h2>

        <form action="{{ route('manajer.stock.keluar.store') }}" method="POST" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label for="product_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Produk</label>
                    <select id="product_id" name="product_id" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                        <option value="">Pilih Produk</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah</label>
                    <input type="number" id="quantity" name="quantity" placeholder="Jumlah" required min="1"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                </div>
                <div>
                    <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                    <input type="date" id="date" name="date" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                </div>
                <div class="md:col-span-4">
                    <label for="notes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan</label>
                    <textarea id="notes" name="notes" rows="3" placeholder="Catatan (opsional)"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"></textarea>
                </div>
            </div>
            <button type="submit"
                class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                Simpan Barang Keluar
            </button>
        </form>

        <!-- TABLE -->
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-6">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Tanggal Keluar</th>
                        <th scope="col" class="px-6 py-3">Nama Supplier</th>
                        <th scope="col" class="px-6 py-3">Produk</th>
                        <th scope="col" class="px-6 py-3">SKU</th>
                        <th scope="col" class="px-6 py-3 text-center">Jumlah</th>
                        <th scope="col" class="px-6 py-3 text-center">Status Konfirmasi</th>
                        <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($transactions as $transaction)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                    data-tanggal="{{ \Carbon\Carbon::parse($transaction->date)->format('d M Y') }}"
                    data-supplier="{{ $transaction->product->supplier->name ?? '-' }}"
                    data-produk="{{ $transaction->product->name }}"
                    data-sku="{{ $transaction->product->sku ?? '-' }}"
                    data-jumlah="{{ $transaction->quantity }}"
                    data-status="{{ ucfirst($transaction->status) }}"
                    data-notes="{{ $transaction->notes ?? '-' }}">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ \Carbon\Carbon::parse($transaction->date)->format('d M Y') }}
                    </th>
                    <td class="px-6 py-4">{{ $transaction->product->supplier->name ?? 'N/A' }}</td>
                    <td class="px-6 py-4">{{ $transaction->product->name }}</td>
                    <td class="px-6 py-4">{{ $transaction->product->sku ?? 'N/A' }}</td>
                    <td class="px-6 py-4 text-center">{{ $transaction->quantity }}</td>
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
                    <td class="px-6 py-4 text-center flex justify-center gap-2">
                    <button
                        onclick="openDetail(this)"
                        data-modal-target="detailModal"
                        data-modal-toggle="detailModal"
                        class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-300">
                        <svg class="w-6 h-6 text-gray-600 dark:text-gray-400"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-width="2"
                                d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                            <path stroke="currentColor" stroke-width="2"
                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        </svg>
                    </button>
                    <button
                        onclick="openDeleteModal({{ $transaction->id }}, 'Transaksi Barang Masuk')"
                        class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                    </button>
                </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-4 text-center text-gray-500">Tidak ada data transaksi keluar.</td>
                </tr>
                @endforelse
            </tbody>
            </table>
        </div>
    </div>

</div>
<!--MODAL DETAIL-->
<div id="detailModal"
     tabindex="-1"
     class="fixed inset-0 z-50 hidden flex items-center justify-center
            bg-black/40 backdrop-blur-sm">

    <div class="relative w-full max-w-md mx-auto">

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg">
            <div class="flex items-center justify-between px-6 py-4
                        border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Detail Barang Keluar
                </h3>

                <button data-modal-hide="detailModal"
                        class="w-8 h-8 flex items-center justify-center
                               text-gray-400 hover:bg-gray-100 rounded-lg
                               dark:hover:bg-gray-700 dark:hover:text-white">
                    ✕
                </button>
            </div>

            <div class="px-6 py-5 space-y-4 text-sm">

                <div class="flex justify-between">
                    <span class="text-gray-500">Tanggal</span>
                    <span id="detail-tanggal" class="dark:text-white">-</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Supplier</span>
                    <span id="detail-supplier" class="dark:text-white">-</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Produk</span>
                    <span id="detail-produk" class="font-medium text-gray-900 dark:text-white">-</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">SKU</span>
                    <span id="detail-sku" class="dark:text-white">-</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Jumlah</span>
                    <span id="detail-jumlah" class="dark:text-white">-</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Status</span>
                    <span id="detail-status"
                        class="px-3 py-1 text-xs font-semibold rounded-full">
                        -
                    </span>
                </div>
                <div>
                    <span class="text-gray-500">Catatan</span>
                    <p id="detail-notes"
                        class="mt-1 text-gray-900 dark:text-white text-sm">
                            -
                    </p>
                </div>
            </div>

            <div class="flex justify-end px-6 py-4
                        border-t border-gray-200 dark:border-gray-700">
                <button data-modal-hide="detailModal"
                        class="px-5 py-2 text-sm font-medium
                               bg-gray-100 rounded-lg
                               dark:bg-gray-700 dark:text-white">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>

<!--MODAL HAPUS-->
<div id="deleteModal" tabindex="-1"
     class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm">

    <div class="relative w-full max-w-md mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg">

            <div class="flex items-center justify-between px-6 py-4
                        border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Hapus Transaksi?
                </h3>
                <button type="button"
                        data-modal-hide="deleteModal"
                        class="inline-flex items-center justify-center w-8 h-8
                               text-gray-400 rounded-lg
                               hover:bg-gray-100 hover:text-gray-700
                               dark:hover:bg-gray-700 dark:hover:text-white">
                    ✕
                </button>
            </div>
            <div class="px-6 py-5 space-y-4 text-sm">

                <div class="flex justify-center">
                    <div class="flex items-center justify-center w-12 h-12 mx-auto mb-4
                                bg-red-100 rounded-full dark:bg-red-900">
                        <svg class="w-6 h-6 text-red-600 dark:text-red-300"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 9v3.75m0 3.75h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>

                <p class="text-center text-gray-500 dark:text-gray-400">
                    Transaksi <span id="deleteItemName" class="font-semibold"></span>
                    akan dihapus permanen dan tidak dapat dikembalikan.
                </p>

            </div>

            <div class="flex justify-end px-6 py-4
                        border-t border-gray-200 dark:border-gray-700">
                <form id="deleteForm" method="POST" class="flex justify-center gap-3">
                    @csrf
                    @method('DELETE')

                    <button type="button"
                            data-modal-hide="deleteModal"
                            class="px-5 py-2 text-sm font-medium
                                   text-gray-700 bg-gray-100 rounded-lg
                                   hover:bg-gray-200
                                   dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
                        Batal
                    </button>

                    <button type="submit"
                            class="px-5 py-2 text-sm font-medium
                                   text-white bg-red-600 rounded-lg
                                   hover:bg-red-700 focus:ring-4 focus:ring-red-300
                                   dark:focus:ring-red-800">
                        Ya, Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
function openDetail(button) {
    const row = button.closest('tr')
    const status = row.dataset.status.toLowerCase()
    const statusEl = document.getElementById('detail-status')

    const rawNotes = row.dataset.notes || '-'
    let userNotes = rawNotes
        .split('\n')
        .find(line => !line.trim().startsWith('['))

    if (!userNotes || userNotes.trim() === '') {
        userNotes = '-'
    }

    document.getElementById('detail-tanggal').textContent = row.dataset.tanggal
    document.getElementById('detail-supplier').textContent = row.dataset.supplier
    document.getElementById('detail-produk').textContent = row.dataset.produk
    document.getElementById('detail-sku').textContent = row.dataset.sku
    document.getElementById('detail-jumlah').textContent = row.dataset.jumlah
    document.getElementById('detail-notes').textContent = userNotes

    statusEl.className = 'px-3 py-1 text-xs font-semibold rounded-full'

    if (status === 'pending') {
        statusEl.textContent = 'Pending'
        statusEl.classList.add(
            'bg-orange-100', 'text-orange-800',
            'dark:bg-orange-900', 'dark:text-orange-300'
        )
    } else if (status === 'diterima' || status.includes('checked')) {
        statusEl.textContent = row.dataset.status
        statusEl.classList.add(
            'bg-blue-100', 'text-blue-800',
            'dark:bg-blue-900', 'dark:text-blue-300'
        )
    } else {
        statusEl.textContent = row.dataset.status
        statusEl.classList.add(
            'bg-orange-100', 'text-orange-800',
            'dark:bg-orange-700', 'dark:text-orange-300'
        )
    }
}
</script>
<script>
function openDeleteModal(id, name) {
    const form = document.getElementById('deleteForm')
    const nameText = document.getElementById('deleteItemName')
    const modal = document.getElementById('deleteModal')

    nameText.textContent = name
    form.action = `/dashboard/manajer/keluar/${id}`
    modal.classList.remove('hidden')
}
document.addEventListener('click', function(event) {
    const modal = document.getElementById('deleteModal')
    if (event.target === modal || event.target.hasAttribute('data-modal-hide')) {
        modal.classList.add('hidden')
    }
})
</script>
@endsection
