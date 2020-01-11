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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');
Route::resource('/screens', 'Admin\ScreenController');
Route::resource('/prices', 'Admin\PriceController');
Route::resource('/brands', 'Admin\BrandController');
Route::resource('/processors', 'Admin\ProcessorController');
Route::resource('/products', 'Admin\ProductController');
Route::resource('/users', 'Admin\UserController');