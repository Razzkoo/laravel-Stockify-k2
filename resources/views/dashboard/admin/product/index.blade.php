@extends('layouts.dashboard')

@section('title', 'Produk')

@section('content')

<h1 class="text-2xl font-semibold mb-6">Produk</h1>

<!-- BUTTON ATAS -->
<div class="flex gap-3 mb-6">
    <a href="/dashboard/admin/product/create"
       class="px-4 py-2 bg-indigo-500 text-white rounded">
       + Tambah Barang
    </a>
</div>

<!-- GRID PRODUK (CARD) -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

    <!-- CARD -->
    <div class="bg-white rounded-lg shadow hover:shadow-md transition">

        <!-- FOTO -->
        <img src="https://via.placeholder.com/300x200"
             class="w-full h-40 object-cover rounded-t-lg">

        <!-- BODY -->
        <div class="p-4 space-y-2">
            <h3 class="font-semibold text-gray-800">
                Beras Premium
            </h3>

            <p class="text-sm text-gray-500">
                SKU: BR-001
            </p>

            <p class="text-sm">
                Stok:
                <span class="font-semibold text-red-600">8</span>
            </p>

            <p class="text-sm font-semibold text-gray-800">
                Rp 105.000
            </p>
        </div>

        <!-- ACTION -->
        <div class="px-4 pb-4 flex gap-2">
            <button
                onclick="openModal()"
                class="flex-1 text-sm px-3 py-2 bg-gray-100 rounded hover:bg-gray-200">
                Detail
            </button>

            <a href="/dashboard/admin/product/edit"
               class="flex-1 text-sm px-3 py-2 bg-indigo-400 text-white rounded text-center hover:bg-indigo-500">
                Edit
            </a>
        </div>

    </div>

</div>

<!-- ================= MODAL DETAIL ================= -->
<div id="productModal"
     class="fixed inset-0 bg-black/50 hidden z-50">

    <div class="flex items-center justify-center min-h-screen px-4">

        <div class="bg-white w-full max-w-6xl rounded-lg shadow">

            <!-- HEADER -->
            <div class="flex items-center justify-between px-6 py-4 border-b">
                <h2 class="text-lg font-semibold text-gray-800">
                    Detail Produk
                </h2>

                <button onclick="closeModal()"
                        class="text-xl text-gray-500 hover:text-gray-700">
                    &times;
                </button>
            </div>

            <!-- ISI MODAL -->
            <div class="p-6 overflow-x-auto">

               <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-700">
            <thead class="bg-gray-50 text-xs uppercase text-gray-500">
                <tr>
                    <th class="px-4 py-3 text-center">Nama</th>
                    <th class="px-4 py-3 text-center">SKU</th>
                    <th class="px-4 py-3 text-center">Kategori</th>
                    <th class="px-4 py-3 text-center">Atribut</th>
                    <th class="px-4 py-3 text-center">Supplier</th>
                    <th class="px-4 py-3 text-center">Price</th>
                    <th class="px-4 py-3 text-center">Stok</th>
                    <th class="px-4 py-3 text-center">Status</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
    <tbody class="divide-y">
                {{-- dummy dulu --}}
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 text-center font-medium text-gray-900">
                        Beras Premium
                    </td>
                    <td class="px-4 py-3 text-center">BR-001</td>
                    <td class="px-4 py-3 text-center">Sembako</td>
                    <td class="px-4 py-3 text-center">5kg</td>
                    <td class="px-4 py-3 text-center">PT Sumber Makmur</td>
                    <td class="px-4 py-3 text-center">Rp 105.000</td>
                    <td class="px-4 py-3 text-center">8</td>
                    <td class="px-4 py-3 text-center">
                        <span class="px-2 py-1 text-xs rounded bg-red-100 text-red-600">
                            Stok Menipis
                        </span>
                    </td>
                    <td class="px-4 py-3 text-center space-x-2">
                        <button class="text-red-600 hover:underline">
                            Hapus
                        </button>
                    </td>
                </tr>
            </tbody>
</table>
</div>
                <p class="text-gray-400 text-sm italic">
                    (Isi detail produk di sini)
                </p>

            </div>

        </div>
    </div>
</div>

<!-- SCRIPT MODAL -->
<script>
    function openModal() {
        document.getElementById('productModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('productModal').classList.add('hidden');
    }
</script>

@endsection
