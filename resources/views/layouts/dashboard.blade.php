<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>@yield('title', 'Dashboard Staff')</title>
</head>

<body class="bg-indigo-100">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside id="sidebar"
        class="w-64 bg-indigo-500 text-white flex-shrink-0 transition-all duration-300">

        <!-- BRAND -->
        <div class="px-6 py-5 border-b border-white/20">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 flex items-center justify-center">
    <img src="{{ asset('image/logo/logo.png') }}" alt="Logo" class="w-9 h-9 object-contain">
        </div>
                <div class="sidebar-text">
                    <p class="text-2x1 font-bold leading-none">Stockify</p>
                    <p class="text-xs text-white/70">Inventory</p>
                </div>
            </div>
        </div>

        <!-- MENU -->
        <nav class="px-3 py-4 space-y-1 text-sm">

            <!-- ITEM -->
            <a href="/dashboard/manajer"
               class="menu-item flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand transition-all duration-200 ease-in-out hover:translate-x-1 active:scale-[0.98] group"">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
  <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
</svg> <span class="sidebar-text">Dashboard</span>
            </a>

            <a href="/dashboard/manajer/product"
               class="menu-item flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand transition-all duration-200 ease-in-out hover:translate-x-1 active:scale-[0.98] group"">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
</svg> <span class="sidebar-text">Products</span>
            </a>

            <a href="/dashboard/admin/user"
               class="menu-item flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand transition-all duration-200 ease-in-out hover:translate-x-1 active:scale-[0.98] group"">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
</svg> <span class="sidebar-text">Users</span>
            </a>

            <a href="/dashboard/manajer/stock"
               class="menu-item flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand transition-all duration-200 ease-in-out hover:translate-x-1 active:scale-[0.98] group"">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
</svg> <span class="sidebar-text">Stock</span>
            </a>

            <a href="/dashboard/manajer/supplier"
               class="menu-item flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand transition-all duration-200 ease-in-out hover:translate-x-1 active:scale-[0.98] group"">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
</svg>
 <span class="sidebar-text">Supplier</span>
            </a>

            <a href="/dashboard/manajer/laporan"
               class="menu-item flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand transition-all duration-200 ease-in-out hover:translate-x-1 active:scale-[0.98] group"">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0 1 20.25 6v12A2.25 2.25 0 0 1 18 20.25H6A2.25 2.25 0 0 1 3.75 18V6A2.25 2.25 0 0 1 6 3.75h1.5m9 0h-9" />
</svg> <span class="sidebar-text">Report</span>
            </a>

            <a href="/dashboard/admin/pengaturan"
               class="menu-item flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand transition-all duration-200 ease-in-out hover:translate-x-1 active:scale-[0.98] group"">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 0 1 1.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.559.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.894.149c-.424.07-.764.383-.929.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 0 1-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.398.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 0 1-.12-1.45l.527-.737c.25-.35.272-.806.108-1.204-.165-.397-.506-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.108-1.204l-.526-.738a1.125 1.125 0 0 1 .12-1.45l.773-.773a1.125 1.125 0 0 1 1.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894Z" />
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
</svg> <span class="sidebar-text">Pengaturan</span>
            </a>

        </nav>
    </aside>

    <!-- MAIN -->
    <div class="flex-1 flex flex-col">

        <!-- NAVBAR -->
        <header class="h-16 bg-white border-b flex items-center justify-between px-6">

            <!-- LEFT -->
            <div class="flex items-center gap-3">
                <button onclick="toggleSidebar()"
                    class="p-2 rounded-md hover:bg-gray-100">
                    ☰
                </button>

                <h1 class="text-sm font-semibold text-gray-600 hidden md:block">
                </h1>
            </div>

            <!-- RIGHT -->
            <div class="relative">
                <button onclick="toggleProfile()"
                    class="flex items-center gap-3">
                   <img class="w-10 h-10 p-1 rounded-full ring-2 ring-default" 
                   src="/docs/images/people/profile-picture-5.jpg" alt="Bordered avatar">
                    <div class="hidden md:block text-left">
                        <p class="text-sm font-medium text-gray-700">Admin</p>
                        <p class="text-xs text-gray-500">Administrator</p>
                    </div>
                </button>

                <!-- DROPDOWN -->
                <div id="profileDropdown"
                    class="hidden absolute right-0 mt-3 w-44 bg-white rounded-lg shadow border z-50">
                    <a href="/dashboard/admin/profile"
                        class="block px-4 py-2 text-sm hover:bg-gray-100">
                        Profil
                    </a>
                    <div class="border-t"></div>
                    <a href="/auth/login"
                        class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                        Logout
                    </a>
                </div>
            </div>
        </header>

        <!-- CONTENT -->
        <main class="flex-1 p-6 overflow-x-hidden bg-indigo-100">
            @yield('content')
        </main>

    </div>
</div>

<!-- STYLE KECIL -->
<style>
.menu-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 12px;
    border-radius: 8px;
    transition: all .2s;
}
.menu-item:hover {
    background: rgba(255,255,255,.15);
}
#sidebar.collapsed {
    width: 5rem;
}
#sidebar.collapsed .sidebar-text {
    display: none;
}
</style>

<!-- SCRIPT -->
<script>
function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('collapsed');
}

function toggleProfile() {
    document.getElementById('profileDropdown').classList.toggle('hidden');
}

document.addEventListener('click', function (e) {
    const dropdown = document.getElementById('profileDropdown');
    if (!e.target.closest('[onclick="toggleProfile()"]')) {
        dropdown.classList.add('hidden');
    }
});
</script>


</body>
</html>
