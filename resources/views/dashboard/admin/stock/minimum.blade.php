@extends('layouts.dashboard')

@section('title', 'Pengaturan Stok Minimum')

@section('content')

<div class="mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">Stok Minimum</h1>
    <p class="text-sm text-gray-500">
        Pengaturan batas minimum stok
    </p>
</div>

<div class="bg-white rounded-xl shadow p-6 max-w-xl">
    <form>
        <div class="mb-4">
            <label class="block text-sm mb-1">Produk</label>
            <input type="text" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block text-sm mb-1">Batas Minimum</label>
            <input type="number" class="w-full border rounded px-3 py-2">
        </div>

        <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
            Simpan
        </button>
    </form>
</div>

@endsection
