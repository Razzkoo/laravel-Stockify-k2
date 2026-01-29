@extends('dashboard.manajer.layout')

@section('title', 'Laporan Stok Barang')

@section('content')

<div class="flex flex-col gap-4 mb-6 sm:flex-row sm:items-center sm:justify-between">
    <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">
        Laporan Stok Barang
    </h1>

    <div class="flex gap-2">
        <a href="{{ route('manajer.report.index') }}"
           class="inline-flex items-center px-4 py-2 text-sm font-medium
                  text-white bg-gray-600 rounded-lg
                  hover:bg-gray-700 focus:ring-4 focus:ring-gray-300">
            Kembali
        </a>

        <a href="{{ route('manajer.report.stok.export', request()->query()) }}"
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

    <form method="GET" action="{{ route('manajer.report.stok') }}">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Periode Stok
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
                    Kategori
                </label>
                <select name="kategori"
                        class="block w-full p-2.5 text-sm text-gray-900
                               bg-gray-50 border border-gray-300 rounded-lg
                               focus:ring-indigo-500 focus:border-indigo-500
                               dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <option value="">Semua Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ request('kategori') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
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

<!-- SUMMARY -->
<div class="grid grid-cols-1 gap-4 mb-6 md:grid-cols-3">

    <div class="p-5 bg-white border border-gray-200 rounded-lg shadow
                dark:bg-gray-800 dark:border-gray-700">
        <p class="text-sm text-gray-500 dark:text-gray-400">Total Produk</p>
        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">
            {{ $totalProduk }}
        </h3>
    </div>

    <div class="p-5 bg-white border border-gray-200 rounded-lg shadow
                dark:bg-gray-800 dark:border-gray-700">
        <p class="text-sm text-gray-500 dark:text-gray-400">Total Stok</p>
        <h3 class="text-2xl font-semibold text-indigo-600">
            {{ number_format($totalStok) }}
        </h3>
    </div>

    <div class="p-5 bg-white border border-gray-200 rounded-lg shadow
                dark:bg-gray-800 dark:border-gray-700">
        <p class="text-sm text-gray-500 dark:text-gray-400">Stok Menipis</p>
        <h3 class="text-2xl font-semibold text-red-600">
            {{ $stokMenipis }}
        </h3>
    </div>

</div>

<!-- TABLE -->
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
                <th class="px-6 py-3">Supplier</th>
                <th class="px-6 py-3 text-center">Stok</th>
                <th class="px-6 py-3 text-center">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr
                class="bg-white border-b hover:bg-gray-50
                       dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                <td class="px-6 py-4">
                    {{ request('tanggal')
                        ? \Carbon\Carbon::parse(request('tanggal'))->format('d-m-Y')
                        : now()->format('d-m-Y') }}
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                    {{ $product->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $product->category?->name ?? '-' }}
                </td>
                <td class="px-6 py-4">
                    {{ $product->supplier?->name ?? '-' }}
                </td>
                <td class="px-6 py-4 text-center font-semibold">
                    {{ $product->stock }}
                </td>
                <td class="px-6 py-4 text-center">
                    @if ($product->stock < 10)
                        <span
                            class="inline-flex items-center px-2 py-1 text-xs font-semibold
                                text-red-700 bg-red-100 rounded-lg
                                dark:bg-red-900 dark:text-red-300">
                            Menipis
                        </span>
                    @else
                        <span
                            class="inline-flex items-center px-2 py-1 text-xs font-semibold
                                text-green-700 bg-green-100 rounded-lg
                                dark:bg-green-900 dark:text-green-300">
                            Aman
                        </span>
                    @endif
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
@endsection
