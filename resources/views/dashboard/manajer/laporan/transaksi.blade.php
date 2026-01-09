@extends('layouts.dashboard')

@section('title', 'Laporan Transaksi')

@section('content')

<!-- HEADER -->
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">
        Laporan Transaksi Barang
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
    <!-- FILTER -->
    <div class="bg-white rounded-xl shadow p-4 grid grid-cols-1 md:grid-cols-4 gap-4">
        <div>
            <label class="text-sm text-gray-600">Dari Tanggal</label>
            <input type="date" class="w-full mt-1 border rounded-lg px-3 py-2 text-sm">
        </div>

        <div>
            <label class="text-sm text-gray-600">Sampai Tanggal</label>
            <input type="date" class="w-full mt-1 border rounded-lg px-3 py-2 text-sm">
        </div>

        <div>
            <label class="text-sm text-gray-600">Jenis</label>
            <select class="w-full mt-1 border rounded-lg px-3 py-2 text-sm">
                <option>Semua</option>
                <option>Barang Masuk</option>
                <option>Barang Keluar</option>
            </select>
        </div>

        <div class="flex items-end">
            <button class="w-full bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm">
                Tampilkan
            </button>
        </div>
    </div>

    <!-- TABEL -->
    <div class="bg-white rounded-xl shadow p-6">
        <table class="w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-center">Tanggal</th>
                    <th class="px-4 py-3 text-center">Produk</th>
                    <th class="px-4 py-3 text-center">Jenis</th>
                    <th class="px-4 py-3 text-center">Qty</th>
                    <th class="px-4 py-3 text-center">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="px-4 py-3 text-center">2025-01-10</td>
                    <td class="px-4 py-3 text-center">Beras Premium</td>
                    <td class="px-4 py-3 text-center text-green-600">Masuk</td>
                    <td class="px-4 py-3 text-center">+20</td>
                    <td class="px-4 py-3 text-center">Restock supplier</td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
