<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->middleware(['CheckLevel:admin'])->name('user.index');
Route::get('user/create', [App\Http\Controllers\UserController::class, 'create'])->middleware(['CheckLevel:admin'])->name('user.create');
Route::post('user/store', [App\Http\Controllers\UserController::class, 'store'])->middleware(['CheckLevel:admin'])->name('user.store');
Route::get('user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->middleware(['CheckLevel:admin'])->name('user.edit');
Route::put('user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->middleware(['CheckLevel:admin'])->name('user.update');
Route::get('user/show/{id}', [App\Http\Controllers\UserController::class, 'show'])->middleware(['CheckLevel:admin'])->name('user.show');
Route::delete('user/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->middleware(['CheckLevel:admin'])->name('user.delete');

Route::get('/pengaduan', [App\Http\Controllers\PengaduanController::class, 'index'])->middleware(['CheckLevel:admin'])->name('pengaduan.index');
Route::get('pengaduan/create', [App\Http\Controllers\PengaduanController::class, 'create'])->middleware(['CheckLevel:masyarakat'])->name('pengaduan.create');
Route::post('pengaduan/store', [App\Http\Controllers\PengaduanController::class, 'store'])->middleware(['auth'])->name('pengaduan.store');
Route::get('pengaduan/edit/{id}', [App\Http\Controllers\PengaduanController::class, 'edit'])->middleware(['CheckLevel:admin'])->name('pengaduan.edit');
Route::put('pengaduan/update/{id}', [App\Http\Controllers\PengaduanController::class, 'update'])->middleware(['CheckLevel:admin'])->name('pengaduan.update');
Route::get('pengaduan/show/{id}', [App\Http\Controllers\PengaduanController::class, 'show'])->middleware(['CheckLevel:masyarakat'])->name('pengaduan.show');
Route::delete('pengaduan/delete/{id}', [App\Http\Controllers\PengaduanController::class, 'destroy'])->middleware(['CheckLevel:admin'])->name('pengaduan.delete');
Route::get('pengaduan/hapusitem/{id}', [App\Http\Controllers\PengaduanController::class, 'hapusitem'])->middleware(['CheckLevel:admin'])->name('pengaduan.hapusitem');

Auth::routes();

// AKSES MASYARAKAT


Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');