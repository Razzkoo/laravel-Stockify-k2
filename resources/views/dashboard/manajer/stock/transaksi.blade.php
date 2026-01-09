@extends('layouts.dashboard')

@section('title', 'Tambah Transaksi')

@section('content')

<!-- HEADER -->
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-semibold text-gray-800">
            Tambah Transaksi Stok
        </h1>
        <p class="text-sm text-gray-500">
            Catat barang masuk atau keluar
        </p>
    </div>
</div>

<!-- FORM -->
<div class="bg-white rounded-lg shadow max-w-3xl">
    <form class="p-6 space-y-5">

        <!-- Produk -->
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">
                Produk
            </label>
            <select
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                <option selected disabled>-- Pilih Produk --</option>
                <option>Beras Premium</option>
                <option>Gula Pasir</option>
                <option>Minyak Goreng</option>
            </select>
        </div>

        <!-- Tipe Transaksi -->
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">
                Tipe Transaksi
            </label>
            <div class="flex gap-6 mt-2">
                <label class="flex items-center gap-2 text-sm">
                    <input type="radio" name="type" class="text-green-600">
                    <span class="text-green-600 font-medium">Barang Masuk</span>
                </label>

                <label class="flex items-center gap-2 text-sm">
                    <input type="radio" name="type" class="text-red-600">
                    <span class="text-red-600 font-medium">Barang Keluar</span>
                </label>
            </div>
        </div>

        <!-- Quantity & Tanggal -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">
                    Quantity
                </label>
                <input
                    type="number"
                    placeholder="Contoh: 10"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">
                    Tanggal
                </label>
                <input
                    type="date"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>
        </div>

        <!-- Status -->
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">
                Status
            </label>
            <select
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <option selected disabled>-- Pilih Status --</option>
                <option>Selesai</option>
                <option>Disetujui</option>
                <option>Menunggu</option>
            </select>
        </div>

        <!-- Catatan -->
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">
                Catatan
            </label>
            <textarea
                rows="3"
                placeholder="Contoh: Restock dari supplier"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
        </div>

        <!-- BUTTON -->
        <div class="flex justify-end gap-3 pt-4 border-t">
            <a href="/dashboard/admin/stock"
               class="px-4 py-2 text-sm bg-gray-100 rounded-lg hover:bg-gray-200">
                Batal
            </a>

            <button
                type="submit"
                class="px-5 py-2 text-sm font-medium text-white bg-indigo-400 rounded-lg hover:bg-indigo-600">
                Simpan Transaksi
            </button>
        </div>

    </form>
</div>

@endsection
