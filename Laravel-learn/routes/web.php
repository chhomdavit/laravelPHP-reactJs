<?php

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

Route::get('/', [\App\Http\Controllers\PageController::class, 'home'])->name('pages.home');
Route::get('/about', [\App\Http\Controllers\PageController::class, 'about'])->name('pages.about');

Auth::routes();

Route::group([
    'middleware' => 'auth'
], function () {

    Route::group([
        'middleware' => 'admin_role'
    ], function () {
        Route::group([
            'prefix' => 'admin/categories'
        ], function () {
            Route::get('/', [\App\Http\Controllers\CategoryController::class, 'index'])->name('admin.categories.index');
            Route::post('/', [\App\Http\Controllers\CategoryController::class, 'store'])->name('admin.categories.store');
            Route::put('/{category}', [\App\Http\Controllers\CategoryController::class, 'update'])->name('admin.categories.update');
            Route::delete('/{category}', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('admin.categories.destroy');
        });
    });



    Route::group([
        'prefix' => '/admin/posts'
    ], function () {
        Route::get('/', [\App\Http\Controllers\PostController::class, 'index'])->name('admin.posts.index');
        Route::post('/', [\App\Http\Controllers\PostController::class, 'store'])->name('admin.posts.store');
        Route::put('/{post}', [\App\Http\Controllers\PostController::class, 'update'])->name('admin.posts.update');
        // Route::delete('/{post}', [\App\Http\Controllers\PostController::class, 'destroy'])->name('admin.posts.destroy');
        Route::delete('/{post}', [\App\Http\Controllers\PostController::class, 'forceDestroy'])->name('admin.posts.forceDestroy');
    });
});


