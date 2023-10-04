<?php

use App\Http\Controllers\frontend\PageController;
use App\Http\Controllers\frontend\PageHomeController;
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

Route::get('/', [PageHomeController::class, 'Home'])->name('Home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/products', [PageController::class, 'products'])->name('products');
Route::get('/products/men', [PageController::class, 'productsMen'])->name('productsMen');
Route::get('/products/woman', [PageController::class, 'productsWoman'])->name('productsWoman');
Route::get('/products/children', [PageController::class, 'productsChildren'])->name('productsChildren');

Route::get('/product/productdetail', [PageController::class, 'productdetail'])->name('productdetail');
Route::get('/thankyou', [PageController::class, 'thankyou'])->name('thankyou');
Route::get('/cart', [PageController::class, 'cart'])->name('cart');
Route::get('/checkout', [PageController::class, 'checkout'])->name('checkout');
Route::get('/selecteditems', [PageController::class, 'selectedItems'])->name('selectedItems');




