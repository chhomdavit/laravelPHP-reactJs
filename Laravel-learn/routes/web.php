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

    Route::controller(\App\Http\Controllers\PageController::class)->group(function(){
        Route::get('/profile', 'index')->name('pages.profile.index');
        Route::post('/profile', 'store')->name('pages.profile.store');
        Route::put('/profile/{user}', 'update')->name('pages.profile.update');
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
        Route::get('/order', 'indexOrder')->name('pages.order.index');
    });

    Route::controller(\App\Http\Controllers\PageController::class)->group(function(){
        Route::get('/checkout', 'indexCheckout')->name('pages.checkout.index');
    });

    Route::controller(\App\Http\Controllers\PageController::class)->group(function(){
        Route::get('/wishlist', 'indexWishlist')->name('pages.wishlist.index');
        Route::post('/wishlist', 'addToWishlist')->name('pages.wishlist.addToWishlist');
        Route::delete('/wishlist/{wishlist}', 'forceDestroyWishlist')->name('pages.wishlist.forceDestroy');
    });

    // ===================== Admin  ========================

    Route::prefix('admin')->middleware(['auth' ,'admin_role'])->group(function(){

        Route::controller(\App\Http\Controllers\DashbordController::class)->group(function(){
            Route::get('/', 'dashboard')->name('admin.dashboard');
        });

        Route::middleware(['auth', 'role:Admin'])->group(function () {

            Route::controller(\App\Http\Controllers\CategoryController::class)->group(function(){
                Route::get('/categories', 'index')->name('admin.categories.index');
                Route::post('/categories', 'store')->name('admin.categories.store');
                Route::put('/categories/{category}', 'update')->name('admin.categories.update');
                Route::delete('/categories/{category}', 'forceDestroy')->name('admin.categories.forceDestroy');
            });

            Route::controller(\App\Http\Controllers\UserController::class)->group(function(){
                Route::get('/users', 'index')->name('admin.users.index');
                Route::post('/users', 'store')->name('admin.users.store');
                Route::put('/users/{user}', 'update')->name('admin.users.update');
                Route::put('/userRole/{user}', 'updateRole')->name('admin.users.updateRole');
                Route::delete('/users/{user}', 'forceDestroy')->name('admin.users.forceDestroy');
            });

        });


        Route::controller(\App\Http\Controllers\ProductController::class)->group(function(){
            Route::get('/products', 'index')->name('admin.products.index');
            Route::post('/products', 'store')->name('admin.products.store');
            Route::put('/products/{product}', 'update')->name('admin.products.update')->middleware('can:deleteproduct,product');
            Route::delete('/products/{product}', 'forceDestroy')->name('admin.products.forceDestroy')->middleware('can:updateProduct,product');
        });

        Route::controller(\App\Http\Controllers\CartController::class)->group(function(){
            Route::get('/carts', 'index')->name('admin.carts.index');
            Route::post('/carts', 'store')->name('admin.carts.store');
            Route::put('/carts/{cart}', 'update')->name('admin.carts.update');
            Route::delete('/carts/{cart}', 'forceDestroy')->name('admin.carts.forceDestroy');
        });

        Route::controller(\App\Http\Controllers\ProfileController::class)->group(function(){
            Route::get('/profiles', 'index')->name('admin.profiles.index');
            Route::post('/profiles', 'store')->name('admin.profiles.store');
            Route::put('/profiles/{profile}', 'update')->name('admin.profiles.update');
            Route::delete('/profiles/{profile}', 'forceDestroy')->name('admin.profiles.forceDestroy');
        });

        Route::controller(\App\Http\Controllers\WishlistController::class)->group(function(){
            Route::get('/wishlists', 'index')->name('admin.wishlists.index');
            Route::put('/wishlists/{profile}', 'update')->name('admin.wishlists.update');
            Route::delete('/wishlists/{profile}', 'forceDestroy')->name('admin.wishlists.forceDestroy');
        });

        Route::controller(\App\Http\Controllers\OrderController::class)->group(function(){
            Route::get('/order', 'index')->name('admin.orders.index');
            Route::put('/order/{order}', 'update')->name('admin.orders.update');
        });

    });

});


