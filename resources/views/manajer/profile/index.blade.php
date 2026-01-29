@extends('dashboard.manajer.layout')

@section('title', 'Profil Saya')

@section('content')
<div class="max-w-6xl mx-auto space-y-10">

    <div>
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
            Profil Akun
        </h1>
        <p class="text-sm text-gray-500 dark:text-gray-400">
            Informasi pengguna.
        </p>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-8 flex flex-col lg:flex-row gap-8 transition-all duration-300 hover:shadow-2xl">

        <div class="w-full lg:w-1/3 space-y-6 flex flex-col items-center text-center">
            <div class="relative w-36 h-36">
                <div id="profileAvatarWrapper" class="w-full h-full rounded-full border-4 border-indigo-500 shadow-lg overflow-hidden flex items-center justify-center bg-neutral-secondary-medium">
                    @if(Auth::user()->profile_photo)
                        <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}"
                            id="profileAvatar"
                            class="w-full h-full object-cover rounded-full"
                            alt="Profile Photo">
                    @else
                        <img
                            src="{{ asset('images/default avatar.jpg') }}"
                            id="profileAvatar"
                            class="w-full h-full object-cover rounded-full"
                            alt="Default Avatar">
                    @endif
                </div>
                <span class="absolute bottom-2 right-2 w-4 h-4 rounded-full bg-green-500 border-2 border-white dark:border-gray-800 animate-pulse"></span>
                <button data-modal-target="editProfileModal" data-modal-toggle="editProfileModal"
                    class="absolute bottom-0 right-0 translate-x-1/6 translate-y-1/5 bg-indigo-600 hover:bg-indigo-700 text-white w-10 h-10 rounded-full flex items-center justify-center shadow-md hover:shadow-lg transition-all duration-200">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28"/>
                    </svg>
                </button>
            </div>
            <h2 class="mt-4 text-lg font-semibold text-gray-800 dark:text-white">{{ Auth::user()->name ?? '-' }}</h2>
            <p class="text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->email ?? '-' }}</p>
        </div>

        <div class="flex-1 space-y-8">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">Akun saya</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
                    <div class="p-4 border rounded-xl bg-gray-50 dark:bg-gray-700 border-gray-100 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-600 shadow-sm hover:shadow-md transition-all duration-200">
                        <p class="text-gray-500 dark:text-gray-300">Nama Lengkap</p>
                        <p class="font-medium text-gray-800 dark:text-white">{{ Auth::user()->name ?? '-' }}</p>
                    </div>
                    <div class="p-4 border rounded-xl bg-gray-50 dark:bg-gray-700 border-gray-100 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-600 shadow-sm hover:shadow-md transition-all duration-200">
                        <p class="text-gray-500 dark:text-gray-300">Email</p>
                        <p class="font-medium text-gray-800 dark:text-white">{{ Auth::user()->email ?? '-' }}</p>
                    </div>
                    <div class="p-4 border rounded-xl bg-gray-50 dark:bg-gray-700 border-gray-100 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-600 shadow-sm hover:shadow-md transition-all duration-200">
                        <p class="text-gray-500 dark:text-gray-300">Tanggal Bergabung</p>
                        <p class="font-medium text-gray-800 dark:text-white">{{ Auth::user()->created_at ? Auth::user()->created_at->format('d M Y') : '-' }}</p>
                    </div>
                    <div class="p-4 border rounded-xl bg-gray-50 dark:bg-gray-700 border-gray-100 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-600 shadow-sm hover:shadow-md transition-all duration-200">
                        <p class="text-gray-500 dark:text-gray-300">Role</p>
                        <p class="font-medium text-gray-800 dark:text-white">
                            {{ ucfirst(str_replace('_', ' ', Auth::user()->role ?? '-')) }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL Edit Foto Profil -->
<div id="editProfileModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <div class="relative bg-white dark:bg-gray-800 rounded-lg shadow-lg">
            <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-700">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Edit Foto Profil
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white" data-modal-hide="editProfileModal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="p-6 space-y-6">
                <form method="POST" action="{{ route('manajer.profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col items-center justify-center">
                        <div id="modalPreviewWrapper"
                            class="w-32 h-32 rounded-full mb-4 overflow-hidden flex items-center justify-center border-2 border-indigo-500 shadow-md bg-neutral-secondary-medium">

                            @if(Auth::user()->profile_photo)
                                <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}"
                                    id="modalPreview"
                                    class="w-full h-full object-cover rounded-full">
                            @else
                                <img
                                    src="{{ asset('images/default avatar.jpg') }}"
                                    id="modalPreview"
                                    class="w-full h-full object-cover rounded-full"
                                    alt="Default Avatar">
                            @endif
                        </div>
                        <input type="file" name="profile_photo" id="profilePhotoInput" class="block w-full text-sm text-gray-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-full file:border-0
                            file:text-sm file:font-semibold
                            file:bg-indigo-100 file:text-indigo-700
                            hover:file:bg-indigo-200
                            dark:file:bg-indigo-700 dark:file:text-indigo-100
                            dark:hover:file:bg-indigo-600">
                    </div>
                    <div class="mt-4 flex justify-end gap-2">
                        <button type="button" data-modal-hide="editProfileModal" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600 transition">
                            Batal
                        </button>
                        <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600 transition">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- SCRIPT-->
<script>
const profilePhotoInput = document.getElementById('profilePhotoInput');

profilePhotoInput.addEventListener('change', function () {
    const file = this.files[0];
    const defaultAvatar = "{{ asset('images/default-avatar.png') }}";

    if (!file) {
        document.getElementById('profileAvatarWrapper').innerHTML = `
            <img src="${defaultAvatar}"
                 class="w-full h-full object-cover rounded-full">
        `;
        document.getElementById('modalPreviewWrapper').innerHTML = `
            <img src="${defaultAvatar}"
                 class="w-full h-full object-cover rounded-full">
        `;
        return;
    }

    const imageURL = URL.createObjectURL(file);

    document.getElementById('profileAvatarWrapper').innerHTML = `
        <img src="${imageURL}"
             class="w-full h-full object-cover rounded-full">
    `;

    document.getElementById('modalPreviewWrapper').innerHTML = `
        <img src="${imageURL}"
             class="w-full h-full object-cover rounded-full">
    `;
});
</script>
@endsection
