@extends('layouts.dashboard')

@section('title', 'Stok Minimum')

@section('content')
<div class="p-6 space-y-6">

    <div>
        <h1 class="text-2xl font-bold text-gray-800">Stok Minimum</h1>
        <p class="text-sm text-gray-500">
            Daftar batas minimum stok dari admin
        </p>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <table class="w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-center">Produk</th>
                    <th class="px-4 py-3 text-center">Stok Minimum</th>
                    <th class="px-4 py-3 text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="px-4 py-3 text-center">Beras Premium</td>
                    <td class="px-4 py-3 text-center">10</td>
                    <td class="px-4 py-3 text-red-600 font-medium text-center">
                        Di bawah batas
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
