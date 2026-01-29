@extends('dashboard.admin.layout')

@section('title', 'Kelola Supplier')

@section('content')

<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
        Kelola Supplier
    </h1>
    <div class="flex items-center gap-2">
        <div class="relative">
            <input id="searchInput" type="text"
                   placeholder="Cari Supplier"
                   class="block w-64 pl-10 text-sm border border-gray-300 rounded-lg
                          bg-gray-50 focus:ring-indigo-500 focus:border-indigo-500
                          dark:bg-gray-700 dark:border-gray-600 dark:text-white">

            <svg class="w-4 h-4 absolute left-3 top-3 text-gray-500"
                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-4.35-4.35M17 10a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </div>
        <a href="{{ route('admin.supplier.create') }}"
        class="inline-flex items-center px-4 py-2 text-sm font-medium
                text-white bg-indigo-600 rounded-lg hover:bg-indigo-700">
            + Tambah Supplier
        </a>
    </div>
</div>

<!-- TABLE -->
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100
                      dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="px-6 py-3 text-center">No</th>
                <th class="px-6 py-3 text-center">Nama</th>
                <th class="px-6 py-3 text-center">Email</th>
                <th class="px-6 py-3 text-center">Telepon</th>
                <th class="px-6 py-3 text-center">Alamat</th>
                <th class="px-6 py-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody id="supplierTable">
            @forelse ($suppliers as $supplier)
                <tr class="supplier-row border-b dark:border-gray-700"
                    data-name="{{ strtolower($supplier->name) }}"
                    data-email="{{ $supplier->email }}"
                    data-phone="{{ $supplier->phone }}"
                    data-address="{{ $supplier->address }}"
                    data-created="{{ $supplier->created_at->format('d M Y') }}">

                    <td class="px-6 py-4 text-center">{{ $loop->iteration }}</td>

                    <td class="px-6 py-4 text-center font-medium text-gray-900 dark:text-white">
                        {{ $supplier->name }}
                    </td>

                    <td class="px-6 py-4 text-center">{{ $supplier->email ?? '-' }}</td>
                    <td class="px-6 py-4 text-center">{{ $supplier->phone ?? '-' }}</td>
                    <td class="px-6 py-4 text-center">{{ $supplier->address ?? '-' }}</td>

                    <td class="px-6 py-4 text-center space-x-1">
                        <button
                            onclick="openDetail(this)"
                            data-modal-target="detailModal"
                            data-modal-toggle="detailModal"
                            class="text-white bg-sky-600 hover:bg-sky-700
                                font-medium rounded-lg text-xs px-3 py-1.5">
                            Detail
                        </button>
                        <a href="{{ route('admin.supplier.edit', $supplier->id) }}"
                        class="text-white bg-indigo-600 hover:bg-indigo-700
                                font-medium rounded-lg text-xs px-3 py-1.5">
                            Edit
                        </a>
                        <button
                            onclick="openDeleteModal({{ $supplier->id }}, '{{ $supplier->name }}')"
                            data-modal-target="deleteModal"
                            data-modal-toggle="deleteModal"
                            class="text-white bg-red-600 hover:bg-red-700
                                font-medium rounded-lg text-xs px-3 py-1.5">
                            Hapus
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
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
                                Data supplier tidak tersedia
                            </span>
                        </div>
                    </td>
                </tr>
            @endforelse
            <tr id="emptySearchRow" class="hidden">
                <td colspan="6"
                    class="px-6 py-10 text-center text-gray-500 dark:text-gray-400">
                    <div class="flex flex-col items-center gap-2">
                        <span class="text-sm font-medium">
                            Supplier tidak ditemukan
                        </span>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!--MODAL DETAIL-->
