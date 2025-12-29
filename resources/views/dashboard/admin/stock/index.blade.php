@extends('layouts.dashboard')

@section('title', 'Stok Barang')

@section('content')

<!-- Header -->
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-semibold text-gray-800">Stok Barang</h1>
        <p class="text-sm text-gray-500">
            Riwayat barang masuk dan keluar
        </p>
    </div>

    <a href="/dashboard/admin/stock/create"
       class="px-4 py-2 text-sm bg-indigo-600 text-white rounded hover:bg-indigo-700">
        + Tambah Transaksi
    </a>
</div>

<!-- Table -->
<div class="bg-white p-4 rounded-lg shadow max-w-5xl">
    <table class="w-full text-sm text-left">
        <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="px-4 py-3">Produk</th>
                <th class="px-4 py-3">User</th>
                <th class="px-4 py-3">Tipe</th>
                <th class="px-4 py-3">Qty</th>
                <th class="px-4 py-3">Tanggal</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Catatan</th>
            </tr>
        </thead>

        <tbody>
            <!-- MASUK -->
            <tr class="border-b">
                <td class="px-4 py-3">Beras Premium</td>
                <td class="px-4 py-3">Admin</td>
                <td class="px-4 py-3">
                    <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-600">
                        Masuk
                    </span>
                </td>
                <td class="px-4 py-3 text-green-600 font-medium">
                    +20
                </td>
                <td class="px-4 py-3">2025-01-10</td>
                <td class="px-4 py-3">
                    <span class="text-xs px-2 py-1 rounded bg-blue-100 text-blue-600">
                        Selesai
                    </span>
                </td>
                <td class="px-4 py-3 text-gray-500">
                    Restock gudang
                </td>
            </tr>

            <!-- KELUAR -->
            <tr class="border-b">
                <td class="px-4 py-3">Beras Premium</td>
                <td class="px-4 py-3">Kasir</td>
                <td class="px-4 py-3">
                    <span class="px-2 py-1 text-xs rounded bg-red-100 text-red-600">
                        Keluar
                    </span>
                </td>
                <td class="px-4 py-3 text-red-600 font-medium">
                    -5
                </td>
                <td class="px-4 py-3">2025-01-11</td>
                <td class="px-4 py-3">
                    <span class="text-xs px-2 py-1 rounded bg-gray-100 text-gray-600">
                        Disetujui
                    </span>
                </td>
                <td class="px-4 py-3 text-gray-500">
                    Penjualan toko
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
