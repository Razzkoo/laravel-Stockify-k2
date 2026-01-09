@extends('layouts.dashboard')

@section('title', 'Laporan Transaksi Barang')

@section('content')

<!-- HEADER -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">
        Laporan Transaksi Barang
    </h1>

    <div class="flex gap-2">
        <a href="/dashboard/admin/laporan"
           class="px-4 py-2 text-sm font-medium text-white bg-indigo-500 rounded-lg">
            Kembali
        </a>
        <button class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg">
            Export PDF
        </button>
    </div>
</div>

<!-- FILTER -->
<div class="bg-white rounded-xl shadow p-6 mb-6">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

        <div>
            <label class="text-sm text-gray-600">Tanggal Awal</label>
            <input type="date" class="mt-1 w-full border-gray-300 rounded-lg text-sm">
        </div>

        <div>
            <label class="text-sm text-gray-600">Tanggal Akhir</label>
            <input type="date" class="mt-1 w-full border-gray-300 rounded-lg text-sm">
        </div>

        <div>
            <label class="text-sm text-gray-600">Jenis Transaksi</label>
            <select class="mt-1 w-full border-gray-300 rounded-lg text-sm">
                <option>Semua</option>
                <option>Barang Masuk</option>
                <option>Barang Keluar</option>
            </select>
        </div>

        <div class="flex items-end">
            <button class="w-full px-4 py-2 bg-indigo-600 text-white rounded-lg">
                Tampilkan
            </button>
        </div>

    </div>
</div>

<!-- TABEL TRANSAKSI -->
<div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-5 py-3 text-left">Tanggal</th>
                <th class="px-5 py-3 text-left">Produk</th>
                <th class="px-5 py-3 text-left">Kategori</th>
                <th class="px-5 py-3 text-center">Jenis</th>
                <th class="px-5 py-3 text-center">Jumlah</th>
                <th class="px-5 py-3 text-left">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b hover:bg-gray-50">
                <td class="px-5 py-4">03-01-2026</td>
                <td class="px-5 py-4 font-medium">Beras Premium</td>
                <td class="px-5 py-4">Sembako</td>
                <td class="px-5 py-4 text-center">
                    <span class="text-green-600 font-semibold">Masuk</span>
                </td>
                <td class="px-5 py-4 text-center">+40</td>
                <td class="px-5 py-4">Pembelian supplier</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
