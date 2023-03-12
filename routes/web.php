<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });


    Route::controller(CategoryController::class)->group(function () {
        Route::get('/', 'index')->name('dashboard');
        Route::get('/category/create', 'create')->name('category.create');
        Route::post('/category', 'store')->name('category.store');
        Route::get('/category/{category}/edit', 'edit')->name('category.edit');
        Route::patch('/category/{category}', 'update')->name('category.update');
        Route::get('/category/{category}', 'destroy')->name('category.destroy');
    });


    Route::controller(ProductController::class)->prefix('product')->group(function () {
        Route::get('/', 'index')->name('product');
        Route::get('/create', 'create')->name('product.create');
        Route::post('/', 'store')->name('product.store');
        Route::get('/{product}/edit', 'edit')->name('product.edit');
        Route::patch('/{product}', 'update')->name('product.update');
        Route::get('/{product}', 'destroy')->name('product.destroy');
    });


});

require __DIR__.'/auth.php';
