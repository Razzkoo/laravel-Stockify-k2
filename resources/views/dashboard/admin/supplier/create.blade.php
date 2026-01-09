@extends('layouts.dashboard')

@section('title', 'Supplier')

@section('content')

<div class="max-w-3xl">

    <!-- CARD -->
    <div class="bg-white rounded-xl shadow p-6">

        <!-- HEADER FORM -->
        <div class="mb-6">
            <h2 class="text-lg font-semibold text-gray-800">
                Tambah Supplier
            </h2>
            <p class="text-sm text-gray-500">
                Isi data supplier dengan lengkap dan benar
            </p>
        </div>

        {{-- FORM --}}
        <form action="/dashboard/admin/supplier" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- NAMA SUPPLIER -->
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">
                    Nama Supplier
                </label>
                <input
                    type="text"
                    name="nama"
                    class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-indigo-400 focus:outline-none"
                    required
                >
            </div>

            <!-- NOMOR TELEPON -->
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">
                    Nomor Telepon
                </label>
                <input
                    type="text"
                    name="nomor"
                    class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-indigo-400 focus:outline-none"
                    required
                >
            </div>

            <!-- ALAMAT -->
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">
                    Alamat
                </label>
                <input
                    type="text"
                    name="alamat"
                    class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-indigo-400 focus:outline-none"
                >
            </div>

            <!-- EMAIL -->
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">
                    Email
                </label>
                <input
                    type="text"
                    name="email"
                    class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-indigo-400 focus:outline-none"
                >
            </div>

            <!-- BUTTON -->
            <div class="flex gap-3 pt-4">
                <button
                    type="submit"
                    class="bg-indigo-500 text-white px-6 py-2.5 rounded-lg hover:bg-indigo-600"
                >
                    Simpan
                </button>

                <a
                    href="/dashboard/admin/supplier"
                    class="px-6 py-2.5 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100"
                >
                    Batal
                </a>
            </div>

        </form>

    </div>
</div>

@endsection
