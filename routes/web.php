<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Route::resource('categories', 'AdminCategoriesController');
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'HomeController@index');

Route::group(['prefix' => 'admin'], function() {
    Route::resource('product', 'AdminProductController');
    Route::resource('categories', 'AdminCategoriesController');
    Route::resource('suggest', 'AdminSuggestController')->only([
    'index', 'update', 'destroy'
    ]);
    Route::resource('order', 'AdminOrderController')->only([
    'index', 'update'
    ]);
    Route::resource('statistic', 'StatisticController')->only([
    'index'
    ]);
});

Route::group(['prefix' => 'categories'], function() {
Route::get('/', 'AdminCategoriesController@getAdminListCategory');
Route::get('add', 'AdminCategoriesController@getAdminAddCategory');
Route::post('add', 'AdminCategoriesController@postAdminAddCategory');
Route::get('edit/{id}', 'AdminCategoriesController@getAdminEditCategory');
Route::post('edit/{id}', 'AdminCategoriesController@postAdminEditCategory');
Route::get('delete/{id}', 'AdminCategoriesController@getAdminDeleteCategory');
});
Auth::routes();

Route::prefix('admin')->group(function() {
    Route::prefix('users')->group(function() {
        Route::get('/', 'AdminUserController@index')->name('users.index');
        Route::get('delete/{id}', 'AdminUserController@delete')->name('users.delete');
    });
});

Route::prefix('/homepage')->group(function() {
    Route::get('/', 'HomeController@index')->name('homepage');
    Route::get('productdetail/{id}', 'HomeController@get_product_detail')->name('get_product_detail');
});

Route::prefix('cart')->group(function() {
    Route::post('/', 'CartController@save_cart')->name('cart');
    Route::get('/', 'CartController@index')->name('showcart');
    Route::get('delete/{id}', 'CartController@delete_cart')->name('card.delete');
    Route::post('update_quantity', 'CartController@update_cart');
    Route::get('/place-order', 'CartController@place_order')->name('place.order');
});

Route::prefix('order')->group(function() {
    Route::get('/place-order', 'OrderController@place_order')->name('place.order');
});

Route::resource('suggest', 'SuggestController')->only([
    'index', 'store'
]);

Route::resource('profile', 'ProfileController')->only([
    'index', 'update'
]);

Route::resource('favorite', 'FavoriteController')->only([
    'index', 'update'
]);


Route::post('/login', 'AuthController@login');

Route::get('admin', 'AdminCategoriesController@index')->name('admin')->middleware('CheckLevel', 'auth');

Route::get('logout', 'AuthController@logout')->name('logout');

Route::get('google/redirect', 'Auth\LoginSocialiteController@redirectToProviderGoogle');
Route::get('google/callback', 'Auth\LoginSocialiteController@handleProviderCallbackGoogle');

Route::get('facebook/redirect', 'Auth\LoginSocialiteController@redirectToProviderFacebook');
Route::get('facebook/callback', 'Auth\LoginSocialiteController@handleProviderCallbackFacebook');
