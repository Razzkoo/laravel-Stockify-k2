<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\Activity;
use App\Models\User;
use App\Models\StockTransaction;

use App\Exports\StockReportExport;
use App\Exports\TransactionReportExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    //Admin
    public function index()
    {
        $totalProduk = Product::count();

        $totalStok = $this->getTotalStok();

        $bulanIni = now()->month;
        $tahunIni = now()->year;

        $transaksiBulanIni = StockTransaction::whereMonth('date', $bulanIni)
                                            ->whereYear('date', $tahunIni)
                                            ->count();

        $penggunaAktif = User::count();

        return view('admin.report.index', compact(
            'totalProduk',
            'transaksiBulanIni',
            'totalStok',
            'penggunaAktif'
        ));
    }
    //Report Stok
    public function stok(Request $request)
    {
        $tanggal   = $request->tanggal;      
        $kategori  = $request->kategori;     

        $products = Product::with([
                'category',
                'supplier',
                'stockTransactions' => function ($query) use ($tanggal) {
                    if ($tanggal) {
                        $query->whereDate('date', '<=', $tanggal);
                    }
                }
            ])
            ->when($kategori, function ($query) use ($kategori) {
                $query->where('category_id', $kategori);
            })
            ->get();

        $totalProduk = $products->count();
        $totalStok = $this->getTotalStok();

        $stokMenipis = $products->filter(function ($product) {
            return $product->current_stock <= $product->minimum_stock;
        })->count();

        $categories = Category::orderBy('name')->get();

        return view('admin.report.stok', compact(
            'products',
            'categories',
            'totalProduk',
            'totalStok',
            'stokMenipis',
            'tanggal',
            'kategori'
        ));
    }
    //Export
    public function exportStok(Request $request)
    {
        return Excel::download(
            new StockReportExport(
                $request->tanggal,
                $request->kategori
            ),
            'Laporan Stok.xlsx'
        );
    }
    //Report Transaksi
    public function transaksi(Request $request)
    {
        $tanggal   = $request->tanggal;
        $jenis     = $request->jenis; // 'masuk' / 'keluar' / null

        // Ambil transaksi + relasi produk & kategori
        $transactions = StockTransaction::with(['product.category'])
            ->when($tanggal, fn($query) => $query->whereDate('date', $tanggal))
            ->when($jenis && in_array($jenis, ['masuk', 'keluar']), fn($query) => $query->where('type', $jenis))
            ->orderBy('date', 'desc')
            ->get();

        return view('admin.report.transaction', compact(
            'transactions', 'tanggal', 'jenis'
        ));
    }
    public function exportTransaksi(Request $request)
    {
        $tanggal = $request->tanggal;
        $jenis   = $request->jenis;

        $fileName = 'laporan-transaksi-' . ($tanggal ?? date('d-m-Y')) . '.xlsx';

        return Excel::download(
            new TransactionReportExport($tanggal, $jenis),
            'Laporan Transaksi.xlsx'
        );
    }
    //Report Activity
    public function activity(Request $request)
    {
        $role    = $request->role;
        $tanggal = $request->tanggal;

        $activities = Activity::with('user')
            ->when($role, function ($query) use ($role) {
                $query->where('role', $role);
            })
            ->when($tanggal, function ($query) use ($tanggal) {
                $query->whereDate('created_at', $tanggal);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.report.activity', compact(
            'activities',
            'role',
            'tanggal'
        ));
    }
    public function destroyActivity($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();

        return redirect()
            ->route('admin.report.activity')
            ->with('success', 'Aktivitas berhasil dihapus');
    }
    public function destroyAllActivity()
    {
        Activity::truncate();

        return redirect()
            ->route('admin.report.activity')
            ->with('success', 'Semua aktivitas berhasil dihapus');
    }


    // Manajer
    private function getTotalStok()
    {
        return Product::sum('stock');
    }
    public function manajer()
    {
        $totalProduk = Product::count();
        $totalStok = $this->getTotalStok();

        $bulanIni = now()->month;
        $tahunIni = now()->year;

        $transaksiBulanIni = StockTransaction::whereMonth('date', $bulanIni)
                                            ->whereYear('date', $tahunIni)
                                            ->count();

        return view('manajer.report.index', compact(
            'totalProduk',
            'totalStok',        
            'transaksiBulanIni',
        ));
    }
    //Report Stok
    public function manajerStok(Request $request)
    {
        $tanggal   = $request->tanggal;      
        $kategori  = $request->kategori;  
        $products = Product::with([
                'category',
                'supplier',
                'stockTransactions' => function ($query) use ($tanggal) {
                    if ($tanggal) {
                        $query->whereDate('date', '<=', $tanggal);
                    }
                }
            ])
            ->when($kategori, function ($query) use ($kategori) {
                $query->where('category_id', $kategori);
            })
            ->get();
        $totalProduk = $products->count();
        $totalStok = $this->getTotalStok();
        $stokMenipis = $products->filter(function ($product) {
            return $product->current_stock <= $product->minimum_stock;
        })->count();

        $categories = Category::orderBy('name')->get();

        return view('manajer.report.stok', compact(
            'products',
            'categories',
            'totalProduk',
            'totalStok',
            'stokMenipis',
            'tanggal',
            'kategori'
        ));
    }
    public function manajerExport(Request $request)
    {
        return Excel::download(
            new StockReportExport(
                $request->tanggal,
                $request->kategori
            ),
            'Laporan Stok.xlsx'
        );
    }
    //Report Transaksi
    public function manajerTransaksi(Request $request)
    {
        $tanggal   = $request->tanggal;
        $jenis     = $request->jenis; 

        $transactions = StockTransaction::with(['product.category'])
            ->when($tanggal, fn($query) => $query->whereDate('date', $tanggal))
            ->when($jenis && in_array($jenis, ['masuk', 'keluar']), fn($query) => $query->where('type', $jenis))
            ->orderBy('date', 'desc')
            ->get();

        return view('manajer.report.transaction', compact(
            'transactions', 'tanggal', 'jenis'
        ));
    }
    public function manajerExportTransaksi(Request $request)
    {
        $tanggal = $request->tanggal;
        $jenis   = $request->jenis;

        $fileName = 'laporan-transaksi-' . ($tanggal ?? date('d-m-Y')) . '.xlsx';

        return Excel::download(
            new TransactionReportExport($tanggal, $jenis),
            'Laporan Transaksi.xlsx'
        );
    }
}
