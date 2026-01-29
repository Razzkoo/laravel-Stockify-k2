<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <title>Sistem Manajemen Stok</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @php
        $setting = \App\Models\Setting::first();
        $favicon = $setting && $setting->app_logo
            ? asset('storage/' . $setting->app_logo)
            : asset('images/logo.png');
    @endphp

    <link rel="icon" href="{{ $favicon }}">
    @vite(['resources/css/app.css'])
</head>

<body class="theme-bg theme-text overflow-x-hidden transition-colors duration-300">

<div class="fixed inset-0 -z-20 theme-bg"></div>
<div class="fixed inset-0 -z-10 hero-glow pointer-events-none"></div>

<!-- ================= NAVBAR ================= -->
<nav id="navbar" class="fixed top-0 w-full z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">

        <a href="/" class="flex items-center gap-3">
            <img src="{{ $setting && $setting->app_logo ? asset('storage/'.$setting->app_logo) : asset('images/logo.png') }}"
                 class="h-8" alt="Logo" />
            <span class="text-xl font-semibold">
                {{ $setting->app_name ?? 'Stockify' }}
            </span>
        </a>

        <div class="flex items-center gap-4 text-sm">

            <!-- THEME TOGGLE -->
            <button onclick="toggleTheme()" class="theme-toggle" aria-label="Toggle theme">

                <!--ICON-->
                <svg id="iconMoon"
                     class="w-5 h-5"
                     xmlns="http://www.w3.org/2000/svg"
                     fill="currentColor"
                     viewBox="0 0 20 20">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707
                             a8.001 8.001 0 1010.586 10.586z"/>
                </svg>

                <svg id="iconSun"
                     class="w-5 h-5 hidden"
                     xmlns="http://www.w3.org/2000/svg"
                     fill="currentColor"
                     viewBox="0 0 20 20">
                     <path d="M13 3a1 1 0 1 0-2 0v2a1 1 0 1 0 2 0V3ZM6.343 
                     4.929A1 1 0 0 0 4.93 6.343l1.414 
                     1.414a1 1 0 0 0 1.414-1.414L6.343 
                     4.929Zm12.728 1.414a1 
                     1 0 0 0-1.414-1.414l-1.414 1.414a1 
                     1 0 0 0 1.414 1.414l1.414-1.414ZM12 
                     7a5 5 0 1 0 0 10 5 5 0 0 0 0-10Zm-9 4a1 
                     1 0 1 0 0 2h2a1 1 0 1 0 0-2H3Zm16 0a1 
                     1 0 1 0 0 2h2a1 1 0 1 0 0-2h-2ZM7.757 
                     17.657a1 1 0 1 0-1.414-1.414l-1.414 1.414a1 
                     1 0 1 0 1.414 1.414l1.414-1.414Zm9.9-1.414a1 
                     1 0 0 0-1.414 1.414l1.414 1.414a1 
                     1 0 0 0 1.414-1.414l-1.414-1.414ZM13 
                     19a1 1 0 1 0-2 0v2a1 1 0 1 0 2 0v-2Z"
                 </svg>

            </button>
            <a href="{{ route('auth.login') }}" class="btn-primary">
                Login
            </a>
        </div>
    </div>
</nav>
<!-- ================= HERO ================= -->
<section class="relative z-10 min-h-screen flex items-center pt-24">
    <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-14 items-center">

        <div class="space-y-7 animate-on-scroll order-2 lg:order-1">

            <span class="badge">
                Sistem Inventori Terintegrasi
            </span>

            <h1 class="text-5xl md:text-6xl font-extrabold leading-tight">
                {{ $setting->app_name ?? 'Stockify' }}<br>
                <span class="gradient-text">
                    Manajemen Stok Mudah dan Efisien
                </span>
            </h1>

            <p class="opacity-80 text-lg leading-relaxed">
                Platform manajemen stok modern agar
                <strong class="opacity-100">lebih rapi, akurat, dan efisien.</strong>
            </p>

            <div class="flex gap-4 pt-3">
                <a href="{{ route('auth.register') }}" class="btn-primary">
                    Mulai Sekarang
                </a>
                <a href="#fitur" class="btn-outline">
                    Lihat Fitur
                </a>
            </div>

            <div class="grid grid-cols-3 gap-6 pt-8">
                <div class="stat-card">Real-time<br><span>Update</span></div>
                <div class="stat-card">100%<br><span>Terkontrol</span></div>
                <div class="stat-card">Fast<br><span>Sistem</span></div>
            </div>
        </div>
        <div class="relative animate-on-scroll hidden lg:flex justify-center order-1 lg:order-2">
            <div class="absolute inset-0 bg-indigo-500/20 blur-3xl rounded-full"></div>
            <img 
                src="{{ asset('images/welcome.png') }}" 
                alt="Ilustrasi Stockify"
                class="relative w-full max-w-lg drop-shadow-2xl">
        </div>
    </div>
