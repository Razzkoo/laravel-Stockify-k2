@extends('layouts.dashboard')

@section('title', 'Dashboard Staff')

@section('content')

<div class="space-y-8">

    <!-- HEADER -->
    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-xl font-semibold text-gray-800">
                    Dashboard Staff Gudang
                </h1>
                <p class="text-sm text-gray-500 mt-1">
                    Daftar tugas operasional yang perlu diselesaikan hari ini
                </p>
            </div>

           <!-- RIGHT -->
    <div class="text-sm text-gray-500 flex items-center gap-2">
        <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
</svg>
</span>
        <span>{{ date('l, d M Y') }}</span>
    </div>

        </div>
    </div>

    <!-- SUMMARY TASK -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="bg-white rounded-xl p-5 shadow border-l-4 border-yellow-400 hover:shadow-md transition">
            <p class="text-sm text-gray-500">Barang Masuk</p>
            <h2 class="text-3xl font-bold text-yellow-600 mt-1">3</h2>
            <p class="text-xs text-gray-400 mt-1">Perlu dicek</p>
        </div>

        <div class="bg-white rounded-xl p-5 shadow border-l-4 border-blue-400 hover:shadow-md transition">
            <p class="text-sm text-gray-500">Barang Keluar</p>
            <h2 class="text-3xl font-bold text-blue-600 mt-1">2</h2>
            <p class="text-xs text-gray-400 mt-1">Perlu disiapkan</p>
        </div>

        <div class="bg-white rounded-xl p-5 shadow border-l-4 border-green-500 hover:shadow-md transition">
            <p class="text-sm text-gray-500">Tugas Selesai</p>
            <h2 class="text-3xl font-bold text-green-600 mt-1">5</h2>
            <p class="text-xs text-gray-400 mt-1">Hari ini</p>
        </div>

    </div>

    <!-- TASK LIST -->
    <div class="bg-white rounded-lg shadow">

        <div class="p-4 border-b">
            <h2 class="font-semibold text-gray-700">
                Daftar Tugas Hari Ini
            </h2>
        </div>

        <div class="p-4 overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="text-left text-gray-500">
                    <tr>
                        <th class="py-2">Jenis</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody class="text-gray-700">

                    <tr class="border-t hover:bg-gray-50">
                        <td class="py-2">Barang Masuk</td>
                        <td>Minyak Goreng</td>
                        <td>50</td>
                        <td>
                            <span class="px-2 py-1 text-xs rounded bg-yellow-100 text-yellow-700">
                                Perlu Dicek
                            </span>
                        </td>
                        <td>
                            <button class="text-xs text-blue-600 hover:underline">
                                Proses
                            </button>
                        </td>
                    </tr>

                    <tr class="border-t hover:bg-gray-50">
                        <td class="py-2">Barang Keluar</td>
                        <td>Beras 5kg</td>
                        <td>20</td>
                        <td>
                            <span class="px-2 py-1 text-xs rounded bg-blue-100 text-blue-700">
                                Perlu Disiapkan
                            </span>
                        </td>
                        <td>
                            <button class="text-xs text-blue-600 hover:underline">
                                Proses
                            </button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>

</div>

@endsection
