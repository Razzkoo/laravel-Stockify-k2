@extends('layouts.dashboard')

@section('title', 'Manajemen Stok - Manajer')

@section('content')
<div class="p-6 space-y-8">

    <!-- HEADER -->
    <div class="flex justify-between items-start">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Manajemen Stok</h1>
            <p class="text-sm text-gray-500">
                Input transaksi barang dan stock opname
            </p>
        </div>
    </div>

    <!-- RINGKASAN -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-white p-4 rounded-lg shadow">
            <p class="text-xs text-gray-500">Total Produk</p>
            <p class="text-xl font-semibold">120</p>
        </div>

        <div class="bg-white p-4 rounded-lg shadow">
            <p class="text-xs text-gray-500">Barang Masuk Hari Ini</p>
            <p class="text-xl font-semibold text-green-600">5</p>
        </div>

        <div class="bg-white p-4 rounded-lg shadow">
            <p class="text-xs text-gray-500">Barang Keluar Hari Ini</p>
            <p class="text-xl font-semibold text-red-600">3</p>
        </div>

        <div class="bg-white p-4 rounded-lg shadow">
            <p class="text-xs text-gray-500">Menunggu Konfirmasi Staff</p>
            <p class="text-xl font-semibold text-orange-500">2</p>
        </div>
    </div>

    <!-- OPTION VIEW -->
    <div class="bg-white rounded-xl shadow p-4">
        <div class="flex gap-4 mb-6">
            <button onclick="showView('masuk')" id="btn-masuk"
                class="px-4 py-2 text-sm rounded-lg bg-green-500 text-white">
                Barang Masuk
            </button>
            <button onclick="showView('keluar')" id="btn-keluar"
                class="px-4 py-2 text-sm rounded-lg bg-gray-200 text-gray-700">
                Barang Keluar
            </button>
            <button onclick="showView('opname')" id="btn-opname"
                class="px-4 py-2 text-sm rounded-lg bg-gray-200 text-gray-700">
                Stock Opname
            </button>
        </div>

        <!-- ================= BARANG MASUK ================= -->
        <div id="view-masuk">
            <h2 class="font-semibold mb-4">Input Barang Masuk</h2>

            <form class="grid md:grid-cols-3 gap-4 mb-6">
                <select class="border rounded-lg px-3 py-2 text-sm">
                    <option>Pilih Produk</option>
                    <option>Beras Premium</option>
                    <option>Gula Pasir</option>
                </select>

                <input type="number" placeholder="Jumlah"
                    class="border rounded-lg px-3 py-2 text-sm">

                <input type="date"
                    class="border rounded-lg px-3 py-2 text-sm">
            </form>

            <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm mb-6">
                Simpan Barang Masuk
            </button>

            <!-- DAFTAR BARANG MASUK -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-3 py-2 text-left">Tanggal</th>
                            <th class="px-3 py-2 text-left">Produk</th>
                            <th class="px-3 py-2 text-center">Jumlah</th>
                            <th class="px-3 py-2 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t">
                            <td class="px-3 py-2">2026-01-06</td>
                            <td class="px-3 py-2">Beras Premium</td>
                            <td class="px-3 py-2 text-center">10</td>
                            <td class="px-3 py-2 text-center text-orange-500">
                                Menunggu Konfirmasi
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- ================= BARANG KELUAR ================= -->
        <div id="view-keluar" class="hidden">
            <h2 class="font-semibold mb-4">Input Barang Keluar</h2>

            <form class="grid md:grid-cols-3 gap-4 mb-6">
                <select class="border rounded-lg px-3 py-2 text-sm">
                    <option>Pilih Produk</option>
                    <option>Beras Premium</option>
                    <option>Gula Pasir</option>
                </select>

                <input type="number" placeholder="Jumlah"
                    class="border rounded-lg px-3 py-2 text-sm">

                <input type="date"
                    class="border rounded-lg px-3 py-2 text-sm">
            </form>

            <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm mb-6">
                Simpan Barang Keluar
            </button>

            <!-- DAFTAR BARANG KELUAR -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-3 py-2 text-left">Tanggal</th>
                            <th class="px-3 py-2 text-left">Produk</th>
                            <th class="px-3 py-2 text-center">Jumlah</th>
                            <th class="px-3 py-2 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t">
                            <td class="px-3 py-2">2026-01-05</td>
                            <td class="px-3 py-2">Gula Pasir</td>
                            <td class="px-3 py-2 text-center">5</td>
                            <td class="px-3 py-2 text-center text-green-600">
                                Dikonfirmasi
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- ================= STOCK OPNAME ================= -->
        <div id="view-opname" class="hidden">
            <h2 class="font-semibold mb-4">Stock Opname</h2>

            <form class="grid md:grid-cols-4 gap-4 mb-6">
                <select class="border rounded-lg px-3 py-2 text-sm">
                    <option>Pilih Produk</option>
                    <option>Beras Premium</option>
                    <option>Gula Pasir</option>
                </select>

                <input type="number" class="border rounded-lg px-3 py-2 text-sm bg-gray-100" disabled value="100">
                <input type="number" placeholder="Stok Fisik"
                    class="border rounded-lg px-3 py-2 text-sm">
                <input type="date"
                    class="border rounded-lg px-3 py-2 text-sm">
            </form>

            <button class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm mb-6">
                Simpan Stock Opname
            </button>

            <!-- DAFTAR OPNAME -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-3 py-2 text-left">Tanggal</th>
                            <th class="px-3 py-2 text-left">Produk</th>
                            <th class="px-3 py-2 text-center">Selisih</th>
                            <th class="px-3 py-2 text-center">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t">
                            <td class="px-3 py-2">2026-01-04</td>
                            <td class="px-3 py-2">Beras Premium</td>
                            <td class="px-3 py-2 text-center text-red-500">-2</td>
                            <td class="px-3 py-2 text-center">Kurang</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- INFO ROLE -->
    <div class="bg-blue-50 border border-blue-200 text-blue-800 px-4 py-3 rounded-lg text-sm">
        Manajer bertanggung jawab atas pencatatan transaksi dan stock opname.
        Pengaturan stok minimum dilakukan oleh admin.
    </div>

</div>

<script>
function showView(view) {
    ['masuk','keluar','opname'].forEach(v => {
        document.getElementById('view-' + v).classList.add('hidden');
        document.getElementById('btn-' + v).classList.remove('bg-green-500','bg-red-500','bg-indigo-500','text-white');
        document.getElementById('btn-' + v).classList.add('bg-gray-200','text-gray-700');
    });

    document.getElementById('view-' + view).classList.remove('hidden');

    const btn = document.getElementById('btn-' + view);
    btn.classList.remove('bg-gray-200','text-gray-700');

    if(view === 'masuk') btn.classList.add('bg-green-500','text-white');
    if(view === 'keluar') btn.classList.add('bg-red-500','text-white');
    if(view === 'opname') btn.classList.add('bg-indigo-500','text-white');
}
</script>
@endsection
