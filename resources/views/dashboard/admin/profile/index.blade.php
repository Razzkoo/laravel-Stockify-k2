@extends('layouts.dashboard')

@section('title', 'Profil Saya')

@section('content')
<div class="max-w-4xl mx-auto">

    <h1 class="text-2xl font-bold text-gray-800 mb-6">
        Profil Saya
    </h1>

    <div class="bg-white rounded-lg shadow p-6 flex gap-6">

        <!-- FOTO -->
        <div class="w-32 flex-shrink-0">
            <div class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center text-gray-400">
                Foto
            </div>
        </div>

        <!-- INFO -->
        <div class="flex-1 space-y-3">

            <div>
                <p class="text-sm text-gray-500">Nama</p>
                <p class="font-semibold text-gray-800">
                    {{ Auth::user()->name ?? 'Admin Stockify' }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Email</p>
                <p class="font-semibold text-gray-800">
                    {{ Auth::user()->email ?? 'admin@mail.com' }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Role</p>
                <span class="inline-block px-3 py-1 text-xs bg-blue-100 text-blue-700 rounded-full">
                    Admin
                </span>
            </div>

            <div class="pt-4 flex gap-3">
                <a
                    href="/dashboard/admin/settings/index"
                    class="px-4 py-2 text-sm bg-indigo-400 text-white rounded hover:bg-indigo-500"
                >
                    Edit Profil
                </a>
            </div>

        </div>

    </div>

</div>
@endsection
