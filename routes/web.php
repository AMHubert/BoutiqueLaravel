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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index')->name('index');
Route::get('/listing/{categoryName}/{search?}', 'HomeController@listing')->name('listing.category');
Route::get('/details/{categoryName}/{productId}', 'HomeController@details')->name('product.details');

Route::get('/cart', 'CartController@cart')->name('cart.page');
Route::post('/addToCart', 'CartController@addToCart')->name('cart.add');


//Route::get('/admin', 'AdminController@index')->name('admin.index');
Route::get('/admin/newGame', 'AdminController@gameForm')->name('game.form');
Route::post('/admin/addgame', 'AdminController@addGame')->name('game.add');
