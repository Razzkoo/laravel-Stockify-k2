@extends('layouts.dashboard')

@section('title', 'Edit Produk')

@section('content')

<!-- HEADER -->
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">
        Edit Produk
    </h1>
</div>

<!-- FORM -->
<div class="bg-white rounded-lg shadow max-w-4xl">
    <form class="p-6 space-y-6">

        <!-- Foto Produk -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Foto Produk
            </label>

            <div class="flex items-center gap-4">
                <img 
                    src="/storage/products/beras.jpg"
                    alt="Foto Produk"
                    class="w-24 h-24 object-cover rounded-lg border">

                <div>
                    <label class="cursor-pointer">
                        <span class="px-4 py-2 bg-gray-100 rounded text-sm hover:bg-gray-200">
                            Ganti Foto
                        </span>
                        <input type="file" name="photo" class="hidden" accept="image/*">
                    </label>

                    <p class="text-xs text-gray-500 mt-1">
                        Kosongkan jika tidak ingin mengganti foto
                    </p>
                </div>
            </div>
        </div>

        <!-- Nama & SKU -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">
                    Nama Produk
                </label>
                <input type="text"
                    value="Beras Premium"
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-200">
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">
                    SKU
                </label>
                <input type="text"
                    value="BR-001"
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-200">
            </div>
        </div>

        <!-- Kategori & Atribut -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">
                    Kategori
                </label>
                <select class="w-full px-4 py-2 border rounded-lg">
                    <option>Sembako</option>
                    <option>Minuman</option>
                </select>
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">
                    Atribut
                </label>
                <select class="w-full px-4 py-2 border rounded-lg">
                    <option>5kg</option>
                    <option>10kg</option>
                </select>
            </div>
        </div>

        <!-- Supplier -->
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">
                Supplier
            </label>
            <select class="w-full px-4 py-2 border rounded-lg">
                <option>PT Sumber Makmur</option>
            </select>
        </div>

        <!-- HARGA (KREASI DI SINI) -->
        <div class="bg-gray-50 border rounded-lg p-4">
            <h3 class="text-sm font-semibold text-gray-700 mb-3">
                Informasi Harga
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- HARGA BELI -->
                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">
                        Harga Beli
                    </label>
                    <input type="number"
                        placeholder="Contoh: 90000"
                        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-200">
                    <p class="text-xs text-gray-500 mt-1">
                        Harga dari supplier
                    </p>
                </div>

                <!-- HARGA JUAL -->
                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">
                        Harga Jual
                    </label>
                    <input type="number"
                        value="105000"
                        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-200">
                    <p class="text-xs text-gray-500 mt-1">
                        Harga yang dijual ke pelanggan
                    </p>
                </div>
            </div>
        </div>

        <!-- Status -->
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">
                Status Produk
            </label>
            <select class="w-full px-4 py-2 border rounded-lg">
                <option>Aktif</option>
                <option>Nonaktif</option>
            </select>
        </div>

        <!-- BUTTON -->
        <div class="flex justify-end gap-3 pt-4 border-t">
            <a href="/dashboard/admin/product"
               class="px-4 py-2 text-sm bg-gray-100 rounded-lg hover:bg-gray-200">
                Batal
            </a>

            <button type="submit"
                class="px-5 py-2 text-sm font-medium text-white bg-indigo-300 rounded-lg hover:bg-indigo-400">
                Update Produk
            </button>
        </div>

    </form>
</div>

@endsection
