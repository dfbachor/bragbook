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

Route::get('/users', 'UsersController@index')->name('users');
Route::get('/users/create', 'UsersController@create')->name('users.create');
Route::post('/users/store', 'UsersController@store')->name('users.store');
Route::get('/users/edit/{id}', 'UsersController@edit')->name('users.edit');
Route::post('/users/update', 'UsersController@update')->name('users.update');
Route::get('/users/destroy/{id}', 'UsersController@destroy');

Route::get('/projects', 'ProjectsController@index')->name('projects');
Route::get('/projects/create', 'ProjectsController@create')->name('projects.create');
Route::post('/projects/store', 'ProjectsController@store')->name('projects.store');
Route::get('/projects/edit/{id}', 'ProjectsController@edit')->name('projects.edit');
Route::post('/projects/update', 'ProjectsController@update')->name('projects.update');
Route::get('/projects/destroy/{id}', 'ProjectsController@destroy');

Route::get('/categories', 'CategoriesController@index')->name('categories');
Route::get('/categories/create', 'CategoriesController@create')->name('categories.create');
Route::post('/categories/store', 'CategoriesController@store')->name('categories.store');
// Route::get('/categories/edit/{id}', 'CategoriesController@edit')->name('categories.edit');
// Route::post('/categories/update', 'CategoriesController@update')->name('categories.update');
// Route::get('/categories/destroy/{id}', 'CategoriesController@destroy');

Route::get('/images', 'ImagesController@index')->name('images');
Route::get('/images/create', 'ImagesController@create')->name('images.create');
Route::post('/images/store', 'ImagesController@store')->name('images.store');
