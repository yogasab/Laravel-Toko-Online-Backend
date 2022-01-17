<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('api/v1')->get('products', 'API\Product\ProductController@all')->name('products-api.all');
Route::prefix('api/v1')->post('checkouts', 'API\Checkout\CheckoutController@checkout');
Route::prefix('api/v1')->get('transactions/{transaction}', 'API\Transaction\TransactionController@get');
