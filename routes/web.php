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
    //return view('home');
    return redirect()->route('login');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');

    Route::prefix('empleados')->name('empleados.')->group(function () {
        Route::get('index', 'EmpleadoController@index')->name('index');
    });

    Route::get('/ayuntamientos', 'AyuntamientoController@index')->name('ayuntamiento.index');
    Route::get('/ayuntamiento/create', 'AyuntamientoController@create')->name('ayuntamiento.create');
    Route::post('/ayuntamiento/store', 'AyuntamientoController@store')->name('ayuntamiento.store');
    Route::get('/ayuntamiento/{id}/show', 'AyuntamientoController@show')->name('ayuntamiento.show');
    Route::get('/ayuntamiento/{id}/edit', 'AyuntamientoController@edit')->name('ayuntamiento.edit');
    Route::post('/ayuntamiento/{id}/update', 'AyuntamientoController@update')->name('ayuntamiento.update');
});
