@extends('layouts.dashboard')

@section('title', 'Kategori Produk')

@section('content')
<div class="space-y-6">

<!-- HEADER -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Kategori Produk</h1>
        <p class="text-sm text-gray-500">Kelola dan klasifikasikan produk dalam sistem</p>
    </div>

    <div class="flex gap-2">
        <a href="/dashboard/admin/product"
           class="px-4 py-2 bg-indigo-400 text-white rounded-lg text-sm hover:bg-indigo-500 transition">
            Kembali
        </a>

        <button onclick="openModal()"
           class="px-4 py-2 bg-indigo-400 text-white rounded-lg text-sm hover:bg-indigo-500 transition">
            + Tambah Kategori
        </button>
    </div>
</div>

<!-- TOOLBAR -->
<div class="bg-white rounded-xl shadow-sm border p-4 flex flex-col md:flex-row gap-4 md:items-center md:justify-between">
    <input type="text"
           placeholder="Cari kategori..."
           class="w-full md:w-64 px-3 py-2 text-sm border rounded-lg focus:ring focus:ring-indigo-200">

    <select class="w-full md:w-48 px-3 py-2 text-sm border rounded-lg focus:ring focus:ring-indigo-200">
        <option>Semua Status</option>
        <option>Aktif</option>
        <option>Nonaktif</option>
    </select>
</div>

<!-- TABLE -->
<div class="bg-white rounded-xl shadow-sm border overflow-hidden">
<table class="w-full text-sm">
<thead class="bg-gray-50 text-gray-500">
<tr>
    <th class="p-4 text-center w-12">No</th>
    <th class="p-4 text-left">Nama Kategori</th>
    <th class="p-4 text-left">Deskripsi</th>
    <th class="p-4 text-center">Jumlah Produk</th>
    <th class="p-4 text-center">Status</th>
    <th class="p-4 text-center">Aksi</th>
</tr>
</thead>

<tbody class="text-gray-700">
<tr class="border-t hover:bg-gray-50">
    <td class="p-4 text-center font-medium">1</td>
    <td class="p-4 font-medium">Minuman</td>
    <td class="p-4 text-gray-500">Produk minuman kemasan</td>
    <td class="p-4 text-center">
        <span class="px-3 py-1 text-xs bg-blue-100 text-blue-700 rounded-full">
            12 Produk
        </span>
    </td>
    <td class="p-4 text-center">
        <span class="px-3 py-1 text-xs bg-green-100 text-green-700 rounded-full">
            Aktif
        </span>
    </td>
    <td class="p-4 text-center space-x-1">

        <!-- DETAIL -->
        <button
            onclick="openDetailModal(
                'Minuman',
                'Produk minuman kemasan',
                '12 Produk',
                'Aktif',
                '12 Januari 2025'
            )"
            class="px-3 py-1.5 text-xs bg-gray-200 rounded hover:bg-gray-300 transition">
            Detail
        </button>

        <!-- HAPUS -->
        <button
            onclick="openDeleteModal(this)"
            class="px-3 py-1.5 text-xs bg-red-400 text-white rounded hover:bg-red-500 transition">
            Hapus
        </button>

    </td>
</tr>
</tbody>
</table>
</div>
</div>

<!-- ================= MODAL DETAIL ================= -->
<div id="detailModal" class="fixed inset-0 bg-black/50 hidden z-50">
<div class="flex items-center justify-center min-h-screen px-4">
<div id="detailBox"
     class="bg-white w-full max-w-md rounded-xl shadow-lg
            scale-95 opacity-0 transition-all duration-200">

    <div class="flex items-center justify-between px-6 py-4 border-b">
        <h2 class="text-lg font-semibold text-gray-800">Detail Kategori</h2>
        <button onclick="closeDetailModal()" class="text-xl">&times;</button>
    </div>

    <div class="p-6 space-y-3 text-sm">
        <p><b>Nama:</b> <span id="dNama"></span></p>
        <p><b>Deskripsi:</b> <span id="dDesc"></span></p>
        <p><b>Jumlah Produk:</b> <span id="dJumlah"></span></p>
        <p><b>Status:</b> <span id="dStatus"></span></p>
        <p><b>Tanggal Dibuat:</b> <span id="dTanggal"></span></p>
    </div>

    <div class="px-6 py-4 border-t text-right">
        <button onclick="closeDetailModal()" class="px-4 py-2 border rounded-lg">
            Tutup
        </button>
    </div>
