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
        Route::post('empleado-delete', 'EmpleadoController@destroy')->name('delete');
    });

    Route::name('ayuntamiento.')->group(function () {
        Route::get('ayuntamientos', 'AyuntamientoController@index')->name('index');
        Route::get('ayuntamiento-catalogos', 'AyuntamientoController@getCatalogos')->name('catalogos');
        Route::post('ayuntamiento-store', 'AyuntamientoController@store')->name('store');
        Route::post('ayuntamiento-update', 'AyuntamientoController@update')->name('update');
        Route::post('ayuntamiento-delete', 'AyuntamientoController@delete')->name('delete');
        Route::get('ayuntamiento/{id}/show', 'AyuntamientoController@show')->name('show');
        Route::get('ayuntamiento/{id}/edit', 'AyuntamientoController@edit')->name('edit');
    });

    Route::name('libro-actas.')->group(function () {
        Route::get('libros-actas', 'LibroActasController@index')->name('index');
    });

});
