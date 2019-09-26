<?php

use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

// Home Route


Route::get('/', 'HomeController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/listing/{categorySlug}', 'HomeController@listing')->name('listing.category');
//Route::post('/search', 'HomeController@search')->name('listing.search');
Route::post('/search', function (Request $request) {
    $search = Str::slug($request->search);
    session(['search' => $request->search]);
    return redirect()->route('listing.search.pretty', ['searchslug' => $search]);
})->name('listing.search');
Route::get('/search/{searchslug}', 'HomeController@search')->name('listing.search.pretty');
Route::get('/details/{categorySlug}/{productId}', 'HomeController@details')->name('product.details');
Route::get('/account', 'HomeController@account')->name('home.account');

// Cart Route
Route::get('/cart', 'CartController@cart')->name('cart.page');
Route::post('/addToCart', 'CartController@addToCart')->name('cart.add');
Route::post('/cart/update', 'CartController@updateCart')->name('cart.update');
Route::post('/cart/remove', 'CartController@removeFromCart')->name('cart.remove');
Route::get('/cart/checkout', 'CartController@checkout')->name('cart.checkout');


// User Route
Auth::routes();
Route::get('/logout', 'UserController@logout')->name('user.logout');
Route::post('/updateinfo', 'UserController@changeinfo')->name('user.changeinfo');

// Admin Page Route
Route::get('/admin/login/{error?}', 'AdminController@login')->name('admin.login');
Route::post('/admin/login/verify', 'AdminController@verifyLogin')->name('admin.login-verify');
Route::get('/admin/logout', 'AdminController@logout')->name('admin.logout');
Route::middleware('admin')->group(function(){
    Route::get('/admin', 'AdminController@index')->name('admin.index');
    // Route Game
    Route::get('/admin/games', 'AdminController@gameList')->name('admin.game.list');
    Route::post('/admin/addgame', 'AdminController@addGame')->name('admin.game.add');
    Route::post('/admin/gameupdatemodal', 'ModalFormController@updateGameModal')->name('admin.game.updatemodal');
    Route::post('/admin/gameupdate', 'AdminController@updateGame')->name('admin.game.update');
    Route::get('/admin/gamedelete/{id}', 'AdminController@deleteGame')->name('admin.game.delete');
    // Route Category
    Route::get('/admin/categories', 'AdminController@categoryList')->name('admin.category.list');
    Route::post('/admin/addcategory', 'AdminController@addCategory')->name('admin.category.add');
    // Route Admin
    Route::get('/admin/admins', 'AdminController@adminList')->name('admin.admin.list');
    Route::post('/admin/addadmin', 'AdminController@addAdmin')->name('admin.admin.add');
});

