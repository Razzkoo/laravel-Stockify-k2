<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
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

    //user
    Route::get('/user', function () {
        return view('dashboard.admin.user.index');
    });

    Route::get('/user/create', function () {
        return view('dashboard.admin.user.create');
    });

    Route::get('/user/edit', function () {
        return view('dashboard.admin.user.edit');
    });

    Route::get('/laporan', function () {
        return view('dashboard.admin.laporan.index');
    });

});

