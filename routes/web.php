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
Route::get('/admin','productcontroller@addProduct');
Route::get('/products','productcontroller@allproducts');
Route::get('/check','productcontroller@checkproduct');
Route::post('productcontroller/fetchproduct', 'productcontroller@fetchproduct')->name('productcontroller.fetchproduct');
Route::post('productcontroller/checkduplicate', 'productcontroller@checkduplicate')->name('productcontroller.checkduplicate');
Route::post('/admin','productcontroller@store');
Route::post('/check','productcontroller@showresult');
