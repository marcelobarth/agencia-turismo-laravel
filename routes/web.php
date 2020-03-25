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

Route::group(['prefix' => 'panel', 'namespace' => 'Panel'], function () {

    Route::post('brands/search', 'BrandController@search')->name('brands.search');
    Route::resource('brands', 'BrandController');
    Route::get('/', 'PanelController@index')->name('panel');
});

Route::get('promocoes', 'Site\SiteController@promotions')->name('promotions');
Route::get('/', 'Site\SiteController@index');

Auth::routes();
