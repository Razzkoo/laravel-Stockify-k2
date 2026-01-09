@extends('layouts.dashboard')

@section('title', 'Produk')

@section('content')

<!-- HEADER -->
<div class="flex flex-col gap-4 mb-6">

    <!-- TITLE + ACTION -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <h1 class="text-2xl font-semibold text-gray-800">
            Produk
        </h1>

        <div class="flex flex-wrap gap-2">
            <a href="/dashboard/admin/product/create"
               class="px-4 py-2 bg-indigo-400 text-white rounded-lg text-sm hover:bg-indigo-500 transition">
                + Tambah Barang
            </a>

            <a href="/dashboard/admin/product/kategori"
               class="px-4 py-2 bg-indigo-400 text-white rounded-lg text-sm hover:bg-indigo-500 transition">
                Kategori
            </a>

            <button
                class="px-4 py-2 bg-emerald-400 text-white rounded-lg text-sm hover:bg-emerald-500 transition">
                Import
            </button>

            <button
                class="px-4 py-2 bg-purple-300 text-white rounded-lg text-sm hover:bg-purple-500 transition">
                Export
            </button>
        </div>
    </div>

    <!-- TOOLBAR SEARCH -->
    <div class="bg-white rounded-xl shadow-sm border p-4 flex flex-col md:flex-row gap-4 md:items-center md:justify-between">

        <!-- SEARCH -->
        <div class="relative w-full md:w-72">
            <input
                id="searchInput"
                type="text"
                placeholder="Cari produk / SKU / supplier"
                class="w-full pl-10 pr-4 py-2 text-sm border rounded-lg
                       focus:ring-2 focus:ring-indigo-300 focus:outline-none">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-5 h-5 text-gray-400 absolute left-3 top-2.5"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-4.35-4.35M17 10a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>

    </div>

</div>

<!-- GRID PRODUK -->
<div id="productGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

    <!-- CARD -->
    <div
        class="product-card bg-white rounded-xl shadow-sm hover:shadow-md transition overflow-hidden"
        data-name="beras premium"
        data-sku="br-001"
        data-supplier="pt sumber makmur">

        <!-- FOTO -->
        <img src="https://via.placeholder.com/300x200"
             class="w-full h-40 object-cover">

        <!-- BODY -->
        <div class="p-4 space-y-2">
            <h3 class="font-semibold text-gray-800">Beras Premium</h3>

            <p class="text-xs text-gray-400">SKU: BR-001</p>

            <p class="text-sm">
                Atribut:
                <span class="font-medium text-orange-600">5kg</span>
            </p>

            <p class="text-sm text-gray-600">
                Supplier: PT Sumber Makmur
            </p>

            <!-- STOK & HARGA -->
            <div class="pt-2 flex items-center justify-between">
                <span class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-full
                             bg-red-100 text-red-600">
                    Stok: 8
                </span>

                <p class="text-base font-bold text-indigo-600">
                    Rp 105.000
                </p>
            </div>
        </div>

        <!-- ACTION -->
        <div class="px-4 pb-4 flex gap-2">
            <button
                onclick="openModal()"
                class="flex-1 text-sm px-3 py-2 bg-gray-100 rounded-lg hover:bg-gray-200 transition">
                Detail
            </button>

            <a href="/dashboard/admin/product/edit"
               class="text-sm px-3 py-2 bg-indigo-400 text-white rounded-lg hover:bg-indigo-500 transition">
                Edit
            </a>

            <button
                onclick="openDeleteModal()"
                class="text-sm px-3 py-2 bg-red-400 text-white rounded-lg hover:bg-red-500 transition">
                Hapus
            </button>
        </div>

    </div>
</div>

<!-- SCRIPT SEARCH -->
<script>
    const searchInput = document.getElementById('searchInput');
    const cards = document.querySelectorAll('.product-card');
    const resultCount = document.getElementById('resultCount');

    searchInput.addEventListener('input', function () {
        const keyword = this.value.toLowerCase();
        let visible = 0;

        cards.forEach(card => {
            const name = card.dataset.name;
            const sku = card.dataset.sku;
            const supplier = card.dataset.supplier;

            if (
                name.includes(keyword) ||
                sku.includes(keyword) ||
                supplier.includes(keyword)
            ) {
                card.classList.remove('hidden');
                visible++;
            } else {
                card.classList.add('hidden');
            }
        });

        resultCount.textContent =
            keyword === ''
                ? 'Menampilkan semua produk'
                : `Ditemukan ${visible} produk`;
    });
</script>

@endsection
