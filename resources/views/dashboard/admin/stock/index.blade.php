@extends('layouts.dashboard')

@section('title', 'Manajemen Stok - Admin')

@section('content')
<div class="p-6 space-y-8">

    <!-- HEADER -->
    <div class="flex justify-between items-start">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Manajemen Stok</h1>
            <p class="text-sm text-gray-500">
                Monitoring transaksi, stock opname, dan stok minimum
            </p>
        </div>

       <button onclick="openMinimumModal()"
        class="inline-flex items-center gap-2
               bg-red-500 hover:bg-red-600
               text-white px-4 py-2
               rounded-lg text-sm shadow">

    <svg xmlns="http://www.w3.org/2000/svg"
         viewBox="0 0 20 20"
         fill="currentColor"
         class="w-5 h-5">
        <path fill-rule="evenodd"
              d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495ZM10 5a.75.75 0 0 1 .75.75v3.5a.75.75 0 0 1-1.5 0v-3.5A.75.75 0 0 1 10 5Zm0 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z"
              clip-rule="evenodd" />
    </svg>

    <span>Atur Stok Minimum</span>
</button>

    </div>

    <!-- RINGKASAN -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-white p-4 rounded-lg shadow">
            <p class="text-xs text-gray-500">Total Produk</p>
            <p class="text-xl font-semibold">120</p>
        </div>

        <div class="bg-white p-4 rounded-lg shadow">
            <p class="text-xs text-gray-500">Produk Stok Minimum</p>
            <p class="text-xl font-semibold text-red-600">6</p>
        </div>

        <div class="bg-white p-4 rounded-lg shadow">
            <p class="text-xs text-gray-500">Transaksi Hari Ini</p>
            <p class="text-xl font-semibold">14</p>
        </div>

        <div class="bg-white p-4 rounded-lg shadow">
            <p class="text-xs text-gray-500">Selisih Opname</p>
            <p class="text-xl font-semibold text-orange-500">2 Produk</p>
        </div>
    </div>

   <!-- WARNING STOK MINIMUM -->
<div class="bg-red-50 border border-red-200 rounded-lg p-4">
    <h3 class="flex items-center gap-2 font-semibold text-red-700 mb-2">
        <svg xmlns="http://www.w3.org/2000/svg"
             viewBox="0 0 20 20"
             fill="currentColor"
             class="w-5 h-5 flex-shrink-0">
            <path fill-rule="evenodd"
                  d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495ZM10 5a.75.75 0 0 1 .75.75v3.5a.75.75 0 0 1-1.5 0v-3.5A.75.75 0 0 1 10 5Zm0 9a 1 1 0 1 0 0-2 1 1 0 0 0 0 2Z"
                  clip-rule="evenodd" />
        </svg>

        <span>Produk di Bawah Stok Minimum</span>
    </h3>

    <ul class="text-sm text-red-600 space-y-1">
        <li>• Beras Premium (25 / minimum 30)</li>
        <li>• Gula Pasir (8 / minimum 10)</li>
    </ul>
</div>

    <!-- OPTION VIEW -->
    <div class="bg-white rounded-xl shadow p-4">
        <div class="flex gap-4 mb-4">
            <button onclick="showView('riwayat')" id="btn-riwayat"
                class="px-4 py-2 text-sm rounded-lg bg-indigo-500 text-white">
                Riwayat Transaksi
            </button>
            <button onclick="showView('opname')" id="btn-opname"
                class="px-4 py-2 text-sm rounded-lg bg-gray-200 text-gray-700">
                Stock Opname
            </button>
        </div>

        <!-- RIWAYAT -->
        <div id="view-riwayat">
            <table class="w-full text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left">Produk</th>
                        <th class="px-4 py-3 text-center">Tipe</th>
                        <th class="px-4 py-3 text-center">Jumlah</th>
                        <th class="px-4 py-3 text-center">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="px-4 py-3">Beras Premium</td>
                        <td class="px-4 py-3 text-center text-green-600">Masuk</td>
                        <td class="px-4 py-3 text-center">+20</td>
                        <td class="px-4 py-3 text-center">10 Jan 2025</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-3">Beras Premium</td>
                        <td class="px-4 py-3 text-center text-red-600">Keluar</td>
                        <td class="px-4 py-3 text-center">-5</td>
                        <td class="px-4 py-3 text-center">11 Jan 2025</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- OPNAME -->
        <div id="view-opname" class="hidden">
            <table class="w-full text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left">Produk</th>
                        <th class="px-4 py-3 text-center">Stok Sistem</th>
                        <th class="px-4 py-3 text-center">Stok Fisik</th>
                        <th class="px-4 py-3 text-center">Selisih</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="px-4 py-3">Gula Pasir</td>
                        <td class="px-4 py-3 text-center">100</td>
                        <td class="px-4 py-3 text-center">95</td>
                        <td class="px-4 py-3 text-center text-red-600 font-semibold">-5</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- MODAL STOK MINIMUM -->
<div id="minimumModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-xl w-full max-w-md p-6">
        <h3 class="font-semibold mb-4">Atur Stok Minimum</h3>

        <form>
            <label class="text-sm">Produk</label>
            <select class="w-full border rounded-lg px-3 py-2 mb-3 text-sm">
                <option>Beras Premium</option>
                <option>Gula Pasir</option>
            </select>

            <label class="text-sm">Stok Minimum</label>
            <input type="number" class="w-full border rounded-lg px-3 py-2 mb-4 text-sm">

            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeMinimumModal()"
                    class="px-4 py-2 border rounded-lg text-sm">Batal</button>
                <button type="submit"
                    class="px-4 py-2 bg-red-500 text-white rounded-lg text-sm">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
function showView(view) {
    document.getElementById('view-riwayat').classList.add('hidden');
    document.getElementById('view-opname').classList.add('hidden');

    document.getElementById('btn-riwayat').classList.remove('bg-indigo-500','text-white');
    document.getElementById('btn-opname').classList.remove('bg-indigo-500','text-white');

    document.getElementById('btn-riwayat').classList.add('bg-gray-200','text-gray-700');
    document.getElementById('btn-opname').classList.add('bg-gray-200','text-gray-700');

    document.getElementById('view-' + view).classList.remove('hidden');
    document.getElementById('btn-' + view).classList.remove('bg-gray-200','text-gray-700');
    document.getElementById('btn-' + view).classList.add('bg-indigo-500','text-white');
}

function openMinimumModal() {
    document.getElementById('minimumModal').classList.remove('hidden');
    document.getElementById('minimumModal').classList.add('flex');
}
function closeMinimumModal() {
    document.getElementById('minimumModal').classList.add('hidden');
}
</script>
@endsection
