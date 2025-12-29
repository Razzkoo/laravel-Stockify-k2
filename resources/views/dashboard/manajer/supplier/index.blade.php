@extends('layouts.dashboard')

@section('title', 'Supplier')

@section('content')
<!-- Header -->
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-semibold text-gray-800">Supplier</h1>

        <a href="/dashboard/admin/supplier/create"
           class="px-4 py-2 text-sm bg-indigo-500 text-white rounded hover:bg-indigo-700">
            + Tambah Supplier
        </a>
    </div>

<div class="bg-white p-4 rounded shadow overflow-x-auto">
<table class="w-full text-sm">
    <thead class="bg-gray-100">
        <tr>
            <th class="px-4 py-3">Nama</th>
            <th class="px-4 py-3">Kontak</th>
            <th class="px-4 py-3">Alamat</th>
            <th class="px-4 py-3">Kategori</th>
        </tr>
    </thead>
    <tbody>
        <tr class="border-b">
            <td class="px-4 py-3 text-center">PT Sumber Makmur</td>
            <td class="px-4 py-3 text-center">08123456789</td>
            <td class="px-4 py-3 text-center">Yogyakarta</td>
            <td class="px-4 py-3 text-center">Sembako</td>
        </tr>
    </tbody>
</table>
</div>

@endsection
