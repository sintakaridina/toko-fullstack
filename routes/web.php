<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\VerifikasiController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('pesan/{id}', [App\Http\Controllers\PesanController::class, 'index'])->name('pesan');

Auth::routes();
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::post('pesan/{id}', [App\Http\Controllers\PesanController::class, 'pesan'])->name('pesan');
Route::post('cart/{id}', [App\Http\Controllers\CartController::class, 'add']);
Route::get('/cart/hapus/{id}',[App\Http\Controllers\CartController::class, 'delete']);
Route::get('/cart/checkout',[App\Http\Controllers\CartController::class, 'checkout']);
Route::get('/verif', [App\Http\Controllers\PembayaranController::class, 'upload'])->name('pembayaran');
Route::get('/verif/hapus/{id}', [App\Http\Controllers\PembayaranController::class, 'delete']);
Route::post('/verif/proses', [App\Http\Controllers\PembayaranController::class, 'proses_upload']);
Route::get('/profil', [App\Http\Controllers\ProfilController::class, 'index'])->name('edit-profil');
Route::post('/profil/edit', [App\Http\Controllers\ProfilController::class, 'update']);
Route::get('admin/login', [App\Http\Controllers\Auth\AdminAuthController::class, 'getLogin'])->name('admin.login');
Route::post('admin/login',[App\Http\Controllers\Auth\AdminAuthController::class, 'postLogin']);

Route::middleware('auth:admin')->group(function(){
    Route::resource('admin/post', AdminController::class);
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'home'])->name('admin.home');
    Route::get('admin/verifikasi', [App\Http\Controllers\VerifikasiController::class, 'index'])->name('admin.verifikasi');
    Route::get('admin/verifikasi_view/{id}', [App\Http\Controllers\VerifikasiController::class, 'view']);
    Route::post('admin/verifikasi/{id}', [App\Http\Controllers\VerifikasiController::class, 'update']);
   // Route::get('admin/home', [App\Http\Controllers\AdminController::class, 'index']);
    // Route::get('admin/show/{id}', [App\Http\Controllers\AdminController::class, 'show'])->name('show');
    
  });