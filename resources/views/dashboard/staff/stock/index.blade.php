@extends('layouts.dashboard')

@section('title', 'Manajemen Stok - Staff')

@section('content')
<div class="p-6 space-y-8">

    <!-- HEADER -->
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Konfirmasi Stok</h1>
        <p class="text-sm text-gray-500">
            Konfirmasi penerimaan dan pengeluaran barang
        </p>
    </div>

    <!-- RINGKASAN -->
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        <div class="bg-white rounded-lg p-4 shadow">
            <p class="text-xs text-gray-500">Menunggu Konfirmasi Masuk</p>
            <p class="text-xl font-semibold text-green-600">3</p>
        </div>

        <div class="bg-white rounded-lg p-4 shadow">
            <p class="text-xs text-gray-500">Menunggu Konfirmasi Keluar</p>
            <p class="text-xl font-semibold text-red-600">2</p>
        </div>

        <div class="bg-white rounded-lg p-4 shadow">
            <p class="text-xs text-gray-500">Total Menunggu</p>
            <p class="text-xl font-semibold text-gray-800">5</p>
        </div>
    </div>

    <!-- OPTION VIEW -->
    <div class="bg-white rounded-xl shadow p-4">
        <div class="flex gap-4 mb-6">
            <button onclick="showView('masuk')" id="btn-masuk"
                class="px-4 py-2 rounded-lg text-sm bg-green-500 text-white">
                Barang Masuk
            </button>

            <button onclick="showView('keluar')" id="btn-keluar"
                class="px-4 py-2 rounded-lg text-sm bg-gray-200 text-gray-700">
                Barang Keluar
            </button>
        </div>

        <!-- ================= KONFIRMASI BARANG MASUK ================= -->
        <div id="view-masuk">
            <h2 class="font-semibold mb-3">Konfirmasi Barang Masuk</h2>

            <div class="bg-white rounded-xl border overflow-hidden">
                <table class="w-full text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-3 text-left">Produk</th>
                            <th class="px-4 py-3 text-center">Jumlah</th>
                            <th class="px-4 py-3 text-center">Tanggal</th>
                            <th class="px-4 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3 font-medium">Beras Premium</td>
                            <td class="px-4 py-3 text-center">20</td>
                            <td class="px-4 py-3 text-center">12 Jan 2025</td>
                            <td class="px-4 py-3 text-center">
                                <button class="px-3 py-1 bg-green-500 hover:bg-green-600 text-white text-xs rounded-lg">
                                    Konfirmasi
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- ================= KONFIRMASI BARANG KELUAR ================= -->
        <div id="view-keluar" class="hidden">
            <h2 class="font-semibold mb-3">Konfirmasi Barang Keluar</h2>

            <div class="bg-white rounded-xl border overflow-hidden">
                <table class="w-full text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-3 text-left">Produk</th>
                            <th class="px-4 py-3 text-center">Jumlah</th>
                            <th class="px-4 py-3 text-center">Tanggal</th>
                            <th class="px-4 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3 font-medium">Gula Pasir</td>
                            <td class="px-4 py-3 text-center">5</td>
                            <td class="px-4 py-3 text-center">12 Jan 2025</td>
                            <td class="px-4 py-3 text-center">
                                <button class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white text-xs rounded-lg">
                                    Konfirmasi
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- INFO ROLE -->
    <div class="bg-yellow-50 border border-yellow-200 text-yellow-800 px-4 py-3 rounded-lg text-sm">
        Staff hanya bertugas melakukan konfirmasi barang masuk dan keluar.
        Pencatatan transaksi dilakukan oleh manajer.
    </div>

</div>

<script>
function showView(view) {
    ['masuk','keluar'].forEach(v => {
        document.getElementById('view-' + v).classList.add('hidden');
        document.getElementById('btn-' + v).classList.remove('bg-green-500','bg-red-500','text-white');
        document.getElementById('btn-' + v).classList.add('bg-gray-200','text-gray-700');
    });

    document.getElementById('view-' + view).classList.remove('hidden');
    const btn = document.getElementById('btn-' + view);

    btn.classList.remove('bg-gray-200','text-gray-700');
    btn.classList.add(view === 'masuk' ? 'bg-green-500' : 'bg-red-500','text-white');
}
</script>
@endsection
