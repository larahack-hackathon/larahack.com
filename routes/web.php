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

Route::prefix('admin')->namespace('Admin')->name('admin.')->middleware(['auth'/*'admin'*/])->group(function () {
    Route::get('/', 'AdminController@index')->name('index');

    Route::prefix('types')->name('types.')->group(function () {
        Route::get('/', 'TypeController@index')->name('index');
        Route::get('/create', 'TypeController@create')->name('create');
        Route::post('/', 'TypeController@store')->name('store');

        Route::prefix('/{type}')->group(function () {
            Route::get('/edit', 'TypeController@edit')->name('edit');
            Route::post('/', 'TypeController@update')->name('update');
            Route::delete('/', 'TypeController@destroy')->name('destroy');
        });
    });

    Route::prefix('vote-categories')->name('vote-categories.')->group(function () {
        Route::get('/', 'VoteCategoryController@index')->name('index');
        Route::get('/create', 'VoteCategoryController@create')->name('create');
        Route::post('/', 'VoteCategoryController@store')->name('store');

        Route::prefix('/{category}')->group(function () {
            Route::get('/edit', 'VoteCategoryController@edit')->name('edit');
            Route::post('/', 'VoteCategoryController@update')->name('update');
            Route::delete('/', 'VoteCategoryController@destroy')->name('destroy');
        });
    });

    Route::prefix('events')->name('events.')->group(function () {
        Route::get('/', 'EventController@index')->name('index');
        Route::get('/create', 'EventController@create')->name('create');
        Route::post('/', 'EventController@store')->name('store');

        Route::prefix('/{event}')->group(function () {
            Route::get('/edit', 'EventController@edit')->name('edit');
            Route::post('/', 'EventController@update')->name('update');
            Route::delete('/', 'EventController@destroy')->name('destroy');
        });
    });
});
