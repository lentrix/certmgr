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

Route::get('/certificates/{cert}', 'CertificateController@show');

Route::get('/verify/{cert}', 'CertificateController@verify');
Route::get('/verify', 'CertificateController@preVerify');
Route::post('/verify', 'CertificateController@verifyCode');

Route::group(['middleware'=>['auth']], function() {

    Route::get('/logout', 'SiteController@logout');

    Route::put('/events/styles/{cert}', 'EventController@styles');
    Route::get('/events/create', 'EventController@create');
    Route::get('/events/{event}/update', 'EventController@edit');
    Route::put('/events/{event}/change-template', 'EventController@changeTemplate');
    Route::get('/events/{event}', 'EventController@show');
    Route::put('/events/{event}', 'EventController@update');
    Route::post('/events', 'EventController@store');
    Route::get('/events', 'EventController@index');


    Route::post('/certificates/{event}', 'CertificateController@store');
    Route::put('/certificates/{cert}', 'CertificateController@update');
    Route::delete('/certificates', 'CertificateController@delete');

});
