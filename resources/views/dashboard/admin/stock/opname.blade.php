@extends('layouts.dashboard')

@section('title', 'Hasil Stock Opname')

@section('content')
<div class="space-y-6">

    <div>
        <h1 class="text-2xl font-bold text-gray-800">Stock Opname</h1>
        <p class="text-sm text-gray-500">
            Hasil penyesuaian stok fisik oleh manajer
        </p>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <table class="w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-center">Produk</th>
                    <th class="px-4 py-3 text-center">Stok Sistem</th>
                    <th class="px-4 py-3 text-center">Stok Fisik</th>
                    <th class="px-4 py-3 text-center">Selisih</th>
                    <th class="px-4 py-3 text-center">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="px-4 py-3 text-center">Gula Pasir</td>
                    <td class="px-4 py-3 text-center">100</td>
                    <td class="px-4 py-3 text-center">95</td>
                    <td class="px-4 py-3 text-red-600 text-center">-5</td>
                    <td class="px-4 py-3 text-center">2025-01-12</td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
