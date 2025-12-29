@extends('layouts.dashboard')

@section('content')

<!-- HEADER -->
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">
        Kelola User
    </h1>

    <a href="/dashboard/admin/user/create"
       class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-500 rounded-lg hover:bg-indigo-600">
        + Tambah User
    </a>
</div>

<!-- CARD -->
<div class="bg-white rounded-lg shadow">

    <!-- TABLE -->
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-600">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr>
                    <th class="px-6 py-3">Nama</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Role</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <!-- USER 1 -->
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900">
                        Aulia
                    </td>
                    <td class="px-6 py-4">
                        aulia@email.com
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 text-xs font-semibold text-purple-700 bg-purple-100 rounded-full">
                            Admin
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center space-x-2">
                       <a href="/dashboard/admin/user/edit"
                        class="inline-block px-3 py-1 text-xs text-white bg-yellow-500 rounded hover:bg-yellow-600">
                           Edit
                       </a>
                        <button class="px-3 py-1 text-xs text-white bg-red-500 rounded hover:bg-red-600">
                            Hapus
                        </button>
                    </td>
                </tr>

                <!-- USER 2 -->
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900">
                        Budi
                    </td>
                    <td class="px-6 py-4">
                        budi@email.com
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 text-xs font-semibold text-blue-700 bg-blue-100 rounded-full">
                            Manajer Gudang
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center space-x-2">
                        <a href="/dashboard/admin/user/edit"
                            class="inline-block px-3 py-1 text-xs text-white bg-yellow-500 rounded hover:bg-yellow-600">
                              Edit
                        </a>

                        <button class="px-3 py-1 text-xs text-white bg-red-500 rounded hover:bg-red-600">
                            Hapus
                        </button>
                    </td>
                </tr>

                <!-- USER 3 -->
                <tr class="bg-white hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900">
                        Siti
                    </td>
                    <td class="px-6 py-4">
                        siti@email.com
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">
                            Staff Gudang
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center space-x-2">
                        <a href="/dashboard/admin/user/edit"
                            class="inline-block px-3 py-1 text-xs text-white bg-yellow-500 rounded hover:bg-yellow-600">
                             Edit
                        </a>

                        <button class="px-3 py-1 text-xs text-white bg-red-500 rounded hover:bg-red-600">
                            Hapus
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

@endsection
