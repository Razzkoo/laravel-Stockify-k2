<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController; 
use App\Http\Controllers\StockTransactionController;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\UserRequestController; 
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockOpnameController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home and Dashboard Routes
Route::get('/', function () {
    return view('welcome');
});
//LOGINN
Route::get('auth/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login.post');
Route::post('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('auth/register', [AuthController::class, 'showRegisterForm'])->name('auth.register');
Route::post('auth/register', [AuthController::class, 'register'])->name('auth.register.post');

//ADMIN
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard/admin', [DashboardController::class, 'admin'])
        ->name('dashboard.admin.dashboard');
    //Profile
    Route::get('dashboard/admin/profile', [ProfileController::class, 'index'])->name('admin.profile.index');
    Route::post('dashboard/admin/profile/update', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::get('dashboard/admin/settings', [SettingController::class, 'index'])->name('admin.setting.index');
    Route::post('dashboard/admin/settings/update', [SettingController::class, 'update'])->name('admin.setting.update');

    //produk
    Route::get('dashboard/admin/produk', [ProductController::class, 'index'])->name('admin.product.index');
    Route::get('dashboard/admin/produk/create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::post('dashboard/admin/produk', [ProductController::class, 'store'])->name('admin.product.store');
    Route::get('dashboard/admin/produk/{product}/edit', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::put('dashboard/admin/produk/{product}', [ProductController::class, 'update'])->name('admin.product.update');
    Route::delete('/dashboard/admin/produk/{product}', [ProductController::class, 'destroy'])->name('admin.product.destroy');

    Route::get('dashboard/admin/produk/export', [ProductController::class, 'export'])->name('admin.product.export');
    Route::post('dashboard/admin/produk/import', [ProductController::class, 'import'])->name('admin.product.import');
    //Kategori
    Route::get('dashboard/admin/kategori', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('dashboard/admin/kategori/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('dashboard/admin/kategori', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('dashboard/admin/kategori/{category}', [CategoryController::class, 'show'])->name('admin.categories.show');
    Route::delete('dashboard/admin/kategori/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    //Stock
    Route::get('dashboard/admin/masuk', [StockTransactionController::class, 'adminMasuk'])->name('admin.stock.masuk');
    Route::get('dashboard/admin/keluar', [StockTransactionController::class, 'adminKeluar'])->name('admin.stock.keluar');

    Route::get('dashboard/admin/stockopname', [StockOpnameController::class, 'admin'])->name('admin.stock.opname');
    Route::post('dashboard/admin/stockopname', [StockOpnameController::class, 'adminStore'])->name('admin.stock.opname.store');
    //supplier
    Route::get('dashboard/admin/supplier', [SupplierController::class, 'index'])->name('admin.supplier.index');
    Route::get('dashboard/admin/supplier/create', [SupplierController::class, 'create'])->name('admin.supplier.create');
    Route::post('dashboard/admin/supplier', [SupplierController::class, 'store']) ->name('admin.supplier.store');
    Route::get('dashboard/admin/supplier/{supplier}/edit', [SupplierController::class, 'edit'])->name('admin.supplier.edit');
    Route::put('dashboard/admin/supplier/{supplier}', [SupplierController::class, 'update'])->name('admin.supplier.update');
    Route::delete('dashboard/admin/supplier/{supplier}', [SupplierController::class, 'destroy'])->name('admin.supplier.destroy');
    //user list
    Route::get('dashboard/admin/user', [UserController::class, 'index'])->name('admin.user.index');
    Route::get('dashboard/admin/user/create', [UserController::class, 'create'])->name('admin.user.create');
    Route::post('dashboard/admin/user', [UserController::class, 'store'])->name('admin.user.store');
    Route::get('dashboard/admin/user/{user}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::put('dashboard/admin/user/{user}', [UserController::class, 'update'])->name('admin.user.update');
    Route::delete('dashboard/admin/user/{user}', [UserController::class, 'destroy'])->name('admin.user.destroy');
    //user request
    Route::get('dashboard/admin/userlogin', [UserRequestController::class, 'index'])->name('admin.userlogin.index');
    Route::post('dashboard/admin/userlogin/{userRequest}/approve', [UserRequestController::class, 'approve'])->name('admin.userlogin.approve');
    Route::post('dashboard/admin/userlogin/{userRequest}/reject', [UserRequestController::class, 'reject'])->name('admin.userlogin.reject');
    Route::delete('dashboard/admin/userlogin/{userRequest}', [UserRequestController::class, 'destroy'])->name('admin.userlogin.destroy');
    //Report
    Route::get('dashboard/admin/report', [ReportController::class, 'index'])->name('admin.report.index');
    Route::get('dashboard/admin/report/stok', [ReportController::class, 'stok'])->name('admin.report.stok');
    Route::get('dashboard/admin/report/stok/export',[ReportController::class, 'exportStok'])->name('admin.report.stok.export');
    Route::get('dashboard/admin/report/transaksi', [ReportController::class, 'transaksi'])->name('admin.report.transaction');
    Route::get('dashboard/admin/report/transaksi/export', [ReportController::class, 'exportTransaksi'])->name('admin.report.transaction.export');
    Route::get('/dashboard/admin/report/activity',[ReportController::class, 'activity'])->name('admin.report.activity');
    Route::delete('/dashboard/admin/report/activity/{id}',[ReportController::class, 'destroyActivity'])->name('admin.report.activity.delete');
    Route::delete('/dashboard/admin/report/activity',[ReportController::class, 'destroyAllActivity'])->name('admin.report.activity.deleteAll');

    
});

//MANAJER
Route::middleware(['auth', 'role:manajer_gudang'])->group(function () {
    Route::get('/dashboard/manajer', [DashboardController::class, 'manajer'])
        ->name('dashboard.manajer.dashboard');
    //profile
    Route::get('dashboard/manajer/profile', [ProfileController::class, 'manajer'])->name('manajer.profile.index');
    Route::post('dashboard/manajer/profile/update', [ProfileController::class, 'update'])->name('manajer.profile.update');
    //produk
    Route::get('dashboard/manajer/produk', [ProductController::class, 'manajer'])->name('manajer.product.index');
    //supplier
    Route::get('dashboard/manajer/supplier', [SupplierController::class, 'manajer'])->name('manajer.supplier.index');
    //stock
    Route::get('dashboard/manajer/masuk', [StockTransactionController::class, 'indexMasuk'])->name('manajer.stock.masuk');
    Route::post('dashboard/manajer/masuk', [StockTransactionController::class, 'storeMasuk'])->name('manajer.stock.masuk.store');
    Route::delete('dashboard/manajer/masuk/{transaction}', [StockTransactionController::class, 'destroy'])->name('manajer.stock.masuk.destroy');
    Route::get('dashboard/manajer/keluar', [StockTransactionController::class, 'indexKeluar'])->name('manajer.stock.keluar');
    Route::post('dashboard/manajer/keluar', [StockTransactionController::class, 'storeKeluar'])->name('manajer.stock.keluar.store');
    Route::delete('dashboard/manajer/keluar/{transaction}', [StockTransactionController::class, 'destroy'])->name('manajer.stock.keluar.destroy');

    Route::get('dashboard/manajer/stockopname', [StockOpnameController::class, 'manager'])->name('manajer.stock.stockopname');
    Route::post('dashboard/manajer/stockopname/approve', [StockOpnameController::class, 'approve'])->name('manajer.stock.approve');
    Route::post('/dashboard/manajer/stockopname/reject',[StockOpnameController::class, 'reject'])->name('manajer.stock.reject');

    //Report
    Route::get('dashboard/manajer/report', [ReportController::class, 'manajer'])->name('manajer.report.index');
    Route::get('dashboard/manajer/report/stok', [ReportController::class, 'manajerStok'])->name('manajer.report.stok');
    Route::get('dashboard/manajer/report/stok/export',[ReportController::class, 'manajerExport'])->name('manajer.report.stok.export');
    Route::get('dashboard/manajer/report/transaksi', [ReportController::class, 'manajerTransaksi'])->name('manajer.report.transaction');
    Route::get('dashboard/manajer/report/transaksi/export', [ReportController::class, 'manajerExportTransaksi'])->name('manajer.report.transaction.export');
    
});

//STAFF
Route::middleware(['auth', 'role:staff_gudang'])->group(function () {
    Route::get('/dashboard/staff', [DashboardController::class, 'staff'])
        ->name('dashboard.staff.dashboard');
    //profile
    Route::get('dashboard/staff/profile', [ProfileController::class, 'staff'])->name('staff.profile.index');
    Route::post('dashboard/staff/profile/update', [ProfileController::class, 'update'])->name('staff.profile.update');
    //stock
    Route::get('/dashboard/staff/masuk', [StockOpnameController::class, 'index'])->name('staff.stock.stockopname');
    Route::post('/dashboard/staff/masuk', [StockOpnameController::class, 'store'])->name('staff.stock.stockopname.store');

    Route::get('/dashboard/staff/keluar', [StockOpnameController::class, 'stockOutIndex'])->name('staff.stock.stockout');
    Route::post('/dashboard/staff/keluar', [StockOpnameController::class, 'stockOutStore'])->name('staff.stock.stockout.store');
});

//LOGOUT
Route::post('/logout', function () {
    Auth::logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect()->route('auth.login');
})->middleware('auth')->name('logout');
