<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StockReportExport implements FromCollection, WithHeadings
{
    protected $tanggal;
    protected $kategori;

    public function __construct($tanggal = null, $kategori = null)
    {
        $this->tanggal  = $tanggal;
        $this->kategori = $kategori;
    }

    public function collection(): Collection
    {
        return Product::with(['category', 'supplier', 'stockTransactions'])
            ->when($this->kategori, function ($query) {
                $query->where('category_id', $this->kategori);
            })
            ->get()
            ->map(function ($product) {

                $stok = $product->current_stock;

                return [
                    'tanggal'  => $this->tanggal ?? now()->format('d-m-Y'),
                    'produk'   => $product->name,
                    'kategori' => $product->category?->name ?? '-',
                    'supplier' => $product->supplier?->name ?? '-',
                    'stok'     => $stok,
                    'status'   => $stok <= $product->minimum_stock
                                    ? 'Menipis'
                                    : 'Aman',
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Produk',
            'Kategori',
            'Supplier',
            'Stok',
            'Status',
        ];
    }
}
