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
});

Auth::routes();

// 商品一覧画面
Route::get('/home', 'HomeController@index')->name('home');
// 商品新規登録画面
Route::get('/product/show/create', 'ProductController@showCreate')->name('product.show.create');
// 商品新規登録画面
Route::post('/product/create', 'ProductController@createProduct')->name('product.create');
// 商品情報詳細画面
Route::get('/product/show/detail', 'ProductController@showDetail')->name('product.show.detail');
// 商品情報編集画面
Route::get('/product/show/edit', 'ProductController@showEdit')->name('product.show.edit');
