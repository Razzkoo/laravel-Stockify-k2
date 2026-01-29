<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'activity_logs';

    protected $fillable = [
        'user_id',
        'role',
        'activity',
        'description',
        'ip_address',
        'user_agent',
    ];

    //relation
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
