@extends('dashboard.admin.layout')

@section('title', 'Pengaturan Aplikasi')

@section('content')

<div class="mb-8">
    <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">
        Pengaturan Aplikasi
    </h1>
    <p class="text-sm text-gray-500 dark:text-gray-400">
        Kelola informasi dasar aplikasi inventori
    </p>
</div>
@php
    $setting = \App\Models\Setting::first();
@endphp

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
    <div class="lg:col-span-2 p-6 bg-white border border-gray-200 rounded-lg shadow
                dark:bg-gray-800 dark:border-gray-700">

        <div class="flex items-start gap-6">
            <img src="{{ $setting && $setting->app_logo ? asset('storage/'.$setting->app_logo) : asset('images/logo.png') }}"
                 class="w-24 h-24 rounded-lg border bg-white p-2 object-contain
                        dark:bg-gray-700"
                 alt="Logo">
            <div class="flex-1">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                    {{ $setting->app_name ?? 'Sistem Inventori' }}
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                    Aplikasi manajemen stok, transaksi, dan laporan barang
                </p>
                <button
                    data-modal-target="settingsModal"
                    data-modal-toggle="settingsModal"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium
                           text-white bg-indigo-600 rounded-lg
                           hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300">
                    Edit Pengaturan
                </button>
            </div>
        </div>
    </div>

    <!-- RINGKASAN -->
    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow
                dark:bg-gray-800 dark:border-gray-700">
        <h3 class="mb-4 text-sm font-semibold text-gray-700 dark:text-gray-300">
            Ringkasan Sistem
        </h3>

        <ul class="space-y-3 text-sm">
            <li class="flex justify-between">
                <span class="text-gray-500">Versi Aplikasi</span>
                <span class="font-medium text-gray-900 dark:text-white">v1.0.0</span>
            </li>
            <li class="flex justify-between">
                <span class="text-gray-500">Nama Aplikasi</span>
                <span class="font-medium text-gray-900 dark:text-white">{{ $setting->app_name ?? '-' }}</span>
            </li>
            <li class="flex justify-between">
                <span class="text-gray-500">Terakhir diubah</span>
                <span class="font-medium text-gray-900 dark:text-white">
                    {{ $setting && $setting->updated_at ? $setting->updated_at->format('d M Y') : '-' }}
                </span>
            </li>
        </ul>
    </div>
</div>

<div class="max-w-4xl p-6 bg-white border border-gray-200 rounded-lg shadow
            dark:bg-gray-800 dark:border-gray-700">

    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
        Informasi Aplikasi
    </h3>
    <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
        Informasi ini akan ditampilkan pada halaman aplikasi
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="p-4 border rounded-lg dark:border-gray-700">
            <p class="text-sm text-gray-500">Nama Aplikasi</p>
            <p class="font-medium text-gray-900 dark:text-white">
                {{ $setting->app_name ?? 'Stockify' }}
            </p>
        </div>
    </div>
</div>

<!--MODAL EDIT-->
<div id="settingsModal"
     tabindex="-1"
     aria-hidden="true"
     class="fixed inset-0 z-50 hidden
            flex items-center justify-center
            bg-black/40 backdrop-blur-sm">

    <div class="relative w-full max-w-lg mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg">

            <div class="flex items-center justify-between px-6 py-4
                        border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Edit Pengaturan Aplikasi
                </h3>

                <button type="button"
                        data-modal-hide="settingsModal"
                        class="w-8 h-8 inline-flex items-center justify-center
                               text-gray-400 rounded-lg
                               hover:bg-gray-100 hover:text-gray-700
                               dark:hover:bg-gray-700 dark:hover:text-white">
                    ✕
                </button>
            </div>

            <form action="{{ route('admin.setting.update') }}" method="POST" enctype="multipart/form-data" class="px-6 py-5 space-y-5">
                @csrf

                <div class="flex justify-center">
                    <div class="w-24 h-24 rounded-xl border
                                bg-gray-50 dark:bg-gray-700
                                flex items-center justify-center overflow-hidden">
                        <img src="{{ $setting && $setting->app_logo ? asset('storage/'.$setting->app_logo) : asset('images/logo.png') }}"
                             alt="Logo Preview"
                             id="logoPreview"
                             class="object-contain w-full h-full p-2">
                    </div>
                </div>
                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                        Nama Aplikasi
                    </label>
                    <input type="text" name="app_name" value="{{ $setting->app_name ?? '' }}"
                           class="block w-full p-2.5 text-sm
                                  bg-gray-50 border border-gray-300 rounded-lg
                                  focus:ring-indigo-500 focus:border-indigo-500
                                  dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                           required>
                </div>
                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                        Ganti Logo
                    </label>
                    <input type="file" name="app_logo" id="appLogoInput"
                           class="block w-full text-sm
                                  text-gray-900 border border-gray-300 rounded-lg
                                  cursor-pointer bg-gray-50
                                  dark:text-gray-400 dark:bg-gray-700 dark:border-gray-600"
                    >
                    <p class="mt-1 text-xs text-gray-500">
                        Format PNG/JPG, max 2MB
                    </p>
                </div>
                <div class="flex justify-end gap-2 pt-4 border-t border-gray-200 dark:border-gray-700">
                    <button type="button"
                            data-modal-hide="settingsModal"
                            class="px-4 py-2 text-sm font-medium
                                   text-gray-700 bg-gray-100 rounded-lg
                                   hover:bg-gray-200
                                   dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
                        Batal
                    </button>
                    <button type="submit"
                            class="px-4 py-2 text-sm font-medium
                                   text-white bg-indigo-600 rounded-lg
                                   hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- SCRIPT-->
<script>
    const appLogoInput = document.getElementById('appLogoInput');
    const logoPreview = document.getElementById('logoPreview');

    appLogoInput.addEventListener('change', function(e) {
        const [file] = appLogoInput.files;
        if(file){
            logoPreview.src = URL.createObjectURL(file);
        }
    });
</script>

@endsection
