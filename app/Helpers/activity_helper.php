<?php

use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

if (!function_exists('logActivity')) {
    function logActivity(string $activity, ?string $description = null)
    {
        if (!Auth::check()) {
            return;
        }

        Activity::create([
            'user_id'     => Auth::id(),
            'role'        => Auth::user()->role,
            'activity'    => $activity,
            'description' => $description,
            'ip_address'  => request()->ip(),
            'user_agent'  => request()->userAgent(),
        ]);
    }
}
