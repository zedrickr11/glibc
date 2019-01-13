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
    return view('home.inicio');
})->middleware('auth');

Route::resource('curso','CursoController');
Route::resource('ciclo','CicloController');
Route::resource('seccion','SeccionController');
Route::resource('plan','PlanController');
Route::resource('tipo-actividad', 'TipoActividadController');
Route::resource('mora','MoraController');

Route::resource('rol','RolController');
Route::resource('jornada','JornadaController');
Route::resource('unidad','UnidadController');
Route::resource('cuota','CuotaController');
Route::resource('mensualidad','MensualidadController');
Route::resource('carrera','CarreraController');

Route::resource('alumno','AlumnoController');
Route::get('alumno/downloadFeEdad/{file}', 'AlumnoController@downloadFeEdad');

Route::resource('inscripcion','InscripcionController');

Route::resource('grado','GradoController');

Route::get('grados/{idCiclo}', 'InscripcionController@grados');
Route::get('grado/{grado}/asignacion', ['as' => 'grado.asignacion', 'uses' => 'GradoController@asignacion']);
Route::post('grado/addasignacion', ['as' => 'grado.addasignacion', 'uses' => 'GradoController@addAsignacion']);
Route::put('grado/{asignacion}/editasignacion', ['as' => 'grado.editasignacion', 'uses' => 'GradoController@editAsignacion']);
Route::delete('grado/{asignacion}/deleteasignacion', ['as' => 'grado.deleteasignacion', 'uses' => 'GradoController@deleteAsignacion']);

Route::resource('pagomensualidad','PagoMensualidadController');
Route::get('pagomensualidad/{id}/pagos', ['as' => 'pagomensualidad.pagos', 'uses' => 'PagoMensualidadController@pagos']);
Route::get('pagomensualidad/{id}/create', ['as' => 'pagomensualidad.create', 'uses' => 'PagoMensualidadController@create']);

Route::resource('pagocuota','PagoCuotaController');
Route::get('pagocuota/{id}/pagos', ['as' => 'pagocuota.pagos', 'uses' => 'PagoCuotaController@pagos']);

Route::resource('persona','PersonaController');
Route::resource('padre','PadreController');

Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@login');
Route::get('logout','Auth\LoginController@logout');

Route::post('saveUserMaestro','PersonaController@saveUserMaestro')->name('loginMaestro');
Route::post('saveUserPadre','PadreController@saveUserPadre')->name('loginPadre');

Route::get('test', function(){
  $user = new App\User;
  $user->name='Zedrick Rodríguez';
  $user->email='zedrickr@gmail.com';
  $user->password=bcrypt('secret');
  $user->id_persona=1;
  $user->save();
  return $user;
});

//notas
Route::get('notas','ActividadController@grados')->name('notas.grados');
Route::get('notas/cursos/{id}','ActividadController@cursos')->name('notas.cursos');
Route::get('notas/actividades/{grado}/{curso}','ActividadController@actividades')->name('notas.actividades');
Route::get('notas/alumnos/{grado}/{actividad}','ActividadController@alumnos')->name('notas.alumnos');
Route::get('actividad/create/{grado}/{curso}/{id}','ActividadController@create')->name('actividad.create');
Route::post('actividad/store/{grado}/{curso}','ActividadController@store')->name('actividad.store');
Route::get('actividad/edit/{grado}/{curso}/{asignacion}/{id}','ActividadController@edit')->name('actividad.edit');
Route::put('actividad/update/{grado}/{curso}/{id}','ActividadController@update')->name('actividad.update');
Route::delete('actividad/delete/{id}', 'ActividadController@destroy')->name('actividad.destroy');

Route::resource('calificar','NotaController');
