<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\pinjamController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;

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
Route::get('/products/{product:slug}', [ProductController::class, 'show']);

//Route::get('/products', [ProductController::class, 'index']);
Route::get('/categories', [CategoryController::class, 'show']);
Route::get('/categories/{category:slug}', [CategoryController::class, 'index']);


//Route::get('/products/{product:slug}', [ProductController::class, 'show']);

Route::get('/login', [LoginController::class, 'index']);

Route::get('/register', [RegisterController::class, 'index']);

//Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
});
Route::get('/products', [ProductController::class, 'index']);
Route::post('/pinjam-barang/{id}', [pinjamController::class, 'pinjam_store']);

// Route::resource('/dashboard/categories', [CategoryController::class, 'index']);

// Route::resource('/dashboard/users', [UserController::class, 'index']);

// Route::resource('/dashboard/products', [ProductController::class, 'index']);

