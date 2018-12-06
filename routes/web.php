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
    return view('layouts.admin');
});

Route::resource('curso','CursoController');
Route::resource('ciclo','CicloController');
Route::resource('seccion','SeccionController');
Route::resource('plan','PlanController');

//Carreras
Route::get('carrera', 'CarreraController@list');
Route::get('carrera/{id}', 'CarreraController@view');
Route::post('carrera', 'CarreraController@add');
Route::put('carrera/{id}', 'CarreraController@edit');
Route::delete('carrera/{id}', 'CarreraController@delete');

//Niveles
Route::get('nivel', 'NivelController@list');
Route::get('nivel/{id}', 'NivelController@view');
Route::post('nivel', 'NivelController@add');
Route::put('nivel/{id}', 'NivelController@edit');
Route::delete('nivel/{id}', 'NivelController@delete');

//Unidad
Route::get('unidad', 'UnidadController@list');
Route::get('unidad/{id}', 'UnidadController@view');
Route::post('unidad', 'UnidadController@add');
Route::put('unidad/{id}', 'UnidadController@edit');
Route::delete('unidad/{id}', 'UnidadController@delete');

//Jornada
Route::get('jornada', 'JornadaController@list');
Route::get('jornada/{id}', 'JornadaController@view');
Route::post('jornada', 'JornadaController@add');
Route::put('jornada/{id}', 'JornadaController@edit');
Route::delete('jornada/{id}', 'JornadaController@delete');

//Cuota
Route::get('cuota', 'CuotaController@list');
Route::get('cuota/{id}', 'CuotaController@view');
Route::post('cuota', 'CuotaController@add');
Route::put('cuota/{id}', 'CuotaController@edit');
Route::delete('cuota/{id}', 'CuotaController@delete');

//Mensualidad
Route::get('mensualidad', 'MensualidadController@list');
Route::get('mensualidad/{id}', 'MensualidadController@view');
Route::post('mensualidad', 'MensualidadController@add');
Route::put('mensualidad/{id}', 'MensualidadController@edit');
Route::delete('mensualidad/{id}', 'MensualidadController@delete');

//Rol
/*Route::get('rol', 'RolController@index');
Route::get('rol/{id}', 'RolController@view');
Route::post('rol', 'RolController@add');
Route::put('rol/{id}', 'RolController@edit');
Route::delete('rol/{id}', 'RolController@delete');
*/

Route::resource('rol','RolController');
