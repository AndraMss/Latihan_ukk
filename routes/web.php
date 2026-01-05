<?php

use App\Http\Controllers\barangController;
use App\Http\Controllers\testController;
use App\Http\Controllers\transaksiController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/barang', [barangController::class, 'index'])->name('barang.index');
Route::get('/barang/create', [barangController::class, 'create'])->name('barang.create');
Route::post('/barang', [barangController::class, 'store'])->name('barang.store');
Route::get('/barang/{id}/edit', [barangController::class, 'edit'])->name('barang.edit');
Route::put('/barang/{id}/update', [barangController::class, 'update'])->name('barang.update');
Route::get('/barang/{barang}', [barangController::class, 'show'])->name('barang.show');
Route::delete('/barang/{id}', [barangController::class, 'destroy'])->name('barang.destroy');

Route::get('/transaksi', [transaksiController::class, 'index'])->name('transaksi.index');
Route::get('/transaksi/create', [transaksiController::class, 'create'])->name('transaksi.create');
Route::post('/transaksi', [transaksiController::class, 'store'])->name('transaksi.store');
Route::get('/transaksi/{id}/edit', [transaksiController::class, 'edit'])->name('transaksi.edit');
Route::get('/transaksi/{transaksi}', [transaksiController::class, 'show'])->name('transaksi.show');
Route::delete('/transaksi/{transaksi}', [transaksiController::class, 'destroy'])->name('transaksi.destroy');

Route::get('/sigma', [testController::class, 'index'])->name('test.index');