@extends('dashboard.admin.layout')

@section('title', 'Edit Supplier')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
        <div class="px-6 py-4 border-b dark:border-gray-700">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                Edit Supplier
            </h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                Perbarui data supplier dengan benar
            </p>
        </div>

        <form action="{{ route('admin.supplier.update', $supplier->id) }}"
            method="POST"
            class="p-6 space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nama Supplier
                </label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $supplier->name) }}"
                    required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                        rounded-lg focus:ring-indigo-500 focus:border-indigo-500
                        block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                        dark:text-white">
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nomor Telepon
                </label>
                <input
                    type="text"
                    name="phone"
                    value="{{ old('phone', $supplier->phone) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                        rounded-lg focus:ring-indigo-500 focus:border-indigo-500
                        block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                        dark:text-white">
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Email
                </label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email', $supplier->email) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                        rounded-lg focus:ring-indigo-500 focus:border-indigo-500
                        block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                        dark:text-white">
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Alamat
                </label>
                <textarea
                    name="address"
                    rows="3"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                        rounded-lg focus:ring-indigo-500 focus:border-indigo-500
                        block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                        dark:text-white">{{ old('address', $supplier->address) }}</textarea>
            </div>
            <div class="flex items-center gap-3 pt-4">
                <button
                    type="submit"
                    class="text-white bg-indigo-600 hover:bg-indigo-700
                        focus:ring-4 focus:ring-indigo-300
                        font-medium rounded-lg text-sm px-5 py-2.5
                        dark:focus:ring-indigo-800">
                    Update
                </button>
                <a href="{{ route('admin.supplier.index') }}"
                class="text-gray-700 bg-white border border-gray-300
                        hover:bg-gray-100 focus:ring-4 focus:ring-gray-200
                        font-medium rounded-lg text-sm px-5 py-2.5
                        dark:bg-gray-800 dark:text-gray-300
                        dark:border-gray-600 dark:hover:bg-gray-700">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
