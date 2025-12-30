@extends('layouts.dashboard')

@section('content')

<!-- HEADER -->
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">
        Kelola User
    </h1>

    <a href="{{ route('user.create') }}"
       class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-500 rounded-lg hover:bg-indigo-600">
        + Tambah User
    </a>
</div>
    @if (session('success'))
       <script>
            document.addEventListener('DOMContentLoaded', function() {
           Swal.fire({
            title: "Uhuyy!!",
            text: "sukses",
            icon: "success",
            timer: 1500,
           });
        });
       </script>
    @endif
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
                @forelse ($users as $user)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900">
                            {{ $user->name }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $user->email }}
                        </td>

                        <td class="px-6 py-4">
                            @if ($user->role === 'admin')
                                <span class="px-3 py-1 text-xs font-semibold text-purple-700 bg-green-100 rounded-full">
                                    Admin
                                </span>
                            @elseif ($user->role === 'manajer_gudang')
                                <span class="px-3 py-1 text-xs font-semibold text-blue-700 bg-blue-100 rounded-full">
                                    Manajer Gudang
                                </span>
                            @else
                                <span class="px-3 py-1 text-xs font-semibold text-green-700 bg-gray-100 rounded-full">
                                    Staff Gudang
                                </span>
                            @endif
                        </td>

                        <td class="px-6 py-4 text-center space-x-2">
                            <a href="{{ route('user.edit', $user->id) }}"
                               class="inline-block px-3 py-1 text-xs text-white bg-yellow-500 rounded hover:bg-yellow-600">
                                Edit
                            </a>

                            <form action="{{ route('user.destroy', $user->id) }}"
                                  method="POST"
                                  class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="button"
                                    onclick="confirmDelete(this)"
                                    class="px-3 py-1 text-xs text-white bg-red-500 rounded hover:bg-red-600">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                            Data user belum tersedia
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>
<script>
    function confirmDelete(button) {
        Swal.fire({
            title: "Apa kamu yakin?",
            text: "menghapus user ini!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                button.closest('form').submit();
            }
        });
    }
</script>
@endsection
