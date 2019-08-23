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
    
    return view('main');
    
});

Route::get('partners', 'PartnerController@showAllPartners');

Route::get('orders', 'OrderController@showOrdersByTabs');

Route::get('orders/edit/{order_id}/', ['uses'=>'OrderController@formEditOrderPage']);

Route::post('orders/edit/{order_id}/', ['uses'=>'OrderController@update']);

//Route::get('orders/edit/{order_id}/', 'OrderController@formEditOrderPage');

Route::get('temperature/{city_name}/', 'WeatherController@getWeatherForCity');
