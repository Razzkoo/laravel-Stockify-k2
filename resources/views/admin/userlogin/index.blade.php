@extends('dashboard.admin.layout')

@section('title', 'Permintaan Akses User')

@section('content')

<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
        Permintaan Akses User
    </h1>
    <div class="flex items-center gap-2">
        <input id="searchInput" type="text"
            placeholder="Cari nama / email"
            class="w-56 px-3 py-2 text-sm rounded-lg
                   border border-gray-300 bg-gray-50
                   focus:ring-indigo-500 focus:border-indigo-500
                   dark:bg-gray-700 dark:border-gray-600 dark:text-white">

        <select id="statusFilter"
            class="px-3 py-2 text-sm rounded-lg
                   border border-gray-300 bg-gray-50
                   focus:ring-indigo-500 focus:border-indigo-500
                   dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            <option value="">Semua Status</option>
            <option value="pending">Pending</option>
            <option value="approved">Disetujui</option>
            <option value="rejected">Ditolak</option>
        </select>
    </div>
</div>

{{--TABLE--}}
<div class="overflow-x-auto rounded-xl shadow bg-white dark:bg-gray-800">
    <table class="w-full text-sm text-gray-600 dark:text-gray-300">
        <thead class="text-xs uppercase bg-gray-100 dark:bg-gray-700">
            <tr>
                <th class="px-6 py-4 text-center">Nama</th>
                <th class="px-6 py-4 text-center">Email</th>
                <th class="px-6 py-4 text-center">Role Dipilih</th>
                <th class="px-6 py-4 text-center">Status</th>
                <th class="px-6 py-4 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody id="requestTable">
        @forelse ($requests as $request)
            <tr class="request-row border-t dark:border-gray-700"
                data-name="{{ strtolower($request->name) }}"
                data-email="{{ strtolower($request->email) }}"
                data-status="{{ $request->status }}">
                <td class="px-6 py-4 text-center font-medium text-gray-900 dark:text-white">
                    {{ $request->user->name ?? $request->name }}
                </td>
                <td class="px-6 py-4 text-center">
                    {{ $request->user->email ?? $request->email }}
                </td>
                <td class="px-6 py-4 text-center">
                    @php
                        $roleMap = [
                            'admin' => ['bg-emerald-100','text-emerald-800','dark:bg-emerald-900','dark:text-emerald-300'],
                            'manajer_gudang' => ['bg-blue-100','text-blue-800','dark:bg-blue-900','dark:text-blue-300'],
                            'staff_gudang' => ['bg-orange-100','text-orange-800','dark:bg-orange-900','dark:text-orange-300'],
                        ];
                        $r = $roleMap[$request->requested_role] ?? ['bg-gray-100','text-gray-800','dark:bg-gray-700','dark:text-gray-300'];
                    @endphp

                    <span class="px-3 py-1 text-xs font-semibold rounded-full {{ implode(' ', $r) }}">
                        {{ ucfirst(str_replace('_',' ',$request->requested_role)) }}
                    </span>
                </td>

                <td class="px-6 py-4 text-center">
                    <span class="px-3 py-1 text-xs font-semibold rounded-full
                        @if($request->status === 'pending')
                            bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300
                        @elseif($request->status === 'approved')
                            bg-emerald-100 text-emerald-800 dark:bg-emerald-900 dark:text-emerald-300
                        @else
                            bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300
                        @endif">
                        {{ ucfirst($request->status === 'approved' ? 'Disetujui' : ($request->status === 'rejected' ? 'Ditolak' : 'Pending')) }}
                    </span>
                </td>

                <td class="px-6 py-4">
                    <div class="flex flex-wrap justify-center gap-2">

                        @if($request->status === 'pending')
                        <form action="{{ route('admin.userlogin.approve', $request->id) }}"
                              method="POST"
                              class="flex items-center gap-2">
                            @csrf
                            <select name="role"
                                class="px-2 py-1.5 text-xs rounded-lg
                                       border border-gray-300 bg-gray-50
                                       dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <option value="staff_gudang">Staff Gudang</option>
                                <option value="manajer_gudang">Manajer Gudang</option>
                                <option value="admin">Admin</option>
                            </select>

                            <button class="px-3 py-1.5 text-xs rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white">
                                Setujui
                            </button>
                        </form>

                        <form action="{{ route('admin.userlogin.reject', $request->id) }}"
                              method="POST">
                            @csrf
                            <button class="px-3 py-1.5 text-xs rounded-lg bg-red-600 hover:bg-red-700 text-white">
                                Tolak
                            </button>
                        </form>
                        @endif

                        @if($request->status === 'rejected')
                        <form action="{{ route('admin.userlogin.approve', $request->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="role" value="{{ $request->requested_role }}">
                            <button class="px-3 py-1.5 text-xs rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white">
                                Setujui
                            </button>
                        </form>

                        <button
                            onclick="openDeleteRequestModal({{ $request->id }}, '{{ $request->user->name ?? $request->name }}')"
                            data-modal-toggle="deleteRequestModal"
                            data-modal-target="deleteRequestModal"
                            class="px-3 py-1.5 text-xs text-white bg-red-600 rounded-lg
                                hover:bg-red-700 transition">
                            Hapus
                        </button>
                        @endif
                        <button
                            data-modal-target="viewRequestModal"
                            data-modal-toggle="viewRequestModal"
                            data-name="{{ $request->user->name ?? $request->name }}"
                            data-email="{{ $request->user->email ?? $request->email }}"
                            data-role="{{ $request->requested_role }}"
                            data-status="{{ $request->status }}"
                            data-created="{{ $request->created_at->format('d M Y') }}"
                            class="px-3 py-1.5 text-xs text-white bg-sky-600 rounded-lg
                                hover:bg-sky-700 transition">
                            Detail
                        </button>
                    </div>
                </td>
            </tr>
        @empty
            <tr id="emptyRequestRow">
                <td colspan="5" class="py-10 text-center text-gray-500">
                    Tidak ada permintaan user
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
    <!--MODAL DETAIL-->
    <div id="viewRequestModal"
        tabindex="-1"
        aria-hidden="true"
        class="fixed inset-0 z-50 hidden flex items-center justify-center
                bg-black/40 backdrop-blur-sm">

        <div class="relative w-full max-w-md mx-auto">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg">

                <div class="flex items-center justify-between px-6 py-4
                            border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Detail Permintaan User
                    </h3>
                    <button type="button"
                            data-modal-hide="viewRequestModal"
                            class="inline-flex items-center justify-center w-8 h-8
                                text-gray-400 rounded-lg
                                hover:bg-gray-100 hover:text-gray-700
                                dark:hover:bg-gray-700 dark:hover:text-white">
                        ✕
                    </button>
                </div>

                <div class="px-6 py-5 space-y-4 text-sm">

                    <div class="flex justify-between">
                        <span class="text-gray-500 dark:text-gray-400">Nama</span>
                        <span class="font-medium text-gray-900 dark:text-white"
                            id="modalReqName"></span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500 dark:text-gray-400">Email</span>
                        <span class="text-gray-700 dark:text-gray-300"
                            id="modalReqEmail"></span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-500 dark:text-gray-400">Role Diminta</span>
                        <span class="px-3 py-1 text-xs font-semibold rounded-full"
                            id="modalReqRole"></span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-500 dark:text-gray-400">Status</span>
                        <span class="px-3 py-1 text-xs font-semibold rounded-full"
                            id="modalReqStatus"></span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500 dark:text-gray-400">Diajukan</span>
                        <span class="text-gray-700 dark:text-gray-300"
                            id="modalReqCreated"></span>
                    </div>
                </div>

                <div class="flex justify-end gap-2 px-6 py-4
                            border-t border-gray-200 dark:border-gray-700">
                    <button data-modal-hide="viewRequestModal"
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
</div>
<!--MODAL HAPUS PERMINTAAN USER-->
<div id="deleteRequestModal" tabindex="-1"
     class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">

    <div class="relative w-full max-w-md p-6 bg-white rounded-lg shadow
                dark:bg-gray-800">

        <div class="flex items-center justify-center w-12 h-12 mx-auto mb-4
                    bg-red-100 rounded-full dark:bg-red-900">
            <svg class="w-6 h-6 text-red-600 dark:text-red-300"
                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 9v3.75m0 3.75h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <h3 class="mb-2 text-lg font-semibold text-center
                   text-gray-900 dark:text-white">
            Hapus Permintaan User?
        </h3>
        <p class="mb-6 text-sm text-center
                  text-gray-500 dark:text-gray-400">
            Permintaan user <span id="deleteRequestName" class="font-semibold"></span>
            akan dihapus permanen dan tidak dapat dikembalikan.
        </p>
        <form id="deleteRequestForm" method="POST" class="flex justify-center gap-3">
            @csrf
            @method('DELETE')

            <button type="button"
                    data-modal-hide="deleteRequestModal"
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


