<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\KurirController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserTransaksiController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return view('home');
});

Route::get('logout', [Auth::class, 'logout'], function () {
    return abort(404);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('barangs', BarangController::class);
Route::resource('pegawais', PegawaiController::class);
Route::resource('kurirs', KurirController::class);
Route::resource('transaksis', TransaksiController::class);
Route::get('transaksis/cetak_pdf/{transaksis}', [TransaksiController::class, 'cetak_pdf'])->name('transaksis.cetak_pdf');

Route::prefix('user')->middleware('auth')->group(function(){
    Route::get('/barangs', [UserController::class, 'barangs'])->name('user.barangs');
    Route::get('/pegawais', [UserController::class, 'pegawais'])->name('user.pegawais');
    Route::get('/kurirs', [UserController::class, 'kurirs'])->name('user.kurirs');
});

Route::resource('user_transaksis', UserTransaksiController::class);
Route::get('user_transaksis/cetak_pdf/{user_transaksis}', [UserTransaksiController::class, 'cetak_pdf'])->name('user_transaksis.cetak_pdf');