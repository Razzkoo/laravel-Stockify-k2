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

    // profile & settings
    Route::get('/profile', function () {
        return view('dashboard.admin.profile.index');
    });

    Route::get('/settings', function () {
        return view('dashboard.admin.settings.index');
    });

    Route::get('/settings/change_password', function () {
        return view('dashboard.admin.settings.change_password');
    });

    Route::get('/pengaturan', function () {
        return view('dashboard.admin.pengaturan.index');
    });

    // product
    Route::get('/product', function () {
        return view('dashboard.admin.product.index');
    });

    Route::get('/product/kategori', function () {
        return view('dashboard.admin.product.kategori');
    });

    Route::get('/product/tambah', function () {
        return view('dashboard.admin.product.tambah');
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

    // supplier
    Route::get('/supplier', function () {
        return view('dashboard.admin.supplier.index');
    });

    Route::get('/supplier/create', function () {
        return view('dashboard.admin.supplier.create');
    });

    Route::get('/supplier/edit', function () {
        return view('dashboard.admin.supplier.edit');
    });

    // stock
    Route::get('/stock', function () {
        return view('dashboard.admin.stock.index');
    });

    Route::get('/stock/history', function () {
        return view('dashboard.admin.stock.history');
    });

    Route::get('/stock/opname', function () {
        return view('dashboard.admin.stock.opname');
    });

    Route::get('/stock/minimum', function () {
        return view('dashboard.admin.stock.minimum');
    });

    // user
    Route::get('/user', function () {
        return view('dashboard.admin.user.index');
    });

    Route::get('/user/create', function () {
        return view('dashboard.admin.user.create');
    });

    Route::get('/user/edit', function () {
        return view('dashboard.admin.user.edit');
    });

    // laporan
    Route::get('/laporan', function () {
        return view('dashboard.admin.laporan.index');
    });

    Route::get('/laporan/aktivitas', function () {
        return view('dashboard.admin.laporan.aktivitas');
    });

    Route::get('/laporan/stock', function () {
        return view('dashboard.admin.laporan.stock');
    });

    Route::get('/laporan/periode', function () {
        return view('dashboard.admin.laporan.periode');
    });

});

/* ================= DASHBOARD MANAJER ================= */

Route::prefix('dashboard/manajer')->group(function () {

    Route::get('/', function () {
        return view('dashboard.manajer.index');
    });

    // profile & settings
    Route::get('/profile', function () {
        return view('dashboard.manajer.profile.index');
    });

    Route::get('/settings', function () {
        return view('dashboard.manajer.settings.index');
    });

    Route::get('/settings/change_password', function () {
        return view('dashboard.manajer.settings.change_password');
    });

    // product
    Route::get('/product', function () {
        return view('dashboard.manajer.product.index');
    });

    Route::get('/product/kategori', function () {
        return view('dashboard.manajer.product.kategori');
    });

    Route::get('/product/atribut', function () {
        return view('dashboard.manajer.product.atribut');
    });

    Route::get('/product/create', function () {
        return view('dashboard.manajer.product.create');
    });

    Route::get('/product/edit', function () {
        return view('dashboard.manajer.product.edit');
    });

    // supplier
    Route::get('/supplier', function () {
        return view('dashboard.manajer.supplier.index');
    });

    Route::get('/supplier/create', function () {
        return view('dashboard.manajer.supplier.create');
    });

    // stock
    Route::get('/stock', function () {
        return view('dashboard.manajer.stock.index');
    });

    Route::get('/stock/transaksi', function () {
        return view('dashboard.manajer.stock.transaksi');
    });

    Route::get('/stock/minimum', function () {
        return view('dashboard.manajer.stock.minimum');
    });

    // laporan
    Route::get('/laporan', function () {
        return view('dashboard.manajer.laporan.index');
    });

    Route::get('/laporan/transaksi', function () {
        return view('dashboard.manajer.laporan.transaksi');
    });

    Route::get('/laporan/stock', function () {
        return view('dashboard.manajer.laporan.stock');
    });

});

/* ================= DASHBOARD STAFF ================= */

Route::prefix('dashboard/staff')->group(function () {

    Route::get('/', function () {
        return view('dashboard.staff.index');
    });

    // profile & settings
    Route::get('/profile', function () {
        return view('dashboard.staff.profile.index');
    });

    Route::get('/settings', function () {
        return view('dashboard.staff.settings.index');
    });

    Route::get('/settings/change_password', function () {
        return view('dashboard.staff.settings.change_password');
    });

    //stock
    Route::get('/stock', function () {
        return view('dashboard.staff.stock.index');
    });

    Route::get('/stock/barang_masuk', function () {
        return view('dashboard.staff.stock.barang_masuk');
    });

    Route::get('/stock/barang_keluar', function () {
        return view('dashboard.staff.stock.barang_keluar');
    });
    
});