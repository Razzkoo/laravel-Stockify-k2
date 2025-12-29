@extends('layouts.dashboard')

@section('title', 'Supplier')

@section('content')

<div class="bg-white rounded-lg shadow p-6">

              {{-- FORM EDIT --}}
        <form action="/dashboard/admin/supplier" method="POST">
            @csrf
            @method('PUT')

            <!-- NAMA SUPPLIER -->
            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-700">
                    Nama Supplier
                </label>
                <input
                    type="text"
                    name="nama"
                    value=""
                    class="w-full px-3 py-2 border rounded focus:ring-2 focus:ring-blue-500"
                    required
                >
            </div>

            <!-- NOMOR TELEPON -->
            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-700">
                    Nomor Telepon
                </label>
                <input
                    type="text"
                    name="nomor"
                    value=""
                    class="w-full px-3 py-2 border rounded focus:ring-2 focus:ring-blue-500"
                    required
                >
            </div>

            <!-- ALAMAT -->
            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-700">
                    Alamat
                </label>
                <input
                    type="text"
                    name="alamat"
                    value=""
                    class="w-full px-3 py-2 border rounded focus:ring-2 focus:ring-blue-500"
                >
            </div>

             <!-- KATEGORI -->
            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-700">
                    Kategori
                </label>
                <input
                    type="text"
                    name="kategori"
                    value=""
                    class="w-full px-3 py-2 border rounded focus:ring-2 focus:ring-blue-500"
                >
            </div>

        </form>

    <!-- BUTTON -->
            <div class="flex gap-3">
                <button
                    type="submit"
                    class="bg-indigo-300 text-white px-5 py-2 rounded hover:bg-indigo-500"
                >
                    Simpan
                </button>

                <a
                    href="/dashboard/admin/supplier"
                    class="px-5 py-2 rounded border border-gray-300 hover:bg-gray-100"
                >
                    Batal
                </a>
            </div>
    </div>
</div>

@endsection