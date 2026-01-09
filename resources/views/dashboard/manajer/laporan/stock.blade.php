@extends('layouts.dashboard')

@section('title', 'Laporan Stok')

@section('content')

<!-- HEADER -->
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">
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

    <!-- FILTER -->
    <div class="bg-white rounded-xl shadow p-4 grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <label class="text-sm text-gray-600">Periode</label>
            <input type="month" class="w-full mt-1 border rounded-lg px-3 py-2 text-sm">
        </div>

        <div>
            <label class="text-sm text-gray-600">Kategori</label>
            <select class="w-full mt-1 border rounded-lg px-3 py-2 text-sm">
                <option>Semua Kategori</option>
            </select>
        </div>

        <div class="flex items-end">
            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm">
                Tampilkan
            </button>
        </div>
    </div>

    <!-- TABEL -->
    <div class="bg-white rounded-xl shadow p-6">
        <table class="w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left">Produk</th>
                    <th class="px-4 py-3">Kategori</th>
                    <th class="px-4 py-3">Stok</th>
                    <th class="px-4 py-3">Minimum</th>
                    <th class="px-4 py-3">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="px-4 py-3">Beras Premium</td>
                    <td class="px-4 py-3 text-center">Sembako</td>
                    <td class="px-4 py-3 text-center">8</td>
                    <td class="px-4 py-3 text-center">10</td>
                    <td class="px-4 py-3 text-center text-red-600 font-medium">
                        Di bawah minimum
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
