<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockTransaction;
use App\Models\Product;

class StockOpnameController extends Controller
{
    //Konfimasi masuk (staff)
    public function index()
    {
        $transactions = StockTransaction::where('status', 'pending')
            ->where('type', 'masuk')
            ->with(['product', 'supplier'])
            ->get();

        $totalPending  = $transactions->count();
        $totalProducts = StockTransaction::where('type', 'masuk')->count();
        $totalChecked  = StockTransaction::where('status', 'checked_staff')
            ->where('type', 'masuk')
            ->count();

        return view('staff.stock.stockopname', compact(
            'transactions',
            'totalPending',
            'totalProducts',
            'totalChecked'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|exists:stock_transactions,id',
            'physical_stock' => 'required|integer|min:0',
        ]);

        $transaction = StockTransaction::where('status', 'pending')
            ->where('type', 'masuk')
            ->findOrFail($request->transaction_id);

        $stokSistem = $transaction->product->stock;
        $stokFisik  = $request->physical_stock;

        $stokSeharusnya = $stokSistem + $transaction->quantity;
        $selisih = $stokFisik - $stokSeharusnya;

        $transaction->update([
            'physical_stock' => $stokFisik,
            'status' => 'checked_staff',
            'notes' => trim(
                ($transaction->notes ?? '') .
                "\n[Staff Masuk] Sistem: {$stokSistem}, Masuk: {$transaction->quantity}, Fisik: {$stokFisik}, Selisih: {$selisih}"
            ),
        ]);
        logActivity(
        'Konfirmasi Masuk (Staff)',
        'Cek barang masuk: ' . $transaction->product->name .
            ' | Sistem: ' . $stokSistem .
            ' | Masuk: ' . $transaction->quantity .
            ' | Fisik: ' . $stokFisik .
            ' | Selisih: ' . $selisih
        );

        return redirect()->route('staff.stock.stockopname')
            ->with('success', 'Stock opname masuk berhasil dicatat.');
    }
    //Konfimasi keluar (staff)
    public function stockOutIndex()
    {
        $transactions = StockTransaction::where('status', 'pending')
            ->where('type', 'keluar')
            ->with(['product', 'supplier'])
            ->get();
        $totalPending  = $transactions->count();
        $totalProducts = StockTransaction::where('type', 'keluar')->count();
        $totalChecked  = StockTransaction::where('status', 'checked_staff')
            ->where('type', 'keluar')
            ->count();

        return view('staff.stock.stockout', compact(
            'transactions',
            'totalPending',
            'totalProducts',
            'totalChecked'
        ));
    }

