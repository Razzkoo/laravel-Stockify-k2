@extends('auth.layout')

@section('content')

<div class="space-y-6">

    <div class="text-center">
        <h1 class="text-2xl font-bold tracking-wide auth-text">
            Daftar Akun
        </h1>
        <p class="mt-1 text-sm auth-muted">
            Lengkapi data untuk membuat akun baru
        </p>
    </div>

    <!-- ALERT-->
    @if ($errors->any())
        <div
            class="flex gap-3 p-4 rounded-xl
                   bg-red-500/15 border border-red-500/30
                   text-red-600 dark:text-red-300 text-sm animate-shake">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-5 h-5 mt-0.5 flex-shrink-0"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 9v2m0 4h.01M5.07 19h13.86c1.54 0 2.5-1.67 1.73-3L13.73 4c-.77-1.33-2.69-1.33-3.46 0L3.34 16c-.77 1.33.19 3 1.73 3z"/>
            </svg>
            <ul class="space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('auth.register.post') }}" method="POST" class="space-y-5">
        @csrf
        <div>
            <label class="block mb-2 text-sm font-medium auth-muted">
                Nama Lengkap
            </label>
            <input type="text" name="name" value="{{ old('name') }}" required
                class="w-full p-3 rounded-xl auth-input"
                placeholder="Nama lengkap">
        </div>
        <div>
            <label class="block mb-2 text-sm font-medium auth-muted">
                Email
            </label>
            <input type="email" name="email" value="{{ old('email') }}" required
                class="w-full p-3 rounded-xl auth-input"
                placeholder="name@email.com">
        </div>
        <div>
            <label class="block mb-2 text-sm font-medium auth-muted">
                Password
            </label>
            <div class="relative">
                <input id="password" type="password" name="password" required
                    class="w-full p-3 pr-12 rounded-xl auth-input"
                    placeholder="•••">

                <button type="button"
                    onclick="togglePassword('password','eyeOpen1','eyeClosed1')"
                    class="absolute inset-y-0 right-7 flex items-center">
                    <!--ICON-->
                    <svg id="eyeOpen1"
                        class="w-5 h-5 absolute transition-all duration-200 ease-out
                            opacity-100 scale-100"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5
                                c4.478 0 8.268 2.943 9.542 7
                                -1.274 4.057-5.064 7-9.542 7
                                -4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    <svg id="eyeClosed1"
                        class="w-5 h-5 absolute transition-all duration-200 ease-out
                            opacity-0 scale-90 pointer-events-none"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3l18 18"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.58 10.58a3 3 0 004.24 4.24"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5
                                c2.207 0 4.244.717 5.95 1.93"/>
                    </svg>
                </button>
            </div>
        </div>

        <div>
            <label class="block mb-2 text-sm font-medium auth-muted">
                Konfirmasi Password
            </label>

            <div class="relative">
                <input id="password_confirmation" type="password"
                    name="password_confirmation" required
                    class="w-full p-3 pr-12 rounded-xl auth-input"
                    placeholder="•••">
               <button type="button"
                    onclick="togglePassword('password_confirmation','eyeOpen2','eyeClosed2')"
                    class="absolute inset-y-0 right-7 flex items-center">
                    <svg id="eyeOpen2"
                        class="w-5 h-5 absolute transition-all duration-200 ease-out
                            opacity-100 scale-100"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5
                                c4.478 0 8.268 2.943 9.542 7
                                -1.274 4.057-5.064 7-9.542 7
                                -4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    <!--ICON-->
                    <svg id="eyeClosed2"
                        class="w-5 h-5 absolute transition-all duration-200 ease-out
                            opacity-0 scale-90 pointer-events-none"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3l18 18"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.58 10.58a3 3 0 004.24 4.24"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5
                                c2.207 0 4.244.717 5.95 1.93"/>
                    </svg>
                </button>
            </div>
        </div>

        <button type="submit"
            class="w-full py-3 rounded-xl font-semibold text-white
                   bg-indigo-600 hover:bg-indigo-700
                   transition shadow-lg shadow-indigo-500/30">
            Daftar
        </button>

        <p class="text-sm text-center auth-muted">
            Sudah punya akun?
            <a href="{{ route('auth.login') }}"
               class="text-indigo-500 hover:text-indigo-600 font-medium">
                Login
            </a>
        </p>
    </form>
</div>
<script>
function togglePassword(inputId, openId, closeId) {
    const input = document.getElementById(inputId)
    const open = document.getElementById(openId)
    const close = document.getElementById(closeId)

    if (input.type === 'password') {
        input.type = 'text'

        open.classList.replace('opacity-100', 'opacity-0')
        open.classList.replace('scale-100', 'scale-90')

        close.classList.replace('opacity-0', 'opacity-100')
        close.classList.replace('scale-90', 'scale-100')
    } else {
        input.type = 'password'

        close.classList.replace('opacity-100', 'opacity-0')
        close.classList.replace('scale-100', 'scale-90')

        open.classList.replace('opacity-0', 'opacity-100')
        open.classList.replace('scale-90', 'scale-100')
    }
}
</script>

@endsection
