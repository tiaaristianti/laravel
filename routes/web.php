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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'TampilanController@index');
Route::get('/tampilan', 'TampilanController@home');

Route::get('/add', 'TampilanController@create');

// Dekorasi
Route::get('/showdekor', 'TampilanController@liat');
Route::get('/readdekor/{slug}', 'TampilanController@show');
Route::get('/editdekor/{slug}', 'TampilanController@editdekor');
Route::post('/update/{slug}', 'TampilanController@update');
Route::get('/deletedekor/{slug}', 'TampilanController@destroy');
Route::get('/lainnya', 'KetringController@lainnya');

//Fotografer
Route::get('/showfoto', 'FotografiController@liat');
Route::get('/readfoto/{slug}', 'FotografiController@show');
Route::get('/editfoto/{id}', 'FotografiController@editfoto');
Route::post('/update/{id}', 'FotografiController@update');
Route::get('/deletefoto/{id}', 'FotografiController@destroy');

//ketring
Route::get('/showketring', 'KetringController@liat');
Route::get('/readketring/{slug}', 'KetringController@show');
Route::get('/editketring/{id}', 'KetringController@editketring');
Route::post('/update/{id}', 'KetringController@update');
Route::get('/deleteketring/{id}', 'KetringController@destroy');

//venue
Route::get('/showvenue', 'VenueController@liat');
Route::get('/readvenue/{slug}', 'VenueController@show');
Route::get('/editvenue/{id}', 'VenueController@editvenue');
Route::post('/update/{id}', 'VenueController@update');
Route::get('/deletevenue/{id}', 'VenueController@destroy');

//Rias dan Busana
Route::get('/showrias', 'RiasController@liat');
Route::get('/readrias/{slug}', 'RiasController@show');
Route::get('/editrias/{id}', 'RiasController@editrias');
Route::post('/update/{id}', 'RiasController@update');
Route::get('/deleterias/{id}', 'RiasController@destroy');

Route::get('/dekorasi', 'TampilanController@dekorasi');
Route::get('/ketring', 'KetringController@ketring');
Route::get('/foto', 'FotografiController@foto');
Route::get('/venue', 'VenueController@venue');
Route::get('/rias', 'RiasController@rias');

Route::post('/storedekor', 'TampilanController@storedekor');
Route::post('/storeketring', 'KetringController@storeketring');
Route::post('/storefoto', 'FotografiController@storefoto');
Route::post('/storevenue', 'VenueController@storevenue');
Route::post('/storerias', 'RiasController@storerias');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
