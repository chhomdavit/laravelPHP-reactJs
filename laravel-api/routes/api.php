<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProdcutController;
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


Route::group([
    'prefix' => '/categories'
], function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::post('/', [CategoryController::class, 'store']);
    Route::put('/{category}', [CategoryController::class, 'update']);
    Route::delete('/{category}', [CategoryController::class, 'destroy']);
    Route::delete('/{category}', [CategoryController::class, 'forceDestroy']);
});

Route::group([
    'prefix' => '/products'
], function () {
    Route::get('/', [ProdcutController::class, 'index']);
    Route::post('/', [ProdcutController::class, 'store']);
    Route::put('/{product}', [ProdcutController::class, 'update']);
    Route::delete('/{product}', [ProdcutController::class, 'forceDestroy']);
});

// Route::group([
//     'prefix' => '/products'
// ], function () {
//     Route::get('/', [ProdcutController::class, 'index']);
//     Route::post('/', [ProdcutController::class, 'store']);
//     Route::put('/{product}', [ProdcutController::class, 'update']);
//     Route::delete('/{product}', [ProdcutController::class, 'forceDestroy']);
// });
