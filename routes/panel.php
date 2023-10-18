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
    Route::get('/slider/Create', [SliderController::class, 'Create'])->name('Slider/Create');
    Route::post('/slider/Add', [SliderController::class, 'Add'])->name('Slider/Add');

    Route::post('/slider/Edit/{id}', [SliderController::class, 'Edit'])->name('Slider/Edit');
    Route::put('/slider/Update/{id}', [SliderController::class, 'Update'])->name('Slider/Update');

    Route::post('/slider/Delete/{id}', [SliderController::class, 'Delete'])->name('Slider/Delete');

    Route::get('/category', [SliderController::class, 'Index'])->name('category/Index');
    Route::get('/category/Create', [SliderController::class, 'Create'])->name('category/Create');
    Route::post('/category/Add', [SliderController::class, 'Add'])->name('category/Add');

    Route::post('/category/Edit/{id}', [SliderController::class, 'Edit'])->name('category/Edit');
    Route::put('/category/Update/{id}', [SliderController::class, 'Update'])->name('category/Update');

    Route::post('/category/Delete/{id}', [SliderController::class, 'Delete'])->name('category/Delete');

});
