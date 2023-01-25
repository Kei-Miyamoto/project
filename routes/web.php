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
