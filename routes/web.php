<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('pesan/{id}', [App\Http\Controllers\PesanController::class, 'index'])->name('pesan');

Auth::routes();

Route::post('pesan/{id}', [App\Http\Controllers\PesanController::class, 'pesan'])->name('pesan');

Route::get('admin/login', [App\Http\Controllers\Auth\AdminAuthController::class, 'getLogin'])->name('admin.login');
Route::post('admin/login',[App\Http\Controllers\Auth\AdminAuthController::class, 'postLogin'])->name('admin.index');;

Route::middleware('auth:admin')->group(function(){
    Route::resource('admin/post', AdminController::class);
    Route::get('admin/verifikasi', [App\Http\Controllers\VerifikasiController::class, 'index']);
    Route::put('admin/verifikasi/{id}', [App\Http\Controllers\VerifikasiController::class, 'update']);
   // Route::get('admin/home', [App\Http\Controllers\AdminController::class, 'index']);
    // Route::get('admin/show/{id}', [App\Http\Controllers\AdminController::class, 'show'])->name('show');
    
  });