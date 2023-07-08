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
    return view('pages.dashboard');
});

// Product
Route::group(['prefix' => 'produk', 'as' => 'product.'], function () {
    Route::get('/', 'App\Http\Controllers\Main\ProductController@index')->name('index');
    Route::post('/', 'App\Http\Controllers\Main\ProductController@store')->name('store');
    Route::match(['put', 'patch'], '/{product}', 'App\Http\Controllers\Main\ProductController@update')->name('update');
    Route::delete('/{product}', 'App\Http\Controllers\Main\ProductController@destroy')->name('destroy');
});
// Criteria
Route::group(['prefix' => 'kriteria', 'as' => 'criteria.'], function () {
    Route::get('/', 'App\Http\Controllers\Main\CriteriaController@index')->name('index');
    Route::post('/', 'App\Http\Controllers\Main\CriteriaController@store')->name('store');
    Route::match(['put', 'patch'], '/{criteria}', 'App\Http\Controllers\Main\CriteriaController@update')->name('update');
    Route::delete('/{product}', 'App\Http\Controllers\Main\CriteriaController@destroy')->name('destroy');
});