{{--SCRIPT--}}
<script>
const searchInput = document.getElementById('searchInput')
const statusFilter = document.getElementById('statusFilter')
const rows = document.querySelectorAll('.request-row')
const emptyState = document.getElementById('emptyRequestRow')

function filterRequest(){
    const search = searchInput.value.toLowerCase()
    const status = statusFilter.value
    let visibleCount = 0

    rows.forEach(row => {
        const matchSearch =
            row.dataset.name.includes(search) ||
            row.dataset.email.includes(search)

        const matchStatus =
            status === '' || row.dataset.status === status

        const visible = matchSearch && matchStatus
        row.classList.toggle('hidden', !visible)

        if (visible) visibleCount++
    })

    emptyState.classList.toggle('hidden', visibleCount !== 0)
}

searchInput.addEventListener('input', filterRequest)
statusFilter.addEventListener('change', filterRequest)

</script>
<script>
document.querySelectorAll('[data-modal-toggle="viewRequestModal"]').forEach(button => {
    button.addEventListener('click', function () {
        const name = this.dataset.name
        const email = this.dataset.email
        const role = this.dataset.role
        const status = this.dataset.status
        const created = this.dataset.created

        // ROLE BADGE
        let roleBg, roleText
        switch (role) {
            case 'admin':
                roleBg = 'bg-emerald-100 dark:bg-emerald-900'
                roleText = 'text-emerald-800 dark:text-emerald-300'
                break
            case 'manajer_gudang':
                roleBg = 'bg-blue-100 dark:bg-blue-900'
                roleText = 'text-blue-800 dark:text-blue-300'
                break
            case 'staff_gudang':
                roleBg = 'bg-orange-100 dark:bg-orange-900'
                roleText = 'text-orange-800 dark:text-orange-300'
                break
            default:
                roleBg = 'bg-gray-100 dark:bg-gray-700'
                roleText = 'text-gray-800 dark:text-gray-300'
        }

        let statusBg, statusText, statusLabel
        if (status === 'approved') {
            statusBg = 'bg-emerald-100 dark:bg-emerald-900'
            statusText = 'text-emerald-800 dark:text-emerald-300'
            statusLabel = 'Disetujui'
        } else if (status === 'rejected') {
            statusBg = 'bg-red-100 dark:bg-red-900'
            statusText = 'text-red-800 dark:text-red-300'
            statusLabel = 'Ditolak'
        } else {
            statusBg = 'bg-yellow-100 dark:bg-yellow-900'
            statusText = 'text-yellow-800 dark:text-yellow-300'
            statusLabel = 'Pending'
        }

        document.getElementById('modalReqName').textContent = name
        document.getElementById('modalReqEmail').textContent = email

        const roleSpan = document.getElementById('modalReqRole')
        roleSpan.textContent = role.replace('_',' ').replace(/\b\w/g, l => l.toUpperCase())
        roleSpan.className = `px-3 py-1 text-xs font-semibold rounded-full ${roleBg} ${roleText}`

        const statusSpan = document.getElementById('modalReqStatus')
        statusSpan.textContent = statusLabel
        statusSpan.className = `px-3 py-1 text-xs font-semibold rounded-full ${statusBg} ${statusText}`

        document.getElementById('modalReqCreated').textContent = created
    })
})
function openDeleteRequestModal(id, name) {
    const form = document.getElementById('deleteRequestForm');
    const nameText = document.getElementById('deleteRequestName');

    nameText.textContent = `"${name}"`;

    form.action = `/dashboard/admin/userlogin/${id}`;
}

</script>
<script src="https://unpkg.com/flowbite@latest/dist/flowbite.min.js"></script>

@endsection
