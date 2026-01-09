<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Stockify | Sistem Manajemen Stok</title>
    @vite(['resources/css/app.css'])
</head>

<body class="text-gray-800">

<!-- NAVBAR (TRANSPARAN + VIDEO BACKGROUND) -->
<nav class="fixed top-0 w-full z-50 bg-white/10 backdrop-blur-md">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center text-white">
        <h1 class="text-2xl font-bold">
            Stockify
        </h1>

        <a href="/auth/login"
           class="px-4 py-2 text-sm font-medium bg-indigo-400 rounded-lg hover:bg-indigo-300">
            Login
        </a>
    </div>
</nav>

<!-- HERO + FITUR BACKGROUND -->
<section class="relative">
    <!-- VIDEO BACKGROUND -->
    <video
        class="absolute inset-0 w-full h-full object-cover"
        autoplay
        muted
        loop
        playsinline>
        <source src="/video/bg-welcome-pink.mp4" type="video/mp4">
    </video>

    <!-- OVERLAY -->
    <div class="absolute inset-0 bg-black/50"></div>

    <!-- HERO -->
    <div class="relative min-h-screen flex items-center pt-20">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-10 items-center text-white">
            <div>
                <h2 class="text-4xl font-bold leading-tight mb-4">
                    Kelola Stok Barang <br>
                    Lebih Rapi & Terpantau
                </h2>

                <p class="text-gray-200 mb-6">
                    Stockify membantu Anda mengelola produk, kategori, transaksi masuk & keluar,
                    serta memantau stok secara real-time dalam satu dashboard terpadu.
                </p>

                <div class="flex gap-4">
                    <a href="/auth/register"
                       class="px-6 py-3 bg-indigo-400 rounded-lg font-medium hover:bg-indigo-300">
                        Daftar
                    </a>

                    <a href="#fitur"
                       class="px-6 py-3 bg-white/20 backdrop-blur rounded-lg font-medium hover:bg-white/30">
                        Lihat Fitur
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- FITUR -->
    <section id="fitur" class="relative py-20">
        <div class="max-w-7xl mx-auto px-6">
            <h3 class="text-3xl font-bold text-center mb-12 text-white">
                Fitur Utama
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- CARD -->
                <div class="p-6 rounded-xl border border-white/20 bg-white/20 backdrop-blur-lg hover:bg-white/30 transition">
                    <h4 class="font-semibold mb-2 text-white">Manajemen Produk</h4>
                    <p class="text-sm text-gray-200">
                        Tambah, edit, dan kelola data produk dengan kategori & atribut.
                    </p>
                </div>

                <div class="p-6 rounded-xl border border-white/20 bg-white/20 backdrop-blur-lg hover:bg-white/30 transition">
                    <h4 class="font-semibold mb-2 text-white">Transaksi Barang</h4>
                    <p class="text-sm text-gray-200">
                        Catat transaksi masuk dan keluar secara terstruktur.
                    </p>
                </div>

                <div class="p-6 rounded-xl border border-white/20 bg-white/20 backdrop-blur-lg hover:bg-white/30 transition">
                    <h4 class="font-semibold mb-2 text-white">Monitoring Stok</h4>
                    <p class="text-sm text-gray-200">
                        Pantau stok menipis agar tidak kehabisan barang.
                    </p>
                </div>

                <div class="p-6 rounded-xl border border-white/20 bg-white/20 backdrop-blur-lg hover:bg-white/30 transition">
                    <h4 class="font-semibold mb-2 text-white">Dashboard Ringkas</h4>
                    <p class="text-sm text-gray-200">
                        Statistik dan aktivitas terbaru dalam satu tampilan.
                    </p>
                </div>
            </div>
        </div>
    </section>
</section>

<!-- FOOTER (LEBIH PENDEK) -->
<footer class="relative bg-white/20 backdrop-blur border-t border-white/20 py-3">
    <div class="max-w-7xl mx-auto px-6 text-center text-xs text-gray-500">
        © {{ date('Y') }} Stockify — Sistem Manajemen Stok Barang
    </div>
</footer>

</body>
</html>
