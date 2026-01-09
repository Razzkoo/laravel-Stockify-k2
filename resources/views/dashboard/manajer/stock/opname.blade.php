@extends('layouts.dashboard')

@section('title', 'Stock Opname')

@section('content')
<div class="p-6 space-y-6">

    <div>
        <h1 class="text-2xl font-bold text-gray-800">Stock Opname</h1>
        <p class="text-sm text-gray-500">Penyesuaian stok fisik</p>
    </div>

    <!-- FORM OPNAME -->
    <div class="bg-white rounded-xl shadow p-6 max-w-xl">
        <h2 class="font-semibold text-gray-800 mb-4">Input Stock Opname</h2>

        <form class="space-y-4">
            <div>
                <label class="text-sm text-gray-600">Produk</label>
                <select class="w-full mt-1 border rounded-lg px-3 py-2 text-sm">
                    <option>Pilih Produk</option>
                </select>
            </div>

            <div>
                <label class="text-sm text-gray-600">Stok Fisik</label>
                <input type="number"
                       class="w-full mt-1 border rounded-lg px-3 py-2 text-sm"
                       placeholder="Jumlah stok fisik">
            </div>

            <div>
                <label class="text-sm text-gray-600">Catatan</label>
                <textarea class="w-full mt-1 border rounded-lg px-3 py-2 text-sm"
                          rows="3"
                          placeholder="Selisih atau alasan"></textarea>
            </div>

            <button type="submit"
                    class="bg-purple-600 hover:bg-purple-700 text-white text-sm px-4 py-2 rounded-lg">
                Simpan Opname
            </button>
        </form>
    </div>

</div>
@endsection
