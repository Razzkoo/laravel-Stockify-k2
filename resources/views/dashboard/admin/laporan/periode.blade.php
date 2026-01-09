@extends('layouts.dashboard')

@section('title', 'Laporan Stok Barang')

@section('content')

<!-- HEADER -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">
        Laporan Stok Barang
    </h1>

    <div class="flex gap-2">
        <a href="/dashboard/admin/laporan"
           class="px-4 py-2 text-sm font-medium text-white bg-indigo-500 rounded-lg hover:bg-indigo-600">
            Kembali
        </a>
        <button class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg">
            Export Excel
        </button>
    </div>
</div>

<!-- FILTER -->
<div class="bg-white rounded-xl shadow p-6 mb-6">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

        <div>
            <label class="text-sm text-gray-600">Periode Stok</label>
            <input type="date" class="mt-1 w-full border-gray-300 rounded-lg text-sm">
        </div>

        <div>
            <label class="text-sm text-gray-600">Kategori</label>
            <select class="mt-1 w-full border-gray-300 rounded-lg text-sm">
                <option>Semua Kategori</option>
                <option>Sembako</option>
                <option>Minuman</option>
                <option>ATK</option>
            </select>
        </div>

        <div class="flex items-end">
            <button class="w-full px-4 py-2 bg-indigo-600 text-white rounded-lg">
                Tampilkan
            </button>
        </div>

    </div>
</div>

<!-- RINGKASAN -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <div class="bg-white rounded-xl shadow p-5">
        <p class="text-sm text-gray-500">Total Produk</p>
        <h3 class="text-2xl font-semibold">120</h3>
    </div>
    <div class="bg-white rounded-xl shadow p-5">
        <p class="text-sm text-gray-500">Total Stok</p>
        <h3 class="text-2xl font-semibold text-indigo-600">3.250</h3>
    </div>
    <div class="bg-white rounded-xl shadow p-5">
        <p class="text-sm text-gray-500">Stok Menipis</p>
        <h3 class="text-2xl font-semibold text-red-600">8</h3>
    </div>
</div>

<!-- TABEL STOK -->
<div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-5 py-3 text-left">Produk</th>
                <th class="px-5 py-3 text-left">Kategori</th>
                <th class="px-5 py-3 text-left">Supplier</th>
                <th class="px-5 py-3 text-center">Stok</th>
                <th class="px-5 py-3 text-center">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b hover:bg-gray-50">
                <td class="px-5 py-4 font-medium">Beras Premium</td>
                <td class="px-5 py-4">Sembako</td>
                <td class="px-5 py-4">PT Padi Kapas</td>
                <td class="px-5 py-4 text-center">120</td>
                <td class="px-5 py-4 text-center">
                    <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">
                        Aman
                    </span>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
