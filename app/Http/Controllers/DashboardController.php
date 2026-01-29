<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockTransaction;
use App\Models\Activity;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function admin()
    {
        $totalProduk = Product::count();

        $bulanIni = Carbon::now()->startOfMonth();

        $barangMasukBulanIni = StockTransaction::masuk()
            ->where('date', '>=', $bulanIni)
            ->sum('quantity');

        $barangKeluarBulanIni = StockTransaction::keluar()
            ->where('date', '>=', $bulanIni)
            ->sum('quantity');

        $stokMenipis = Product::with('stockTransactions')
            ->get()
            ->filter(fn ($product) =>
                $product->current_stock <= $product->minimum_stock
            )
            ->count();

        $aktivitasTerbaru = Activity::with('user')
            ->latest()
            ->limit(5)
            ->get();

        //Grafik
        $start = now()->startOfMonth();
        $end   = now()->endOfMonth();

        $grafikMasuk = StockTransaction::masuk()
            ->selectRaw('DATE(date) as tanggal, SUM(quantity) as total')
            ->whereBetween('date', [$start, $end])
            ->groupBy('tanggal')
            ->pluck('total', 'tanggal');

        $grafikKeluar = StockTransaction::keluar()
            ->selectRaw('DATE(date) as tanggal, SUM(quantity) as total')
            ->whereBetween('date', [$start, $end])
            ->groupBy('tanggal')
            ->pluck('total', 'tanggal');

        $labels = [];
        $dataMasuk = [];
        $dataKeluar = [];

        for ($date = $start->copy(); $date <= $end; $date->addDay()) {
            $tgl = $date->format('Y-m-d');

            $labels[]     = $date->format('d M');
            $dataMasuk[]  = $grafikMasuk[$tgl] ?? 0;
            $dataKeluar[] = $grafikKeluar[$tgl] ?? 0;
        }


        return view('dashboard.admin.dashboard', compact(
            'totalProduk',
            'barangMasukBulanIni',
            'barangKeluarBulanIni',
            'stokMenipis',
            'aktivitasTerbaru',
            'labels',
            'dataMasuk',
            'dataKeluar'
        ));
    }
    private function getTotalStok()
    {
        return Product::sum('stock');
    }

    public function manajer()
    {
        $hariIni = Carbon::today();
        $produkStokMenipis = Product::with('stockTransactions')
            ->get()
            ->filter(fn ($product) =>
                $product->current_stock <= $product->minimum_stock
            );

        $stokMenipis = $produkStokMenipis->count();

        $barangMasukHariIni = StockTransaction::masuk()
            ->whereDate('date', $hariIni)
            ->sum('quantity');

        $barangKeluarHariIni = StockTransaction::keluar()
            ->whereDate('date', $hariIni)
            ->sum('quantity');

        $totalProduk = Product::count();

        $totalStok = $this->getTotalStok();

        $peringatanSistem = [];

        if ($stokMenipis > 0) {
            $peringatanSistem[] = [
                'type' => 'warning',
                'message' => " barang memiliki stok di bawah minimum.",
            ];
        }

        if ($barangMasukHariIni > 0) {
            $peringatanSistem[] = [
                'type' => 'success',
                'message' => "Barang masuk hari ini tercatat dengan baik.",
            ];
        }

        if ($barangKeluarHariIni > 0) {
            $peringatanSistem[] = [
                'type' => 'danger',
                'message' => "Pastikan barang keluar sesuai permintaan resmi.",
            ];
        }

        if ($barangMasukHariIni == 0 && $barangKeluarHariIni == 0) {
            $peringatanSistem[] = [
                'type' => 'info',
                'message' => "Belum ada transaksi stok hari ini.",
            ];
        }

        return view('dashboard.manajer.dashboard', compact(
            'stokMenipis',
            'barangMasukHariIni',
            'barangKeluarHariIni',
            'totalProduk',
            'totalStok',
            'peringatanSistem'
        ));
    }
    public function staff()
    {
        $hariIni = Carbon::today();

        $barangMasukPending = StockTransaction::where('type', 'masuk')
            ->where('status', 'pending')
            ->count();
        $barangKeluarPending = StockTransaction::where('type', 'keluar')
            ->where('status', 'pending')
            ->count();

        $tugasSelesaiHariIni = StockTransaction::where('status', 'diterima')
            ->whereDate('updated_at', $hariIni)
            ->count();

        $daftarTugas = StockTransaction::with('product')
            ->where('status', 'pending')
            ->orderBy('date', 'asc')
            ->get();

        return view('dashboard.staff.dashboard', compact(
            'barangMasukPending',
            'barangKeluarPending',
            'tugasSelesaiHariIni',
            'daftarTugas'
        ));
    }

}
