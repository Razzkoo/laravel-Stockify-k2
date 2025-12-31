<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Menampilkan daftar supplier
     */
    public function index()
    {
        $suppliers = Supplier::latest()->get();
        return view('dashboard.admin.supplier.index', compact('suppliers'));
    }

    /**
     * Menampilkan form tambah supplier
     */
    public function create()
    {
        return view('dashboard.admin.supplier.create');
    }

    /**
     * Menyimpan supplier baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'address' => 'nullable|string',
            'phone'   => 'nullable|string|max:20',
            'email'   => 'nullable|email|unique:suppliers,email',
        ]);

        Supplier::create($validated);

        return redirect()
            ->route('supplier.index')
            ->with('success', 'Supplier berhasil ditambahkan');
    }

    /**
     * Menampilkan form edit supplier
     */
    public function edit(Supplier $supplier)
    {
        return view('dashboard.admin.supplier.edit', compact('supplier'));
    }

    /**
     * Update data supplier
     */
    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'address' => 'nullable|string',
            'phone'   => 'nullable|string|max:20',
            'email'   => 'nullable|email|unique:suppliers,email,' . $supplier->id,
        ]);

        $supplier->update($validated);

        return redirect()
            ->route('supplier.index')
            ->with('success', 'Supplier berhasil diperbarui');
    }

    /**
     * Menghapus supplier
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()
            ->route('supplier.index')
            ->with('success', 'Supplier berhasil dihapus');
    }
}
