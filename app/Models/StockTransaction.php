<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'supplier_id',
        'user_id',
        'type',
        'quantity',
        'physical_stock',
        'system_stock',
        'proposed_minimum_stock',
        'date',
        'status',
        'notes',
    ];


    protected $casts = [
        'date' => 'date',
    ];
    //relation
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    //masuk dan keluar
    public function scopeMasuk($query)
    {
        return $query->where('type', 'masuk');
    }

    public function scopeKeluar($query)
    {
        return $query->where('type', 'keluar');
    }
    //status checks
    public function isPending(): bool
    {
        return in_array($this->status, [
            'pending_staff',
            'checked_staff',
            'checked_admin',
        ]);
    }
    //dicek staff
    public function isCheckedByStaff(): bool
    {
        return $this->status === 'checked_staff';
    }
    //dicek admin
    public function isCheckedByAdmin(): bool
    {
        return $this->status === 'checked_admin';
    }
    //disetujui
    public function isApproved(): bool
    {
        return $this->status === 'approved';
    }
    //ditolak
    public function isRejected(): bool
    {
        return $this->status === 'ditolak';
    }

}
