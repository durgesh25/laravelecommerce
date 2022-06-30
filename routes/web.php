<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;

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

Route::get('/shokkkk', function () {
    dd('test');
});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shops', [HomeController::class, 'shop'])->name('shop');
Route::get('/products/{id}', [HomeController::class, 'productdetail'])->name('product.detail');
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');


// admin routes
Route::prefix('admin')->group(function () {
Route::get("/dashboard", [AdminController::class,'dashboard']);
Route::resource("categories", CategoryController::class);
Route::resource("products", ProductController::class);
});