</section>

<!-- ================= FITUR ================= -->
<section id="fitur" class="relative py-28 z-10">
    <div class="max-w-7xl mx-auto px-6">

        <h2 class="text-3xl font-bold text-center mb-16 animate-on-scroll">
            Fitur Unggulan {{ $setting->app_name ?? 'Stockify' }}
        </h2>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach([
                ['Manajemen Produk','Kelola produk dan kategori.'],
                ['Transaksi Barang','Barang masuk dan keluar.'],
                ['Monitoring Stok','Pantau stok real-time.'],
                ['Laporan Statistik','Analisis cepat dan akurat.'],
            ] as $fitur)
                <div class="feature-card animate-on-scroll">
                    <h3 class="font-semibold mb-2">{{ $fitur[0] }}</h3>
                    <p class="text-sm opacity-75">{{ $fitur[1] }}</p>
                </div>
            @endforeach
        </div>

    </div>
</section>

<footer class="border-t border-black/10 py-5 text-center text-xs opacity-70">
    ©2025-{{ date('Y') }} {{ $setting->app_name ?? 'Stockify' }}. Manajemen stok barang.
</footer>

<!-- ================= SCRIPT ================= -->
<script>
const html = document.documentElement
const navbar = document.getElementById('navbar')
const iconMoon = document.getElementById('iconMoon')
const iconSun = document.getElementById('iconSun')

function updateThemeIcon(theme) {
    iconMoon.classList.toggle('hidden', theme !== 'dark')
    iconSun.classList.toggle('hidden', theme === 'dark')
}

function toggleTheme() {
    const theme = html.dataset.theme === 'dark' ? 'light' : 'dark'
    html.dataset.theme = theme
    localStorage.setItem('theme', theme)
    updateThemeIcon(theme)
}

const savedTheme = localStorage.getItem('theme') || 'dark'
html.dataset.theme = savedTheme
updateThemeIcon(savedTheme)

window.addEventListener('scroll', () => {
    navbar.classList.toggle('nav-blur', window.scrollY > 40)
})

const observer = new IntersectionObserver(entries => {
    entries.forEach(e => e.isIntersecting && e.target.classList.add('show'))
})
document.querySelectorAll('.animate-on-scroll')
    .forEach(el => observer.observe(el))
</script>

</body>
</html>

<style>
html[data-theme="dark"] {
    --bg: linear-gradient(135deg,#000,#111,#000);
    --text: #fff;
    --card: rgba(255,255,255,.05);
    --border: rgba(255,255,255,.1);
}
html[data-theme="light"] {
    --bg: linear-gradient(135deg,#fff,#eef2ff,#fff);
    --text: #111;
    --card: #fff;
    --border: rgba(0,0,0,.08);
}

.theme-bg { background: var(--bg); }
.theme-text { color: var(--text); }

.hero-glow::before {
    content:'';
    position:absolute;
    inset:0;
    background:
      radial-gradient(circle at 20% 30%, rgba(99,102,241,.25), transparent 40%),
      radial-gradient(circle at 80% 60%, rgba(139,92,246,.15), transparent 45%);
}

.nav-blur {
    backdrop-filter: blur(12px);
    background: rgba(0,0,0,.55);
}

.badge {
    padding:.3rem 1rem;
    border-radius:999px;
    font-size:.8rem;
    background: rgba(99,102,241,.1);
    color:#818cf8;
    border:1px solid rgba(99,102,241,.3);
}

.feature-card,
.stat-card {
    background: var(--card);
    border:1px solid var(--border);
    border-radius:.8rem;
    padding:1.4rem;
    transition:.3s;
}
.feature-card:hover {
    transform: translateY(-6px);
    border-color:#6366f1;
}

.btn-primary {
    background: linear-gradient(to right,#6366f1,#8b5cf6);
    padding:.7rem 1.6rem;
    border-radius:.6rem;
}
.btn-outline {
    border:1px solid var(--border);
    padding:.7rem 1.6rem;
    border-radius:.6rem;
}

.theme-toggle {
    width:38px;
    height:38px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:.6rem;
    border:1px solid var(--border);
    transition:.25s;
}
.theme-toggle:hover {
    background: rgba(99,102,241,.12);
    color:#6366f1;
}

.animate-on-scroll {
    opacity:0;
    transform:translateY(30px);
    transition:.8s;
}
.animate-on-scroll.show {
    opacity:1;
    transform:none;
}
</style>