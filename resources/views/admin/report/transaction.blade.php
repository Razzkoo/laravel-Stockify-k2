@extends('dashboard.admin.layout')

@section('title', 'Laporan Transaksi Barang')

@section('content')

<div class="flex flex-col gap-4 mb-6 sm:flex-row sm:items-center sm:justify-between">
    <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">
        Laporan Transaksi Barang
    </h1>
    <div class="flex gap-2">
        <a href="{{ route('admin.report.index') }}"
           class="inline-flex items-center px-4 py-2 text-sm font-medium
                  text-white bg-gray-600 rounded-lg
                  hover:bg-gray-700 focus:ring-4 focus:ring-gray-300">
            Kembali
        </a>
        <a href="{{ route('admin.report.transaction.export', ['tanggal' => request('tanggal'), 'jenis' => request('jenis')]) }}"
            class="inline-flex items-center px-4 py-2 text-sm font-medium
                    text-white bg-green-600 rounded-lg
                    hover:bg-green-700 focus:ring-4 focus:ring-green-300">
                Export Excel
        </a>
    </div>
</div>

<!-- FILTER -->
<div class="p-6 mb-6 bg-white border border-gray-200 rounded-lg shadow
            dark:bg-gray-800 dark:border-gray-700">
    <form method="GET" action="{{ route('admin.report.transaction') }}">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Periode
                </label>
                <input type="date"
                       name="tanggal"
                       value="{{ request('tanggal') }}"
                       class="block w-full p-2.5 text-sm text-gray-900
                              bg-gray-50 border border-gray-300 rounded-lg
                              focus:ring-indigo-500 focus:border-indigo-500
                              dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Jenis Transaksi
                </label>
                <select name="jenis"
                        class="block w-full p-2.5 text-sm text-gray-900
                               bg-gray-50 border border-gray-300 rounded-lg
                               focus:ring-indigo-500 focus:border-indigo-500
                               dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <option value="">Semua Transaksi</option>
                    <option value="masuk" {{ request('jenis') == 'masuk' ? 'selected' : '' }}>Barang Masuk</option>
                    <option value="keluar" {{ request('jenis') == 'keluar' ? 'selected' : '' }}>Barang Keluar</option>
                </select>
            </div>
            <div class="flex items-end">
                <button
                    class="w-full px-4 py-2 text-sm font-medium
                           text-white bg-indigo-600 rounded-lg
                           hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300">
                    Tampilkan
                </button>
            </div>
        </div>
    </form>
</div>

<div class="overflow-x-auto bg-white border border-gray-200 rounded-lg shadow
            dark:bg-gray-800 dark:border-gray-700">
    <table class="w-full text-sm text-left text-gray-600 dark:text-gray-300">
        <thead
            class="text-xs text-gray-700 uppercase bg-gray-100
                   dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="px-6 py-3">Tanggal</th>
                <th class="px-6 py-3">Produk</th>
                <th class="px-6 py-3">Kategori</th>
                <th class="px-6 py-3 text-center">Jenis</th>
                <th class="px-6 py-3 text-center">Jumlah</th>
                <th class="px-6 py-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transactions as $trx)
            <tr
                class="bg-white border-b hover:bg-gray-50
                       dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700"
                       data-tanggal="{{ $trx->date->format('d-m-Y') }}"
                        data-produk="{{ $trx->product?->name ?? '-' }}"
                        data-kategori="{{ $trx->product?->category?->name ?? '-' }}"
                        data-type="{{ $trx->type }}"
                        data-jumlah="{{ $trx->quantity }}"
                        data-notes="{{ $trx->notes ?? '-' }}">
            
                <td class="px-6 py-4">
                    {{ $trx->date->format('d-m-Y') }}
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                    {{ $trx->product?->name ?? '-' }}
                </td>
                <td class="px-6 py-4">
                    {{ $trx->product?->category?->name ?? '-' }}
                </td>
                <td class="px-6 py-4 text-center">
                    @if($trx->type === 'masuk')
                        <span class="inline-flex items-center px-2 py-1 text-xs font-semibold
                                     text-green-700 bg-green-100 rounded-lg
                                     dark:bg-green-900 dark:text-green-300">
                            Masuk
                        </span>
                    @else
                        <span class="inline-flex items-center px-2 py-1 text-xs font-semibold
                                     text-red-700 bg-red-100 rounded-lg
                                     dark:bg-red-900 dark:text-red-300">
                            Keluar
                        </span>
                    @endif
                </td>
                <td class="px-6 py-4 text-center font-semibold
                           {{ $trx->type === 'masuk' ? 'text-green-600' : 'text-red-600' }}">
                    {{ $trx->type === 'masuk' ? '+' : '-' }}{{ $trx->quantity }}
                </td>
                <td class="px-6 py-4 text-center space-x-1">
                        <button
                            onclick="openDetail(this)"
                            data-modal-target="detailModal"
                            data-modal-toggle="detailModal"
                            class="text-white bg-sky-600 hover:bg-sky-700
                                font-medium rounded-lg text-xs px-3 py-1.5">
                            Detail
                        </button>
                    </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                    Data tidak ditemukan
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
<!--MODAL TRANSAKSI-->
<div id="detailModal"
     tabindex="-1"
     class="fixed inset-0 z-50 hidden flex items-center justify-center
            bg-black/40 backdrop-blur-sm">
    <div class="relative w-full max-w-md mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg">
            <div class="flex items-center justify-between px-6 py-4
                        border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Detail Transaksi Barang
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
                    <span class="text-gray-500">Produk</span>
                    <span id="detail-produk" class="font-medium text-gray-900 dark:text-white">-</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Kategori</span>
                    <span id="detail-kategori" class="dark:text-white">-</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Jenis</span>
                    <span id="detail-jenis" class="px-3 py-1 text-xs font-semibold rounded-full">-</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Jumlah</span>
                    <span id="detail-jumlah" class="dark:text-white">-</span>
                </div>
                <div>
                    <span class="text-gray-500">Catatan</span>
                    <p id="detail-notes" class="mt-1 text-gray-900 dark:text-white text-sm">
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

<script>
function openDetail(button) {
    const row = button.closest('tr')
    const type = row.dataset.type
    const typeEl = document.getElementById('detail-jenis')

    const rawNotes = row.dataset.notes || '-'
    let userNotes = rawNotes
        .split('\n')
        .find(line => !line.trim().startsWith('['))

    if (!userNotes || userNotes.trim() === '') {
        userNotes = '-'
    }

    document.getElementById('detail-tanggal').textContent = row.dataset.tanggal
    document.getElementById('detail-produk').textContent = row.dataset.produk
    document.getElementById('detail-kategori').textContent = row.dataset.kategori || '-'
    document.getElementById('detail-jumlah').textContent = row.dataset.jumlah
    document.getElementById('detail-notes').textContent = userNotes

    typeEl.className = 'px-3 py-1 text-xs font-semibold rounded-full'

    if (type === 'masuk') {
        typeEl.textContent = 'Masuk'
        typeEl.classList.add(
            'bg-green-100', 'text-green-700',
            'dark:bg-green-900', 'dark:text-green-300'
        )
    } else if (type === 'keluar') {
        typeEl.textContent = 'Keluar'
        typeEl.classList.add(
            'bg-red-100', 'text-red-700',
            'dark:bg-red-900', 'dark:text-red-300'
        )
    } else {
        typeEl.textContent = type || '-'
        typeEl.classList.add(
            'bg-gray-100', 'text-gray-800',
            'dark:bg-gray-700', 'dark:text-gray-300'
        )
    }
}
</script>
@endsection
