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

Route::middleware(['auth'])->group(function () {
    Route::prefix('teams')->name('teams.')->group(function () {
        Route::get('/', 'TeamController@index')->name('index');
        Route::get('/create', 'TeamController@create')->name('create');
        Route::post('/', 'TeamController@store')->name('store');

        Route::prefix('/{team}')->group(function () {
            Route::get('/edit', 'TeamController@edit')->name('edit');
            Route::post('/', 'TeamController@update')->name('update');
            Route::delete('/', 'TeamController@destroy')->name('destroy');
        });
    });
});
