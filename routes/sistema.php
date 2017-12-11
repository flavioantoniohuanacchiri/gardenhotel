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
Route::group(['prefix' => 'admin', 'middleware' => ['web']], function () {
    Auth::routes();
    Route::get('/', 'HomeController@index');
    //rrutas web
    Route::get('section-inicio', function (){
      return view('master.web.hoteles');
    });
});
Route::get('/logout', 'Auth\LoginController@logout');
Route::post('/login', 'Auth\LoginController@postLogin');
Route::group(['middleware' => ['web']], function () {
  Route::resource('grupodispositivogpx', 'Master\GrupoDispositivoGpxController');
  Route::resource('grupodispositivo', 'Master\GrupoDispositivoController');
  Route::resource('dispositivo', 'Master\DispositivoController');
  Route::get('/auth/edituser', function () {
      return view("edituser");
  });

  Route::post('/user/editardatos', 'Master\UserController@editarDatos');
});
Route::resource('prueba', 'PruebaController');
/*Route::get("mapa",function(){
	return view("mapas.tracer");
});*/
Route::get('tracermapa', 'Tracer\MapaController@getTracer');
Route::get('tracerubicacion', 'Tracer\MapaController@setUbicacion');
Route::post('ubicaciones', 'Tracer\MapaController@getUbicaciones');
//rutas públicas
Route::get('index', 'PublicController@inicio');
Route::get('hotel', 'PublicController@hotel');
Route::get('habitaciones', 'PublicController@habitaciones');
Route::get('sala-de-conferencias', 'PublicController@sala_conferencias');
Route::get('ubicacion', 'PublicController@ubicacion');
