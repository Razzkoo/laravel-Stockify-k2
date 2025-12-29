@extends('layouts.dashboard')

@section('title', 'Kategori Produk')

@section('content')
<!-- Header -->
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-semibold text-gray-800">
            Tambah Kategori Produk
        </h1>
        <p class="text-sm text-gray-500">
            Tambahkan kategori untuk mengelompokkan produk
        </p>
    </div>
</div>

<!-- Form -->
<div class="bg-white p-6 rounded-lg shadow max-w-lg">
    <form>
        <!-- Nama Kategori -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Nama Kategori
            </label>
            <input 
                type="text" 
                placeholder="Contoh: Sembako"
                class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Deskripsi -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Deskripsi
            </label>
            <textarea 
                rows="4"
                placeholder="Deskripsi singkat mengenai kategori produk"
                class="w-full border border-gray-300 px-3 py-2 rounded resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>

        <!-- Button -->
        <div class="flex justify-between">
            <button 
                type="submit"
                class="bg-indigo-300 text-white px-5 py-2 rounded hover:bg-indigo-400 transition">
                Simpan Kategori
            </button>
            <button>
                <a href="/dashboard/admin/product"
                class="bg-indigo-300 text-white px-5 py-2 rounded hover:bg-indigo-400 transition">
                Kembali
                </a>
            </button>
        </div>
    </form>
</div>
@endsection
