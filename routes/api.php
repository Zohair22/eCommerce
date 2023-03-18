<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [CategoryController::class, 'index'])->name('dashboard');
Route::get('/product/', [ProductController::class , 'index'])->name('product');
Route::get('/product/{product}/show', [ProductController::class , 'show'])->name('product.show');


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

//require __DIR__.'/auth.php';