    public function stockOutStore(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|exists:stock_transactions,id',
            'physical_stock' => 'required|integer|min:0',
        ]);

        $transaction = StockTransaction::where('status', 'pending')
            ->where('type', 'keluar')
            ->findOrFail($request->transaction_id);

        $stokSistem = $transaction->product->stock;

        $stokSeharusnya = $stokSistem - $transaction->quantity;

        $stokFisik = $request->physical_stock;
        $selisih   = $stokFisik - $stokSeharusnya;

        $transaction->update([
            'physical_stock' => $stokFisik,
            'status' => 'checked_staff',
            'notes' => trim(
                ($transaction->notes ?? '') .
                "\n[Staff Keluar] Sistem: {$stokSistem}, Keluar: {$transaction->quantity}, Fisik: {$stokFisik}, Selisih: {$selisih}"
            ),
        ]);
        logActivity(
        'Konfirmasi Keluar (Staff)',
        'Cek barang keluar: ' . $transaction->product->name .
            ' | Sistem: ' . $stokSistem .
            ' | Keluar: ' . $transaction->quantity .
            ' | Fisik: ' . $stokFisik .
            ' | Selisih: ' . $selisih
        );


        return redirect()->route('staff.stock.stockout')
            ->with('success', 'Stock opname keluar berhasil dicatat.');
    }
    //Admin Stock Opname
    public function admin()
    {
        $transactionsMasuk = StockTransaction::where('status', 'checked_staff')
            ->where('type', 'masuk')
            ->with(['product.supplier'])
            ->get();

        $transactionsKeluar = StockTransaction::where('status', 'checked_staff')
            ->where('type', 'keluar')
            ->with(['product.supplier'])
            ->get();

        $totalProducts = Product::count();
        $totalChecked  = StockTransaction::where('status', 'checked_staff')->count();

        $totalWithDifference = StockTransaction::where('status', 'checked_admin')
            ->count();

        return view('admin.stock.opname', compact(
            'transactionsMasuk',
            'transactionsKeluar',
            'totalProducts',
            'totalChecked',
            'totalWithDifference'
        ));
    }

    public function adminStore(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|exists:stock_transactions,id',
            'product_id'     => 'required|exists:products,id',
            'minimum_stock'  => 'nullable|integer|min:0',
        ]);

        $transaction = StockTransaction::where('status', 'checked_staff')
            ->findOrFail($request->transaction_id);

        if ($request->filled('minimum_stock')) {
            Product::where('id', $request->product_id)
                ->update(['minimum_stock' => $request->minimum_stock]);
        }

        $transaction->update([
            'status' => 'checked_admin',
            'notes' => trim(
                ($transaction->notes ?? '') .
                "\n[Admin] Minimum Stock: " . ($request->minimum_stock ?? '-')
            ),
        ]);
        logActivity(
        'Verifikasi Stock Opname (Admin)',
        'Verifikasi opname produk: ' . $transaction->product->name .
            ' | Minimum Stock: ' . ($request->minimum_stock ?? '-')
        );
        return redirect()->route('admin.stock.opname')
            ->with('success', 'Opname admin selesai & stok minimum diperbarui.');
    }
    //Manajer Stock Opname
    public function manager()
    {
        $transactionsMasuk = StockTransaction::where('status', 'checked_admin')
            ->where('type', 'masuk')
            ->with(['product', 'supplier'])
            ->get();

        $transactionsKeluar = StockTransaction::where('status', 'checked_admin')
            ->where('type', 'keluar')
            ->with(['product', 'supplier'])
            ->get();

        $totalProducts = Product::count();
        $totalChecked  = StockTransaction::where('status', 'checked_admin')->count();
        $totalApproved = StockTransaction::where('status', 'diterima')->count();

        return view('manajer.stock.stockopname', compact(
            'transactionsMasuk',
            'transactionsKeluar',
            'totalProducts',
            'totalChecked',
            'totalApproved',
        ));
    }

    public function approve(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|exists:stock_transactions,id',
        ]);

        $transaction = StockTransaction::with('product')
            ->where('status', 'checked_admin')
            ->findOrFail($request->transaction_id);

        $product = $transaction->product;

        $product->stock = $transaction->physical_stock;
        $product->save();

        $transaction->update([
            'status' => 'diterima',
            'notes' => trim(
                ($transaction->notes ?? '') .
                "\n[Manajer] Disetujui. Stok disesuaikan dengan hasil opname"
            ),
        ]);
        logActivity(
        'Setujui Stock Opname (Manajer)',
        'Menyetujui opname: ' . $product->name .
                 ' | Stok final diset ke: ' . $transaction->physical_stock
        );


        return redirect()->back()
            ->with('success', 'Stock opname disetujui & stok diperbarui.');
    }
    public function reject(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|exists:stock_transactions,id',
            'notes'          => 'required|string|max:500',
        ]);

        $transaction = StockTransaction::where('status', 'checked_admin')
            ->findOrFail($request->transaction_id);

        $transaction->update([
            'status' => 'ditolak',
            'notes'  => trim(
                ($transaction->notes ?? '') .
                "\n[Manajer] DITOLAK: " . $request->notes
            ),
        ]);

        logActivity(
            'Tolah Stock Opname (Manajer)',
            'Menolak opname: ' . $transaction->product->name .
            ' | Alasan: ' . $request->notes
        );

        return redirect()->back()
            ->with('error', 'Stock opname ditolak.');
    }

}
