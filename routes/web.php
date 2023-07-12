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
Route::group(['prefix' => 'peramalan-wma', 'as' => 'wma.'], function () {
    Route::get('/penjualan-aktual', 'App\Http\Controllers\ForecastingWMA\ActualSaleController@index')->name('actual-sale');
    Route::get('/pilih-periode', 'App\Http\Controllers\ForecastingWMA\ActualSaleController@period_forecasting')->name('choose-period');
    Route::get('/hasil-akhir', 'App\Http\Controllers\ForecastingWMA\ActualSaleController@result_wma')->name('result-wma');
});