<div id="detailModal"
     tabindex="-1"
     aria-hidden="true"
     class="fixed inset-0 z-50 hidden flex items-center justify-center
            bg-black/40 backdrop-blur-sm">
    <div class="relative w-full max-w-md mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg">
            <div class="flex items-center justify-between px-6 py-4
                        border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Detail Supplier
                </h3>
                <button type="button"
                        data-modal-hide="detailModal"
                        class="inline-flex items-center justify-center w-8 h-8
                               text-gray-400 rounded-lg
                               hover:bg-gray-100 hover:text-gray-700
                               dark:hover:bg-gray-700 dark:hover:text-white">
                    ✕
                </button>
            </div>
            <div class="px-6 py-5 space-y-4 text-sm">
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">Nama Supplier</span>
                    <span id="detail-name"
                          class="font-medium text-gray-900 dark:text-white">
                        -
                    </span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">Email</span>
                    <span id="detail-email"
                          class="text-gray-700 dark:text-gray-300">
                        -
                    </span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">Telepon</span>
                    <span id="detail-phone"
                          class="text-gray-700 dark:text-gray-300">
                        -
                    </span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">Alamat</span>
                    <span id="detail-address"
                          class="text-gray-700 dark:text-gray-300 text-right">
                        -
                    </span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">
                        Tanggal Ditambahkan
                    </span>
                    <span id="detail-created"
                          class="text-gray-700 dark:text-gray-300">
                        -
                    </span>
                </div>
            </div>
            <div class="flex justify-end px-6 py-4
                        border-t border-gray-200 dark:border-gray-700">
                <button data-modal-hide="detailModal"
                        class="px-5 py-2 text-sm font-medium
                               text-gray-700 bg-gray-100 rounded-lg
                               hover:bg-gray-200
                               dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>
<!--MODAL HAPUS SUPPLIER-->
<div id="deleteModal" tabindex="-1"
     class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">

    <div class="relative w-full max-w-md p-6 bg-white rounded-lg shadow
                dark:bg-gray-800">

        <div class="flex items-center justify-center w-12 h-12 mx-auto mb-4
                    bg-red-100 rounded-full dark:bg-red-900">
            <svg class="w-6 h-6 text-red-600 dark:text-red-300"
                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 9v3.75m0 3.75h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <h3 class="mb-2 text-lg font-semibold text-center
                   text-gray-900 dark:text-white">
            Hapus Supplier?
        </h3>
        <p class="mb-6 text-sm text-center
                  text-gray-500 dark:text-gray-400">
            Supplier <span id="deleteSupplierName" class="font-semibold"></span>
            akan dihapus permanen dan tidak dapat dikembalikan.
        </p>

        <form id="deleteForm" method="POST" class="flex justify-center gap-3">
            @csrf
            @method('DELETE')
            <button type="button"
                    data-modal-hide="deleteModal"
                    class="px-4 py-2 text-sm font-medium
                           text-gray-700 bg-gray-200 rounded-lg
                           hover:bg-gray-300
                           dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                Batal
            </button>
            <button type="submit"
                    class="px-4 py-2 text-sm font-medium
                           text-white bg-red-600 rounded-lg
                           hover:bg-red-700 focus:ring-4 focus:ring-red-300
                           dark:focus:ring-red-800">
                Ya, Hapus
            </button>
        </form>
    </div>
</div>
<script>
function openDeleteModal(id, name) {
    const form = document.getElementById('deleteForm')
    const nameText = document.getElementById('deleteSupplierName')

    nameText.textContent = `"${name}"`
    form.action = `/dashboard/admin/supplier/${id}`
}
</script>
<script>
function openDetail(button) {
    const row = button.closest('tr')

    document.getElementById('detail-name').textContent =
        row.dataset.name

    document.getElementById('detail-email').textContent =
        row.dataset.email || '-'

    document.getElementById('detail-phone').textContent =
        row.dataset.phone || '-'

    document.getElementById('detail-address').textContent =
        row.dataset.address || '-'

    document.getElementById('detail-created').textContent =
        row.dataset.created || '-'
}
</script>

<script>
document.getElementById('searchInput').addEventListener('input', function () {
    const keyword = this.value.toLowerCase()
    let found = false

    document.querySelectorAll('.supplier-row').forEach(row => {
        const name = row.dataset.name || ''

        if (name.includes(keyword)) {
            row.classList.remove('hidden')
            found = true
        } else {
            row.classList.add('hidden')
        }
    })
    const emptyRow = document.getElementById('emptySearchRow')

    if (!found && keyword !== '') {
        emptyRow.classList.remove('hidden')
    } else {
        emptyRow.classList.add('hidden')
    }
})
</script>
<style>
tr, tr:hover, tr:active, tr:focus {
    background-color: transparent !important;
}
</style>

@endsection
