<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'tbl_suppliers';
    public $timestamps = false;

    protected $fillable = ['name', 'address', 'phone', 'email'];

    //Relasi
    public function products()
    {
        return $this->hasMany(Product::class, 'supplier_id');
    }
}

