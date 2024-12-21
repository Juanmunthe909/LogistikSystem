<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BarangKeluarController;
use App\Http\Controllers\Admin\BarangMasukController;
use App\Http\Controllers\Admin\StokBarangController;


Route::group(['domain' => ''], function () {
    Route::prefix('admin/')->name('admin.')->group(function () {
        Route::middleware('can:Admin')->group(function () {
            Route::redirect('/', 'dashboard', 301);
            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
            Route::get('logout', [AuthController::class, 'do_logout'])->name('logout');

            Route::resource('barangkeluar', BarangKeluarController::class);
            Route::resource('stokbarang', StokBarangController::class);
            Route::resource('barangmasuk', BarangMasukController::class);
        });
    });
});
