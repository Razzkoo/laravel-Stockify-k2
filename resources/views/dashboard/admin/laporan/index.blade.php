@extends('layouts.dashboard')

@section('content')

<!-- HEADER -->
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">
        Laporan Stok Barang
    </h1>

    <div class="flex gap-2">
        <button class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700">
            Export Excel
        </button>
        <button class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700">
            Export PDF
        </button>
    </div>
</div>

<!-- SUMMARY CARD -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <div class="bg-white p-5 rounded-lg shadow">
        <p class="text-sm text-gray-500">Total Barang</p>
        <p class="text-3xl font-bold text-gray-800">120</p>
    </div>

    <div class="bg-white p-5 rounded-lg shadow">
        <p class="text-sm text-gray-500">Stok Menipis</p>
        <p class="text-3xl font-bold text-yellow-500">8</p>
    </div>

    <div class="bg-white p-5 rounded-lg shadow">
        <p class="text-sm text-gray-500">Stok Habis</p>
        <p class="text-3xl font-bold text-red-500">3</p>
    </div>
</div>

<!-- FILTER -->
<div class="bg-white p-4 rounded-lg shadow mb-6">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <select class="border rounded-lg px-3 py-2 text-sm">
            <option>Semua Jenis</option>
            <option>Barang Masuk</option>
            <option>Barang Keluar</option>
        </select>

        <input type="month"
               class="border rounded-lg px-3 py-2 text-sm">

        <button class="px-4 py-2 text-sm text-white bg-indigo-500 rounded-lg hover:bg-indigo-300">
            Tampilkan
        </button>
    </div>
</div>

<!-- TABLE LAPORAN -->
<div class="bg-white rounded-lg shadow overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-600">
        <thead class="text-xs uppercase bg-gray-100 text-gray-700">
            <tr>
                <th class="px-6 py-3">Tanggal</th>
                <th class="px-6 py-3">Kode Barang</th>
                <th class="px-6 py-3">Nama Barang</th>
                <th class="px-6 py-3">Jenis</th>
                <th class="px-6 py-3">Jumlah</th>
                <th class="px-6 py-3">Keterangan</th>
            </tr>
        </thead>

        <tbody>
            <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4">01-01-2025</td>
                <td class="px-6 py-4">BRG-001</td>
                <td class="px-6 py-4">Laptop ASUS</td>
                <td class="px-6 py-4">
                    <span class="px-3 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">
                        Masuk
                    </span>
                </td>
                <td class="px-6 py-4">10</td>
                <td class="px-6 py-4">Pengadaan awal tahun</td>
            </tr>

            <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4">05-01-2025</td>
                <td class="px-6 py-4">BRG-002</td>
                <td class="px-6 py-4">Kabel LAN</td>
                <td class="px-6 py-4">
                    <span class="px-3 py-1 text-xs font-semibold text-red-700 bg-red-100 rounded-full">
                        Keluar
                    </span>
                </td>
                <td class="px-6 py-4">15</td>
                <td class="px-6 py-4">Distribusi ke divisi IT</td>
            </tr>

            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">10-01-2025</td>
                <td class="px-6 py-4">BRG-003</td>
                <td class="px-6 py-4">Mouse Logitech</td>
                <td class="px-6 py-4">
                    <span class="px-3 py-1 text-xs font-semibold text-red-700 bg-red-100 rounded-full">
                        Keluar
                    </span>
                </td>
                <td class="px-6 py-4">5</td>
                <td class="px-6 py-4">Penggantian unit rusak</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
