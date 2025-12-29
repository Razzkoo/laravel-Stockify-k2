@extends('layouts.dashboard')

@section('title', 'Tambah User')

@section('content')

<!-- HEADER -->
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">
        Tambah User
    </h1>
</div>

<!-- FORM CARD -->
<div class="bg-white rounded-lg shadow max-w-xl">

    <form class="p-6 space-y-5">

        <!-- Nama -->
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">
                Nama Lengkap
            </label>
            <input
                type="text"
                placeholder="Masukkan nama user"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
            >
        </div>

        <!-- Email -->
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">
                Email
            </label>
            <input
                type="email"
                placeholder="contoh@email.com"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
            >
        </div>

         <!-- Password -->
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">
                Password
            </label>
            <input
                type="password"
                placeholder="23mdfjf"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
            >
        </div>

        <!-- Role -->
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">
                Role
            </label>
            <select
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
            >
                <option selected disabled>-- Pilih Role --</option>
                <option value="admin">Admin</option>
                <option value="manager">Manajer Gudang</option>
                <option value="staff">Staff Gudang</option>
            </select>
        </div>

        <!-- BUTTON -->
        <div class="flex justify-end gap-3 pt-4 border-t">
            <a href="/dashboard/admin/user"
               class="px-4 py-2 text-sm text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200">
                Batal
            </a>

            <button
                type="submit"
                class="px-5 py-2 text-sm font-medium text-white bg-indigo-300 rounded-lg hover:bg-indigo-500">
                Simpan User
            </button>
        </div>

    </form>

</div>

@endsection
