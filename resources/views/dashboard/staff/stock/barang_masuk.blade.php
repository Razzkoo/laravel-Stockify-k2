@extends('layouts.dashboard')

@section('title', 'Barang Masuk')

@section('content')
<div class="space-y-6">

    <!-- Page Header -->
    <div>
        <h1 class="text-xl font-semibold text-gray-800">Konfirmasi Barang Masuk</h1>
        <p class="text-sm text-gray-500">
            Periksa dan konfirmasi barang yang diterima dari supplier
        </p>
    </div>

    <!-- Card -->
    <div class="bg-white rounded-xl shadow-sm border">

        <!-- Card Header -->
        <div class="px-6 py-4 border-b">
            <h2 class="font-semibold text-gray-700">Daftar Barang Masuk</h2>
        </div>

        <!-- Table -->
        <div class="p-6 overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="text-left text-gray-500 uppercase text-xs">
                    <tr>
                        <th class="pb-3">Supplier</th>
                        <th class="pb-3">Nama Barang</th>
                        <th class="pb-3">Jumlah</th>
                        <th class="pb-3 text-center">Status</th>
                        <th class="pb-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="text-gray-700">
                    <tr class="border-t hover:bg-gray-50 transition">
                        <td class="py-4">PT Sumber Makmur</td>
                        <td>Gula Pasir 1Kg</td>
                        <td>30</td>

                        <td class="text-center">
                            <span class="px-3 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">
                                Menunggu Pemeriksaan
                            </span>
                        </td>

                        <td class="text-center">
                            <button
                                class="px-4 py-2 text-xs font-medium bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                                Konfirmasi
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <p class="text-xs text-gray-400 mt-4">
                * Pastikan kondisi dan jumlah barang sesuai sebelum konfirmasi.
            </p>
        </div>
    </div>

</div>
@endsection
