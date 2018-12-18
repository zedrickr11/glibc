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
Route::resource('tipo-actividad','TipoActividadController');
Route::resource('mora','MoraController');
