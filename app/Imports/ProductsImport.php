<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductsImport implements ToModel, WithHeadingRow, WithValidation
{
    public function model(array $row)
    {
        $category = Category::firstOrCreate([
            'name' => trim($row['kategori'])
        ]);

        $supplier = Supplier::firstOrCreate([
            'name' => trim($row['supplier'])
        ]);

        return new Product([
            'sku'             => $row['sku'],
            'name'            => $row['nama_produk'],
            'category_id'     => $category->id,
            'supplier_id'     => $supplier->id,
            'purchase_price'  => $row['harga_beli'],
            'selling_price'   => $row['harga_jual'],
            'current_stock'   => 0,
            'minimum_stock'   => $row['minimum_stok'] ?? 0,
            'description'     => $row['deskripsi'] ?? null,
        ]);
    }

    public function rules(): array
    {
        return [
            '*.sku' => ['required', 'string', Rule::unique('products', 'sku')],
            '*.nama_produk' => ['required', 'string'],
            '*.kategori' => ['required', 'string'],
            '*.supplier' => ['required', 'string'],
            '*.harga_beli' => ['required', 'numeric', 'min:0'],
            '*.harga_jual' => ['required', 'numeric', 'min:0'],
            '*.minimum_stok' => ['nullable', 'integer', 'min:0'],
        ];
    }
}
