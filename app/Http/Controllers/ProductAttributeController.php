<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'name'  => 'required|string|max:100',
            'value' => 'required|string|max:255',
        ]);

        $product->attributes()->create([
            'name'  => $request->name,
            'value' => $request->value,
        ]);

        return back()->with('success', 'Atribut produk berhasil ditambahkan');
    }
    public function update(Request $request, ProductAttribute $attribute)
    {
        $request->validate([
            'name'  => 'required|string|max:100',
            'value' => 'required|string|max:255',
        ]);

        $attribute->update([
            'name'  => $request->name,
            'value' => $request->value,
        ]);

        return back()->with('success', 'Atribut produk berhasil diperbarui');
    }
    public function destroy(ProductAttribute $attribute)
    {
        $attribute->delete();

        return back()->with('success', 'Atribut produk berhasil dihapus');
    }
}
