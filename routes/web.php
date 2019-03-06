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
Route::get('alumno/downloadFeEdad/{id}', 'AlumnoController@downloadFeEdad')->name('alumno.downloadFeEdad');
Route::get('alumno/crear/{idPadre?}', 'AlumnoController@create')->name('alumno.crear');

Route::get('inscripcion/pasouno', 'InscripcionController@pasouno')->name('inscripcion.pasouno');
Route::get('inscripcion/pasodos/{idPadre?}', 'InscripcionController@pasodos')->name('inscripcion.pasodos');
Route::get('inscripcion/pasotres/{idAlumno?}', 'InscripcionController@pasotres')->name('inscripcion.pasotres');
Route::resource('inscripcion','InscripcionController');

Route::resource('grado','GradoController');

Route::get('grados/{idCiclo}', 'InscripcionController@grados');
Route::get('grado/{grado}/asignacion', ['as' => 'grado.asignacion', 'uses' => 'GradoController@asignacion']);
Route::post('grado/addasignacion', ['as' => 'grado.addasignacion', 'uses' => 'GradoController@addAsignacion']);
Route::put('grado/{asignacion}/editasignacion', ['as' => 'grado.editasignacion', 'uses' => 'GradoController@editAsignacion']);
Route::delete('grado/{asignacion}/deleteasignacion', ['as' => 'grado.deleteasignacion', 'uses' => 'GradoController@deleteAsignacion']);

Route::resource('pagomensualidad','PagoMensualidadController');
Route::get('pagomensualidad/{id}/pagos', ['as' => 'pagomensualidad.pagos', 'uses' => 'PagoMensualidadController@pagos']);
Route::put('pagomensualidad/{id}/editar', ['as' => 'pagomensualidad.editar', 'uses' => 'PagoMensualidadController@editar']);
Route::get('pagomensualidad/{id}/reporte', ['as' => 'pagomensualidad.reporte', 'uses' => 'PagoMensualidadController@reporte']);
Route::get('pagomensualidad/{idGrado}/pdf', ['as' => 'pagomensualidad.pdf', 'uses' => 'PagoMensualidadController@pdf']);
Route::get('pagomensualidad/{idGrado}/cuotapdf', ['as' => 'pagomensualidad.cuotapdf', 'uses' => 'PagoMensualidadController@cuotapdf']);

Route::resource('pagocuota','PagoCuotaController');
Route::get('pagocuota/{id}/pagos', ['as' => 'pagocuota.pagos', 'uses' => 'PagoCuotaController@pagos']);
Route::get('pagocuota/{idCuota}/grados', ['as' => 'pagocuota.grados', 'uses' => 'PagoCuotaController@grados']);
Route::get('pagocuota/{idCuota}/{idGrado}', ['as' => 'pagocuota.alumnos', 'uses' => 'PagoCuotaController@alumnos']);
Route::put('pagocuota/{idCuota}/{idInscripcion}', ['as' => 'pagocuota.editar', 'uses' => 'PagoCuotaController@editar']);

Route::resource('persona','PersonaController');
Route::resource('padre','PadreController');

Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@login');
Route::get('logout','Auth\LoginController@logout');

Route::post('saveUserMaestro','PersonaController@saveUserMaestro')->name('loginMaestro');
Route::post('saveUserPadre','PadreController@saveUserPadre')->name('loginPadre');
Route::post('saveUserAdmin','PersonaAdminController@saveUserAdmin')->name('loginAdmin');


Route::get('test', function(){
  $user = new App\User;
  $user->name='Zedrick Rodríguez';
  $user->email='zedrickr@gmail.com';
  $user->password=bcrypt('secret');
  $user->id_persona=3;
  $user->save();
  return $user;
});

//notas
Route::get('notas','ActividadController@grados')->name('notas.grados');
Route::get('notas/cursos/{id}','ActividadController@cursos')->name('notas.cursos');
Route::get('notas/actividades/{grado}/{curso}','ActividadController@actividades')->name('notas.actividades');
Route::get('notas/alumnos/{grado}/{curso}/{actividad}','ActividadController@alumnos')->name('notas.alumnos');
Route::get('actividad/create/{grado}/{curso}/{id}','ActividadController@create')->name('actividad.create');
Route::post('actividad/store/{grado}/{curso}','ActividadController@store')->name('actividad.store');
Route::get('actividad/edit/{grado}/{curso}/{asignacion}/{id}','ActividadController@edit')->name('actividad.edit');
Route::put('actividad/update/{grado}/{curso}/{id}','ActividadController@update')->name('actividad.update');
Route::delete('actividad/delete/{id}', 'ActividadController@destroy')->name('actividad.destroy');

Route::resource('calificar','NotaController');


Route::resource('usuarios','UserController');
Route::post('role',['as'=>'usuarios.role','uses' => 'UserController@role']);
Route::get('usuarios/listado/{id}',['as'=>'usuarios.list','uses' => 'UserController@listRole']);
Route::resource('administrativo','PersonaAdminController');

Route::resource('asistencia','AsistenciaController');
Route::get('asistencia/cursos/{idGrado}','AsistenciaController@cursos')->name('asistencia.cursos');
Route::get('asistencia/{idCurso}/{idGrado}','AsistenciaController@asistencias')->name('asistencia.asistencias');
Route::get('asistencia/alumnos/{idCurso}/{idGrado}','AsistenciaController@alumnos')->name('asistencia.alumnos');
Route::get('asistencia/ver/{idCurso}/{idGrado}/{fecha}','AsistenciaController@ver')->name('asistencia.ver');

Route::resource('archivo','ArchivoController');
Route::get('archivo/downloadArchivo/{id}', 'ArchivoController@downloadArchivo')->name('archivo.downloadArchivo');

Route::resource('record','RecordController');
Route::get('record/cursos/{idGrado}','RecordController@cursos')->name('record.cursos');
Route::get('record/alumnos/{idCurso}/{idGrado}','RecordController@alumnos')->name('record.alumnos');
Route::get('record/{idInscripcion}/alumno','RecordController@alumno')->name('record.alumno');
Route::get('record/{idInscripcion}/reportespdf','RecordController@reportespdf')->name('record.reportespdf');
Route::get('record/{idInscripcion}/inasistenciaspdf','RecordController@inasistenciaspdf')->name('record.inasistenciaspdf');


//reporte de notas
Route::get('cuadrounidad/{idGrado}/{idCurso}/{idUnidad}/pdf', ['as' => 'notas.cuadrounidad', 'uses' => 'NotaController@cursoUnidad']);
Route::get('cuadrofinal/{idGrado}/{idUnidad}/pdf', ['as' => 'notas.cuadrofinal', 'uses' => 'NotaController@cursoFinal']);
Route::get('tarjetas/{idGrado}/{idUnidad}/pdf', ['as' => 'notas.tarjetas', 'uses' => 'NotaController@tarjetas']);

//portal padres
Route::get('hijos', ['as' => 'portalpadres.hijos', 'uses' => 'PortalPadreController@hijos']);
Route::get('hijos/notas/{idAlumno}/{idGrado}', ['as' => 'portalpadres.notas', 'uses' => 'PortalPadreController@pnotas']);
