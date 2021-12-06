<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/products', 'ProductController@list');
Route::get('/product/create', 'ProductController@create');
Route::post('/product/insert', 'ProductController@insert');
Route::get('/product/edit/{id}', 'ProductController@edit');
Route::post('/product/update/{id}', 'ProductController@update');
Route::delete('/product/delete/{id}', 'ProductController@delete');

Route::get('/categories', 'CategoryController@list');
Route::get('/category/create', 'CategoryController@create');
Route::post('/category/insert', 'CategoryController@insert');
Route::get('/category/edit/{id}', 'CategoryController@edit');
Route::post('/category/update/{id}', 'CategoryController@update');
Route::delete('/category/delete/{id}', 'CategoryController@delete');

Route::post('/ajax/category-childs/{id}', 'AjaxController@categoryChilds');