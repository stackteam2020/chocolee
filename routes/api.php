<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('categories', 'Category\CategoryController');
Route::apiResource('products', 'Product\ProductController');
Route::apiResource('orders', 'Order\OrderController');
Route::post('products/{product}/add-to-cart', 'Order\OrderController@store');
Route::get('cart', 'Order\OrderController@index');
