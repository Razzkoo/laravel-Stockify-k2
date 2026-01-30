<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    //manajer view
    public function manajer()
    {
        $suppliers = Supplier::latest()->get();
        return view('manajer.supplier.index', compact('suppliers'));
    }
    //admin view
    public function index()
    {
        $suppliers = Supplier::latest()->get();
        return view('admin.supplier.index', compact('suppliers'));
    }
    public function create()
    {
        return view('admin.supplier.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'address' => 'nullable|string',
            'phone'   => 'nullable|string|max:20',
            'email'   => 'nullable|email|unique:suppliers,email',
        ],[
            'name.required'  => 'Nama supplier wajib diisi',
            'email.email'    => 'Format email tidak valid',
            'email.unique'   => 'Email supplier sudah terdaftar',
        ]);
        $supplier = Supplier::create($validated);

        logActivity(
            'Tambah Supplier',
            'Menambah supplier: ' . $supplier->name
        );

        return redirect()
            ->route('admin.supplier.index')
            ->with('success', 'Supplier berhasil ditambahkan');
    }

    public function edit(Supplier $supplier)
    {
        return view('admin.supplier.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'address' => 'nullable|string',
            'phone'   => 'nullable|string|max:20',
            'email'   => 'nullable|email|unique:suppliers,email,' . $supplier->id,
        ],[
            'name.required'  => 'Nama supplier wajib diisi',
            'email.email'    => 'Format email tidak valid',
            'email.unique'   => 'Email supplier sudah terdaftar',
        ]);
        logActivity(
        'Perbarui Supplier',
        'Memperbarui supplier: ' . $supplier->name
        );

        $supplier->update($validated);

        return redirect()
            ->route('admin.supplier.index')
            ->with('success', 'Supplier berhasil diperbarui');
    }

    public function destroy(Supplier $supplier)
    {
        logActivity(
        'Hapus Supplier',
        'Menghapus supplier: ' . $supplier->name
        );

        $supplier->delete();

        return redirect()
            ->route('admin.supplier.index')
            ->with('success', 'Supplier berhasil dihapus');
    }
}
