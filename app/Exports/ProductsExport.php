<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductsExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Product::with(['category', 'supplier'])->get();
    }
    public function headings(): array
    {
        return [
            'SKU',
            'Nama Produk',
            'Kategori',
            'Supplier',
            'Harga Beli',
            'Harga Jual',
            'Minimum Stok',
            'Deskripsi',
        ];
    }


    public function map($product): array
    {
        return [
            $product->sku,
            $product->name,
            $product->category->name ?? '',
            $product->supplier->name ?? '',
            $product->purchase_price,
            $product->selling_price,
            $product->minimum_stock,
            $product->description,
        ];
    }
}
