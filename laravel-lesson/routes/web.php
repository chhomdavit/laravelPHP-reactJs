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

Route::get('/admin/categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
Route::get('/admin/categories/create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');
Route::post('/admin/categories', [\App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');
Route::get('/admin/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/admin/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'update'])->name('categories.update');

