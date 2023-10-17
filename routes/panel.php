<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SliderController;
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

Route::group(['middleware' => ['panelsetting','auth'],'prefix'=>'panel','as'=>'panel/'], function () {
    Route::get('/', [DashboardController::class, 'Index'])->name('Index');
    Route::get('/slider', [SliderController::class, 'Index'])->name('Slider/Index');

});
