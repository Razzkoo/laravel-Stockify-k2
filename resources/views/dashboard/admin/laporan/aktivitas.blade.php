@extends('layouts.dashboard')

@section('title', 'Laporan Aktivitas Pengguna')

@section('content')

<!-- LAPORAN AKTIVITAS PENGGUNA -->
<div class="mt-10">
    <!-- HEADER -->
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-bold text-gray-800">
            Laporan Aktivitas Pengguna
        </h2>

         <div class="flex flex-wrap gap-2">
        <a href="/dashboard/admin/laporan"
           class="px-4 py-2 text-sm font-medium text-white bg-indigo-500 rounded-lg hover:bg-indigo-600 transition">
            Kembali
        </a>

        <button
            class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 transition">
            Export Excel
        </button>

        <button
            class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 transition">
            Export PDF
        </button>
    </div>
</div>

    <!-- FILTER -->
    <div class="bg-white p-4 rounded-lg shadow mb-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <select class="border rounded-lg px-3 py-2 text-sm">
                <option>Semua Role</option>
                <option>Admin</option>
                <option>Manager Gudang</option>
                <option>Staff Gudang</option>
            </select>

            <input type="date" class="border rounded-lg px-3 py-2 text-sm">

            <input type="date" class="border rounded-lg px-3 py-2 text-sm">

            <button class="px-4 py-2 text-sm text-white bg-indigo-500 rounded-lg hover:bg-indigo-600">
                Tampilkan
            </button>
        </div>
    </div>

    <!-- TABLE AKTIVITAS -->
    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-600">
            <thead class="text-xs uppercase bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-6 py-3">Tanggal</th>
                    <th class="px-6 py-3">Nama Pengguna</th>
                    <th class="px-6 py-3">Role</th>
                    <th class="px-6 py-3">Aktivitas</th>
                    <th class="px-6 py-3">Detail</th>
                </tr>
            </thead>

            <tbody>
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-4">12-01-2025 09:15</td>
                    <td class="px-6 py-4">Admin Utama</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 text-xs font-semibold text-indigo-700 bg-indigo-100 rounded-full">
                            Admin
                        </span>
                    </td>
                    <td class="px-6 py-4">Menambah Barang</td>
                    <td class="px-6 py-4">Menambahkan Laptop Lenovo</td>
                </tr>

                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-4">12-01-2025 10:30</td>
                    <td class="px-6 py-4">Budi</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">
                            Manager
                        </span>
                    </td>
                    <td class="px-6 py-4">Menyetujui Barang Keluar</td>
                    <td class="px-6 py-4">Pengeluaran Kabel LAN</td>
                </tr>

                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">12-01-2025 13:45</td>
                    <td class="px-6 py-4">Siti</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 text-xs font-semibold text-yellow-700 bg-yellow-100 rounded-full">
                            Staff
                        </span>
                    </td>
                    <td class="px-6 py-4">Input Barang Masuk</td>
                    <td class="px-6 py-4">Mouse Logitech 10 unit</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>

@endsection
