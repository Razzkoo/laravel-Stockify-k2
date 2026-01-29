@extends('dashboard.admin.layout')

@section('title', 'Tambah User')

@section('content')

<div class="max-w-2xl mx-auto space-y-6">

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
            Tambah Pengguna Baru
        </h1>
        <p class="text-sm text-gray-500 dark:text-gray-400">
            Tambahkan pengguna baru ke sistem
        </p>
    </div>

    <div class="bg-white rounded-lg shadow
                dark:bg-gray-800 dark:border dark:border-gray-700">

        <form action="{{ route('admin.user.store') }}" method="POST" class="p-6 space-y-5">
            @csrf

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nama Lengkap
                </label>
                <input type="text" name="name"
                       value="{{ old('name') }}"
                       required
                       class="block w-full p-2.5 text-sm text-gray-900
                              border border-gray-300 rounded-lg
                              focus:ring-indigo-500 focus:border-indigo-500
                              dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                       placeholder="Masukkan nama lengkap">
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Email
                </label>
                <input type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    class="block w-full p-2.5 text-sm
                            rounded-lg border
                            {{ $errors->has('email')
                                    ? 'border-red-500 focus:ring-red-500 focus:border-red-500'
                                    : 'border-gray-300 focus:ring-indigo-500 focus:border-indigo-500' }}
                            text-gray-900
                            dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    placeholder="user@email.com">
                @error('email')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Password
                </label>
                <input type="password" name="password"
                       required
                       class="block w-full p-2.5 text-sm text-gray-900
                              border border-gray-300 rounded-lg
                              focus:ring-indigo-500 focus:border-indigo-500
                              dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                       placeholder="••••••••">
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Role
                </label>
                <select name="role" required
                        class="block w-full p-2.5 text-sm text-gray-900
                               border border-gray-300 rounded-lg
                               focus:ring-indigo-500 focus:border-indigo-500
                               dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <option disabled selected>-- Pilih Role --</option>
                    <option value="admin">Admin</option>
                    <option value="manajer_gudang">Manajer Gudang</option>
                    <option value="staff_gudang">Staff Gudang</option>
                </select>
            </div>
            <div class="flex justify-end gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">
                <a href="{{ route('admin.user.index') }}"
                   class="px-4 py-2 text-sm font-medium text-gray-700
                          bg-gray-100 rounded-lg hover:bg-gray-200
                          dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                    Batal
                </a>
                <button type="submit"
                        class="px-5 py-2 text-sm font-medium text-white
                               bg-indigo-600 rounded-lg hover:bg-indigo-700
                               focus:ring-4 focus:ring-indigo-300">
                    Simpan User
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
