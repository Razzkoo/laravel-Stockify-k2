<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockTransaction;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StockTransactionController extends Controller
{
    //Transaksi barang masuk admin view
    public function adminMasuk()
    {
        $products = Product::all();
        $suppliers = Supplier::all();

        $transactions = StockTransaction::masuk()
            ->with('product.supplier')
            ->latest()
            ->get();

        $totalProducts = Product::count();

        $masukToday = StockTransaction::where('type', 'masuk')
            ->where('status', 'diterima')
            ->whereDate('date', Carbon::today())
            ->sum('quantity');

        $keluarToday = StockTransaction::where('type', 'keluar')
            ->where('status', 'diterima')
            ->whereDate('date', Carbon::today())
            ->sum('quantity');

        $menungguKonfirmasi = StockTransaction::where('status', 'pending')->count();

        return view('admin.stock.masuk', compact(
            'products',
            'suppliers',
            'transactions',
            'totalProducts',
            'masukToday',
            'keluarToday',
            'menungguKonfirmasi'
        ));
    }
    //Transaksi barang masuk manajer view
    public function indexMasuk()
    {
        $products = Product::all();
        $suppliers = Supplier::all();

        $transactions = StockTransaction::masuk()
            ->with('product.supplier')
            ->latest()
            ->get();

        $totalProducts = Product::count();

        $masukToday = StockTransaction::where('type', 'masuk')
            ->where('status', 'diterima')
            ->whereDate('date', Carbon::today())
            ->sum('quantity');

        $keluarToday = StockTransaction::where('type', 'keluar')
            ->where('status', 'diterima')
            ->whereDate('date', Carbon::today())
            ->sum('quantity');

        $menungguKonfirmasi = StockTransaction::where('status', 'pending')->count();

        return view('manajer.stock.masuk', compact(
            'products',
            'suppliers',
            'transactions',
            'totalProducts',
            'masukToday',
            'keluarToday',
            'menungguKonfirmasi'
        ));
    }

    public function storeMasuk(Request $request)
    {
        $request->validate([
            'supplier_id' => 'nullable|exists:suppliers,id',
            'product_id'  => 'required|exists:products,id',
            'quantity'    => 'required|integer|min:1',
            'date'        => 'required|date',
            'notes'       => 'nullable|string',
        ]);

        $product = Product::findOrFail($request->product_id);

        StockTransaction::create([
            'supplier_id'  => $request->supplier_id,
            'product_id'   => $product->id,
            'user_id'      => Auth::id(),
            'type'         => 'masuk',
            'quantity'     => $request->quantity,
            'system_stock' => $product->stock, 
            'date'         => $request->date,
            'status'       => 'pending',
            'notes'        => $request->notes,
        ]);
        logActivity(
        'Transaksi Barang Masuk',
        'Menambahkan barang masuk: ' . $product->name .
        ' (Jumlah: ' . $request->quantity . ')'
        );


        return redirect()->route('manajer.stock.masuk')
            ->with('success', 'Transaksi disimpan. Menunggu stock opname staff.');
    }
    //Transaksi barang keluar admin view
    public function adminKeluar()
    {
        $products = Product::all();
        $suppliers = Supplier::all();

        $transactions = StockTransaction::keluar()
            ->with('product.supplier')
            ->latest()
            ->get();

        $totalProducts = Product::count();

        $masukToday = StockTransaction::where('type', 'masuk')
            ->where('status', 'diterima')
            ->whereDate('date', Carbon::today())
            ->sum('quantity');

        $keluarToday = StockTransaction::where('type', 'keluar')
            ->where('status', 'diterima')
            ->whereDate('date', Carbon::today())
            ->sum('quantity');

        $menungguKonfirmasi = StockTransaction::where('status', 'pending')->count();

        return view('admin.stock.keluar', compact(
            'products',
            'suppliers',
            'transactions',
            'totalProducts',
            'masukToday',
            'keluarToday',
            'menungguKonfirmasi'
        ));
    }
    //Transaksi barang keluar manajer view
    public function indexKeluar()
    {
        $products = Product::all();
        $suppliers = Supplier::all();

        $transactions = StockTransaction::keluar()
            ->with('product.supplier')
            ->latest()
            ->get();

        $totalProducts = Product::count();

        $masukToday = StockTransaction::where('type', 'masuk')
            ->where('status', 'diterima')
            ->whereDate('date', Carbon::today())
            ->sum('quantity');

        $keluarToday = StockTransaction::where('type', 'keluar')
            ->where('status', 'diterima')
            ->whereDate('date', Carbon::today())
            ->sum('quantity');

        $menungguKonfirmasi = StockTransaction::where('status', 'pending')->count();

        return view('manajer.stock.keluar', compact(
            'products',
            'suppliers',
            'transactions',
            'totalProducts',
            'masukToday',
            'keluarToday',
            'menungguKonfirmasi'
        ));
    }

    public function storeKeluar(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
            'date'       => 'required|date',
            'notes'      => 'nullable|string',
        ]);

        $product = Product::findOrFail($request->product_id);

        StockTransaction::create([
            'supplier_id'  => $request->supplier_id,
            'product_id'   => $product->id,
            'user_id'      => Auth::id(),
            'type'         => 'keluar',
            'quantity'     => $request->quantity,
            'system_stock' => $product->stock,
            'date'         => $request->date,
            'status'       => 'pending',
            'notes'        => $request->notes,
        ]);
        logActivity(
        'Transaksi Barang Keluar',
        'Menambahkan barang keluar: ' . $product->name .
        ' (Jumlah: ' . $request->quantity . ')'
        );

        return redirect()->route('manajer.stock.keluar')
            ->with('success', 'Transaksi keluar disimpan. Menunggu stock opname staff.');
    }

    public function destroy($id)
    {
        $transaction = StockTransaction::with('product')->findOrFail($id);
        $product = $transaction->product;

        // JIKA SUDAH DITERIMA → BALIKKAN STOK
        if ($transaction->status === 'diterima') {

            if ($transaction->type === 'masuk') {
                // Barang masuk dihapus → stok dikurangi
                $product->stock = max(
                    0,
                    $product->stock - $transaction->quantity
                );
            }

            if ($transaction->type === 'keluar') {
                // Barang keluar dihapus → stok ditambah
                $product->stock = $product->stock + $transaction->quantity;
            }

            $product->save();
        }
        logActivity(
        'Hapus Transaksi',
        'Menghapus transaksi ' . strtoupper($transaction->type) .
        ' - ' . $product->name .
        ' (Jumlah: ' . $transaction->quantity . ')'
        );
        // HAPUS TRANSAKSI
        $transaction->delete();

        return redirect()->back()
            ->with('success', 'Transaksi berhasil dihapus & stok diperbarui');
    }
}
