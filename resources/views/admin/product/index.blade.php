@extends('dashboard.admin.layout')

@section('title', 'Produk')

@section('content')
<div class="space-y-6"> 

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">
            Produk
        </h1>
    </div>

    <!--SEARCH & ACTION-->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
        <div class="relative w-full max-w-xs">
            <input id="searchProductInput" type="text"
                placeholder="Cari Produk / SKU"
                value="{{ request('search') }}"
                class="block w-full pl-10 text-sm border border-gray-300 rounded-lg
                    bg-gray-50 focus:ring-indigo-500 focus:border-indigo-500
                    dark:bg-gray-700 dark:border-gray-600 dark:text-white">

            <svg class="w-4 h-4 absolute left-3 top-3 text-gray-500"
                xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-4.35-4.35M17 10a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </div>
        <div class="flex flex-wrap gap-2">

            <a href="{{ route('admin.product.create') }}"
            class="inline-flex items-center px-4 py-2 text-sm font-medium
                    text-white bg-indigo-600 rounded-lg
                    hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300 transition">
                + Tambah Produk
            </a>

            <a href="{{ route('admin.categories.index') }}"
            class="inline-flex items-center px-4 py-2 text-sm font-medium
                    text-gray-700 dark:text-gray-300
                    bg-white dark:bg-gray-800
                    border border-gray-300 dark:border-gray-700
                    rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                Kategori
            </a>

            <button
                type="button"
                data-modal-target="importProductModal"
                data-modal-toggle="importProductModal"
                class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium
                    text-gray-700 dark:text-gray-300
                    bg-white dark:bg-gray-800
                    border border-gray-300 dark:border-gray-700
                    rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                <svg class="w-5 h-5 text-gray-700 dark:text-gray-300"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24">
                    <path stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 15v2a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-2m-8 1V4m0 12-4-4m4 4 4-4"/>
                </svg>
                <span>Import</span>
            </button>
            <a href="{{ route('admin.product.export') }}"
            class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium
                    text-gray-700 dark:text-gray-300
                    bg-white dark:bg-gray-800
                    border border-gray-300 dark:border-gray-700
                    rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                <svg class="w-5 h-5 text-gray-700 dark:text-gray-300"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24">
                    <path stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 15v2a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-2M12 4v12m0-12 4 4m-4-4L8 8"/>
                </svg>
                <span>Export</span>
            </a>
        </div>
    </div>

    <!--GRID-->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-4">
        @forelse ($products as $product)
            <div class="group bg-white dark:bg-gray-800
                        border border-gray-200 dark:border-gray-700
                        rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden
                        hover:scale-105 hover:-translate-y-1
                        product-card"
                data-name="{{ strtolower($product->name) }}"
                data-sku="{{ strtolower($product->sku) }}">
                <img
                    src="{{ $product->image
                            ? asset('storage/'.$product->image)
                            : asset('images/default product.png') }}"
                    class="aspect-square w-full object-cover">
                <div class="p-4 space-y-3">
                    <div class="flex justify-between items-center">
                        <h3 class="font-semibold text-gray-900 dark:text-gray-100 truncate">
                            {{ $product->name }}
                        </h3>

                        <div class="flex justify-between items-center">
                            <span class="text-xs font-medium px-3 py-1 rounded-full
                            {{ $product->stock < 10
                                ? 'bg-red-100 text-red-600 dark:bg-red-900/30 dark:text-red-400'
                                : 'bg-emerald-100 text-emerald-600 dark:bg-emerald-900/30 dark:text-emerald-400' }}">
                            Stok {{ $product->stock }}
                        </span>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        SKU: {{ $product->sku }}
                    </p>

                    @if ($product->attributes->count())
                        <div class="flex flex-wrap gap-1">
                            @foreach ($product->attributes->take(2) as $attr)
                                <span class="text-xs bg-gray-100 dark:bg-gray-700
                                            text-gray-700 dark:text-gray-300
                                            px-2 py-1 rounded">
                                    {{ $attr->name }}: {{ $attr->value }}
                                </span>
                            @endforeach

                            @if ($product->attributes->count() > 2)
                                <span class="text-xs text-gray-400">
                                    +{{ $product->attributes->count() - 2 }} lagi
                                </span>
                            @endif
                        </div>
                    @endif
                    <div class="space-y-1">
                        <p class="text-sm text-gray-700 dark:text-gray-300">
                            Supplier: <span class="font-medium">{{ $product->supplier->name ?? '-' }}</span>
                        </p>

                        <p class="text-lg font-semibold text-indigo-600 dark:text-indigo-400">
                            Rp {{ number_format($product->selling_price, 0, ',', '.') }}
                        </p>
                    </div>
                </div>

                <div class="p-4 pt-0 space-y-3">
                    <button
                        data-modal-target="detailModal{{ $product->id }}"
                        data-modal-toggle="detailModal{{ $product->id }}"
                        class="w-full px-3 py-2 text-sm
                               text-gray-700 dark:text-gray-300
                               bg-gray-100 dark:bg-gray-700
                               rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                        Detail
                    </button>

                    <div class="flex gap-2">
                        <a href="{{ route('admin.product.edit', $product) }}"
                            class="flex-1 px-3 py-2 text-sm font-medium text-white
                                bg-indigo-600 rounded-lg hover:bg-indigo-700 transition text-center">
                            Edit
                        </a>

                        <button
                            type="button"
                            onclick="openDeleteProductModal(this)"
                            data-route="{{ route('admin.product.destroy', $product->id) }}"
                            data-name="{{ $product->name }}"
                            data-modal-target="deleteProductModal"
                            data-modal-toggle="deleteProductModal"
                            class="flex-1 px-3 py-2 text-sm font-medium text-white
                                bg-red-600 rounded-lg hover:bg-red-700 transition">
                            Hapus
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <div id="emptyProductSearch"
                 class="col-span-full py-16 text-center text-gray-500 dark:text-gray-400">
                <div class="flex flex-col items-center gap-3">
                    <svg class="w-12 h-12 text-gray-400"
                         xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6m16 0v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4m16 0H4"/>
                    </svg>

                    <p class="text-sm font-medium">
                        Produk tidak ditemukan
                    </p>
                </div>
            </div>
        @endforelse
    </div>
    @if ($products instanceof \Illuminate\Pagination\LengthAwarePaginator)
        <div class="mt-8 p-4 flex justify-center">
            {{ $products->appends(request()->query())->links() }}
        </div>
    @endif
