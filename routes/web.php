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
Route::resource('tipo-actividad', 'TipoActividadController');
Route::resource('mora','MoraController');

Route::resource('rol','RolController');
Route::resource('nivel','NivelController');
Route::resource('jornada','JornadaController');
Route::resource('unidad','UnidadController');
Route::resource('cuota','CuotaController');
Route::resource('mensualidad','MensualidadController');
Route::resource('carrera','CarreraController');

Route::resource('alumno','AlumnoController');
Route::get('alumno/downloadFeEdad/{file}', 'AlumnoController@downloadFeEdad');

Route::resource('inscripcion','InscripcionController');

Route::resource('grado','GradoController');

Route::get('grado/{grado}/asignacion', ['as' => 'grado.asignacion', 'uses' => 'GradoController@asignacion']);
Route::post('grado/addasignacion', ['as' => 'grado.addasignacion', 'uses' => 'GradoController@addAsignacion']);
Route::put('grado/{asignacion}/editasignacion', ['as' => 'grado.editasignacion', 'uses' => 'GradoController@editAsignacion']);
Route::delete('grado/{asignacion}/deleteasignacion', ['as' => 'grado.deleteasignacion', 'uses' => 'GradoController@deleteAsignacion']);


Route::resource('persona','PersonaController');
