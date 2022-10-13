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
    $isHomeInited = count(DB::select(DB::raw("SELECT inited FROM init_home WHERE inited = 1")));
    return view('welcome', ['isHomeInited' => $isHomeInited]);
});



// Csak bejelentkezés után elérhető funkciók.
Route::group(['middleware' => ['auth']], function() {
    Route::get('/logout', function(){
        Session::flush();
        Auth::logout();
        return redirect('/');
    });    
    Route::get('/home', 'App\Http\Controllers\HomeController@index');

    Route::get('/devices','App\Http\Controllers\DeviceController@index');
    Route::get('/cloud', 'App\Http\Controllers\CloudController@index');
    Route::get('/settings', 'App\Http\Controllers\SettingsController@index');
    Route::get('/statistics', 'App\Http\Controllers\StatisticsController@index');

    Route::post('/blinkled', 'App\Http\Controllers\LedController@BlinkLed');

    // Cloud actions
    Route::get('/getCloudFiles', 'App\Http\Controllers\CloudController@getCloudFiles');
    Route::get('/downloadFile', 'App\Http\Controllers\CloudController@downloadFile');
    Route::post('/moveFile', 'App\Http\Controllers\CloudController@moveFile');

 });

Auth::routes();

