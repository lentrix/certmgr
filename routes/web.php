<?php

use App\Certificate;
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

Route::get('/','SiteController@index');

Route::post('/login', 'SiteController@login');

Route::group(['middleware'=>['auth']], function() {

    Route::get('/logout', 'SiteController@logout');

    Route::get('/events/create', 'EventController@create');
    Route::get('/events/{event}/update', 'EventController@edit');
    Route::put('/events/{event}/change-template', 'EventController@changeTemplate');
    Route::get('/events/{event}', 'EventController@show');
    Route::put('/events/{event}', 'EventController@update');
    Route::post('/events', 'EventController@store');
    Route::get('/events', 'EventController@index');

    Route::post('/certificates/{event}', 'CertificateController@store');
    Route::get('/certificates/{cert}', 'CertificateController@show');

});
