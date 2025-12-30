<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $table = 'tbl_product_attributes';
    public $timestamps = false;

    protected $fillable = ['product_id', 'name', 'value'];

    //Relasi
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}

