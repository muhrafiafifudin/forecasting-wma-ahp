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

require __DIR__ . '/auth.php';

Route::get('/', function () {
    if (Auth::user()) {
        return redirect()->route('dashboard');
    }
    return view('pages.auth.login');
});

Route::group(['middleware' => 'auth'], function () {
    // Dashboard
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
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
    // Actual Sale
    Route::group(['prefix' => 'penjualan-aktual', 'as' => 'actual-sale.'], function () {
        Route::get('/', 'App\Http\Controllers\Main\ActualSaleController@index')->name('index');
        Route::post('/', 'App\Http\Controllers\Main\ActualSaleController@changeData')->name('change-data');
    });
    // Alternative Weight
    Route::group(['prefix' => 'bobot-alternatif', 'as' => 'alternative-weight.'], function () {
        Route::get('/', 'App\Http\Controllers\Main\AlternativeWeightController@index')->name('index');
        Route::post('/', 'App\Http\Controllers\Main\AlternativeWeightController@changeData')->name('change-data');
    });
    // Forecasting WMA
    Route::group(['prefix' => 'peramalan-wma', 'as' => 'wma.'], function () {
        Route::get('/data-ramal', 'App\Http\Controllers\Forecasting\WMAController@index')->name('actual-sale');
        Route::get('/pilih-periode', 'App\Http\Controllers\Forecasting\WMAController@period_forecasting')->name('choose-period');
        Route::post('/hasil-akhir', 'App\Http\Controllers\Forecasting\WMAController@result_wma')->name('result-wma');
    });
    // Forecasting AHP
    Route::group(['prefix' => 'pembobotan-ahp', 'as' => 'ahp.'], function () {
        Route::get('/', 'App\Http\Controllers\Forecasting\AHPController@index')->name('index');
        Route::post('/', 'App\Http\Controllers\Forecasting\AHPController@store')->name('store');
    });
    // Result AHP - WMA
    Route::group(['prefix' => 'proses-wma-ahp', 'as' => 'wma-ahp.'], function () {
        Route::get('/', 'App\Http\Controllers\Result\ResultController@index')->name('index');
        Route::get('/print-excel', 'App\Http\Controllers\Result\ResultController@print_excel')->name('print-excel');
    });
});
