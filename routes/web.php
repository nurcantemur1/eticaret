<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\frontend\PageController;
use App\Http\Controllers\frontend\PageHomeController;
use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware' => 'sitesetting'], function () {
    Route::get('/', [PageHomeController::class, 'Home'])->name('Home');
    Route::get('/about', [PageController::class, 'about'])->name('about');
    Route::get('/contact', [PageController::class, 'contact'])->name('contact');
    Route::post('/contact/save', [AjaxController::class, 'contactsave'])->name('contact/save');

    Route::get('/products', [PageController::class, 'products'])->name('products');

    Route::get('/Men/{slug?}', [PageController::class, 'products'])->name('Men');
    Route::get('/Woman/{slug?}', [PageController::class, 'products'])->name('Woman');
    Route::get('/Children/{slug?}', [PageController::class, 'products'])->name('Children');

    Route::get('/productdetail/{id}', [PageController::class, 'productdetail'])->name('productdetail');
    Route::get('/thankyou', [PageController::class, 'thankyou'])->name('thankyou');

    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

    //Route::post('/cart/add', [CartController::class, 'added'])->name('cart/add');

    Route::get('/checkout', [PageController::class, 'checkout'])->name('checkout');
    Route::get('/selecteditems', [PageController::class, 'selectedItems'])->name('selectedItems');
    Auth::routes();
    Route::get('/logout', [AjaxController::class, 'logout'])->name('logout');

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
