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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['guest:api', 'verified'])->group(function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/product/', [ProductController::class, 'index']);
    Route::get('/product/{product}/show', [ProductController::class, 'show']);
});

Route::middleware(['auth:api', 'verified'])->group(function () {
    Route::controller(CategoryController::class)->prefix('category')->group(function () {
        Route::get('/create', 'create');
        Route::post('', 'store');
        Route::get('/{category}/edit', 'edit');
        Route::patch('/{category}', 'update');
        Route::get('/{category}', 'destroy');
    });

    Route::controller(ProductController::class)->prefix('product')->group(function () {
        Route::get('/create', 'create');
        Route::post('/', 'store');
        Route::get('/{product}/edit', 'edit');
        Route::post('/{product}', 'update');
        Route::get('/{product}', 'destroy');
    });
});

//require __DIR__.'/auth.php';
