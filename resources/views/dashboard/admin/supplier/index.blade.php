@extends('layouts.dashboard')

@section('title', 'Supplier')

@section('content')
<!-- Header -->
<div class="flex items-center justify-between mb-4">
    <h1 class="text-2xl font-semibold text-gray-800">Supplier</h1>

    <a href="{{ route('supplier.create') }}"
       class="px-4 py-2 text-sm bg-indigo-500 text-white rounded hover:bg-indigo-700">
        + Tambah Supplier
    </a>
</div>
@if (session('success'))
   <script>
        document.addEventListener('DOMContentLoaded', function() {
       Swal.fire({
        title: "Uhuyy!!",
        text: "{{ session('success') }}",
        icon: "success",
        timer: 1500,
       });
    });
   </script>

@endif

<div class="bg-white p-4 rounded shadow overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-3">Nama</th>
                <th class="px-4 py-3">Alamat</th>
                <th class="px-4 py-3">Kontak</th>
                <th class="px-4 py-3">Email</th>
                <th class="px-4 py-3 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($suppliers as $supplier)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $supplier->name }}</td>
                    <td class="px-4 py-3">{{ $supplier->address ?? '-' }}</td>
                    <td class="px-4 py-3">{{ $supplier->phone ?? '-' }}</td>
                    <td class="px-4 py-3">{{ $supplier->email ?? '-' }}</td>

                    <td class="px-4 py-3 text-center space-x-2">
                        <a href="{{ route('supplier.edit', $supplier->id) }}"
                           class="px-3 py-1 text-xs bg-yellow-500 text-white rounded hover:bg-yellow-600">
                            Edit
                        </a>

                        <form action="{{ route('supplier.destroy', $supplier->id) }}"
                              method="POST"
                              class="inline-block"
                              onsubmit="return confirm('Yakin hapus supplier ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="button"
                                onclick="confirmDelete(this)"
                                class="px-3 py-1 text-xs bg-red-500 text-white rounded hover:bg-red-600">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-4 py-3 text-center text-gray-500">
                        Data supplier belum tersedia
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
<script>
    function confirmDelete(button) {
        event.preventDefault(); // Prevent form submission

        Swal.fire({
            title: 'Yakin hapus supplier ini?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the form
                button.closest('form').submit();
            }
        });
    }
</script>
@endsection
