<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('products', 'App\Http\Controllers\ProductController');

Route::get('product/soft/delete/{id}', 'App\Http\Controllers\ProductController@softDelete')
->name('soft.delete');

Route::get('product/trash', 'App\Http\Controllers\ProductController@trashedProducts')
->name('product.trash');

Route::get('product/restore/delete/{id}', 'App\Http\Controllers\ProductController@trashRestore')
->name('product.restore');

Route::get('product/hard/delete', 'App\Http\Controllers\ProductController@deletefromdatabase')
->name('product.hard.delete');
