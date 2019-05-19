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
        Route::post('store-libro-actas', 'LibroActasController@store')->name('store');
    });

    Route::name('acuerdo-pendiente.')->group(function () {
        Route::get('acuerdos-pendientes', 'AcuerdoPendienteController@index')->name('index');
        Route::post('store-acuerdo-pendiente', 'AcuerdoPendienteController@store')->name('store');
        Route::post('update-acuerdo-pendiente', 'AcuerdoPendienteController@update')->name('update');
        Route::post('eliminar-acuerdo-pendiente', 'AcuerdoPendienteController@destroy')->name('destroy');
    });

    Route::name('acta-consejo-planeacion.')->group(function () {
        Route::get('actas-consejo-planeacion', 'ActaConsejoPlaneacionController@index')->name('index');
    });

    Route::name('acta-consejo-desarrollo.')->group(function () {//3.4
        Route::get('actas-consejo-desarrollo', 'ActaConsejoDesarrolloController@index')->name('index');
        Route::post('store-actas-consejo-desarrollo', 'ActaConsejoDesarrolloController@store')->name('store');
        Route::post('update-actas-consejo-desarrollo', 'ActaConsejoDesarrolloController@update')->name('update');
        Route::post('delete-actas-consejo-desarrollo', 'ActaConsejoDesarrolloController@delete')->name('delete');
        Route::get('show-actas-consejo-desarrollo/{id}', 'ActaConsejoDesarrolloController@show')->name('show');
    });

    Route::name('juicio-por-ayuntamiento.')->group(function () {//3.5
        Route::get('jucios-por-ayuntamiento', 'JuicioPorAyuntamientoController@index')->name('index');
        Route::post('store-jucios-por-ayuntamiento', 'JuicioPorAyuntamientoController@store')->name('store');
        Route::post('update-jucios-por-ayuntamiento', 'JuicioPorAyuntamientoController@update')->name('update');
        Route::post('delete-jucios-por-ayuntamiento', 'JuicioPorAyuntamientoController@delete')->name('delete');
        Route::get('show-jucios-por-ayuntamiento/{id}', 'JuicioPorAyuntamientoController@show')->name('show');
    });

    Route::name('juicio-contra-ayuntamiento.')->group(function () {//3.6
        Route::get('jucios-contra-ayuntamiento', 'JuicioContraAyuntamientoController@index')->name('index');
        Route::post('store-jucios-contra-ayuntamiento', 'JuicioContraAyuntamientoController@store')->name('store');
        Route::post('update-jucios-contra-ayuntamiento', 'JuicioContraAyuntamientoController@update')->name('update');
        Route::post('delete-jucios-contra-ayuntamiento', 'JuicioContraAyuntamientoController@delete')->name('delete');
        Route::get('show-jucios-contra-ayuntamiento/{id}', 'JuicioContraAyuntamientoController@show')->name('show');
    });

    Route::name('contrato-convenio-acuerdo.')->group(function () {
        Route::get('contratos-convenios-acuerdos', 'ContratosConveniosAcuerdosController@index')->name('index');
        Route::post('contrato-store', 'ContratosConveniosAcuerdosController@store')->name('store');
        Route::get('contrato/{id}/edit', 'ContratosConveniosAcuerdosController@edit')->name('edit');
        Route::post('contrato-update', 'ContratosConveniosAcuerdosController@update')->name('update');
        Route::post('contrato-delete', 'ContratosConveniosAcuerdosController@delete')->name('delete');
    });

    Route::name('conciliacion-bancaria.')->group(function () {
        Route::post('conciliacion-store', 'ConciliacionBancariaController@store')->name('store');
        Route::get('conciliacion/{id}/edit', 'ConciliacionBancariaController@edit')->name('edit');
        Route::post('conciliacion-update', 'ConciliacionBancariaController@update')->name('update');
        Route::post('conciliacion-delete', 'ConciliacionBancariaController@delete')->name('delete');
    });

    Route::name('obra-accion.')->group(function () {
        Route::get('obras-y-acciones', 'ObraAccionController@index')->name('index');
    });

});
