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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/verify/{token}', 'VerifyController@verify')->name('verify');


Route::get('/change-password','HomeController@showChangePasswordForm');
Route::post('/change-password','HomeController@changePassword')->name('changePassword');

Route::post('/images-upload','ImagesController@upload')->name('imageUpload');

