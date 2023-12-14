<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\pinjamController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;

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
    return view('home', [
        "title" => "Home",
        "active" => "home"
    ]);
});
Route::get('/products', [HomeProductController::class, 'index']);
Route::get('/categories', [HomeProductController::class, 'kirim']);
Route::get('/categories/{category:slug}', [HomeProductController::class, 'show']);
Route::get('/products/{product:slug}', [HomeProductController::class, 'detail']);
Route::post('/pinjam-barang/{id}', [pinjamController::class, 'pinjamBarang'])->middleware('auth');
Route::get('/my-orders', [pinjamController::class, 'show'])->middleware('auth');
Route::resource('/profile', ProfileController::class);
/* Route::get('/profile/{id}/edit', [ProfileController::class, 'edit']);
Route::put('/profile/{id}', [ProfileController::class, 'update']); */

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('admin');
Route::resource('/dashboard/categories', CategoryController::class);
Route::resource('/dashboard/users', UserController::class);
Route::resource('/dashboard/products', ProductController::class);
Route::resource('/dashboard/orders', pinjamController::class);
Route::get('/dashboard/categories/checkSlug', [CategoryController::class, 'checkSlug']);
Route::post('/return-product/{id}', [pinjamController::class, 'returnBarang']);
Route::post('/request-return/{id}', [pinjamController::class, 'sendReturnRequest']);
Route::get('/cetak-pdf', [pinjamController::class, 'cetakPdf']);
