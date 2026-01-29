@extends('dashboard.manajer.layout')

@section('title', 'Produk')

@section('content')
<div class="space-y-6">

    <div class="flex flex-col gap-4">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">
            Produk
        </h1>

        <div class="relative w-full md:max-w-xs">
            <input id="searchProductInput" type="text"
                   placeholder="Cari Produk / SKU"
                   value="{{ request('search') }}"
                   class="block w-full pl-10 pr-4 py-2 text-sm
                          border border-gray-300 rounded-lg
                          bg-gray-50 focus:ring-indigo-500 focus:border-indigo-500
                          dark:bg-gray-700 dark:border-gray-600 dark:text-white">

            <svg class="w-4 h-4 absolute left-3 top-3 text-gray-500"
                 xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-4.35-4.35M17 10a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </div>
    </div>

    <!-- ================= GRID ================= -->
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
                            : 'https://via.placeholder.com/400x400' }}"
                    class="aspect-square w-full object-cover">

                <div class="p-4 space-y-3">
                    <div class="flex justify-between items-center">
                        <h3 class="font-semibold text-gray-900 dark:text-gray-100 truncate">
                            {{ $product->name }}
                        </h3>
                        <span class="text-xs font-medium px-3 py-1 rounded-full
                            {{ $product->stock < 10
                                ? 'bg-red-100 text-red-600 dark:bg-red-900/30 dark:text-red-400'
                                : 'bg-emerald-100 text-emerald-600 dark:bg-emerald-900/30 dark:text-emerald-400' }}">
                            Stok {{ $product->stock }}
                        </span>
                    </div>
                    <p class="text-xs text-gray-500 dark:text-gray-400">
                        SKU: {{ $product->sku }}
                    </p>
                    @if ($product->attributes->count())
                        <div class="flex flex-wrap gap-1">
                            @foreach ($product->attributes as $attr)
                                <span class="text-xs bg-gray-100 dark:bg-gray-700
                                             text-gray-700 dark:text-gray-300
                                             px-2 py-1 rounded">
                                    {{ $attr->name }}: {{ $attr->value }}
                                </span>
                            @endforeach
                        </div>
                    @endif
                    <p class="text-sm text-gray-700 dark:text-gray-300">
                        Supplier:
                        <span class="font-medium">{{ $product->supplier->name ?? '-' }}</span>
                    </p>
                    <p class="text-lg font-semibold text-indigo-600 dark:text-indigo-400">
                        Rp {{ number_format($product->selling_price, 0, ',', '.') }}
                    </p>
                </div>

                <div class="p-4 pt-0">
                    <button
                        data-modal-target="detailModal{{ $product->id }}"
                        data-modal-toggle="detailModal{{ $product->id }}"
                        class="w-full px-3 py-2 text-sm
                               text-gray-700 dark:text-gray-300
                               bg-gray-100 dark:bg-gray-700
                               rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                        Detail
                    </button>
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
</div>
<!--MODAL PRODUK-->
@foreach ($products as $product)
<div id="detailModal{{ $product->id }}"
     tabindex="-1"
     aria-hidden="true"
     class="fixed inset-0 z-50 hidden flex items-center justify-center
            bg-black/40 backdrop-blur-sm">

    <div class="relative w-full max-w-4xl mx-auto px-4">

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">

            <div class="flex items-center justify-between px-6 py-4
                        border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Detail Produk
                </h3>
                <button type="button"
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
                            ? asset('storage/'.$product->image)
                            : 'https://via.placeholder.com/600x600' }}"
                        class="w-full h-full object-cover"
                        alt="{{ $product->name }}">
                </div>
                <div class="px-6 py-5 space-y-4 text-sm">

                    <div class="grid grid-cols-2 gap-x-4 gap-y-3">

                        <div class="text-gray-500 dark:text-gray-400">Nama Produk</div>
                        <div class="font-medium text-gray-900 dark:text-white">
                            {{ $product->name }}
                        </div>

                        <div class="text-gray-500 dark:text-gray-400">SKU</div>
                        <div class="text-gray-700 dark:text-gray-300">
                            {{ $product->sku }}
                        </div>
                        <div class="text-gray-500 dark:text-gray-400">Kategori</div>
                        <div class="text-gray-700 dark:text-gray-300">
                            {{ $product->category->name ?? '-' }}
                        </div>
                        <div class="text-gray-500 dark:text-gray-400">Supplier</div>
                        <div class="text-gray-700 dark:text-gray-300">
                            {{ $product->supplier->name ?? '-' }}
                        </div>
                        <div class="text-gray-500 dark:text-gray-400">Stok</div>
                        <div>
                            <span class="text-xs font-medium px-3 py-1 rounded-full
                                {{ $product->stock < 10
                                    ? 'bg-red-100 text-red-600 dark:bg-red-900/30 dark:text-red-400'
                                    : 'bg-emerald-100 text-emerald-600 dark:bg-emerald-900/30 dark:text-emerald-400' }}">
                                {{ $product->stock }}
                            </span>
                        </div>
                        <div class="text-gray-500 dark:text-gray-400">Harga Beli</div>
                        <div class="text-gray-700 dark:text-gray-300">
                            Rp {{ number_format($product->purchase_price ?? 0,0,',','.') }}
                        </div>
                        <div class="text-gray-500 dark:text-gray-400">Harga Jual</div>
                        <div class="font-semibold text-indigo-600 dark:text-indigo-400">
                            Rp {{ number_format($product->selling_price,0,',','.') }}
                        </div>
                    </div>
                    <div>
                        <p class="text-gray-500 dark:text-gray-400 mb-2">Atribut</p>
                        @if ($product->attributes->count())
                            <div class="flex flex-wrap gap-2">
                                @foreach ($product->attributes as $attr)
                                    <span class="text-xs px-3 py-1 rounded-full
                                                 bg-gray-100 dark:bg-gray-700
                                                 text-gray-700 dark:text-gray-300">
                                        {{ $attr->name }}: {{ $attr->value }}
                                    </span>
                                @endforeach
                            </div>
                        @else
                            <p class="text-xs text-gray-400">Tidak ada atribut</p>
                        @endif
                    </div>
                    <div>
                        <p class="text-gray-500 dark:text-gray-400 mb-1">Deskripsi</p>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                            {{ $product->description ?? 'Tidak ada deskripsi produk.' }}
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@if ($products instanceof \Illuminate\Pagination\LengthAwarePaginator)
        <div class="mt-8 p-4 flex justify-center">
            {{ $products->appends(request()->query())->links() }}
        </div>
    @endif


<!--SCRIPT-->
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

<script src="https://unpkg.com/flowbite@latest/dist/flowbite.min.js"></script>
@endsection
