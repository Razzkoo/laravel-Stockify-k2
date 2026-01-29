@extends('dashboard.staff.layout')

@section('title', 'Dashboard Staff')

@section('content')

<div class="space-y-8">

    <div class="p-6 rounded-lg border border-gray-200 dark:border-gray-700">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-lg font-semibold text-slate-800 dark:text-slate-100">
                    Dashboard Staff Gudang
                </h1>
                <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                    Daftar tugas operasional yang perlu diselesaikan hari ini
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

    <!-- SUMMARY -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="p-5 rounded-lg border border-gray-200 dark:border-gray-700">
            <p class="text-sm text-slate-500 dark:text-slate-400">
                Barang Masuk
            </p>
            <p class="mt-2 text-3xl font-semibold text-amber-600 dark:text-amber-400">
                {{ $barangMasukPending }}
            </p>
            <p class="mt-1 text-xs text-slate-400">
                Perlu dicek
            </p>
        </div>
        <div class="p-5 rounded-lg border border-gray-200 dark:border-gray-700">
            <p class="text-sm text-slate-500 dark:text-slate-400">
                Barang Keluar
            </p>
            <p class="mt-2 text-3xl font-semibold text-sky-600 dark:text-sky-400">
                {{ $barangKeluarPending }}
            </p>
            <p class="mt-1 text-xs text-slate-400">
                Perlu disiapkan
            </p>
        </div>
        <div class="p-5 rounded-lg border border-gray-200 dark:border-gray-700">
            <p class="text-sm text-slate-500 dark:text-slate-400">
                Tugas Selesai
            </p>
            <p class="mt-2 text-3xl font-semibold text-emerald-600 dark:text-emerald-400">
                {{ $tugasSelesaiHariIni }}
            </p>
            <p class="mt-1 text-xs text-slate-400">
                Hari ini
            </p>
        </div>

    </div>

    <div class="rounded-lg border border-gray-200 dark:border-gray-700">

        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
            <h2 class="text-sm font-semibold text-slate-700 dark:text-slate-200">
                Daftar Tugas Hari Ini
            </h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-xs uppercase tracking-wide
                               text-slate-600 dark:text-slate-300
                               bg-gray-100 dark:bg-gray-800">
                    <tr>
                        <th class="px-6 py-3">Jenis</th>
                        <th class="px-6 py-3">Nama Barang</th>
                        <th class="px-6 py-3 text-center">Jumlah</th>
                        <th class="px-6 py-3 text-center">Status</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                @forelse ($daftarTugas as $tugas)
                <tr class="border-t dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800">

                    <td class="px-6 py-4 text-slate-600 dark:text-slate-300">
                        {{ $tugas->type === 'masuk' ? 'Barang Masuk' : 'Barang Keluar' }}
                    </td>
                    <td class="px-6 py-4 font-medium text-slate-800 dark:text-slate-100">
                        {{ $tugas->product->name }}
                    </td>
                    <td class="px-6 py-4 text-center text-slate-700 dark:text-slate-200">
                        {{ $tugas->quantity }}
                    </td>
                    <td class="px-6 py-4 text-center text-xs font-medium
                        {{ $tugas->type === 'masuk'
                            ? 'text-amber-600 dark:text-amber-400'
                            : 'text-sky-600 dark:text-sky-400'
                        }}">
                        {{ $tugas->type === 'masuk' ? 'Perlu dicek' : 'Perlu disiapkan' }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        <a href="{{ route('staff.stock.stockopname', $tugas->id) }}"
                        class="text-xs font-medium text-indigo-600 dark:text-indigo-400 hover:underline">
                            Proses
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-6 text-center text-sm text-slate-400">
                        Tidak ada tugas hari ini
                    </td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
