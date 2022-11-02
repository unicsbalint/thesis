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

    Route::get('/devices','App\Http\Controllers\DeviceController@index')->name('devices');
    Route::get('/cloud', 'App\Http\Controllers\CloudController@index')->name('cloud');
    Route::get('/settings', 'App\Http\Controllers\SettingsController@index')->name('settings');
    Route::get('/statistics', 'App\Http\Controllers\StatisticsController@index')->name('statistics');

    // Cloud actions
    Route::get('/getCloudFiles', 'App\Http\Controllers\CloudController@getCloudFiles');
    Route::get('/downloadFile', 'App\Http\Controllers\CloudController@downloadFile');
    Route::post('/uploadFile', 'App\Http\Controllers\CloudController@uploadFile');
    Route::post('/moveFile', 'App\Http\Controllers\CloudController@moveFile');
    Route::post('/removeFile', 'App\Http\Controllers\CloudController@removeFile');
    Route::post('/createDirectory', 'App\Http\Controllers\CloudController@createDirectory');

    // Settings
    Route::post('/changePassword', 'App\Http\Controllers\Auth\ChangePasswordController@changePassword');
    Route::post('/changeUsername', 'App\Http\Controllers\SettingsController@changeUsername');
    Route::post('/changeHomename', 'App\Http\Controllers\SettingsController@changeHomename');
    Route::post('/changeBackupInterval', 'App\Http\Controllers\SettingsController@changeBackupInterval');
    Route::post('/changeSensorDisplayed', 'App\Http\Controllers\SettingsController@changeSensorDisplayed');

    
    // Webcam
    Route::post('/startWebcamServer', 'App\Http\Controllers\WebcamController@startWebcamServer');
    Route::post('/stopWebcamServer', 'App\Http\Controllers\WebcamController@stopWebcamServer');    
    Route::post('/takePicture', 'App\Http\Controllers\WebcamController@takePicture');    

    // Leds
    Route::post('/switchMoodLight', 'App\Http\Controllers\DeviceController@switchMoodLight');    
    Route::post('/toggleLivingRoomLight', 'App\Http\Controllers\DeviceController@toggleLivingRoomLight');    

    // Climate
    Route::post('/toggleCooling', 'App\Http\Controllers\DeviceController@toggleCooling');
    Route::post('/toggleHeating', 'App\Http\Controllers\DeviceController@toggleHeating');    
    Route::post('/toggleAutoClimate', 'App\Http\Controllers\DeviceController@toggleAutoClimate');    
    
    // Statistics
    Route::get('/getStatistics', 'App\Http\Controllers\StatisticsController@getStatistics');




 });

Auth::routes();