</div>
</div>
</div>

<!-- ================= MODAL HAPUS (ANIMASI) ================= -->
<div id="deleteModal" class="fixed inset-0 bg-black/50 hidden z-50">
<div class="flex items-center justify-center min-h-screen px-4">
<div id="deleteBox"
     class="bg-white w-full max-w-sm rounded-xl shadow-lg
            scale-95 opacity-0 transition-all duration-200">

    <div class="px-6 py-4 border-b">
        <h2 class="text-lg font-semibold">Hapus Data?</h2>
    </div>

    <div class="p-6 text-sm text-gray-600">
        Data yang dihapus tidak bisa dikembalikan.
    </div>

    <div class="px-6 py-4 border-t flex justify-end gap-2">
        <button onclick="closeDeleteModal()" class="px-4 py-2 border rounded-lg">
            Batal
        </button>
        <button onclick="confirmDelete()"
                class="px-4 py-2 bg-red-500 text-white rounded-lg animate-pulse">
            Hapus
        </button>
    </div>
</div>
</div>
</div>

<!-- ================= MODAL TAMBAH ================= -->
<div id="categoryModal" class="fixed inset-0 bg-black/50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="bg-white w-full max-w-lg rounded-xl shadow-lg">

            <!-- HEADER -->
            <div class="flex justify-between items-center px-6 py-4 border-b">
                <h2 class="text-lg font-semibold">Tambah Kategori</h2>
                <button onclick="closeModal()" class="text-xl">&times;</button>
            </div>

            <!-- BODY -->
            <div class="p-6 space-y-4">
                <input type="text" placeholder="Nama Kategori"
                       class="w-full border px-3 py-2 rounded-lg">

                <input type="number" placeholder="Jumlah Produk"
                       class="w-full border px-3 py-2 rounded-lg">

                <input type="number" placeholder="Masukkan stok"
                       class="w-full border px-3 py-2 rounded-lg">

                <select class="w-full px-3 py-2 text-sm border rounded-lg focus:ring focus:ring-indigo-200">
                    <option>Pilih Status</option>
                    <option>Aktif</option>
                    <option>Nonaktif</option>
                </select>

                <textarea rows="3" placeholder="Deskripsi"
                          class="w-full border px-3 py-2 rounded-lg"></textarea>

                <!-- FOOTER -->
                <div class="flex justify-end gap-2 pt-4">
                    <button type="button" onclick="closeModal()"
                            class="px-4 py-2 border rounded-lg hover:bg-gray-100">
                        Batal
                    </button>
                    <button class="px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600">
                        Simpan
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- ================= SCRIPT ================= -->
<script>
let selectedRow = null;

function openDeleteModal(btn) {
    selectedRow = btn.closest('tr');
    deleteModal.classList.remove('hidden');
    setTimeout(() => {
        deleteBox.classList.remove('scale-95','opacity-0');
    }, 10);
}

function closeDeleteModal() {
    deleteBox.classList.add('scale-95','opacity-0');
    setTimeout(() => {
        deleteModal.classList.add('hidden');
    }, 200);
}

function confirmDelete() {
    selectedRow.classList.add('opacity-0','translate-x-4');
    setTimeout(() => selectedRow.remove(), 300);
    closeDeleteModal();
}

function openDetailModal(n,d,j,s,t){
    dNama.textContent=n;
    dDesc.textContent=d;
    dJumlah.textContent=j;
    dStatus.textContent=s;
    dTanggal.textContent=t;
    detailModal.classList.remove('hidden');
    setTimeout(()=>detailBox.classList.remove('scale-95','opacity-0'),10);
}
function closeDetailModal(){
    detailBox.classList.add('scale-95','opacity-0');
    setTimeout(()=>detailModal.classList.add('hidden'),200);
}

function openModal(){ categoryModal.classList.remove('hidden') }
function closeModal(){ categoryModal.classList.add('hidden') }
</script>
@endsection
