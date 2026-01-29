<nav class="fixed z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5">
        <div class="flex items-center justify-between">

            {{-- ================= LEFT : TOGGLE + LOGO ================= --}}
            <div class="flex items-center gap-3 min-w-0">

                <button id="toggleSidebarMobile"
                    class="p-2 text-gray-600 rounded lg:hidden
                           hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                              d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z
                                 M3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1z
                                 M3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                              clip-rule="evenodd"/>
                    </svg>
                </button>

                @php
                    $setting = \App\Models\Setting::first();
                @endphp

                <!-- Logo -->
                <a href="#" class="flex items-center gap-2 truncate">
                    <img src="{{ $setting && $setting->app_logo ? asset('storage/'.$setting->app_logo) : asset('images/logo.png') }}"
                         class="h-8" alt="Logo">
                    <span class="text-xl font-semibold truncate dark:text-white">
                        {{ $setting->app_name ?? 'Stockify' }}
                    </span>
                </a>
            </div>
            {{-- ================= RIGHT : PROFILE ================= --}}
            <div class="flex items-center gap-3">
                @php
                    use App\Models\UserRequest;
                    $pendingRequests = UserRequest::where('status', 'pending')
                        ->latest()
                        ->take(5)
                        ->get();

                    $pendingCount = UserRequest::where('status', 'pending')->count();
                @endphp
                <button
                    data-dropdown-toggle="notification-dropdown"
                    class="relative p-2 rounded-lg
                        text-gray-600 hover:bg-gray-100
                        dark:text-gray-300 dark:hover:bg-gray-700
                        transition">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 13h3.439a.991.991 0 0 1 .908.6
                            3.978 3.978 0 0 0 7.306 0
                            .99.99 0 0 1 .908-.6H20
                            M4 13v6a1 1 0 0 0 1 1h14
                            a1 1 0 0 0 1-1v-6
                            M4 13l2-9h12l2 9"/>
                    </svg>
                    @if($pendingCount > 0)
                        <span class="absolute -top-1 -right-1
                                    text-[10px] font-bold
                                    text-white bg-red-600
                                    rounded-full px-1.5">
                            {{ $pendingCount }}
                        </span>
                    @endif
                </button>
                <!-- Dropdown -->
                <div id="notification-dropdown"
                    class="hidden z-50 w-80 bg-white rounded-lg shadow
                            dark:bg-gray-700">
                    <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-600">
                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                            Notifikasi
                        </h3>
                        <p class="text-xs text-gray-500 dark:text-gray-300">
                            Permintaan pengguna masuk
                        </p>
                    </div>
                    <ul class="max-h-72 overflow-y-auto divide-y dark:divide-gray-600">
                        @forelse ($pendingRequests as $req)
                            <li>
                                <a href="{{ route('admin.userlogin.index') }}"
                                class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600">

                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-900 dark:text-white">
                                            {{ $req->name }}
                                        </p>
                                        <p class="text-xs text-gray-500 dark:text-gray-300">
                                            {{ $req->email }}
                                        </p>
                                    </div>
                                    <span class="text-xs text-orange-600 dark:text-orange-400 font-semibold">
                                        Pending
                                    </span>
                                </a>
                            </li>
                        @empty
                            <li class="px-4 py-6 text-center text-sm text-gray-500 dark:text-gray-300">
                                Tidak ada permintaan baru
                            </li>
                        @endforelse
                    </ul>
                    @if($pendingCount > 0)
                    <div class="px-4 py-3 border-t border-gray-200 dark:border-gray-600 text-center">
                        <a href="{{ route('admin.userlogin.index') }}"
                        class="text-sm font-medium text-indigo-600 hover:underline">
                            Lihat semua permintaan
                        </a>
                    </div>
                    @endif
                </div>
                <button id="themeToggle"
                    class="p-2 rounded-lg
                        text-gray-600 hover:bg-gray-100
                        dark:text-gray-300 dark:hover:bg-gray-700
                        transition">

                    <svg id="themeIcon"
                        class="w-6 h-6"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                    </svg>
                </button>
                <span class="hidden sm:block text-sm font-medium dark:text-white">
                    {{ Auth::user()->name ?? '-' }}
                </span>

                <!-- Avatar -->
                <button type="button"
                    class="rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    data-dropdown-toggle="dropdown-2">
                    <div class="w-10 h-10 rounded-full overflow-hidden
                        flex items-center justify-center
                        bg-gray-200 dark:bg-gray-600
                        ring-2 ring-transparent hover:ring-indigo-500 transition">
                        <img
                            src="{{ Auth::user()->profile_photo
                                ? asset('storage/' . Auth::user()->profile_photo)
                                : asset('images/default avatar.jpg') }}"
                            class="w-full h-full object-cover rounded-full"
                            alt="Avatar">
                    </div>
                </button>
                <!-- Dropdown -->
                <div id="dropdown-2"
                     class="hidden z-50 my-4 text-base list-none bg-white
                            divide-y divide-gray-100 rounded shadow
                            dark:bg-gray-700 dark:divide-gray-600">

                    <div class="px-4 py-3">
                        <p class="text-sm text-gray-900 dark:text-white">
                            {{ Auth::user()->name }}
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-300">
                            {{ Auth::user()->email }}
                        </p>
                    </div>

                    <ul class="py-1">
                        <li>
                          <a href="{{ route('dashboard.admin.dashboard') }}"
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
                        </li>
                        <li>
                          <a href="{{ route('admin.profile.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg
                            hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">

                            <!-- ICON -->
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                              <path stroke="currentColor" stroke-width="2" d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                            </svg>
                              <span class="ml-3">Profil</span>
                          </a>
                        </li>
                        <li>
                              <form method="POST" action="{{ route('logout') }}">
                                  @csrf
                                  <button
                                      type="submit"
                                      class="w-full flex items-center p-2 text-gray-900 rounded-lg
                                            hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">

                                      <!-- ICON -->
                                      <svg class="w-6 h-6 text-gray-800 dark:text-white"
                                          aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                          width="24" height="24" fill="none" viewBox="0 0 24 24">
                                          <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2
                                                  a3 3 0 0 1 3 3v10
                                                  a3 3 0 0 1-3 3h-2"/>
                                      </svg>
                                  <span class="ml-3">Log Out</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</nav>

