<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
 */
//
Route::resource('apoderados','ApoderadoController');
Route::resource('alumnos','AlumnoController');


Route::get('/', 'InicioController@index');
Route::get('inicio', 'InicioController@index');
Route::get('about', 'InicioController@about');
Route::get('contact', 'InicioController@contact');
Route::get('layout', 'InicioController@layout');





