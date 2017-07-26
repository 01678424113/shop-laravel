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

Route::get('/','PageController@getHome');

Route::get('signup','PageController@getSignup');
Route::get('login','PageController@getLogin');

Route::get('contact','PageController@getContact');

Route::get('about','PageController@getAbout');

Route::get('checkout','PageController@getCheckout');

Route::get('pricing','PageController@getPricing');

Route::get('product/{id}','PageController@getProduct');

Route::get('product-type/{id}','PageController@getTypeProduct');

Route::get('shopping','PageController@getShopping');
