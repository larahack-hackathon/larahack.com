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

Route::prefix('admin')->namespace('Admin')->name('admin.')->middleware(['auth', /*'admin'*/])->group(function(){
    Route::get('/', 'AdminController@index')->name('index');

    Route::prefix('types')->name('types.')->group(function (){
        Route::get('/', 'TypeController@index')->name('index');
        Route::get('/create', 'TypeController@create')->name('create');
        Route::post('/', 'TypeController@store')->name('store');

        Route::prefix('/{type}')->group(function (){
            Route::get('/edit', 'TypeController@edit')->name('edit');
            Route::post('/', 'TypeController@update')->name('update');
            Route::delete('/', 'TypeController@destroy')->name('destroy');
        });
    });
});
