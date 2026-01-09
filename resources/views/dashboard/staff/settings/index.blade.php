@extends('layouts.dashboard')

@section('title', 'Settings')

@section('content')
<div class="max-w-5xl mx-auto space-y-6">

    <h1 class="text-2xl font-bold text-gray-800">
        Settings Akun
    </h1>

    <!-- EDIT PROFIL -->
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-lg font-semibold mb-4 text-gray-700">
            Profil Akun
        </h2>

        <form class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <div>
                <label class="text-sm text-gray-600">Nama</label>
                <input type="text"
                       class="w-full mt-1 px-3 py-2 border rounded focus:ring focus:ring-blue-200"
                       value="{{ Auth::user()->name ?? '' }}">
            </div>

            <div>
                <label class="text-sm text-gray-600">Email</label>
                <input type="email"
                       class="w-full mt-1 px-3 py-2 border rounded focus:ring focus:ring-blue-200"
                       value="{{ Auth::user()->email ?? '' }}">
            </div>

            <div class="md:col-span-2">
                <label class="text-sm text-gray-600">Foto Profil</label>
                <input type="file"
                       class="w-full mt-1 px-3 py-2 border rounded">
            </div>

            <!-- Button -->
        <div class="flex gap-6">
            <a href="/dashboard/staff/profile"
               class="px-5 py-2 rounded-lg border text-gray-600 hover:bg-gray-100 transition">
                Batal
            </a>

            <button
                type="submit"
                class="px-6 py-2 bg-indigo-300 text-white rounded-lg hover:bg-indigo-500 transition">
                Simpan Perubahan
            </button>
        </div>

        </form>
    </div>

    <!-- INFO AKUN -->
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-lg font-semibold mb-4 text-gray-700">
            Informasi Akun
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">

            <div>
                <p class="text-gray-500">Role</p>
                <p class="font-medium text-gray-800">Staff</p>
            </div>

            <div>
                <p class="text-gray-500">Status</p>
                <p class="font-medium text-green-600">Aktif</p>
            </div>

            <div>
                <p class="text-gray-500">Tanggal Bergabung</p>
                <p class="font-medium text-gray-800">
                    {{ Auth::user()->created_at ?? '-' }}
                </p>
            </div>

        </div>
    </div>

    <!-- KEAMANAN -->
    <div class="bg-white rounded-lg shadow p-6 flex justify-between items-center">
        <div>
            <h2 class="text-lg font-semibold text-gray-700">
                Keamanan
            </h2>
            <p class="text-sm text-gray-500">
                Ubah password akun Anda
            </p>
        </div>

        <a href="/dashboard/admin/settings/change_password"
           class="px-4 py-2 text-sm border rounded hover:bg-gray-100">
            Ganti Password
        </a>
    </div>

</div>
@endsection
