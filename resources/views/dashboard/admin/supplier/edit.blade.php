@extends('layouts.dashboard')

@section('title', 'Edit Supplier')

@section('content')

<div class="bg-white rounded-lg shadow p-6 max-w-xl">

    <h2 class="text-xl font-semibold text-gray-800 mb-6">
        Edit Supplier
    </h2>

    {{-- FORM EDIT --}}
    <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- NAMA SUPPLIER -->
        <div class="mb-4">
            <label class="block mb-2 text-sm font-medium text-gray-700">
                Nama Supplier
            </label>
            <input
                type="text"
                name="name"
                value="{{ old('name', $supplier->name) }}"
                class="w-full px-3 py-2 border rounded focus:ring-2 focus:ring-indigo-500"
                required
            >
            @error('name')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- NOMOR TELEPON -->
        <div class="mb-4">
            <label class="block mb-2 text-sm font-medium text-gray-700">
                Nomor Telepon
            </label>
            <input
                type="text"
                name="phone"
                value="{{ old('phone', $supplier->phone) }}"
                class="w-full px-3 py-2 border rounded focus:ring-2 focus:ring-indigo-500"
            >
            @error('phone')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- ALAMAT -->
        <div class="mb-4">
            <label class="block mb-2 text-sm font-medium text-gray-700">
                Alamat
            </label>
            <textarea
                name="address"
                rows="3"
                class="w-full px-3 py-2 border rounded focus:ring-2 focus:ring-indigo-500"
            >{{ old('address', $supplier->address) }}</textarea>
            @error('address')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- EMAIL -->
        <div class="mb-6">
            <label class="block mb-2 text-sm font-medium text-gray-700">
                Email
            </label>
            <input
                type="email"
                name="email"
                value="{{ old('email', $supplier->email) }}"
                class="w-full px-3 py-2 border rounded focus:ring-2 focus:ring-indigo-500"
            >
            @error('email')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- BUTTON -->
        <div class="flex gap-3">
            <button
                type="submit"
                class="bg-indigo-500 text-white px-5 py-2 rounded hover:bg-indigo-600"
            >
                Update
            </button>

            <a
                href="{{ route('supplier.index') }}"
                class="px-5 py-2 rounded border border-gray-300 hover:bg-gray-100"
            >
                Batal
            </a>
        </div>

    </form>
</div>

@endsection
