<?php

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

/**
 * This namespace is applied to your controller routes.
 *
 * In addition, it is set as the URL generator's root namespace.
 *
 * @var string
 */

$namespace = 'App\Http\Controllers\Frontend';

Route::namespace($namespace)->group(function () {

    /* Routes for HomePage */
    Route::get('/', 'HomeController@index')->name('home.index');

    /* Routes For Products */
    Route::prefix('products')
        ->as('products')
        ->group(
            function () {
                Route::get('/', 'ProductController@index')->name('index');
                Route::get('/{id}', 'ProductController@show')->name('show');
            }
        );

    /* Routes For Cart */
    Route::prefix('cart')
        ->as('cart')
        ->group(
            function () {
                Route::get('/', 'CartController@index')->name('index');
                Route::post('/', 'CartController@store')->name('store');
                Route::patch('/{id}', 'CartController@update')->name('update');
                Route::delete('/{id}', 'CartController@destroy')->name('destroy');
            }
        );

    /* Routes For WishList */
    Route::prefix('wishlist')
        ->as('wishlist')
        ->group(
            function () {
                Route::get('/', 'WishlistController@index')->name('index');
                Route::post('/', 'WishlistController@store')->name('store');
                Route::patch('/{id}', 'WishlistController@update')->name('update');
                Route::delete('/{id}', 'WishlistController@destroy')->name('destroy');
            }
        );

    /* Routes For Orders */
    Route::prefix('orders')
        ->as('orders')
        ->group(
            function () {
                Route::get('/', 'OrderController@index')->name('index');
                Route::get('/{id}', 'OrderController@show')->name('show');
                Route::post('/', 'OrderController@store')->name('store');
                Route::patch('/{id}', 'OrderController@update')->name('update');
                Route::delete('/{id}', 'OrderController@destroy')->name('destroy');
            }
        );

    /* Routes For Payment */
    Route::prefix('payment')
        ->as('payment')
        ->group(
            function () {
                Route::get('/', 'PaymentController@index')->name('index');
                Route::post('/', 'PaymentController@store')->name('store');
                Route::patch('/{id}', 'PaymentController@update')->name('update');
                Route::delete('/{id}', 'PaymentController@destroy')->name('destroy');
            }
        );

    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return Inertia\Inertia::render('Dashboard');
    })->name('dashboard');
});

