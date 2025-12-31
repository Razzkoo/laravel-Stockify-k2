<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home and Dashboard Routes
Route::get(uri: '/', action: function () {
    return view(view:'welcome');
});

/* ================= AUTH ================= */

Route::get('/auth/login', function () {
    return view('auth.login');
});

Route::get('/auth/register', function () {
    return view('auth.register');
});

Route::get('/auth/reset-pass', function () {
    return view('auth.reset-pass');
});

Route::get('/auth/lost-pass', function () {
    return view('auth.lost-pass');
});

/* ================= DASHBOARD ADMIN ================= */

Route::prefix('dashboard/admin')->group(function () {

Route::get('/', function () {
    return view('welcome');
});

});
