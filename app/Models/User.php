<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'tbl_users';
    public $timestamps = false;

    protected $fillable = ['name', 'email', 'password', 'role'];
    protected $hidden = ['password'];

    // Relasi
    public function stockTransactions()
    {
        return $this->hasMany(StockTransaction::class, 'user_id');
    }
}
