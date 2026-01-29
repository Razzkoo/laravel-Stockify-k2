<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', config('app.name'))</title>

    @php
        $setting = \App\Models\Setting::first();
        $favicon = $setting && $setting->app_logo ? asset('storage/' . $setting->app_logo) : asset('images/logo.png');
    @endphp

    <link rel="icon" type="image/png" sizes="32x32" href="{{ $favicon }}">
    <link rel="icon" type="image/png" sizes="48x48" href="{{ $favicon }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ $favicon }}">
    <link rel="shortcut icon" href="{{ $favicon }}">

    <script>
    (function () {
        const saved = localStorage.getItem('theme')
        if (saved) {
            document.documentElement.classList.toggle('dark', saved === 'dark')
        } else if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.documentElement.classList.add('dark')
            localStorage.setItem('theme', 'dark')
        }
    })()
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.5.2/flowbite.min.js" defer></script>

</head>

<body class="h-full bg-gray-50 dark:bg-gray-900">

    {{-- ================= NAVBAR ================= --}}
    @include('dashboard.manajer.navbar')

    {{-- ================= SIDEBAR ================= --}}
    <aside id="sidebar"
        class="fixed top-0 left-0 z-20 flex flex-col flex-shrink-0 hidden w-64 h-full pt-16 font-normal duration-75 lg:flex transition-width"
        aria-label="Sidebar">

        <div class="relative flex flex-col flex-1 min-h-0 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
                <div class="flex-1 px-3 space-y-1 divide-y divide-gray-200 dark:divide-gray-700">

                    <ul class="pb-2 space-y-2">
                        {{-- ===== SIDEBAR MENU ===== --}}
                        <li>
                            <a href="{{ route('dashboard.manajer.dashboard') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg
                                    hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">

                                <!-- ICON -->
                                <svg class="w-6 h-6 text-gray-500 transition
                                            dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 6.025A7.5 7.5 0 1 0 17.975 14H10V6.025Z"/>
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.5 3c-.169 0-.334.014-.5.025V11h7.975
                                            c.011-.166.025-.331.025-.5
                                            A7.5 7.5 0 0 0 13.5 3Z"/>
                                </svg>
                                <span class="ml-3">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('manajer.product.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg
                                    hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">

                                <!-- ICON -->
                                <svg class="w-6 h-6 text-gray-500 transition
                                            dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4
                                            2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4
                                            2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312"/>
                                </svg>
                                <span class="ml-3">Produk</span>
                            </a>
                        </li>
                        <li>
                            <button type="button"
                                class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg
                                    group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                                aria-controls="dropdown-stock"
                                data-collapse-toggle="dropdown-stock">

                                <!-- ICON -->
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10V6a3 3 0 0 1 3-3v0a3 3 0 0 1 3 3v4m3-2 .917 11.923A1 1 0 0 1 17.92 21H6.08a1 1 0 0 1-.997-1.077L6 8h12Z"/>
                                </svg>
                                <span class="flex-1 ml-3 text-left whitespace-nowrap">
                                    Manajemen Stok
                                </span>

                                <svg class="w-3 h-3 transition-transform group-data-[collapse-open]:rotate-180"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="m1 1 4 4 4-4"/>
                                </svg>
                            </button>

                            <!-- DROPDOWN -->
                            <ul id="dropdown-stock" class="hidden py-2 space-y-2 pl-11">
                                <li>
                                    <a href="{{ route('manajer.stock.masuk') }}"
                                    class="flex items-center p-2 text-sm text-gray-900 rounded-lg
                                            hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                        Stock Masuk
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('manajer.stock.keluar') }}"
                                    class="flex items-center p-2 text-sm text-gray-900 rounded-lg
                                            hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                        Stock Keluar
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('manajer.stock.stockopname') }}"
                                    class="flex items-center p-2 text-sm text-gray-900 rounded-lg
                                            hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                        Stock Opname
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{ route('manajer.supplier.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg
                                    hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">

                                <!-- ICON -->
                                <svg class="w-6 h-6 text-gray-500 transition
                                            dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4
                                            a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2
                                            m4 0h2v-4m0 0h-5m3.5 5.5
                                            a2.5 2.5 0 1 1-5 0
                                            2.5 2.5 0 0 1 5 0Zm-10 0
                                            a2.5 2.5 0 1 1-5 0
                                            2.5 2.5 0 0 1 5 0Z"/>
                                </svg>
                                <span class="ml-3">Supplier</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('manajer.report.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg
                                    hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">

                                <!-- ICON -->
                                <svg class="w-6 h-6 text-gray-500 transition
                                            dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.03v13m0-13
                                            c-2.819-.831-4.715-1.076-8.029-1.023
                                            A.99.99 0 0 0 3 6v11
                                            c0 .563.466 1.014 1.03 1.007
                                            3.122-.043 5.018.212 7.97 1.023
                                            m0-13
                                            c2.819-.831 4.715-1.076 8.029-1.023
                                            A.99.99 0 0 1 21 6v11
                                            c0 .563-.466 1.014-1.03 1.007
                                            -3.122-.043-5.018.212-7.97 1.023"/>
                                </svg>
                                <span class="ml-3">Laporan</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>

    
    <div id="sidebarBackdrop"
         class="fixed inset-0 z-10 hidden bg-gray-900/50 dark:bg-gray-900/90">
    </div>
    
    <div class="pt-16 flex min-h-screen">

        {{--CONTENT WRAPPER--}}
        <div class="flex-1 lg:ml-64 flex flex-col">

            {{-- ============== MAIN CONTENT ============== --}}
            <main class="flex-1 px-4 sm:px-6 lg:px-8 py-6">
                @yield('content')
            </main>

            {{-- ================= FOOTER ================= --}}
            <footer class="p-4 my-6 mx-4 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 xl:p-8 dark:bg-gray-800">
                <ul class="flex flex-wrap items-center mb-6 space-y-1 md:mb-0">
                    <li><a href="#" class="mr-4 text-sm text-gray-500 hover:underline dark:text-gray-400">Terms</a></li>
                    <li><a href="#" class="mr-4 text-sm text-gray-500 hover:underline dark:text-gray-400">Privacy</a></li>
                    <li><a href="#" class="mr-4 text-sm text-gray-500 hover:underline dark:text-gray-400">Licensing</a></li>
                    <li><a href="#" class="text-sm text-gray-500 hover:underline dark:text-gray-400">Contact</a></li>
                </ul>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    &copy; 2025-{{ date('Y') }} {{ $setting->app_name ?? 'Stockify' }}. Manajemen Barang.
                </p>
            </footer>
        </div>
    </div>
<script>
const html        = document.documentElement
const themeToggle = document.getElementById('themeToggle')
const themeIcon   = document.getElementById('themeIcon')

function setTheme(theme) {
    if (theme === 'dark') {
        html.classList.add('dark')
        localStorage.setItem('theme', 'dark')

        if (themeIcon) {
            themeIcon.setAttribute('fill', 'none')
            themeIcon.innerHTML = `
                <path
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 5V3m0 18v-2M7.05 7.05 5.636 5.636
                       m12.728 12.728L16.95 16.95M5 12H3
                       m18 0h-2M7.05 16.95l-1.414 1.414
                       M18.364 5.636 16.95 7.05M16 12
                       a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"/>
            `
        }
    } else {
        html.classList.remove('dark')
        localStorage.setItem('theme', 'light')

        if (themeIcon) {
            themeIcon.setAttribute('fill', 'currentColor')
            themeIcon.innerHTML = `
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M13 3a1 1 0 1 0-2 0v2a1 1 0
                       1 0 2 0V3ZM6.343 4.929A1 1
                       0 0 0 4.93 6.343l1.414 1.414
                       a1 1 0 0 0 1.414-1.414L6.343
                       4.929Zm12.728 1.414a1 1
                       0 0 0-1.414-1.414l-1.414
                       1.414a1 1 0 0 0 1.414
                       1.414l1.414-1.414ZM12 7a5
                       5 0 1 0 0 10 5 5 0 0 0
                       0-10Zm-9 4a1 1 0 1 0
                       0 2h2a1 1 0 1 0 0-2H3
                       Zm16 0a1 1 0 1 0 0
                       2h2a1 1 0 1 0 0-2h-2
                       ZM7.757 17.657a1 1 0
                       1 0-1.414-1.414l-1.414
                       1.414a1 1 0 1 0 1.414
                       1.414l1.414-1.414Zm9.9
                       -1.414a1 1 0 0 0-1.414
                       1.414l1.414 1.414a1 1
                       0 0 0 1.414-1.414l-1.414
                       -1.414ZM13 19a1 1 0
                       1 0-2 0v2a1 1 0
                       1 0 2 0v-2Z"/>
            `
        }
    }
}

const savedTheme = localStorage.getItem('theme') || 'light'
setTheme(savedTheme)

themeToggle?.addEventListener('click', () => {
    const currentTheme = html.classList.contains('dark') ? 'dark' : 'light'
    setTheme(currentTheme === 'dark' ? 'light' : 'dark')
})
</script>

</body>
</html>
