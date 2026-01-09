@extends('layouts.dashboard')

@section('title', 'Kelola Supplier')

@section('content')

<!-- HEADER -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Kelola Supplier</h1>

    <div class="flex items-center gap-2">
        <!-- SEARCH -->
        <div class="relative">
            <input id="searchInput" type="text"
                   placeholder="Cari supplier / kategori"
                   class="pl-9 pr-3 py-2 text-sm border rounded-lg
                          focus:ring-2 focus:ring-indigo-300 focus:outline-none">

            <svg class="w-4 h-4 absolute left-3 top-2.5 text-gray-400"
                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-4.35-4.35M17 10a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </div>

        <!-- ADD -->
        <button onclick="openAddModal()"
                class="inline-flex items-center gap-2 px-4 py-2
                       text-sm text-white bg-indigo-500 rounded-lg hover:bg-indigo-600">
            + Tambah Supplier
        </button>
    </div>
</div>

<!-- TABLE -->
<div class="bg-white rounded-xl shadow overflow-x-auto">
    <table class="w-full text-sm text-gray-600">
        <thead class="bg-gray-100 text-xs uppercase text-gray-700">
            <tr>
                <th class="px-6 py-3 text-center">Nama</th>
                <th class="px-6 py-3 text-center">Kategori</th>
                <th class="px-6 py-3 text-center">Kontak</th>
                <th class="px-6 py-3 text-center">Bergabung</th>
                <th class="px-6 py-3 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody id="supplierTable">
            <tr class="supplier-row border-b hover:bg-gray-50"
                data-name="aulia"
                data-category="sembako">

                <td class="px-6 py-4 text-center font-medium text-gray-900">
                    Aulia Supplier
                </td>

                <td class="px-6 py-4 text-center">
                    <span class="px-3 py-1 text-xs bg-green-100 text-green-700 rounded-full">
                        Sembako
                    </span>
                </td>

                <td class="px-6 py-4 text-center">
                    087654678912
                </td>

                <td class="px-6 py-4 text-center">
                    12 Jan 2025
                </td>

                <td class="px-6 py-4 text-center space-x-2">
                    <button onclick="openDetailModal()"
                            class="px-3 py-1.5 text-xs bg-sky-500 text-white rounded-lg">
                        Detail
                    </button>

                    <button onclick="openEditModal()"
                            class="px-3 py-1.5 text-xs bg-indigo-500 text-white rounded-lg">
                        Edit
                    </button>

                    <button onclick="openDeleteModal()"
                            class="px-3 py-1.5 text-xs bg-red-500 text-white rounded-lg">
                        Hapus
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- ================= MODAL ADD ================= -->
<div id="addModal" class="fixed inset-0 hidden bg-black/50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl w-full max-w-lg p-6 animate-scale">
        <h2 class="text-lg font-semibold mb-4">Tambah Supplier</h2>

        <form class="space-y-4">
            <input placeholder="Nama Supplier" class="w-full border rounded-lg px-3 py-2 text-sm">
            <input placeholder="Alamat" class="w-full border rounded-lg px-3 py-2 text-sm">
            <input placeholder="Kontak" class="w-full border rounded-lg px-3 py-2 text-sm">
            <input placeholder="Email" class="w-full border rounded-lg px-3 py-2 text-sm">

            <select class="w-full border rounded-lg px-3 py-2 text-sm">
                <option>Kategori Barang</option>
                <option>Sembako</option>
                <option>Minuman</option>
                <option>ATK</option>
            </select>

            <div class="flex justify-end gap-2 pt-4">
                <button type="button" onclick="closeAddModal()"
                        class="px-4 py-2 border rounded-lg">
                    Batal
                </button>
                <button class="px-4 py-2 bg-indigo-500 text-white rounded-lg">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ================= MODAL DETAIL ================= -->
<div id="detailModal" class="fixed inset-0 hidden bg-black/50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl w-full max-w-md p-6 animate-scale">
        <h2 class="text-lg font-semibold mb-4">Detail Supplier</h2>

        <div class="space-y-2 text-sm text-gray-600">
            <p><b>Nama:</b> Aulia Supplier</p>
            <p><b>Email:</b> aulia@email.com</p>
            <p><b>Kontak:</b> 087654678912</p>
            <p><b>Kategori:</b> Sembako</p>
            <p><b>Tanggal Bergabung:</b> 12 Januari 2025</p>
            <p><b>Alamat:</b> Batam, Kepulauan Riau</p>
        </div>

        <div class="text-right mt-6">
            <button onclick="closeDetailModal()"
                    class="px-4 py-2 border rounded-lg">
                Tutup
            </button>
        </div>
    </div>
</div>

<!-- ================= MODAL EDIT ================= -->
<div id="editModal" class="fixed inset-0 hidden bg-black/50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl w-full max-w-lg p-6 animate-scale">
        <h2 class="text-lg font-semibold mb-4">Edit Supplier</h2>

        <form class="space-y-4">
            <input class="w-full border rounded-lg px-3 py-2 text-sm" value="Aulia Supplier">
            <input class="w-full border rounded-lg px-3 py-2 text-sm" value="Batam">
            <input class="w-full border rounded-lg px-3 py-2 text-sm" value="087654678912">
            <input class="w-full border rounded-lg px-3 py-2 text-sm" value="aulia@email.com">

            <div class="flex justify-end gap-2 pt-4">
                <button type="button" onclick="closeEditModal()"
                        class="px-4 py-2 border rounded-lg">
                    Batal
                </button>
                <button class="px-4 py-2 bg-indigo-500 text-white rounded-lg">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ================= MODAL DELETE ================= -->
<div id="deleteModal" class="fixed inset-0 hidden bg-black/50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl p-6 w-full max-w-sm text-center animate-scale">
        <h3 class="text-lg font-semibold mb-2">Yakin hapus?</h3>
        <p class="text-sm text-gray-500 mb-4">
            Data supplier akan dihapus permanen.
        </p>

        <div class="flex justify-center gap-3">
            <button onclick="closeDeleteModal()"
                    class="px-4 py-2 border rounded-lg">
                Batal
            </button>
            <button class="px-4 py-2 bg-red-500 text-white rounded-lg">
                Ya, hapus
            </button>
        </div>
    </div>
</div>

<!-- ================= SCRIPT ================= -->
<script>
const toggle = (id, show) =>
    document.getElementById(id).classList.toggle('hidden', !show)

const openAddModal     = () => toggle('addModal', true)
const closeAddModal    = () => toggle('addModal', false)
const openDetailModal  = () => toggle('detailModal', true)
const closeDetailModal = () => toggle('detailModal', false)
const openEditModal    = () => toggle('editModal', true)
const closeEditModal   = () => toggle('editModal', false)
const openDeleteModal  = () => toggle('deleteModal', true)
const closeDeleteModal = () => toggle('deleteModal', false)

/* SEARCH */
document.getElementById('searchInput').addEventListener('input', function () {
    const keyword = this.value.toLowerCase()
    document.querySelectorAll('.supplier-row').forEach(row => {
        row.classList.toggle(
            'hidden',
            !row.dataset.name.includes(keyword) &&
            !row.dataset.category.includes(keyword)
        )
    })
})
</script>

<!-- ================= ANIMATION ================= -->
<style>
@keyframes scaleIn {
    from { transform: scale(.95); opacity: 0 }
    to   { transform: scale(1); opacity: 1 }
}
.animate-scale {
    animation: scaleIn .2s ease-out;
}
</style>

@endsection
