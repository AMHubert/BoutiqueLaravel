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
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/listing/{categoryName}/{search?}', 'HomeController@listing')->name('listing.category');
Route::post('/search', 'HomeController@search')->name('listing.search');
Route::get('/details/{categoryName}/{productId}', 'HomeController@details')->name('product.details');
Route::get('/account', 'HomeController@account')->name('home.account');

Route::get('/cart', 'CartController@cart')->name('cart.page');
Route::post('/addToCart', 'CartController@addToCart')->name('cart.add');

Auth::routes();
Route::get('/logout', 'UserController@logout')->name('user.logout');
Route::post('/updateinfo', 'UserController@changeinfo')->name('user.changeinfo');

Route::get('/admin/login', 'AdminController@login')->name('admin.login');
Route::post('/admin/login/verify', 'AdminController@verifyLogin')->name('admin.login-verify');
Route::middleware('admin')->group(function(){
    Route::get('/admin', 'AdminController@index')->name('admin.index');
    // Route Game
    Route::get('/admin/games', 'AdminController@gameList')->name('admin.game.list');
    Route::post('/admin/addgame', 'AdminController@addGame')->name('admin.game.add');
    // Route Category
    Route::get('/admin/categories', 'AdminController@categoryList')->name('admin.category.list');
    Route::post('/admin/addcategory', 'AdminController@addCategory')->name('admin.category.add');
    // Route Admin
    Route::get('/admin/admins', 'AdminController@adminList')->name('admin.admin.list');
    Route::post('/admin/addadmin', 'AdminController@addAdmin')->name('admin.admin.add');
});

