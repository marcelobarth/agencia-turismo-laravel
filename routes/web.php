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

    Route::any('brands/search', 'BrandController@search')->name('brands.search');
    Route::any('brands/{id}/planes', 'BrandController@planes')->name('brands.planes');
    Route::resource('brands', 'BrandController');

    Route::any('planes/search', 'PlaneController@search')->name('planes.search');
    Route::resource('planes', 'PlaneController');

    Route::post('states/search', 'StateController@search')->name('states.search');
    Route::get('states', 'StateController@index')->name('state.index');

    Route::post('states/{initials}/cities/search', 'CityController@search')->name('state.cities.search');
    Route::get('states/{initials}/cities', 'CityController@index')->name('state.cities');

    Route::get('/', 'PanelController@index')->name('panel');
});

Route::get('promocoes', 'Site\SiteController@promotions')->name('promotions');

Route::get('/', 'Site\SiteController@index');

Auth::routes();
