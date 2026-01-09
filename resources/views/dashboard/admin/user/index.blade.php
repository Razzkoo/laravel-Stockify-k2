@extends('layouts.dashboard')

@section('title', 'Manajemen User')

@section('content')

<!-- HEADER -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Manajemen User</h1>

    <div class="flex flex-wrap gap-2">
        <input id="searchInput" type="text"
            placeholder="Cari nama / email"
            class="px-3 py-2 text-sm border rounded-lg focus:ring-indigo-500 focus:border-indigo-500">

        <select id="roleFilter"
            class="px-3 py-2 text-sm border rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
            <option value="">Semua Role</option>
            <option value="admin">Admin</option>
            <option value="manager">Manager</option>
            <option value="staff">Staff</option>
        </select>

        <button
            data-modal-target="addUserModal"
            data-modal-toggle="addUserModal"
            class="px-4 py-2 text-sm text-white bg-indigo-600 rounded-lg hover:bg-indigo-700">
            Tambah User
        </button>
    </div>
</div>

<!-- TABLE -->
<div class="bg-white rounded-xl shadow overflow-x-auto">
<table class="w-full text-sm text-gray-700">
<thead class="bg-gray-100 text-xs uppercase">
<tr>
    <th class="px-6 py-3 text-center">Nama</th>
    <th class="px-6 py-3 text-center">Email</th>
    <th class="px-6 py-3 text-center">Role</th>
    <th class="px-6 py-3 text-center">Aksi</th>
</tr>
</thead>

<tbody id="userTable">

<tr class="user-row border-b"
    data-name="aulia"
    data-email="aulia@email.com"
    data-role="admin">

<td class="px-6 py-4 text-center font-medium">Aulia</td>
<td class="px-6 py-4 text-center">aulia@email.com</td>
<td class="px-6 py-4 text-center">
    <span class="px-3 py-1 text-xs bg-purple-100 text-purple-700 rounded-full">
        Admin
    </span>
</td>
<td class="px-6 py-4 text-center space-x-1">

    <button
        data-modal-target="viewUserModal"
        data-modal-toggle="viewUserModal"
        class="px-3 py-1 text-xs text-white bg-blue-500 rounded">
        View
    </button>

    <button
        data-modal-target="editUserModal"
        data-modal-toggle="editUserModal"
        class="px-3 py-1 text-xs text-white bg-yellow-500 rounded">
        Edit
    </button>

    <button
        data-modal-target="deleteUserModal"
        data-modal-toggle="deleteUserModal"
        class="px-3 py-1 text-xs text-white bg-red-500 rounded">
        Hapus
    </button>

</td>
</tr>

</tbody>
</table>
</div>

<!-- ================= MODAL TAMBAH ================= -->
<div id="addUserModal" tabindex="-1" aria-hidden="true"
class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">

<div class="bg-white rounded-xl w-full max-w-md p-6">
<h3 class="text-lg font-semibold mb-4">Tambah User</h3>

<form class="space-y-3">
<input class="w-full border rounded-lg px-3 py-2 text-sm" placeholder="Nama">
<input class="w-full border rounded-lg px-3 py-2 text-sm" placeholder="Email">
<input type="password" class="w-full border rounded-lg px-3 py-2 text-sm" placeholder="Password">

<select class="w-full border rounded-lg px-3 py-2 text-sm">
<option>Admin</option>
<option>Manager</option>
<option>Staff</option>
</select>

<div class="flex justify-end gap-2 pt-4">
<button type="button"
data-modal-hide="addUserModal"
class="px-4 py-2 text-sm border rounded-lg">
Batal
</button>
<button class="px-4 py-2 text-sm bg-indigo-600 text-white rounded-lg">
Simpan
</button>
</div>
</form>
</div>
</div>

<!-- ================= MODAL VIEW ================= -->
<div id="viewUserModal" tabindex="-1" aria-hidden="true"
class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">

<div class="bg-white rounded-xl w-full max-w-sm p-6 text-center">
<div class="w-20 h-20 mx-auto rounded-full bg-indigo-600 text-white flex items-center justify-center text-3xl font-bold mb-3">
</div>

<h3 class="font-semibold text-lg">Aulia</h3>
<p class="text-sm text-gray-500 mb-4">aulia@email.com</p>

<div class="text-sm space-y-2 text-left">
<div class="flex justify-between"><span>Role</span><span class="font-medium">Admin</span></div>
<div class="flex justify-between"><span>Status</span><span class="text-green-600">Aktif</span></div>
<div class="flex justify-between"><span class="text-gray-500">Bergabung</span><span class="font-medium text-gray-800">01 Jan 2025</span></div>
</div>

<div class="mt-6">
<button data-modal-hide="viewUserModal"
class="px-4 py-2 text-sm border rounded-lg">
Tutup
</button>
</div>
</div>
</div>

<!-- ================= MODAL EDIT ================= -->
<div id="editUserModal" tabindex="-1" aria-hidden="true"
class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">

<div class="bg-white rounded-xl w-full max-w-md p-6">
<h3 class="text-lg font-semibold mb-4">Edit User</h3>

<form class="space-y-3">
<input class="w-full border rounded-lg px-3 py-2 text-sm" value="Aulia">
<input class="w-full border rounded-lg px-3 py-2 text-sm" value="aulia@email.com">

<select class="w-full border rounded-lg px-3 py-2 text-sm">
<option>Admin</option>
<option>Manager</option>
<option>Staff</option>
</select>

<div class="flex justify-end gap-2 pt-4">
<button type="button"
data-modal-hide="editUserModal"
class="px-4 py-2 text-sm border rounded-lg">
Batal
</button>
<button class="px-4 py-2 text-sm bg-indigo-600 text-white rounded-lg">
Simpan
</button>
</div>
</form>
</div>
</div>

<!-- ================= MODAL DELETE ================= -->
<div id="deleteUserModal" tabindex="-1" aria-hidden="true"
class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">

<div class="bg-white rounded-xl w-full max-w-sm p-6 text-center">
<h3 class="text-lg font-semibold mb-2">Hapus User?</h3>
<p class="text-sm text-gray-500 mb-5">
Data yang dihapus tidak bisa dikembalikan
</p>

<div class="flex justify-center gap-2">
<button data-modal-hide="deleteUserModal"
class="px-4 py-2 text-sm border rounded-lg">
Batal
</button>
<button class="px-4 py-2 text-sm bg-red-600 text-white rounded-lg">
Hapus
</button>
</div>
</div>
</div>

<!-- ================= SEARCH + FILTER ================= -->
<script>
const searchInput = document.getElementById('searchInput');
const roleFilter = document.getElementById('roleFilter');
const rows = document.querySelectorAll('.user-row');

function filterUser(){
    const search = searchInput.value.toLowerCase();
    const role = roleFilter.value;

    rows.forEach(row=>{
        const matchSearch =
            row.dataset.name.includes(search) ||
            row.dataset.email.includes(search);

        const matchRole =
            role === '' || row.dataset.role === role;

        row.classList.toggle('hidden', !(matchSearch && matchRole));
    });
}

searchInput.addEventListener('input', filterUser);
roleFilter.addEventListener('change', filterUser);
</script>

@endsection
