<?php

namespace App\Exports;

use App\Models\StockTransaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TransactionReportExport implements FromCollection, WithHeadings, WithMapping
{
    protected $tanggal;
    protected $jenis;

    public function __construct($tanggal = null, $jenis = null)
    {
        $this->tanggal = $tanggal;
        $this->jenis   = $jenis;
    }

    public function collection()
    {
        return StockTransaction::with(['product.category'])
            ->when($this->tanggal, fn($query) => $query->whereDate('date', $this->tanggal))
            ->when($this->jenis && in_array($this->jenis, ['masuk', 'keluar']), fn($query) => $query->where('type', $this->jenis))
            ->orderBy('date', 'desc')
            ->get();
    }

    public function map($transaction): array
    {
        return [
            $transaction->date->format('d-m-Y'),
            $transaction->product?->name ?? '-',
            $transaction->product?->category?->name ?? '-',
            ucfirst($transaction->type),
            $transaction->quantity,
            $transaction->notes ?? '-'
        ];
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Produk',
            'Kategori',
            'Jenis',
            'Jumlah',
            'Catatan'
        ];
    }
}
