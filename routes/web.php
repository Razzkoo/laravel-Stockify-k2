<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home and Dashboard Routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard/admin', function () {
    return view('dashboard.admin.index');
});
// Supplier Routes
Route::get('/dashboard/admin/supplier', [App\Http\Controllers\SupplierController::class, 'index'])->name('supplier.index');
Route::get('/dashboard/admin/supplier/create', [App\Http\Controllers\SupplierController::class, 'create'])->name('supplier.create');
Route::post('/dashboard/admin/supplier/store', [App\Http\Controllers\SupplierController::class, 'store'])->name('supplier.store');
Route::get('/dashboard/admin/supplier/edit/{supplier}', [App\Http\Controllers\SupplierController::class, 'edit'])->name('supplier.edit');
Route::put('/dashboard/admin/supplier/update/{supplier}', [App\Http\Controllers\SupplierController::class, 'update'])->name('supplier.update');
Route::delete('/dashboard/admin/supplier/destroy/{supplier}', [App\Http\Controllers\SupplierController::class, 'destroy'])->name('supplier.destroy');

//admin users
Route::get('/dashboard/admin/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
Route::get('/dashboard/admin/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
Route::post('/dashboard/admin/user/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
Route::get('/dashboard/admin/user/edit/{user}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::put('/dashboard/admin/user/update/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::delete('/dashboard/admin/user/destroy/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
