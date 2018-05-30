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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/system', 'SystemsController@edit')->name('system.edit');
Route::post('/system/update', 'SystemsController@update')->name('system.update');

Route::get('/image/{filename}', 'APIController@getImage')->name('image');

// Route::get('/image/{filename}', [
//     'uses' => 'APIController@getImage', 
//     'as' => 'image'
// ]);
