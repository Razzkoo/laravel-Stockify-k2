@extends('dashboard.admin.layout')

@section('title', 'Dashboard Admin')

@section('content')

<!-- ================= HEADER ================= -->
<div class="mb-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">
                Dashboard Admin
            </h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Pantau stok, aktivitas, dan laporan sistem
            </p>
        </div>
        <div class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <span>{{ date('l, d M Y') }}</span>
        </div>
    </div>
</div>

<!-- ================= SUMMARY ================= -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="p-5 bg-white rounded-lg border shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <p class="text-sm text-gray-500 dark:text-gray-400">Total Produk</p>
        <h3 class="mt-2 text-3xl font-semibold text-gray-900 dark:text-white">
            {{ $totalProduk }}
        </h3>
    </div>
    <div class="p-5 bg-white rounded-lg border shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <p class="text-sm text-gray-500 dark:text-gray-400">Barang Masuk</p>
        <h3 class="mt-2 text-3xl font-semibold text-green-600">
            +{{ $barangMasukBulanIni }}
        </h3>
        <span class="text-xs text-gray-400">Bulan ini</span>
    </div>
    <div class="p-5 bg-white rounded-lg border shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <p class="text-sm text-gray-500 dark:text-gray-400">Barang Keluar</p>
        <h3 class="mt-2 text-3xl font-semibold text-red-600">
            -{{ $barangKeluarBulanIni }}
        </h3>
        <span class="text-xs text-gray-400">Bulan ini</span>
    </div>
    <div class="p-5 bg-white rounded-lg border shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <p class="text-sm text-gray-500 dark:text-gray-400">Stok Menipis</p>
        <h3 class="mt-2 text-3xl font-semibold text-orange-500">
            {{ $stokMenipis }}
        </h3>
        <span class="text-xs text-gray-400">Perlu perhatian</span>
    </div>

</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 bg-white rounded-lg border shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <div class="px-5 py-4 border-b dark:border-gray-700">
            <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                Grafik Stok Barang
            </h3>
        </div>
        <div class="m-4 h-64">
            <canvas id="stokChart" height="120"></canvas>
        </div>
    </div>

    <div class="bg-white rounded-lg border shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <div class="px-5 py-4 border-b dark:border-gray-700">
            <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                Aktivitas Terbaru
            </h3>
        </div>

        <div class="p-5 space-y-4 text-sm text-gray-700 dark:text-gray-300">

            @forelse ($aktivitasTerbaru as $aktivitas)
                <div class="flex gap-3">
                    <span class="mt-1 w-2 h-2 bg-indigo-500 rounded-full"></span>
                    <div>
                        <b>{{ $aktivitas->user->name ?? 'System' }}</b>
                        {{ $aktivitas->activity }}
                        <div class="text-xs text-gray-400">
                            {{ $aktivitas->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-sm text-gray-400">
                    Belum ada aktivitas
                </p>
            @endforelse

        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('stokChart').getContext('2d');

    const labels = @json($labels);
    const dataMasuk = @json($dataMasuk);
    const dataKeluar = @json($dataKeluar);

    const gradientMasuk = ctx.createLinearGradient(0, 0, 0, 300);
    gradientMasuk.addColorStop(0, 'rgba(34,197,94,0.4)');
    gradientMasuk.addColorStop(1, 'rgba(34,197,94,0)');

    const gradientKeluar = ctx.createLinearGradient(0, 0, 0, 300);
    gradientKeluar.addColorStop(0, 'rgba(239,68,68,0.4)');
    gradientKeluar.addColorStop(1, 'rgba(239,68,68,0)');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Barang Masuk',
                    data: dataMasuk,
                    borderColor: 'rgb(34,197,94)',
                    backgroundColor: gradientMasuk,
                    fill: true,
                    tension: 0.45,
                    borderWidth: 3,
                    pointRadius: 4,
                },
                {
                    label: 'Barang Keluar',
                    data: dataKeluar,
                    borderColor: 'rgb(239,68,68)',
                    backgroundColor: gradientKeluar,
                    fill: true,
                    tension: 0.45,
                    borderWidth: 3,
                    pointRadius: 4,
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                mode: 'index',
                intersect: false,
            },
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                        padding: 20,
                    }
                },
                tooltip: {
                    backgroundColor: '#111827',
                    titleColor: '#fff',
                    bodyColor: '#e5e7eb',
                    padding: 12,
                    cornerRadius: 8,
                }
            },
            scales: {
                x: { grid: { display: false } },
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 5 }
                }
            },
            animation: {
                duration: 1200,
                easing: 'easeOutQuart',
            }
        }
    });
</script>
<script src="https://unpkg.com/flowbite@latest/dist/flowbite.min.js"></script>

@endsection
