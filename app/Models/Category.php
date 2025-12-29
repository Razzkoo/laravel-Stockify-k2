<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'tbl_categories';
    public $timestamps = false;

    protected $fillable = ['name', 'description'];

    //Relasi
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}

