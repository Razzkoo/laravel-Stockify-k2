@extends('layouts.dashboard')

@section('title', 'Riwayat Transaksi Stok')

@section('content')

<!-- HEADER -->
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-2xl font-semibold text-gray-800">
            Riwayat Transaksi Stok
        </h1>
        <p class="text-sm text-gray-500">
            Catatan barang masuk dan keluar gudang
        </p>
    </div>

</div>

<!-- CARD TABLE -->
<div class="bg-white rounded-xl shadow overflow-hidden">

    <table class="w-full text-sm">
        <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="px-5 py-3 text-left">Produk</th>
                <th class="px-5 py-3 text-center">Tipe</th>
                <th class="px-5 py-3 text-center">Jumlah</th>
                <th class="px-5 py-3 text-center">Tanggal</th>
                <th class="px-5 py-3 text-center">Keterangan</th>
            </tr>
        </thead>

        <tbody>

            <!-- BARANG MASUK -->
            <tr class="border-b hover:bg-gray-50">
                <td class="px-5 py-4">
                    <div class="font-medium text-gray-800">
                        Beras Premium
                    </div>
                    <div class="text-xs text-gray-400">
                        Kode: BRG-001
                    </div>
                </td>

                <td class="px-5 py-4 text-center">
                    <span class="px-3 py-1 text-xs rounded-full
                        bg-green-100 text-green-700">
                        Barang Masuk
                    </span>
                </td>

                <td class="px-5 py-4 text-center text-green-600 font-semibold">
                    +20
                </td>

                <td class="px-5 py-4 text-center">
                    10 Jan 2025
                </td>

                <td class="px-5 py-4 text-center">
                    Restock gudang utama
                </td>
            </tr>

            <!-- BARANG KELUAR -->
            <tr class="border-b hover:bg-gray-50">
                <td class="px-5 py-4">
                    <div class="font-medium text-gray-800">
                        Beras Premium
                    </div>
                    <div class="text-xs text-gray-400">
                        Kode: BRG-001
                    </div>
                </td>

                <td class="px-5 py-4 text-center">
                    <span class="px-3 py-1 text-xs rounded-full
                        bg-red-100 text-red-700">
                        Barang Keluar
                    </span>
                </td>

                <td class="px-5 py-4 text-center text-red-600 font-semibold">
                    -5
                </td>

                <td class="px-5 py-4 text-center">
                    11 Jan 2025
                </td>

                <td class="px-5 py-4 text-center">
                    Distribusi ke toko cabang
                </td>
            </tr>

        </tbody>
    </table>

</div>

@endsection
