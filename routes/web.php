<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/store', 'HomeController@store')->name('store');
Route::get('/checkout', function () {
    return view('checkout');
});

Route::post('/checkout/done', 'Order\OrderController@store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('products', 'Product\ProductController');
Route::get('orders', 'Order\OrderController@index')->name('orders.index');
Route::get('orders/{order}', 'Order\OrderController@show')->name('orders.show');

Route::get('/panel', function() {
    return view('pandel');
});
