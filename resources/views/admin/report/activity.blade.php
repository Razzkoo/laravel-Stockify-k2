@extends('dashboard.admin.layout')

@section('title', 'Laporan Aktivitas Pengguna')

@section('content')

<div class="flex flex-col gap-4 mb-6 sm:flex-row sm:items-center sm:justify-between">
    <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">
        Laporan Aktivitas Pengguna
    </h1>

    <div class="flex flex-wrap gap-2">
        <a href="{{ route('admin.report.index') }}"
           class="inline-flex items-center px-4 py-2 text-sm font-medium
                  text-white bg-gray-600 rounded-lg
                  hover:bg-gray-700 focus:ring-4 focus:ring-gray-300">
            Kembali
        </a>
    </div>
</div>

<!-- FILTER -->
<div class="p-6 mb-6 bg-white border border-gray-200 rounded-lg shadow
            dark:bg-gray-800 dark:border-gray-700">
    <form method="GET" action="{{ route('admin.report.activity') }}">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Role
                </label>
                <select
                    name="role"
                    class="block w-full p-2.5 text-sm text-gray-900
                           bg-gray-50 border border-gray-300 rounded-lg
                           focus:ring-indigo-500 focus:border-indigo-500
                           dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <option value="">Semua Role</option>
                    <option value="Admin" {{ request('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="Manager Gudang" {{ request('role') == 'Manager Gudang' ? 'selected' : '' }}>Manager Gudang</option>
                    <option value="Staff Gudang" {{ request('role') == 'Staff Gudang' ? 'selected' : '' }}>Staff Gudang</option>
                </select>
            </div>
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Periode
                </label>
                <input type="date"
                       name="tanggal"
                       value="{{ request('tanggal') }}"
                       class="block w-full p-2.5 text-sm text-gray-900
                              bg-gray-50 border border-gray-300 rounded-lg
                              focus:ring-indigo-500 focus:border-indigo-500
                              dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>
            <div class="flex items-end gap-2">
                <button
                    class="px-4 py-2 text-sm font-medium
                        text-white bg-indigo-600 rounded-lg
                        hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300">
                    Tampilkan
                </button>

                <button type="button"
                    data-modal-target="deleteAllModal"
                    data-modal-toggle="deleteAllModal"
                    class="px-4 py-2 text-sm font-medium
                        text-white bg-red-600 rounded-lg
                        hover:bg-red-700 focus:ring-4 focus:ring-red-300">
                    Hapus Semua
                </button>
            </div>
        </div>
    </form>
</div>


<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="px-6 py-3 text-center">Tanggal</th>
                <th class="px-6 py-3 text-center">Nama</th>
                <th class="px-6 py-3 text-center">Role</th>
                <th class="px-6 py-3 text-center">Aktivitas</th>
                <th class="px-6 py-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($activities as $activity)
        <tr class="border-b dark:border-gray-700 activity-row"
            data-id="{{ $activity->id }}"
            data-tanggal="{{ $activity->created_at->format('d M Y') }}"
            data-user="{{ $activity->user->name ?? '-' }}"
            data-role="{{ $activity->role }}"
            data-activity="{{ $activity->activity }}"
            data-description="{{ $activity->description ?? '-' }}">
            <td class="px-6 py-4 text-center">
                {{ $activity->created_at->format('d M Y') }}
            </td>
            <td class="px-6 py-4 text-center font-medium text-gray-900 dark:text-white">
                {{ $activity->user->name ?? '-' }}
            </td>
            <td class="px-6 py-4 text-center">
                @php
                    switch($activity->role){
                        case 'admin':
                            $bg = 'bg-emerald-100 dark:bg-emerald-900';
                            $text = 'text-emerald-800 dark:text-emerald-300';
                            break;
                        case 'manajer_gudang':
                            $bg = 'bg-blue-100 dark:bg-blue-900';
                            $text = 'text-blue-800 dark:text-blue-300';
                            break;
                        case 'staff_gudang':
                            $bg = 'bg-orange-100 dark:bg-orange-900';
                            $text = 'text-orange-800 dark:text-orange-300';
                            break;
                        default:
                            $bg = 'bg-gray-100 dark:bg-gray-900';
                            $text = 'text-gray-800 dark:text-gray-300';
                    }
                    $roleLabel = match($activity->role) {
                        'admin' => 'Admin',
                        'manajer_gudang' => 'Manajer gudang',
                        'staff_gudang' => 'Staff gudang',
                        default => ucfirst($activity->role),
                    };
                @endphp
                <span class="px-3 py-1 text-xs font-medium rounded-full {{ $bg }} {{ $text }}">
                    {{ $roleLabel }}
                </span>
            </td>
            <td class="px-6 py-4 text-center">
                {{ $activity->activity }}
            </td>
            <td class="px-6 py-4 text-center space-x-1">
                <button onclick="openDetail(this)"
                    data-modal-target="detailModal"
                    data-modal-toggle="detailModal"
                    class="text-white bg-sky-600 hover:bg-sky-700 rounded-lg text-xs px-3 py-1.5">
                    Detail
                </button>
                <button onclick="openDeleteModal(this)"
                        data-id="{{ $activity->id }}"
                        data-modal-target="deleteModal"
                        data-modal-toggle="deleteModal"
                        class="text-white bg-red-600 hover:bg-red-700 rounded-lg text-xs px-3 py-1.5">
                    Hapus
                </button>
            </td>
        </tr>
        @empty
            <tr>
                <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                    Tidak ada data aktivitas
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
<!--MODAL DETAIL-->
<div id="detailModal"
     tabindex="-1"
     aria-hidden="true"
     class="fixed inset-0 z-50 hidden flex items-center justify-center
            bg-black/40 backdrop-blur-sm">
    <div class="relative w-full max-w-md mx-auto">

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg">
            <div class="flex items-center justify-between px-6 py-4
                        border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Detail Aktivitas
                </h3>
                <button type="button"
                        data-modal-hide="detailModal"
                        class="inline-flex items-center justify-center w-8 h-8
                               text-gray-400 rounded-lg
                               hover:bg-gray-100 hover:text-gray-700
                               dark:hover:bg-gray-700 dark:hover:text-white">
                    ✕
                </button>
            </div>

            <div class="px-6 py-5 space-y-4 text-sm">
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">
                        Tanggal
                    </span>
                    <span id="detail-tanggal"
                          class="font-medium text-gray-900 dark:text-white">
                        -
                    </span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">
                        Nama Pengguna
                    </span>
                    <span id="detail-user"
                          class="text-gray-700 dark:text-gray-300">
                        -
                    </span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-gray-500 dark:text-gray-400">
                        Role
                    </span>
                    <span id="detail-role"
                          class="px-3 py-1 text-xs font-semibold rounded-full">
                        -
                    </span>
                </div>
                <div>
                    <span class="block text-gray-500 dark:text-gray-400 mb-1">
                        Aktivitas
                    </span>
                    <p id="detail-activity"
                       class="text-gray-700 dark:text-gray-300">
                        -
                    </p>
                </div>
                <div>
                    <span class="block text-gray-500 dark:text-gray-400 mb-1">
                        Deskripsi
                    </span>
                    <p id="detail-description"
                       class="text-gray-700 dark:text-gray-300 text-sm">
                        -
                    </p>
                </div>
            </div>
            <div class="flex justify-end px-6 py-4
                        border-t border-gray-200 dark:border-gray-700">
                <button data-modal-hide="detailModal"
                        class="px-5 py-2 text-sm font-medium
                               text-gray-700 bg-gray-100 rounded-lg
                               hover:bg-gray-200
                               dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
                    Tutup
                </button>
            </div>

        </div>
    </div>
</div>

<!-- MODAL HAPUS-->
<div id="deleteModal" tabindex="-1"
     class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="relative w-full max-w-md p-6 bg-white rounded-lg shadow
                dark:bg-gray-800">
        <div class="flex items-center justify-center w-12 h-12 mx-auto mb-4
                    bg-red-100 rounded-full dark:bg-red-900">
            <svg class="w-6 h-6 text-red-600 dark:text-red-300"
                 xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 9v3.75m0 3.75h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <h3 class="mb-2 text-lg font-semibold text-center
                   text-gray-900 dark:text-white">
            Hapus Aktivitas?
        </h3>
        <p class="mb-6 text-sm text-center
                  text-gray-500 dark:text-gray-400">
            Aktivitas ini akan dihapus permanen dan
            <span class="font-semibold text-red-600 dark:text-red-400">
                tidak dapat dikembalikan
            </span>.
        </p>
        <form id="deleteForm" method="POST" class="flex justify-center gap-3">
            @csrf
            @method('DELETE')

            <button type="button"
                    data-modal-hide="deleteModal"
                    class="px-4 py-2 text-sm font-medium
                           text-gray-700 bg-gray-200 rounded-lg
                           hover:bg-gray-300
                           dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                Batal
            </button>
            <button type="submit"
                    class="px-4 py-2 text-sm font-medium
                           text-white bg-red-600 rounded-lg
                           hover:bg-red-700 focus:ring-4 focus:ring-red-300
                           dark:focus:ring-red-800">
                Ya, Hapus
            </button>
        </form>

    </div>
</div>
<!-- MODAL HAPUS SEMUA AKTIVITAS -->
<div id="deleteAllModal" tabindex="-1"
     class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="relative w-full max-w-md p-6 bg-white rounded-lg shadow
                dark:bg-gray-800">

        <div class="flex items-center justify-center w-12 h-12 mx-auto mb-4
                    bg-red-100 rounded-full dark:bg-red-900">
            <svg class="w-6 h-6 text-red-600 dark:text-red-300"
                 xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 9v3.75m0 3.75h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <h3 class="mb-2 text-lg font-semibold text-center
                   text-gray-900 dark:text-white">
            Hapus Semua Aktivitas?
        </h3>
        <p class="mb-6 text-sm text-center
                  text-gray-500 dark:text-gray-400">
            Semua data aktivitas akan
            <span class="font-semibold text-red-600">dihapus permanen</span>
            dan tidak dapat dikembalikan.
        </p>
        <form method="POST"
              action="{{ route('admin.report.activity.deleteAll') }}"
              class="flex justify-center gap-3">
            @csrf
            @method('DELETE')

            <button type="button"
                    data-modal-hide="deleteAllModal"
                    class="px-4 py-2 text-sm font-medium
                           text-gray-700 bg-gray-200 rounded-lg
                           hover:bg-gray-300
                           dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                Batal
            </button>

            <button type="submit"
                    class="px-4 py-2 text-sm font-medium
                           text-white bg-red-600 rounded-lg
                           hover:bg-red-700 focus:ring-4 focus:ring-red-300">
                Ya, Hapus Semua
            </button>
        </form>
    </div>
</div>


<script>
function openDetail(button) {
    const row = button.closest('tr')

    document.getElementById('detail-tanggal').textContent = row.dataset.tanggal
    document.getElementById('detail-user').textContent = row.dataset.user
    document.getElementById('detail-activity').textContent = row.dataset.activity
    document.getElementById('detail-description').textContent = row.dataset.description

    const roleKey = row.dataset.role
    const roleSpan = document.getElementById('detail-role')

    let bg, text, label

    switch (roleKey) {
        case 'admin':
            bg = 'bg-emerald-100 dark:bg-emerald-900'
            text = 'text-emerald-800 dark:text-emerald-300'
            label = 'Admin'
            break

        case 'manajer_gudang':
            bg = 'bg-blue-100 dark:bg-blue-900'
            text = 'text-blue-800 dark:text-blue-300'
            label = 'Manajer gudang'
            break

        case 'staff_gudang':
            bg = 'bg-orange-100 dark:bg-orange-900'
            text = 'text-orange-800 dark:text-orange-300'
            label = 'Staff gudang'
            break

        default:
            bg = 'bg-gray-100 dark:bg-gray-900'
            text = 'text-gray-800 dark:text-gray-300'
            label = roleKey
    }

    roleSpan.textContent = label
    roleSpan.className = `px-3 py-1 text-xs font-medium rounded-full ${bg} ${text}`
}
function openDeleteModal(button) {
    const id = button.closest('tr').dataset.id
    const form = document.getElementById('deleteForm')

    form.action = `/dashboard/admin/report/activity/${id}`
}

</script>


<!-- PAGINATION -->
@if ($activities instanceof \Illuminate\Pagination\LengthAwarePaginator)
<div class="p-4">
    {{ $activities->links() }}
</div>
@endif

@endsection
