@extends('layouts.dashboard')

@section('title', 'Edit User')

@section('content')

<!-- HEADER -->
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">
        Edit User
    </h1>
</div>

<!-- FORM CARD -->
<div class="bg-white rounded-lg shadow max-w-xl">

    <form action="{{ route('user.update', $user->id) }}" method="POST" class="p-6 space-y-5">
        @csrf
        @method('PUT')

        <!-- Nama -->
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">
                Nama Lengkap
            </label>
            <input
                type="text"
                name="name"
                value="{{ old('name', $user->name) }}"
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
                value="{{ old('email', $user->email) }}"
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
                <span class="text-xs text-gray-500">(Kosongkan jika tidak diubah)</span>
            </label>
            <input
                type="password"
                name="password"
                placeholder="Kosongkan jika tidak diubah"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
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
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>
                    Admin
                </option>
                <option value="manajer_gudang" {{ $user->role == 'manajer_gudang' ? 'selected' : '' }}>
                    Manajer Gudang
                </option>
                <option value="staff_gudang" {{ $user->role == 'staff_gudang' ? 'selected' : '' }}>
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
                Update User
            </button>
        </div>

    </form>

</div>

@endsection
