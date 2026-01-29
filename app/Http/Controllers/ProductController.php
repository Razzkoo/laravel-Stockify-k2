<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Activity;
use App\Models\StockTransaction;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

// Import Excel
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;

use App\Helpers\activity_helper;

class ProductController extends Controller
{
    //manajer view
    public function manajer(Request $request)
    {
        $search = $request->search;

        $products = Product::with([
                'category',
                'supplier',
                'attributes',
                'stockTransactions'
            ])
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('sku', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('manajer.product.index', compact('products'));
    }
    //admin view
    public function index(Request $request)
    {
        $search = $request->search;

        $products = Product::with([
                'category',
                'supplier',
                'attributes',
                'stockTransactions'
            ])
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('sku', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.product.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::all();
        $suppliers  = Supplier::all();

        return view('admin.product.create', compact('categories', 'suppliers'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id'     => ['required', 'exists:categories,id'],
            'supplier_id'     => ['required', 'exists:suppliers,id'],
            'name'            => ['required', 'string', 'max:255'],
            'sku'             => ['required', 'string', 'max:100', 'unique:products,sku'],
            'description'     => ['nullable', 'string'],
            'purchase_price'  => ['required', 'numeric', 'min:0'],
            'selling_price'   => ['required', 'numeric', 'min:0'],
            'image'           => ['nullable', 'image',],
            'adjusted_image'  => ['nullable', 'string'],
            'attributes'         => ['nullable', 'array'],
            'attributes.*.name'  => ['nullable', 'string', 'max:100'],
            'attributes.*.value' => ['nullable', 'string', 'max:255'],
        ]);

        if (!$request->filled('adjusted_image')) {
            $request->validate([
                'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            ]);
        }
        $productData = collect($validated)->except('attributes')->toArray();
        $productData['stock'] = 0;

        if ($request->filled('adjusted_image')) {
            $adjustedImage = str_replace(' ', '+', $request->adjusted_image);
            $imageData = base64_decode(
                preg_replace('#^data:image/\w+;base64,#i', '', $adjustedImage)
            );
            if ($imageData !== false) {
                $filename = 'product_' . time() . '_' . uniqid() . '.png';
                $path = 'products/' . $filename;
                Storage::disk('public')->put($path, $imageData);
                $productData['image'] = $path;
            }
        } elseif ($request->hasFile('image')) {
            $productData['image'] = $request->file('image')
                ->store('products', 'public');
        }
        $product = Product::create($productData);
        
        $attributes = collect($request->input('attributes', []))
            ->filter(fn ($attr) =>
                !empty($attr['name']) && !empty($attr['value'])
            );

        
        foreach ($attributes as $attr) {
            $product->attributes()->create($attr);
        }
        logActivity(
        'Menambah Produk',
        'Menambahkan produk: ' . $product->name
        );

        return redirect()
            ->route('admin.product.index')
            ->with('success', 'Produk & atribut berhasil ditambahkan');
    }
    
    public function edit(Product $product)
    {
        $categories = Category::all();
        $suppliers  = Supplier::all();

        return view('admin.product.edit', compact('product', 'categories', 'suppliers'));
    }
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'category_id'     => ['required', 'exists:categories,id'],
            'supplier_id'     => ['required', 'exists:suppliers,id'],
            'name'            => ['required', 'string', 'max:255'],
            'sku'             => ['required','string','max:100',
                Rule::unique('products', 'sku')->ignore($product->id),
            ],
            'description'     => ['nullable', 'string'],
            'purchase_price'  => ['required', 'numeric', 'min:0'],
            'selling_price'   => ['required', 'numeric', 'min:0'],
            'image'           => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'adjusted_image'  => ['nullable', 'string'],
            'attributes'         => ['nullable', 'array'],
            'attributes.*.name'  => ['nullable', 'string', 'max:100'],
            'attributes.*.value' => ['nullable', 'string', 'max:255'],
        ]);

        $productData = collect($validated)->except('attributes')->toArray();

        if ($request->filled('adjusted_image')) {
            $adjustedImage = $request->input('adjusted_image');
            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $adjustedImage));
            $filename = 'product_' . time() . '_' . uniqid() . '.png';
            $path = 'products/' . $filename;
            Storage::disk('public')->put($path, $imageData);
            $productData['image'] = $path;
        } elseif ($request->hasFile('image')) {
            $productData['image'] = $request->file('image')
                ->store('products', 'public');
        }
        $product->update($productData);

        $product->attributes()->delete();
        $attributes = collect($request->input('attributes', []))
            ->filter(fn ($attr) =>
                !empty($attr['name']) && !empty($attr['value'])
            );

        foreach ($attributes as $attr) {
            $product->attributes()->create($attr);
        }
        logActivity(
        'Perbarui Produk',
        'Memperbarui produk: ' . $product->name 
        );

        return redirect()
            ->route('admin.product.index')
            ->with('success', 'Produk & atribut berhasil diperbarui');
    }
    
    public function destroy(Product $product)
    {
        $product->delete();
        logActivity(
        'Hapus Produk',
        'Menghapus produk: ' . $product->name 
        );

        return redirect()
            ->route('admin.product.index')
            ->with('success', 'Produk berhasil dihapus');
    }
    


    //Export
    public function export()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    //Import
    public function import(Request $request)
    {
        $request->validate([
            'file' => ['required', 'file', 'mimes:xlsx,csv'],
        ]);

        Excel::import(new ProductsImport, $request->file('file'));

        return redirect()
            ->route('admin.product.index')
            ->with('success', 'Data produk berhasil diimport');
    }
}
