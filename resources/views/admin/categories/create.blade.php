@extends('dashboard.admin.layout')

@section('title', 'Tambah Kategori')

@section('content')

<div class="max-w-4xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">
                Tambah Kategori Produk
            </h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Tambahkan kategori baru untuk pengelompokan produk
            </p>
        </div>
    </div>

    <!--FORM-->
    <div class="bg-white border border-gray-200 rounded-lg shadow
                dark:bg-gray-800 dark:border-gray-700">
        <form action="{{ route('admin.categories.store') }}" method="POST" class="p-6 space-y-6">
            @csrf
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Nama Kategori
                </label>
                <input type="text" name="name" value="{{ old('name') }}"
                       placeholder="Contoh: Minuman"
                       class="block w-full p-2.5 text-sm rounded-lg
                                bg-gray-50 border
                                {{ $errors->has('name')
                                    ? 'border-red-500 focus:ring-red-500 focus:border-red-500'
                                    : 'border-gray-300 focus:ring-gray-400 focus:border-gray-400' }}
                                dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Deskripsi
                </label>
                <textarea name="description" rows="4"
                          placeholder="Deskripsi kategori (opsional)"
                          class="block w-full p-2.5 text-sm
                                 text-gray-900 bg-gray-50 border border-gray-300 rounded-lg
                                 focus:ring-gray-400 focus:border-gray-400
                                 dark:bg-gray-700 dark:border-gray-600 dark:text-white">{{ old('description') }}</textarea>
            </div>
            <div class="flex justify-end gap-2 pt-4 border-t dark:border-gray-700">
                <a href="{{ route('admin.categories.index') }}"
                   class="px-4 py-2 text-sm font-medium
                          text-gray-700 bg-gray-200 rounded-lg
                          hover:bg-gray-300
                          dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                    Batal
                </a>

                <button type="submit"
                        class="inline-flex items-center px-4 py-2.5 text-sm font-medium
                                 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700">
                    Simpan Kategori
                </button>
            </div>

        </form>
    </div>
</div>

@endsection