</div>
<!--DETAIL PRODUCT MODAL-->
@foreach ($products as $product)
<div id="detailModal{{ $product->id }}"
    tabindex="-1"
    aria-hidden="true"
    class="fixed inset-0 z-50 hidden flex items-center justify-center
           bg-black/40 backdrop-blur-sm">
    <div class="relative w-full max-w-4xl mx-auto px-4">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
            <div
                class="flex items-center justify-between px-6 py-4
                       border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Detail Produk
                </h3>
                <button
                    type="button"
                    data-modal-hide="detailModal{{ $product->id }}"
                    class="w-8 h-8 inline-flex items-center justify-center
                           text-gray-400 rounded-lg
                           hover:bg-gray-100 hover:text-gray-700
                           dark:hover:bg-gray-700 dark:hover:text-white">
                    ✕
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="w-full h-72 md:h-full">
                    <img
                        src="{{ $product->image
                            ? asset('storage/' . $product->image)
                            : asset('images/default product.png') }}"
                        alt="{{ $product->name }}"
                        class="w-full h-full object-cover">
                </div>
                <div class="px-6 py-5 space-y-5 text-sm">

                    <div class="grid grid-cols-2 gap-x-4 gap-y-3">

                        <div class="text-gray-500 dark:text-gray-400">
                            Nama Produk
                        </div>
                        <div class="font-medium text-gray-900 dark:text-white">
                            {{ $product->name }}
                        </div>
                        <div class="text-gray-500 dark:text-gray-400">
                            SKU
                        </div>
                        <div class="text-gray-700 dark:text-gray-300">
                            {{ $product->sku }}
                        </div>
                        <div class="text-gray-500 dark:text-gray-400">
                            Kategori
                        </div>
                        <div class="text-gray-700 dark:text-gray-300">
                            {{ $product->category->name ?? '-' }}
                        </div>
                        <div class="text-gray-500 dark:text-gray-400">
                            Supplier
                        </div>
                        <div class="text-gray-700 dark:text-gray-300">
                            {{ $product->supplier->name ?? '-' }}
                        </div>
                        <div class="text-gray-500 dark:text-gray-400">
                            Stok
                        </div>
                        <div>
                            <span
                                class="text-xs font-medium px-3 py-1 rounded-full
                                {{ $product->stock < 10
                                    ? 'bg-red-100 text-red-600 dark:bg-red-900/30 dark:text-red-400'
                                    : 'bg-emerald-100 text-emerald-600 dark:bg-emerald-900/30 dark:text-emerald-400' }}">
                                {{ $product->stock }}
                            </span>
                        </div>
                        <div class="text-gray-500 dark:text-gray-400">
                            Harga Beli
                        </div>
                        <div class="text-gray-700 dark:text-gray-300">
                            Rp {{ number_format($product->purchase_price ?? 0, 0, ',', '.') }}
                        </div>
                        <div class="text-gray-500 dark:text-gray-400">
                            Harga Jual
                        </div>
                        <div class="font-semibold text-indigo-600 dark:text-indigo-400">
                            Rp {{ number_format($product->selling_price, 0, ',', '.') }}
                        </div>
                    </div>

                    <div>
                        <p class="mb-2 text-gray-500 dark:text-gray-400">
                            Atribut
                        </p>
                        @if ($product->attributes->count())
                            <div class="flex flex-wrap gap-2">
                                @foreach ($product->attributes as $attr)
                                    <span
                                        class="text-xs px-3 py-1 rounded-full
                                               bg-gray-100 dark:bg-gray-700
                                               text-gray-700 dark:text-gray-300">
                                        {{ $attr->name }}: {{ $attr->value }}
                                    </span>
                                @endforeach
                            </div>
                        @else
                            <p class="text-xs text-gray-400">
                                Tidak ada atribut
                            </p>
                        @endif
                    </div>
                    <div>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">
                            Deskripsi
                        </p>
                        <p class="leading-relaxed text-gray-700 dark:text-gray-300">
                            {{ $product->description ?? 'Tidak ada deskripsi produk.' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<!--MODAL HAPUS PRODUK-->
<div id="deleteProductModal"
    tabindex="-1"
    class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="relative w-full max-w-md p-6 bg-white rounded-lg shadow
               dark:bg-gray-800">
        <div
            class="flex items-center justify-center w-12 h-12 mx-auto mb-4
                   bg-red-100 rounded-full dark:bg-red-900">
            <svg
                class="w-6 h-6 text-red-600 dark:text-red-300"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 9v3.75m0 3.75h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>

        <h3
            class="mb-2 text-lg font-semibold text-center
                   text-gray-900 dark:text-white"
        >
            Hapus Produk?
        </h3>
        <p
            class="mb-6 text-sm text-center
                   text-gray-500 dark:text-gray-400">
            Produk
            <span id="deleteProductName" class="font-semibold"></span>
            akan dihapus permanen dan tidak dapat dikembalikan.
        </p>

        <form
            id="deleteProductForm"
            method="POST"
            class="flex justify-center gap-3">
            @csrf
            @method('DELETE')
            <button
                type="button"
                data-modal-hide="deleteProductModal"
                class="px-4 py-2 text-sm font-medium
                       text-gray-700 bg-gray-200 rounded-lg
                       hover:bg-gray-300
                       dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                Batal
            </button>
            <button
                type="submit"
                class="px-4 py-2 text-sm font-medium
                       text-white bg-red-600 rounded-lg
                       hover:bg-red-700 focus:ring-4 focus:ring-red-300
                       dark:focus:ring-red-800">
                Ya, Hapus
            </button>
        </form>
    </div>
</div>

<!--MODAL IMPORT PRODUK-->
<div id="importProductModal" tabindex="-1"
     class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">

    <div class="relative w-full max-w-md p-6 bg-white rounded-lg shadow
                dark:bg-gray-800">
        <h3 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">
            Import Produk
        </h3>

        <form action="{{ route('admin.product.import') }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm mb-1 text-gray-700 dark:text-gray-300">
                    File Excel (.xlsx / .csv)
                </label>
                <input type="file" name="file" required
                       class="w-full text-sm
                              border border-gray-300 rounded-lg
                              dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>
            <div class="flex justify-end gap-2">
                <button type="button"
                        data-modal-hide="importProductModal"
                        class="px-4 py-2 text-sm bg-gray-200 rounded-lg
                               dark:bg-gray-700 dark:text-gray-300">
                    Batal
                </button>
                <button type="submit"
                        class="px-4 py-2 text-sm text-white
                               bg-indigo-600 rounded-lg
                               hover:bg-indigo-700">
                    Import
                </button>
            </div>
        </form>
    </div>
</div>

<script>
let searchTimeout = null

document.getElementById('searchProductInput').addEventListener('input', function () {
    const keyword = this.value.trim()

    clearTimeout(searchTimeout)
    searchTimeout = setTimeout(() => {
        const url = new URL(window.location.href)

        if (keyword.length > 0) {
            url.searchParams.set('search', keyword)
            url.searchParams.delete('page') 
        } else {
            url.searchParams.delete('search')
            url.searchParams.delete('page')
        }

        window.location.href = url.toString()
    },)
})
</script>
<script>
function openDeleteProductModal(button) {
    const form = document.getElementById('deleteProductForm')
    const nameText = document.getElementById('deleteProductName')

    const route = button.dataset.route
    const name = button.dataset.name
    nameText.textContent = `"${name}"`

    form.action = route
}
</script>
<script src="https://unpkg.com/flowbite@latest/dist/flowbite.min.js"></script>
@endsection
