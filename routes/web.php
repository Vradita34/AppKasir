<?php

use App\Http\Controllers\Users;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailPenjualanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RekapSuaraController;
use App\Http\Controllers\TempController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->middleware('guest')->name('login');
    Route::post('/auth', 'authenticate')->middleware('guest');
    Route::post('/logout', 'logout')->middleware('auth');
});

Route::controller(PasswordResetController::class)->group(function () {
    Route::get('/forgot_password', 'index')->middleware('guest')->name('password.request');
    Route::post('/forgot_password', 'sendResetLink')->middleware('guest')->name('password.email');
    Route::post('/users', 'sendResetLink')->middleware('auth')->name('admin.password.email');
    Route::get('/reset-password/{token}', 'showResetForm')->middleware('guest')->name('password.reset');
    Route::post('/reset-password', 'resetPassword')->middleware('guest')->name('password.update');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::controller(Users::class)->group(function () {
        Route::post('/add_users', 'register');
        Route::get('/users', 'index');
        Route::delete('/users/{id}', 'destroy');
        Route::put('/user/{user}', 'update')->name('user.update');
    });

    Route::controller(ProdukController::class)->group(function () {
        Route::get('/produk',  'index')->name('show.produk');
        Route::post('/produk',  'store')->name('add.produk');
        Route::put('/produk/{produk}',  'update')->name('update.produk');
        Route::delete('/produk/{id}', 'destroy')->name('delete.produk');
        Route::get('produk/export/excel', 'export')->name('export.excel');
        Route::post('produk/import/excel', 'import')->name('import.excel');
    });

    Route::controller(PelangganController::class)->group(function () {
        Route::get('/pelanggan', 'index')->name('show.pelanggan');
        Route::post('/pelanggan', 'store')->name('add.pelanggan');
        Route::put('/pelanggan/{pelanggan}', 'update')->name('edit.pelanggan');
        Route::delete('/pelanggan/{id}', 'destroy')->name('delete.pelanggan');
    });

    Route::controller(PenjualanController::class)->group(function () {
        Route::get('/penjualan', 'index')->name('show.penjualan');
        Route::get('/penjualan/transaksi/{id}', 'transaksi')->name('penjualan.transaksi');
        Route::post('/penjualan/transaksi/bayar', 'bayar')->name('penjualan.transaksi.bayar');
        Route::get('/penjualan/invoice/{nota}', 'invoice')->name('penjualan.invoice');
    });

    Route::controller((TempController::class))->group(function () {
        Route::post('penjualan/transaksi/addKeranjang', 'tambahKeranjang')->name('penjualan.add.keranjang');
        Route::delete('/penjualan/transaksi/{id_temp}', 'delete_keranjang')->name('penjualan.delete.keranjang');
    });

    Route::controller((PdfController::class))->group(function () {
        Route::get('print/incoice/{nota}', 'invoice')->name('printInvoice');
    });
    Route::controller((RekapSuaraController::class))->group(function () {
        Route::get('rekapsuara', 'index')->name('datarekap');
        Route::post('rekapsuara/add', 'tambahsuara')->name('datarekap.add');
    });
});
