@extends('layouts.dashboard')

@section('title', 'Profil Saya')

@section('content')
<div class="max-w-6xl mx-auto space-y-10">

    <!-- PAGE HEADER -->
    <div>
        <h1 class="text-2xl font-semibold text-gray-800">
            Profil Akun
        </h1>
        <p class="text-sm text-gray-500">
            Informasi pengguna dan status akun 
        </p>
    </div>

    <!-- HERO PROFILE -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 flex flex-col lg:flex-row gap-8">

        <!-- LEFT -->
        <div class="w-full lg:w-1/3 space-y-6">

            <div class="flex flex-col items-center text-center">
                <div class="w-36 h-36 rounded-full bg-indigo-50 border flex items-center justify-center text-indigo-400 font-semibold text-lg">
                    Foto
                </div>

                <h2 class="mt-4 text-lg font-semibold text-gray-800">
                    {{ Auth::user()->name ?? 'Staff Stockify' }}
                </h2>

                <p class="text-sm text-gray-500">
                    {{ Auth::user()->email ?? 'staff@email.com' }}
                </p>

                <span class="mt-3 inline-flex px-4 py-1 text-xs rounded-full bg-green-50 text-green-600 border">
                    Akun Aktif
                </span>
            </div>

            <!-- QUICK INFO -->
            <div class="grid grid-cols-2 gap-4 text-sm">
                <div class="bg-slate-50 border rounded-xl p-4 text-center">
                    <p class="text-gray-400">Role</p>
                    <p class="font-semibold text-gray-700">Staff</p>
                </div>

                <div class="bg-slate-50 border rounded-xl p-4 text-center">
                    <p class="text-gray-400">Akses</p>
                    <p class="font-semibold text-gray-700">Standar Akses</p>
                </div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="flex-1 space-y-8">

            <!-- ACCOUNT OVERVIEW -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">
                    Akun Stockify saya
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">

                    <div>
                        <p class="text-gray-500">Nama Lengkap</p>
                        <p class="font-medium text-gray-800">
                            {{ Auth::user()->name ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500">Email</p>
                        <p class="font-medium text-gray-800">
                            {{ Auth::user()->email ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500">Tanggal Bergabung</p>
                        <p class="font-medium text-gray-800">
                            {{ Auth::user()->created_at ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500">Status Akun</p>
                        <p class="font-medium text-green-600">
                            Aktif
                        </p>
                    </div>

                </div>
            </div>

            <!-- ACTION -->
            <div class="pt-6 border-t flex flex-wrap gap-4">
                <a href="/dashboard/staff/settings"
                   class="px-6 py-2 text-sm bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 transition">
                    Edit Profil
                </a>

                <a href="#"
                   class="px-6 py-2 text-sm bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition">
                    Hapus Akun
                </a>
            </div>

        </div>
    </div>


</div>
@endsection
