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

    Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout']);
    // Route::get('/admin/dashboard', [\App\Http\Controllers\DashbordController::class, 'dashboard'])->name('admin.dashboard');


    Route::controller(\App\Http\Controllers\PageController::class)->group(function(){
        Route::get('/profile', 'index')->name('pages.profile.index');
        Route::post('/profile', 'store')->name('pages.profile.store');
        Route::put('/profile/{profile}', 'update')->name('pages.profile.update');
        Route::delete('/profile/{profile}', 'forceDestroy')->name('pages.profile.forceDestroy');
    });

    Route::controller(\App\Http\Controllers\PageController::class)->group(function(){
        Route::get('/cart', 'indexCart')->name('pages.cart.index');
        Route::post('/cart', 'addToCart')->name('pages.cart.addToCart');
        Route::put('/{cart}', 'updateCart')->name('pages.cart.updateCart');
        Route::delete('/cart/{cart}', 'forceDestroyCart')->name('pages.cart.forceDestroy');
        Route::post('/checkout', 'storeCheckout')->name('pages.cart.storeCheckout');
    });

    Route::controller(\App\Http\Controllers\PageController::class)->group(function(){
        Route::get('/checkout', 'indexCheckout')->name('pages.checkout.index');
    });

    Route::controller(\App\Http\Controllers\PageController::class)->group(function(){
        Route::get('/wishlist', 'indexWishlist')->name('pages.wishlist.index');
        Route::post('/wishlist', 'addToWishlist')->name('pages.wishlist.addToWishlist');
        Route::delete('/wishlist/{wishlist}', 'forceDestroyWishlist')->name('pages.wishlist.forceDestroy');
    });



    Route::group([
        'middleware' => 'admin_role'
    ], function () {

         Route::get('/admin/dashboard', [\App\Http\Controllers\DashbordController::class, 'dashboard'])->name('admin.dashboard');

        Route::group([
            'prefix' => 'admin/categories'
        ], function () {
            Route::get('/', [\App\Http\Controllers\CategoryController::class, 'index'])->name('admin.categories.index');
            Route::post('/', [\App\Http\Controllers\CategoryController::class, 'store'])->name('admin.categories.store');
            Route::put('/{category}', [\App\Http\Controllers\CategoryController::class, 'update'])->name('admin.categories.update');
            Route::delete('/{category}', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('admin.categories.destroy');
        });

        Route::group([
            'prefix' => '/admin/users'
        ], function () {
            Route::get('/', [\App\Http\Controllers\UserController::class, 'index'])->name('admin.users.index');
            Route::post('/', [\App\Http\Controllers\UserController::class, 'store'])->name('admin.users.store');
            // Route::put('/{cart}', [\App\Http\Controllers\CartController::class, 'update'])->name('admin.carts.update');
            // Route::delete('/{cart}', [\App\Http\Controllers\CartController::class, 'forceDestroy'])->name('admin.carts.forceDestroy');
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

    Route::group([
        'prefix' => '/admin/products'
    ], function () {
        Route::get('/', [\App\Http\Controllers\ProductController::class, 'index'])->name('admin.products.index');
        Route::post('/', [\App\Http\Controllers\ProductController::class, 'store'])->name('admin.products.store');
        Route::put('/{product}', [\App\Http\Controllers\ProductController::class, 'update'])->name('admin.products.update')->middleware('can:deleteproduct,product');
        Route::delete('/{product}', [\App\Http\Controllers\ProductController::class, 'forceDestroy'])->name('admin.products.forceDestroy')->middleware('can:updateProduct,product');
    });

    Route::group([
        'prefix' => '/admin/carts'
    ], function () {
        Route::get('/', [\App\Http\Controllers\CartController::class, 'index'])->name('admin.carts.index');
        Route::put('/{cart}', [\App\Http\Controllers\CartController::class, 'update'])->name('admin.carts.update');
        Route::delete('/{cart}', [\App\Http\Controllers\CartController::class, 'forceDestroy'])->name('admin.carts.forceDestroy');
    });

    Route::group([
        'prefix' => '/admin/profiles'
    ], function () {
        Route::get('/', [\App\Http\Controllers\ProfileController::class, 'index'])->name('admin.profiles.index');
        Route::post('/', [\App\Http\Controllers\ProfileController::class, 'store'])->name('admin.profiles.store');
        Route::put('/{profile}', [\App\Http\Controllers\ProfileController::class, 'update'])->name('admin.profiles.update');
        Route::delete('/{profile}', [\App\Http\Controllers\ProfileController::class, 'forceDestroy'])->name('admin.profiles.forceDestroy');
    });

    Route::group([
        'prefix' => '/admin/wishlists'
    ], function () {
        Route::get('/', [\App\Http\Controllers\WishlistController::class, 'index'])->name('admin.wishlists.index');
        Route::put('/{wishlist}', [\App\Http\Controllers\WishlistController::class, 'update'])->name('admin.wishlists.update');
        Route::delete('/{wishlist}', [\App\Http\Controllers\WishlistController::class, 'forceDestroy'])->name('admin.wishlists.forceDestroy');
    });

    // Route::controller(\App\Http\Controllers\WishlistController::class)->group(function(){
    //     Route::get('/admin/wishlists', 'index');
    // });
});


