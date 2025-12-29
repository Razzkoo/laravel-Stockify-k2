<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>@yield('title', 'Dashboard Admin')</title>
</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-indigo-500 text-white flex-shrink-0">
        <div class="px-6 py-5 border-b border-gray-400 text-center">
    <div class="flex items-center justify-center gap-2">
        <!-- Icon -->
        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
            📦
        </div>

        <!-- Brand -->
        <div class="text-3xl font-bold tracking-wide">
            Stock<span class="text-white-200">ify</span>
        </div>
    </div>

    <p class="text-xs text-white-200 mt-1">
        Inventory Management
    </p>
</div>

        <nav class="px-4 py-4 space-y-2 text-sm">

            <a href="/dashboard/admin" class="flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand transition-all duration-200 ease-in-out hover:translate-x-1 active:scale-[0.98] group">
               <svg class="w-5 h-5 transition-transform duration-200 group-hover:scale-110 group-hover:text-fg-brand" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6.025A7.5 7.5 0 1 0 17.975 14H10V6.025Z"/><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 3c-.169 0-.334.014-.5.025V11h7.975c.011-.166.025-.331.025-.5A7.5 7.5 0 0 0 13.5 3Z "/></svg>
               <span class="ms-3">Dashboard</span>
            </a>

            <a href="/dashboard/admin/product" class="flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand transition-all duration-200 ease-in-out hover:translate-x-1 active:scale-[0.98] group">
               <svg class="shrink-0 w-5 h-5 transition-transform duration-200 group-hover:scale-110 group-hover:text-fg-brand" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10V6a3 3 0 0 1 3-3v0a3 3 0 0 1 3 3v4m3-2 .917 11.923A1 1 0 0 1 17.92 21H6.08a1 1 0 0 1-.997-1.077L6 8h12Z"/></svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Products</span>
            </a>

            <a href="/dashboard/admin/user" class="flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand transition-all duration-200 ease-in-out hover:translate-x-1 active:scale-[0.98] group">
               <svg class="shrink-0 w-5 h-5 transition-transform duration-200 group-hover:scale-110 group-hover:text-fg-brand" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M16 19h4a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-2m-2.236-4a3 3 0 1 0 0-4M3 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
            </a>

            <a href="/dashboard/admin/stock" class="flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand transition-all duration-200 ease-in-out hover:translate-x-1 active:scale-[0.98] group">
               <svg class="shrink-0 w-5 h-5 transition-transform duration-200 group-hover:scale-110 group-hover:text-fg-brand" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10V6a3 3 0 0 1 3-3v0a3 3 0 0 1 3 3v4m3-2 .917 11.923A1 1 0 0 1 17.92 21H6.08a1 1 0 0 1-.997-1.077L6 8h12Z"/></svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Stock</span>
            </a>

            <a href="/dashboard/admin/supplier" class="flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand transition-all duration-200 ease-in-out hover:translate-x-1 active:scale-[0.98] group">
               <svg class="shrink-0 w-5 h-5 transition-transform duration-200 group-hover:scale-110 group-hover:text-fg-brand" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M16 19h4a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-2m-2.236-4a3 3 0 1 0 0-4M3 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Supplier</span>
            </a>

            <a href="/dashboard/admin/laporan" class="flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand transition-all duration-200 ease-in-out hover:translate-x-1 active:scale-[0.98] group">
               <svg class="shrink-0 w-5 h-5 transition-transform duration-200 group-hover:scale-110 group-hover:text-fg-brand" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 13h3.439a.991.991 0 0 1 .908.6 3.978 3.978 0 0 0 7.306 0 .99.99 0 0 1 .908-.6H20M4 13v6a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-6M4 13l2-9h12l2 9M9 7h6m-7 3h8"/></svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Report</span>
            </a>

        </nav>
    </aside>

    <!-- MAIN AREA -->
    <div class="flex-1 flex flex-col">

        <!-- NAVBAR -->
        <header class="h-16 bg-white border-b flex items-center justify-between px-6">

            <!-- LEFT -->
            <h1 class="text-lg font-semibold text-gray-700">
                Stockify
            </h1>

            <!-- RIGHT : PROFILE -->
            <div class="relative">
                <button
                    onclick="toggleProfile()"
                    class="flex items-center gap-3 focus:outline-none">

                    <img
                        src="https://ui-avatars.com/api/?name=Admin&background=8DA2FB&color=000"
                        class="w-9 h-9 rounded-full border"
                    >

                    <div class="text-left hidden md:block">
                        <p class="text-sm font-medium text-gray-700">Admin</p>
                        <p class="text-xs text-gray-500">Administrator</p>
                    </div>
                </button>

                <!-- DROPDOWN -->
                <div
                    id="profileDropdown"
                    class="hidden absolute right-0 mt-3 w-44 bg-white rounded-lg shadow border z-50">

                    <a href="/dashboard/admin/profile/index"
                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
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
        <main class="flex-1 p-6 overflow-x-hidden">
            @yield('content')
        </main>

    </div>
</div>

<!-- DROPDOWN SCRIPT -->
<script>
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
