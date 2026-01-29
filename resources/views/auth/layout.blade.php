<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>

    @php
        $setting = \App\Models\Setting::first();
        $favicon = $setting && $setting->app_logo
            ? asset('storage/' . $setting->app_logo)
            : asset('images/logo.png');
    @endphp
    <link rel="icon" href="{{ $favicon }}">

    <script>
        (function () {
            const theme = localStorage.getItem('theme') || 'dark';
            document.documentElement.dataset.theme = theme;
        })();
    </script>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="theme-bg theme-text min-h-screen overflow-hidden">

<div class="fixed inset-0 -z-20 theme-bg"></div>
<div class="fixed inset-0 -z-10 hero-glow pointer-events-none"></div>

<div class="relative z-10 min-h-screen flex items-center justify-center px-4">

    <div class="w-full max-w-md auth-card animate-on-scroll">
        @yield('content')
    </div>

</div>
</body>
</html>


<style>
html[data-theme="dark"] {
    --bg: linear-gradient(135deg,#000,#111,#000);
    --text: #ffffff;
    --card: rgba(255,255,255,.06);
    --border: rgba(255,255,255,.12);
    --glow-1: rgba(99,102,241,.28);
    --glow-2: rgba(139,92,246,.18);
}

html[data-theme="light"] {
    --bg: linear-gradient(135deg,#f8fafc,#eef2ff,#f8fafc);
    --text: #111111;
    --card: rgba(255,255,255,.95);
    --border: rgba(0,0,0,.08);
    --glow-1: rgba(99,102,241,.22);
    --glow-2: rgba(139,92,246,.14);
}

.theme-bg { background: var(--bg); }
.theme-text { color: var(--text); }

.hero-glow::before {
    content:'';
    position:absolute;
    inset:0;
    background:
      radial-gradient(circle at 18% 28%, var(--glow-1), transparent 45%),
      radial-gradient(circle at 82% 60%, var(--glow-2), transparent 48%);
}


.auth-text { color: var(--text); }

.auth-muted {
    color: color-mix(in srgb, var(--text) 65%, transparent);
}

.auth-input {
    background-color: var(--card) !important;
    border: 1px solid var(--border);
    color: var(--text) !important;
    caret-color: var(--text);
}

.auth-input::placeholder {
    color: color-mix(in srgb, var(--text) 45%, transparent);
}

.auth-input:focus {
    outline: none;
    border-color: #6366f1;
    box-shadow: 0 0 0 2px rgba(99,102,241,.25);
}

.auth-card {
    background: var(--card);
    border: 1px solid var(--border);
    backdrop-filter: blur(18px);
    border-radius: 1.2rem;
    padding: 2rem;
    box-shadow: 0 40px 90px rgba(0,0,0,.6);
}

input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus,
textarea:-webkit-autofill {
    -webkit-text-fill-color: var(--text) !important;
    caret-color: var(--text);
    transition: background-color 9999s ease-in-out 0s;
    box-shadow: 0 0 0 1000px var(--card) inset !important;
    border: 1px solid var(--border);
}

input,
textarea,
select {
    background-color: transparent;
    color: var(--text);
}

.animate-on-scroll {
    opacity: 0;
    transform: translateY(25px);
    animation: fadeUp .8s ease forwards;
}
@keyframes fadeUp {
    to {
        opacity: 1;
        transform: none;
    }
}
</style>
