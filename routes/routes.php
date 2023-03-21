<?php


use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'verified'])->group(function () {
    Route::controller(CategoryController::class)->prefix('category')->group(function () {
        Route::get('/create', 'create')->name('category.create');
        Route::post('', 'store')->name('category.store');
        Route::get('/{category}/edit', 'edit')->name('category.edit');
        Route::patch('/{category}', 'update')->name('category.update');
        Route::get('/{category}', 'destroy')->name('category.destroy');
    });

    Route::controller(ProductController::class)->prefix('product')->group(function () {
        Route::get('/create', 'create')->name('product.create');
        Route::post('/', 'store')->name('product.store');
        Route::get('/{product}/edit', 'edit')->name('product.edit');
        Route::post('/{product}', 'update')->name('product.update');
        Route::get('/{product}', 'destroy')->name('product.destroy');

    });
});
