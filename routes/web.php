<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/test', function(){
    return ;
});

Route::get('/dashboard', function () {
    return view('page.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/brand/{slug}', [BrandController::class, 'show'])->name('brand.show');

Route::get('brands', [BrandController::class, 'index'])->name('brand.index');

Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');

Route::get('categories', [CategoryController::class, 'index'])->name('category.index');

Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');

Route::get('/products', [ProductController::class, 'index'])->name('product.index');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');


require __DIR__.'/auth.php';
