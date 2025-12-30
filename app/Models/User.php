<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = ['password'];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    protected $casts = [
        'password' => 'hashed',
    ];

    //Role
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
    public function isManajerGudang()
    {
        return $this->role === 'manajer_gudang';
    }
    public function isStaffGudang()
    {
        return $this->role === 'staff_gudang';
    }

    // Relasi
    public function stockTransactions()
    {
        return $this->hasMany(StockTransaction::class, 'user_id');
    }
}
