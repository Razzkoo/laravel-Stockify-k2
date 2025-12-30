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

    <form action="{{ route('user.store') }}" method="POST" class="p-6 space-y-5">
        @csrf

        <!-- Nama -->
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">
                Nama Lengkap
            </label>
            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                placeholder="Masukkan nama"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                required
            >
            @error('name')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">
                Email
            </label>
            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="contoh@email.com"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                required
            >
            @error('email')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">
                Password
            </label>
            <input
                type="password"
                name="password"
                placeholder="Minimal 3 karakter"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                required
            >
            @error('password')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Role -->
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">
                Role
            </label>
            <select
                name="role"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                required
            >
                <option value="" disabled selected>-- Pilih Role --</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="manajer_gudang" {{ old('role') == 'manajer_gudang' ? 'selected' : '' }}>
                    Manajer Gudang
                </option>
                <option value="staff_gudang" {{ old('role') == 'staff_gudang' ? 'selected' : '' }}>
                    Staff Gudang
                </option>
            </select>
            @error('role')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- BUTTON -->
        <div class="flex justify-end gap-3 pt-4 border-t">
            <a href="{{ route('user.index') }}"
               class="px-4 py-2 text-sm text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200">
                Batal
            </a>

            <button
                type="submit"
                class="px-5 py-2 text-sm font-medium text-white bg-indigo-500 rounded-lg hover:bg-indigo-600">
                Simpan User
            </button>
        </div>

    </form>

</div>

@endsection
