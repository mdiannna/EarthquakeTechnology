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


Route::get("/sensors/train", 'NetworkController@trainSensors');


///////////////////////////////////


Route::get('/alert-map', ['as' => 'alert-map', 'uses' => 'AlertMapController@putMarkers']);
Route::post('/save-alert-marker', ['as' => 'save-alert-marker', 'uses' => 'AlertMapController@saveMarker']);

// Route::get('/sensor-data/{data}', 'SensorDataController@index');
Route::get('/sensor-data', ['as' => 'sensor-data', 'uses' => 'SensorDataController@index']);
Route::get('/sensor-data/about', ['as' => 'hardware.about', 'uses' => 'SensorDataController@about']);

// Route::get('/sentiment-analysis/{data}', 'SentimentAnalysisController@index');
Route::get('/sentiment-analysis', ['as' => 'sentiment-analysis', 'uses' => 'SentimentAnalysisController@index']);
Route::get('/sentiment-analysis/{text}/json', ['as' => 'sentiment-analysis-json', 'uses' => 'SentimentAnalysisController@json']);

Route::get('/alert-info', ['as' => 'alert-info', 'uses' => 'AlertInfoController@index']);
Route::get('/alert-info/buildings', ['as' => 'alert-info.buildings.list', 'uses' => 'AlertInfoController@buildings']);
Route::get('/alert-info/buildings-collapsed', ['as' => 'alert-info.buildings-collapsed.list', 'uses' => 'AlertInfoController@collapsedBuildings']);
Route::get('/alert-info/add-building', ['as' => 'alert-info.building.add', 'uses' => 'AlertInfoController@addBuilding']);
Route::post('/alert-info/store-building', ['as' => 'alert-info.building.store', 'uses' => 'AlertInfoController@storeBuilding']);

Route::get('/earthquakes/all', ['as' => 'earthquakes.all', 'uses' => 'EarthquakeInfoController@all']);
Route::get('/earthquakes/all-romania', ['as' => 'earthquakes.romania', 'uses' => 'EarthquakeInfoController@allRomania']);
Route::get('/earthquakes/raw', ['as' => 'earthquakes.raw', 'EarthquakeInfoController@raw']);
Route::get('/earthquakes/romania-past-hour', ['as' => 'earthquakes.romania.past-hour', 'uses' => 'EarthquakeInfoController@pastHourRomania']);

Route::get('/before-earthquake', ['as' => 'before-earthquake', 'uses' =>'BeforeEarthquakeController@index']);

Route::get('/watson-ai', ['as' => 'watson-ai', 'uses' =>'WatsonAIController@index']);

Route::get('/buildings-seismic-map', ['as' => 'seismic-alert-map', 'uses' =>'BuildingsSeismicAlertMapController@index']);