@extends('layouts.dashboard')

@section('title', 'Produk')

@section('content')
<!-- Header -->
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-semibold text-gray-800">
            Tambah Produk
        </h1>
        <p class="text-sm text-gray-500">
            Tambahkan produk baru ke sistem
        </p>
    </div>
</div>

<!-- Form -->
<div class="bg-white p-6 rounded-xl shadow max-w-2xl">
    <form enctype="multipart/form-data">

        <!-- Foto Produk -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Foto Produk
            </label>

            <div class="flex items-center gap-4">
                <div class="w-24 h-24 border border-dashed rounded-lg flex items-center justify-center text-gray-400 text-sm">
                    Preview
                </div>

                <label class="cursor-pointer">
                    <span class="px-4 py-2 bg-gray-100 rounded-lg text-sm hover:bg-gray-200 transition">
                        Upload Foto
                    </span>
                    <input type="file" class="hidden" accept="image/*">
                </label>
            </div>

            <p class="text-xs text-gray-500 mt-1">
                Format JPG/PNG, maksimal 2MB
            </p>
        </div>

        <!-- Nama Produk -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Nama Barang
            </label>
            <input
                type="text"
                placeholder="Contoh: Beras Premium"
                class="w-full border border-gray-300 px-3 py-2 rounded-lg focus:ring-2 focus:ring-indigo-300 focus:outline-none">
        </div>

        <!-- Nama Supplier -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Nama Supplier
            </label>
            <input
                type="text"
                placeholder="Contoh: PT Sumber Pangan"
                class="w-full border border-gray-300 px-3 py-2 rounded-lg focus:ring-2 focus:ring-indigo-300 focus:outline-none">
        </div>

        <!-- Kategori & Atribut -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Kategori
                </label>
                <input
                    type="text"
                    placeholder="Contoh: Sembako"
                    class="w-full border border-gray-300 px-3 py-2 rounded-lg focus:ring-2 focus:ring-indigo-300 focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Atribut
                </label>
                <input
                    type="text"
                    placeholder="Contoh: 5kg"
                    class="w-full border border-gray-300 px-3 py-2 rounded-lg focus:ring-2 focus:ring-indigo-300 focus:outline-none">
            </div>
        </div>

        <!-- Harga Beli & Harga Jual -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Harga Beli
                </label>
                <input
                    type="number"
                    placeholder="Contoh: 100000"
                    class="w-full border border-gray-300 px-3 py-2 rounded-lg focus:ring-2 focus:ring-indigo-300 focus:outline-none">
                <p class="text-xs text-gray-400 mt-1">
                    Harga dari supplier
                </p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Harga Jual
                </label>
                <input
                    type="number"
                    placeholder="Contoh: 115000"
                    class="w-full border border-gray-300 px-3 py-2 rounded-lg focus:ring-2 focus:ring-indigo-300 focus:outline-none">
                <p class="text-xs text-gray-400 mt-1">
                    Harga yang dijual ke pelanggan
                </p>
            </div>
        </div>

        <!-- Kode Barang & Stok -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Kode Barang
                </label>
                <input
                    type="text"
                    placeholder="Contoh: SKU-085"
                    class="w-full border border-gray-300 px-3 py-2 rounded-lg focus:ring-2 focus:ring-indigo-300 focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Stok
                </label>
                <input
                    type="number"
                    placeholder="Contoh: 10"
                    class="w-full border border-gray-300 px-3 py-2 rounded-lg focus:ring-2 focus:ring-indigo-300 focus:outline-none">
            </div>
        </div>

        <!-- Deskripsi -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Deskripsi
            </label>
            <textarea
                rows="4"
                placeholder="Deskripsi singkat mengenai produk"
                class="w-full border border-gray-300 px-3 py-2 rounded-lg resize-none focus:ring-2 focus:ring-indigo-300 focus:outline-none"></textarea>
        </div>

        <!-- Button -->
        <div class="flex justify-end gap-3">
            <a href="/dashboard/admin/product"
               class="px-5 py-2 rounded-lg border text-gray-600 hover:bg-gray-100 transition">
                Batal
            </a>

            <button
                type="submit"
                class="px-6 py-2 bg-indigo-300 text-white rounded-lg hover:bg-indigo-400 transition">
                Simpan Produk
            </button>
        </div>

    </form>
</div>
@endsection
