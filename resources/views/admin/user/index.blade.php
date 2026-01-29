@extends('dashboard.admin.layout')

@section('title', 'Daftar Pengguna')

@section('content')

<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
        Daftar Pengguna
    </h1>

    <div class="flex flex-wrap items-center gap-2">
        <input id="searchInput" type="text"
            placeholder="Cari nama / email"
            class="block w-56 p-2.5 text-sm text-gray-900
                   bg-gray-50 border border-gray-300 rounded-lg
                   focus:ring-indigo-500 focus:border-indigo-500
                   dark:bg-gray-700 dark:border-gray-600 dark:text-white">

        <!-- FILTER -->
        <select id="roleFilter"
            class="block p-2.5 text-sm text-gray-900
                   bg-gray-50 border border-gray-300 rounded-lg
                   focus:ring-indigo-500 focus:border-indigo-500
                   dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            <option value="">Semua Role</option>
            <option value="admin">Admin</option>
            <option value="manajer_gudang">Manajer Gudang</option>
            <option value="staff_gudang">Staff Gudang</option>
        </select>
        <a href="{{ route('admin.user.create') }}"
            class="inline-flex items-center px-4 py-2 text-sm font-medium
            text-white bg-indigo-600 rounded-lg hover:bg-indigo-700">
            + Tambah Pengguna
        </a>
    </div>
</div>
<!-- TABLE -->
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="px-6 py-3 text-center">Nama</th>
                <th class="px-6 py-3 text-center">Email</th>
                <th class="px-6 py-3 text-center">Role</th>
                <th class="px-6 py-3 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody id="userTable">
            @foreach($users as $user)
            <tr class="user-row border-b dark:border-gray-700"
                data-name="{{ strtolower($user->name) }}"
                data-email="{{ strtolower($user->email) }}"
                data-role="{{ $user->role }}">

                <td class="px-6 py-4 text-center font-medium text-gray-900 dark:text-white">
                    {{ $user->name }}
                </td>

                <td class="px-6 py-4 text-center">
                    {{ $user->email }}
                </td>

                <td class="px-6 py-4 text-center">
                    @php
                        switch($user->role) {
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
                                $bg = 'bg-gray-100 dark:bg-gray-700';
                                $text = 'text-gray-800 dark:text-gray-300';
                        }
                    @endphp

                    <span class="text-xs font-medium px-3 py-1 rounded-full {{ $bg }} {{ $text }}">
                        {{ ucfirst(str_replace('_', ' ', $user->role)) }}
                    </span>
                </td>
                <td class="px-6 py-4 text-center space-x-1">
                    <button 
                        data-modal-target="viewUserModal" 
                        data-modal-toggle="viewUserModal"
                        data-name="{{ $user->name }}"
                        data-email="{{ $user->email }}"
                        data-role="{{ $user->role }}"
                        data-created="{{ $user->created_at->format('d M Y') }}"
                        data-photo="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : '' }}"
                        class="text-white bg-sky-600 hover:bg-sky-700 font-medium rounded-lg text-xs px-3 py-1.5">
                        Detail
                    </button>
                    <a href="{{ route('admin.user.edit', $user->id) }}"
                    class="text-white bg-indigo-600 hover:bg-indigo-700 font-medium rounded-lg text-xs px-3 py-1.5">
                        Edit
                    </a>
                    <button
                        onclick="openDeleteUserModal({{ $user->id }}, '{{ $user->name }}')"
                        data-modal-target="deleteUserModal"
                        data-modal-toggle="deleteUserModal"
                        class="text-white bg-red-600 hover:bg-red-700 font-medium rounded-lg text-xs px-3 py-1.5">
                        Hapus
                    </button>   
                </td>
            </tr>
            @endforeach
            <tr id="emptyUserRow" class="hidden">
                <td colspan="4"
                    class="px-6 py-10 text-center text-gray-500 dark:text-gray-400">
                    <div class="flex flex-col items-center gap-2">
                        <span class="text-sm font-medium">
                            User tidak ditemukan
                        </span>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!--MODAL DETAIL-->
