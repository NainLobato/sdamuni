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

    Route::name('empleados.')->group(function () {
        Route::get('empleados', 'EmpleadoController@index')->name('index');
        Route::post('empleado-store', 'EmpleadoController@store')->name('store');
        Route::post('empleado-get', 'EmpleadoController@get')->name('get');
        Route::post('empleado-update', 'EmpleadoController@update')->name('update');
    });

    Route::get('/ayuntamientos', 'AyuntamientoController@index')->name('ayuntamiento.index');
    Route::get('/ayuntamiento/create', 'AyuntamientoController@create')->name('ayuntamiento.create');
    Route::get('/ayuntamiento/catalogos', 'AyuntamientoController@getCatalogos')->name('ayuntamiento.catalogos');
    Route::post('/ayuntamiento/store', 'AyuntamientoController@store')->name('ayuntamiento.store');
    Route::get('/ayuntamiento/{id}/show', 'AyuntamientoController@show')->name('ayuntamiento.show');
    Route::get('/ayuntamiento/{id}/edit', 'AyuntamientoController@edit')->name('ayuntamiento.edit');
    Route::post('/ayuntamiento/{id}/update', 'AyuntamientoController@update')->name('ayuntamiento.update');
});
