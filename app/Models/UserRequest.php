<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'password',
        'requested_role',
        'status',
        'note',
    ];

    protected $attributes = [
        'status' => 'pending',
        'requested_role' => 'staff_gudang',
    ];
    protected $hidden = [
        'password',
    ];
    //relation
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