<div id="viewUserModal"
     tabindex="-1"
     aria-hidden="true"
     class="fixed inset-0 z-50 hidden flex items-center justify-center
            bg-black/40 backdrop-blur-sm">

    <div class="relative w-full max-w-md mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg">
            <div class="flex items-center justify-between px-6 py-4
                        border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Detail User
                </h3>
                <button type="button"
                        data-modal-hide="viewUserModal"
                        class="w-8 h-8 inline-flex items-center justify-center
                               text-gray-400 rounded-lg
                               hover:bg-gray-100 hover:text-gray-700
                               dark:hover:bg-gray-700 dark:hover:text-white">
                    ✕
                </button>
            </div>

            <div class="px-6 py-5 space-y-4 text-sm">
                <div class="flex justify-center">
                    <img id="modalUserAvatar"
                        class="w-20 h-20 rounded-full object-cover
                            border-2 border-indigo-500 shadow-md
                            bg-gray-200 dark:bg-gray-600"
                        src="{{ asset('images/default avatar.jpg') }}"
                        alt="User Avatar">

                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">Nama</span>
                    <span class="font-medium text-gray-900 dark:text-white"
                          id="modalUserName"></span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">Email</span>
                    <span class="text-gray-700 dark:text-gray-300"
                          id="modalUserEmail"></span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-gray-500 dark:text-gray-400">Role</span>
                    <span class="px-3 py-1 text-xs font-semibold rounded-full"
                          id="modalUserRole"></span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">
                        Terdaftar Sejak
                    </span>
                    <span class="text-gray-700 dark:text-gray-300"
                          id="modalUserCreated"></span>
                </div>
            </div>

            <div class="flex justify-end gap-2 px-6 py-4
                        border-t border-gray-200 dark:border-gray-700">

                <button data-modal-hide="viewUserModal"
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
<div id="deleteUserModal" tabindex="-1"
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
            Hapus User?
        </h3>
        <p class="mb-6 text-sm text-center
                  text-gray-500 dark:text-gray-400">
            User <span id="deleteUserName" class="font-semibold"></span>
            akan dihapus permanen dan tidak dapat dikembalikan.
        </p>
        <form id="deleteUserForm" method="POST" class="flex justify-center gap-3">
            @csrf
            @method('DELETE')

            <button type="button"
                    data-modal-hide="deleteUserModal"
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


<!-- SCRIPT-->
<script>
document.querySelectorAll('[data-modal-toggle="viewUserModal"]').forEach(button => {
    button.addEventListener('click', function() {

        const name = this.dataset.name
        const email = this.dataset.email
        const role = this.dataset.role
        const created = this.dataset.created
        const photo = this.dataset.photo

        const avatar = document.getElementById('modalUserAvatar')
        if (photo) {
            avatar.src = photo
            avatar.alt = name
        } else {
            avatar.src = '{{ asset('images/default avatar.jpg') }}'
            avatar.alt = name
        }

        let bg, text
        switch(role){
            case 'admin':
                bg = 'bg-emerald-100 dark:bg-emerald-900'
                text = 'text-emerald-800 dark:text-emerald-300'
                break
            case 'manajer_gudang':
                bg = 'bg-blue-100 dark:bg-blue-900'
                text = 'text-blue-800 dark:text-blue-300'
                break
            case 'staff_gudang':
                bg = 'bg-orange-100 dark:bg-orange-900'
                text = 'text-orange-800 dark:text-orange-300'
                break
            default:
                bg = 'bg-gray-100 dark:bg-gray-700'
                text = 'text-gray-800 dark:text-gray-300'
        }

        document.getElementById('modalUserName').textContent = name
        document.getElementById('modalUserEmail').textContent = email

        const roleSpan = document.getElementById('modalUserRole')
        roleSpan.textContent = role.replace('_',' ')
            .replace(/\b\w/g, l => l.toUpperCase())
        roleSpan.className = `px-3 py-1 text-xs font-semibold rounded-full ${bg} ${text}`

        document.getElementById('modalUserCreated').textContent = created

        document.getElementById('modalUserEditBtn').href =
            `/dashboard/admin/user/${this.closest('tr').dataset.id}/edit`
    })
})
</script>

</script>
<script>
function openDeleteUserModal(id, name) {
    const form = document.getElementById('deleteUserForm');
    const nameText = document.getElementById('deleteUserName');

    nameText.textContent = `"${name}"`;

    form.action = `/dashboard/admin/user/${id}`;
}
</script>

<script>
const searchInput = document.getElementById('searchInput')
const roleFilter = document.getElementById('roleFilter')
const rows = document.querySelectorAll('.user-row')
const emptyRow = document.getElementById('emptyUserRow')

function filterUser() {
    const search = searchInput.value.toLowerCase()
    const role = roleFilter.value
    let found = false

    rows.forEach(row => {
        const matchSearch =
            row.dataset.name.includes(search) ||
            row.dataset.email.includes(search)

        const matchRole =
            role === '' || row.dataset.role === role

        if (matchSearch && matchRole) {
            row.classList.remove('hidden')
            found = true
        } else {
            row.classList.add('hidden')
        }
    })
    if (!found && search !== '') {
        emptyRow.classList.remove('hidden')
    } else {
        emptyRow.classList.add('hidden')
    }
}

searchInput.addEventListener('input', filterUser)
roleFilter.addEventListener('change', filterUser)
</script>
@endsection
