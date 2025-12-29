<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockTransaction extends Model
{
    protected $table = 'tbl_stock_transactions';
    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'user_id',
        'type',
        'quantity',
        'date',
        'status',
        'notes'
    ];

    //Relasi
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

