<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImageController;
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
        return view('dashboard.admin.index');
    });

    Route::get('/product', function () {
        return view('dashboard.admin.product.index');
    });

    /* ================= DASHBOARD NAVBAR ================= */
    Route::get('/profile/index', function () {
        return view('dashboard.admin.profile.index');
    });

    Route::get('/settings/index', function () {
        return view('dashboard.admin.settings.index');
    });

    Route::get('/settings/change_password', function () {
        return view('dashboard.admin.settings.change_password');
    });

    /* ================= PRODUCT SUBPAGES ================= */

    Route::get('/product/kategori', function () {
        return view('dashboard.admin.product.kategori');
    });

    Route::get('/product/atribut', function () {
        return view('dashboard.admin.product.atribut');
    });

    Route::get('/product/create', function () {
        return view('dashboard.admin.product.create');
    });

    Route::get('/product/edit', function () {
        return view('dashboard.admin.product.edit');
    });

    //supplier
    Route::get('/supplier', function () {
        return view('dashboard.admin.supplier.index');
    });

    Route::get('/supplier/create', function () {
        return view('dashboard.admin.supplier.create');
    });

    //stock
    Route::get('/stock', function () {
        return view('dashboard.admin.stock.index');
    });

    Route::get('/stock/create', function () {
        return view('dashboard.admin.stock.create');
    });

});

//users

Route::prefix('dashboard/admin')->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
});

//settings and profile
Route::put('/dashboard/admin/settings', [App\Http\Controllers\SettingsController::class, 'update'])->name('settings.update');
Route::get('/dashboard/admin/profile/index', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');

Route::get(uri: '/dashboard', action: function () {
    return view(view:'dashboard');
})->name('dashboard');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create');
Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');
Route::get('/suppliers/{supplier}/edit', [SupplierController::class, 'edit'])->name('suppliers.edit');
Route::put('/suppliers/{supplier}', [SupplierController::class, 'update'])->name('suppliers.update');
Route::delete('/suppliers/{supplier}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');

// Authentication Routes
Route::get('/login', fn() => view('auth.login'))->name('login.form');
Route::get('/register', fn() => view('auth.register'))->name('register.form');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');