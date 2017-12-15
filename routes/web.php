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

Route::get('/', [
	'uses'	=> 'ProductController@index',
	'as'	=> 'product.index'
]);


Route::get('/product/add/{id}', [
	'uses'	=> 'ProductController@addItem',
	'as'	=> 'product.add'
]);

Route::get('/product/cart', [
	'uses'	=> 'ProductController@getCart',
	'as'	=> 'product.cart'
]);

Route::get('/product/checkout', [
	'uses'	=> 'ProductController@getCheckout',
	'as'	=> 'product.checkout'
]);

Route::post('/product/checkout', [
	'uses'	=> 'ProductController@postCheckout',
	'as'	=> 'product.postCheckout'
]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
