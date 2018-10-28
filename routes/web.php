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


Route::get('/get', 'TestServerController@testGet');
Route::get('/post/view', 'TestServerController@viewPost');
Route::get('/post/view/raw', 'TestServerController@viewRawPost');

Route::post('/post', 'TestServerController@testPost');

Route::get('/users', 'UsersController@view');
Auth::routes();


Route::get('/test', 'TestServerController@testGetSuccessMessage')->name('test');
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('logs');


Route::post('/device', 'TestServerController@testPost');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');


Route::get('/device/{id}/data', 'SensorController@data');
Route::get('/device/{id}/values', 'SensorController@values');
Route::get('/device/{id}/view', 'SensorController@view');
Route::get('/device/{id}', 'SensorController@sendData');


Route::get('/devices', 'SensorController@allDevices');
Route::get('/devices/values', 'SensorController@allValues');

Route::get("/light", 'LightController@getIntensity');
Route::get("/light/set/{intensity}", 'LightController@setIntensity');
Route::post("/light/set/{intensity}", 'LightController@setIntensity');


Route::get("/energy", 'EnergyController@getEnergy');


