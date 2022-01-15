<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'Web\Dashboard\DashboardController@index')->name('dashboard.index');

Auth::routes(['register' => false]);

Route::get('galleries/{product}', 'Web\Product\ProductController@galleries')->name('products.galleries');
Route::resource('products', 'Web\Product\ProductController');
Route::resource('product-galleries', 'Web\Product\ProductGalleryController');
Route::resource('transactions', 'Web\Transaction\TransactionController');

// Route::get('/home', 'HomeController@index')->name('home');
