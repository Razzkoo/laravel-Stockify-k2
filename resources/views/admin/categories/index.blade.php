@extends('dashboard.admin.layout')

@section('title', 'Kategori Produk')

@section('content')

<div class="space-y-6">

<!-- ================= HEADER ================= -->
<div class="space-y-4 mb-6">

    <!-- TITLE -->
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
        Kategori Produk
    </h1>
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
        <div class="relative w-full max-w-xs">
            <input id="searchInput" type="text"
                placeholder="Cari nama kategori..."
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

            <a href="{{ route('admin.product.index') }}"
               class="inline-flex items-center px-4 py-2 text-sm font-medium
                      text-gray-700 dark:text-gray-300
                      bg-white dark:bg-gray-800
                      border border-gray-300 dark:border-gray-700
                      rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                Kembali ke Produk
            </a>

            <a href="{{ route('admin.categories.create') }}"
               class="inline-flex items-center px-4 py-2 text-sm font-medium
                      text-white bg-indigo-600 rounded-lg
                      hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300 transition">
                + Tambah Kategori
            </a>

        </div>
    </div>
</div>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="px-6 py-3 text-center">No</th>
                <th class="px-6 py-3">Nama Kategori</th>
                <th class="px-6 py-3">Deskripsi</th>
                <th class="px-6 py-3 text-center">Jumlah Produk</th>
                <th class="px-6 py-3 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody id="categoryTable">
            @forelse($categories as $index => $category)
            <tr class="category-row border-b dark:border-gray-700"
                data-name="{{ strtolower($category->name) }}"
                data-description="{{ strtolower($category->description ?? '') }}"
                data-products="{{ $category->products_count }}"
                data-created="{{ $category->created_at->format('d M Y') }}"
                data-id="{{ $category->id }}">
                <td class="px-6 py-4 text-center font-medium text-gray-900 dark:text-white">
                    {{ $categories->firstItem() + $index }}
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $category->name }}</td>
                <td class="px-6 py-4">{{ $category->description }}</td>
                <td class="px-6 py-4 text-center">
                    <span class="px-3 py-1 text-xs font-medium text-gray-700 bg-gray-200 rounded-full dark:bg-gray-700 dark:text-gray-300">
                        {{ $category->products_count }} Produk
                    </span>
                </td>
                <td class="px-6 py-4 text-center space-x-1">
                    <button 
                        data-modal-target="viewCategoryModal" 
                        data-modal-toggle="viewCategoryModal"
                        onclick="openDetailCategoryModal(this)"
                        class="text-white bg-sky-600 hover:bg-sky-700 font-medium rounded-lg text-xs px-3 py-1.5">
                        Detail
                    </button>
                    <button
                        onclick="openDeleteCategoryModal({{ $category->id }}, '{{ $category->name }}')"
                        data-modal-target="deleteCategoryModal"
                        data-modal-toggle="deleteCategoryModal"
                        class="text-white bg-red-600 hover:bg-red-700 font-medium rounded-lg text-xs px-3 py-1.5">
                        Hapus
                    </button>
                </td>
            </tr>
            @empty
            <tr id="emptyCategorySearch" class="hidden">
                    <td colspan="6"
                        class="px-6 py-10 text-center text-gray-500 dark:text-gray-400">
                        <div class="flex flex-col items-center gap-2">
                            <svg class="w-10 h-10 text-gray-400"
                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6m16 0v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4m16 0H4"/>
                            </svg>

                            <span class="text-sm font-medium">
                                Kategori tidak ditemukan
                            </span>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
<!-- MODAL DETAIL -->
<div id="viewCategoryModal" tabindex="-1"
     class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow w-full max-w-md">
        <div class="flex justify-between items-center p-4 border-b dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Detail Kategori</h3>
            <button data-modal-hide="viewCategoryModal"
                class="inline-flex items-center justify-center w-8 h-8
                               text-gray-400 rounded-lg 
                               hover:bg-gray-100 hover:text-gray-700
                               dark:hover:bg-gray-700 dark:hover:text-white">✕</button>
        </div>
        <div class="p-6 space-y-3 text-sm text-gray-600 dark:text-gray-300">
            <p><b>Nama:</b> <span id="modalCategoryName"></span></p>
            <p><b>Deskripsi:</b> <span id="modalCategoryDescription"></span></p>
            <p><b>Jumlah Produk:</b> <span id="modalCategoryProducts"></span></p>
            <p><b>Tanggal Dibuat:</b> <span id="modalCategoryCreated"></span></p>
        </div>
        <div class="p-4 border-t dark:border-gray-700 text-right">
            <button data-modal-hide="viewCategoryModal"
                    class="px-5 py-2 text-sm font-medium
                               text-gray-700 bg-gray-100 rounded-lg
                               hover:bg-gray-200
                               dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
                Tutup
            </button>
        </div>
    </div>
</div>
<!-- MODAL DELETE -->
<div id="deleteCategoryModal" tabindex="-1"
     class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="relative w-full max-w-md p-6 bg-white rounded-lg shadow dark:bg-gray-800">
        <div class="flex items-center justify-center w-12 h-12 mx-auto mb-4 bg-red-100 rounded-full dark:bg-red-900">
            <svg class="w-6 h-6 text-red-600 dark:text-red-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0 3.75h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <h3 class="mb-2 text-lg font-semibold text-center text-gray-900 dark:text-white">Hapus Kategori?</h3>
        <p class="mb-6 text-sm text-center text-gray-500 dark:text-gray-400">
            Kategori <span id="deleteCategoryName" class="font-semibold"></span> akan dihapus permanen.
        </p>
        <form id="deleteCategoryForm" method="POST" class="flex justify-center gap-3">
            @csrf
            @method('DELETE')
            <button type="button" data-modal-hide="deleteCategoryModal" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">Batal</button>
            <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800">Ya, Hapus</button>
        </form>
    </div>
</div>
<script>
function openDetailCategoryModal(button) {
    const row = button.closest('tr')
    document.getElementById('modalCategoryName').textContent = row.dataset.name
    document.getElementById('modalCategoryDescription').textContent = row.dataset.description
    document.getElementById('modalCategoryProducts').textContent = row.dataset.products
    document.getElementById('modalCategoryStatus').textContent = row.dataset.status
    document.getElementById('modalCategoryCreated').textContent = row.dataset.created
}

function openDeleteCategoryModal(id, name) {
    document.getElementById('deleteCategoryName').textContent = `"${name}"`
    const form = document.getElementById('deleteCategoryForm')
    form.action = "{{ route('admin.categories.destroy', ':id') }}".replace(':id', id)
}
document.getElementById('searchInput').addEventListener('input', function () {
    const keyword = this.value.toLowerCase()
    let found = false

    document.querySelectorAll('.category-row').forEach(row => {
        const name = row.dataset.name || ''

        if (name.includes(keyword)) {
            row.classList.remove('hidden')
            found = true
        } else {
            row.classList.add('hidden')
        }
    })

    const emptyRow = document.getElementById('emptyCategorySearch')

    if (!found && keyword !== '') {
        emptyRow.classList.remove('hidden')
    } else {
        emptyRow.classList.add('hidden')
    }
})
</script>

@endsection
