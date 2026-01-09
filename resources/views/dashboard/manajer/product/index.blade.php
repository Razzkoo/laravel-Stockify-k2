@extends('layouts.dashboard')

@section('title', 'Produk')

@section('content')

<!-- HEADER -->
<div class="space-y-4 mb-6">

    <!-- TITLE -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800">Manajemen Produk</h1>
            <p class="text-sm text-gray-500">
                Kelola dan pantau data produk beserta stok
            </p>
        </div>
    </div>

    <!-- TOOLBAR -->
    <div class="bg-white rounded-xl shadow-sm border p-4 flex flex-col md:flex-row gap-4 md:items-center md:justify-between">

        <!-- SEARCH -->
        <div class="relative w-full md:w-80">
            <input
                id="searchInput"
                type="text"
                placeholder="Cari nama produk, SKU, atau supplier..."
                class="w-full pl-10 pr-4 py-2 text-sm border rounded-lg
                       focus:ring-2 focus:ring-indigo-300 focus:outline-none">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-5 h-5 text-gray-400 absolute left-3 top-2.5"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-4.35-4.35M17 10a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>

        <!-- INFO -->
        <div class="text-sm text-gray-500">
            Total Produk: <span class="font-semibold text-gray-800">12</span>
        </div>

    </div>
</div>

<!-- GRID PRODUK -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

    <!-- CARD PRODUK -->
    <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">

        <!-- IMAGE -->
        <img src="https://via.placeholder.com/300x200"
             class="w-full h-40 object-cover">

        <!-- CONTENT -->
        <div class="p-4 space-y-2">
            <div class="flex items-start justify-between">
                <h3 class="font-semibold text-gray-800">
                    Beras Premium
                </h3>

                <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-600">
                    Menipis
                </span>
            </div>

            <p class="text-xs text-gray-500">
                SKU: BR-001
            </p>

            <p class="text-sm">
                Stok:
                <span class="font-semibold text-red-600">8</span>
            </p>

            <p class="text-base font-semibold text-indigo-600">
                Rp 105.000
            </p>
        </div>

        <!-- ACTION -->
        <div class="px-4 pb-4">
            <button
                onclick="openModal()"
                class="w-full text-sm px-3 py-2 bg-gray-100 rounded-lg
                       hover:bg-indigo-50 hover:text-indigo-600 transition">
                Lihat Detail
            </button>
        </div>

    </div>

</div>

<!-- ================= MODAL DETAIL ================= -->
<div id="productModal"
     class="fixed inset-0 bg-black/50 hidden z-50">

    <div class="flex items-center justify-center min-h-screen px-4">

        <div class="bg-white w-full max-w-6xl rounded-xl shadow-lg">

            <!-- MODAL HEADER -->
            <div class="flex items-center justify-between px-6 py-4 border-b">
                <div>
                    <h2 class="text-lg font-semibold text-gray-800">
                        Detail Produk
                    </h2>
                    <p class="text-sm text-gray-500">
                        Informasi lengkap produk dan status stok
                    </p>
                </div>

                <button onclick="closeModal()"
                        class="text-2xl text-gray-400 hover:text-gray-700">
                    &times;
                </button>
            </div>

            <!-- MODAL BODY -->
            <div class="p-6 overflow-x-auto">

                <table class="w-full text-sm text-gray-700">
                    <thead class="bg-gray-50 text-xs uppercase text-gray-500">
                        <tr>
                            <th class="px-4 py-3 text-center">Nama</th>
                            <th class="px-4 py-3 text-center">SKU</th>
                            <th class="px-4 py-3 text-center">Kategori</th>
                            <th class="px-4 py-3 text-center">Atribut</th>
                            <th class="px-4 py-3 text-center">Supplier</th>
                            <th class="px-4 py-3 text-center">Harga</th>
                            <th class="px-4 py-3 text-center">Stok</th>
                            <th class="px-4 py-3 text-center">Status</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y">
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-center font-medium">
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
                        </tr>
                    </tbody>
                </table>

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
