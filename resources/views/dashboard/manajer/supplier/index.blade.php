@extends('layouts.dashboard')

@section('title', 'Daftar Supplier')

@section('content')

<!-- Header -->
<div class="mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">
        Daftar Supplier
    </h1>
    <p class="text-sm text-gray-500">
        Data supplier yang terdaftar dalam sistem
    </p>
</div>

<!-- Card -->
<div class="bg-white rounded-xl shadow p-6">

    <!-- Search -->
    <div class="flex justify-between items-center mb-4">
        <div class="w-1/3">
            <input
                type="text"
                placeholder="Cari nama supplier..."
                class="w-full px-4 py-2 text-sm border rounded-lg focus:outline-none focus:ring focus:ring-blue-200"
            >
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-3">Nama Supplier</th>
                    <th class="px-4 py-3">Kontak</th>
                    <th class="px-4 py-3">Alamat</th>
                    <th class="px-4 py-3 text-center">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y">

                <!-- contoh data -->
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 font-medium text-gray-800">
                        PT Sumber Pangan Sejahtera
                    </td>
                    <td class="px-4 py-3">
                        0812-3456-7890
                    </td>
                    <td class="px-4 py-3">
                        Yogyakarta
                    </td>
                    <td class="px-4 py-3 text-center">
                        <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">
                            Aktif
                        </span>
                    </td>
                </tr>

                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 font-medium text-gray-800">
                        CV Makmur Bersama
                    </td>
                    <td class="px-4 py-3">
                        0821-9988-7766
                    </td>
                    <td class="px-4 py-3">
                        Sleman
                    </td>
                    <td class="px-4 py-3 text-center">
                        <span class="px-3 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">
                            Tidak Aktif
                        </span>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

    <!-- Empty state (opsional nanti) -->
    {{-- 
    <div class="text-center text-gray-500 py-10">
        Belum ada data supplier
    </div>
    --}}

</div>

@endsection
