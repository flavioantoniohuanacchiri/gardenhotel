<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'PublicController@index');
Route::get('hotel', 'PublicController@hotel');
Route::get('habitaciones', 'PublicController@habitaciones');
Route::get('sala-conferencias', 'PublicController@sala_conferencias');
Route::get('ubicacion', 'PublicController@ubicacion');
Route::get('ofertas', 'PublicController@ofertas');
Route::get('admin', 'Auth\LoginController@loginView');

Auth::routes();
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function (){
  Route::get('logout', 'Auth\LoginController@logout');
  Route::get('web/listar', 'WebController@listar');
  Route::get('web/cambiarestado/{id}', 'WebController@cambiarEstado');
  Route::get('section-inicio', 'WebController@index');
  Route::get('section-hotel', 'WebController@hotel');
  Route::get('section-habitaciones', 'WebController@habitaciones');
  Route::get('section-ofertas', 'WebController@ofertas');
  Route::get('section-salaconferencias', 'WebController@salaconferencias');
  Route::get('section-centrofinanciero', 'WebController@centrofinanciero');

  Route::resource('web', 'WebController');
});
