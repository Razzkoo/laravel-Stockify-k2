@extends('dashboard.admin.layout')

@section('title', 'Tambah Supplier')

@section('content')

<div class="max-w-2xl mx-auto space-y-6">

<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
        Tambah Supplier
    </h1>
    <p class="text-sm text-gray-500 dark:text-gray-400">
        Tambahkan data supplier baru
    </p>
</div>

<div class="max-w-6xl bg-white rounded-lg shadow
            dark:bg-gray-800 dark:border dark:border-gray-700">

    <form action="{{ route('admin.supplier.store') }}"
          method="POST"
          class="p-6 space-y-5">
        @csrf

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Nama Supplier
            </label>
            <input type="text"
                   name="name"
                   placeholder="Contoh: PT Sumber Makmur"
                   required
                   class="block w-full p-2.5 text-sm text-gray-900
                          border border-gray-300 rounded-lg
                          focus:ring-indigo-500 focus:border-indigo-500
                          dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Email
                </label>
                <input type="email"
                       name="email"
                       placeholder="supplier@email.com"
                       class="block w-full p-2.5 text-sm text-gray-900
                              border border-gray-300 rounded-lg
                              focus:ring-indigo-500 focus:border-indigo-500
                              dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nomor Telepon
                </label>
                <input type="text"
                       name="phone"
                       placeholder="08xxxxxxxxxx"
                       class="block w-full p-2.5 text-sm text-gray-900
                              border border-gray-300 rounded-lg
                              focus:ring-indigo-500 focus:border-indigo-500
                              dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>
        </div>
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Alamat
            </label>
            <textarea name="address"
                      rows="3"
                      placeholder="Alamat lengkap supplier"
                      class="block w-full p-2.5 text-sm text-gray-900
                             border border-gray-300 rounded-lg resize-none
                             focus:ring-indigo-500 focus:border-indigo-500
                             dark:bg-gray-700 dark:border-gray-600 dark:text-white"></textarea>
        </div>
        <div class="flex justify-end gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">
            <a href="{{ route('admin.supplier.index') }}"
               class="px-4 py-2 text-sm font-medium text-gray-700
                      bg-gray-100 rounded-lg hover:bg-gray-200
                      dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                Batal
            </a>
            <button type="submit"
                    class="px-5 py-2 text-sm font-medium text-white
                           bg-indigo-600 rounded-lg hover:bg-indigo-700
                           focus:ring-4 focus:ring-indigo-300">
                Simpan Supplier
            </button>
        </div>
    </form>
</div>

@endsection
