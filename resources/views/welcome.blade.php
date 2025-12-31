<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Stockify | Sistem Manajemen Stok</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-gray-50 text-gray-800">

<!-- NAVBAR -->
<nav class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-black-700">
            Stockify
        </h1>

        <a href="/auth/login"
           class="px-4 py-2 text-sm font-medium text-white bg-indigo-400 rounded-lg hover:bg-indigo-300">
            Login
        </a>
    </div>
</nav>

<!-- HERO -->
<section class="max-w-7xl mx-auto px-6 py-20 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
    <div>
        <h2 class="text-4xl font-bold leading-tight mb-4">
            Kelola Stok Barang <br>
            Lebih Rapi & Terpantau
        </h2>

        <p class="text-gray-600 mb-6">
            Stockify membantu Anda mengelola produk, kategori, transaksi masuk & keluar,
            serta memantau stok secara real-time dalam satu dashboard terpadu.
        </p>

        <div class="flex gap-4">
            <a href="/auth/register"
               class="px-6 py-3 bg-indigo-400 text-white rounded-lg font-medium hover:bg-indigo-300">
                Masuk Daftar
            </a>

            <a href="#fitur"
               class="px-6 py-3 bg-gray-100 rounded-lg font-medium hover:bg-gray-200">
                Lihat Fitur
            </a>
        </div>
    </div>

   <!-- VALUE SHOWCASE -->
<div class="hidden md:block">
    <div class="bg-white p-8 rounded-2xl shadow-lg border space-y-6">

        <div>
            <h3 class="text-xl font-bold mb-1">
                Satu Sistem, Banyak Manfaat
            </h3>
            <p class="text-sm text-gray-600">
                Dirancang untuk efisiensi pengelolaan stok harian
            </p>
        </div>

        <div class="space-y-4 text-sm">
            <div class="flex items-start gap-3">
                <div class="w-2.5 h-2.5 mt-1 rounded-full bg-blue-400"></div>
                <p>
                    Catat barang masuk & keluar secara rapi dan terstruktur
                </p>
            </div>

            <div class="flex items-start gap-3">
                <div class="w-2.5 h-2.5 mt-1 rounded-full bg-blue-400"></div>
                <p>
                    Pantau stok menipis tanpa perlu hitung manual
                </p>
            </div>

            <div class="flex items-start gap-3">
                <div class="w-2.5 h-2.5 mt-1 rounded-full bg-blue-400"></div>
                <p>
                    Data tersimpan aman dan mudah diakses kapan saja
                </p>
            </div>
        </div>

        <div class="pt-4 border-t text-xs text-gray-500">
            Digunakan untuk pengelolaan stok skala kecil hingga menengah
        </div>
    </div>
</div>
</section>

<!-- FITUR -->
<section id="fitur" class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-6">
        <h3 class="text-3xl font-bold text-center mb-12">
            Fitur Utama
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="p-6 border rounded-lg hover:shadow">
                <h4 class="font-semibold mb-2">Manajemen Produk</h4>
                <p class="text-sm text-gray-600">
                    Tambah, edit, dan kelola data produk dengan kategori & atribut.
                </p>
            </div>

            <div class="p-6 border rounded-lg hover:shadow">
                <h4 class="font-semibold mb-2">Transaksi Barang</h4>
                <p class="text-sm text-gray-600">
                    Catat transaksi masuk dan keluar secara terstruktur.
                </p>
            </div>

            <div class="p-6 border rounded-lg hover:shadow">
                <h4 class="font-semibold mb-2">Monitoring Stok</h4>
                <p class="text-sm text-gray-600">
                    Pantau stok menipis agar tidak kehabisan barang.
                </p>
            </div>

            <div class="p-6 border rounded-lg hover:shadow">
                <h4 class="font-semibold mb-2">Dashboard Ringkas</h4>
                <p class="text-sm text-gray-600">
                    Statistik dan aktivitas terbaru dalam satu tampilan.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="bg-gray-100 py-6">
    <div class="max-w-7xl mx-auto px-6 text-center text-sm text-gray-500">
        © {{ date('Y') }} Stockify — Sistem Manajemen Stok Barang
    </div>
</footer>

</body>
</html>