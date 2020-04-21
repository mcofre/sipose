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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['web', 'auth']], function () {
	//Route::middleware(['auth'])->group(function () {
	//Roles
	Route::post('roles/store', 'RoleController@store')->name('roles.store')
		->middleware('can:roles.create');

	Route::get('roles', 'RoleController@index')->name('roles.index')
		->middleware('can:roles.index');
		//->middleware('permission:roles.index');

	Route::get('roles/create', 'RoleController@create')->name('roles.create')
		->middleware('can:roles.create');

	Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
		->middleware('can:roles.edit');

	Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
		->middleware('can:roles.show');

	Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
		->middleware('can:roles.destroy');

	Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
		->middleware('can:roles.edit');

//Users
	Route::get('users', 'UserController@index')->name('users.index')
		->middleware('can:user.index');
		//->middleware('permission:users.index');
	Route::get('users/create', 'UserController@create')->name('usuario.create')
		->middleware('can:users.create');

	Route::post('users','UserController@store')->name('users.store')
		->middleware('can:users.create');

	Route::put('users/{user}', 'UserController@update')->name('users.update')
		->middleware('can:users.edit');

	Route::get('users/{user}', 'UserController@show')->name('users.show')
		->middleware('can:users.show');

	Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
		->middleware('can:users.destroy');

	Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
		->middleware('can:users.edit');

//Products
	Route::post('products/store', 'ProductController@store')->name('products.store')
		->middleware('can:products.create');

	Route::get('products', 'ProductController@index')->name('products.index')
		->middleware('can:products.index');
		//->middleware('permission:products.index');

	Route::get('products/create', 'ProductController@create')->name('products.create')
		->middleware('can:products.create');

	Route::put('products/{product}', 'ProductController@update')->name('products.update')
		->middleware('can:products.edit');

	Route::get('products/{product}', 'ProductController@show')->name('products.show')
		->middleware('can:products.show');

	Route::delete('products/{product}', 'ProductController@destroy')->name('products.destroy')
		->middleware('can:products.destroy');

	Route::get('products/{product}/edit', 'ProductController@edit')->name('products.edit')
		->middleware('can:products.edit');

//NACIONALIDAD
	Route::post('nacionalidades/store', 'NacionalidadController@store')->name('nacionalidad.store')
		->middleware('can:nacionalidad.create');

	Route::get('nacionalidad', 'NacionalidadController@index')->name('nacionalidad.index')
		->middleware('can:nacionalidad.index');
		//->middleware('permission:products.index');

	Route::get('nacionalidad/create', 'NacionalidadController@create')->name('nacionalidad.create')
		->middleware('can:nacionalidad.create');

	Route::put('nacionalidad/{nacionalidad}', 'NacionalidadController@update')->name('nacionalidad.update')
		->middleware('can:nacionalidad.edit');

	Route::get('nacionalidad/{nacionalidad}', 'NacionalidadController@show')->name('nacionalidad.show')
		->middleware('can:nacionalidad.show');

	Route::delete('nacionalidad/{nacionalidad}', 'NacionalidadController@destroy')->name('nacionalidad.destroy')
		->middleware('can:nacionalidad.destroy');

	Route::get('nacionalidad/{nacionalidad}/edit', 'NacionalidadController@edit')->name('nacionalidad.edit')
		->middleware('can:nacionalidad.edit');

//PROSPECTO
	Route::post('prospecto/store', 'prospectoController@store')->name('prospecto.store')
		->middleware('can:prospecto.create');

	Route::get('prospecto', 'prospectoController@index')->name('prospecto.index')
		->middleware('can:prospecto.index');
		//->middleware('permission:products.index');

	Route::get('prospecto/create', 'prospectoController@create')->name('prospecto.create')
		->middleware('can:prospecto.create');

	Route::put('prospecto/{prospecto}', 'prospectoController@update')->name('prospecto.update')
		->middleware('can:prospecto.edit');

	Route::get('prospecto/{prospecto}', 'prospectoController@show')->name('prospecto.show')
		->middleware('can:prospecto.show');

	Route::delete('prospecto/{prospecto}', 'prospectoController@destroy')->name('prospecto.destroy')
		->middleware('can:prospecto.destroy');

	Route::get('prospecto/{prospecto}/edit', 'prospectoController@edit')->name('prospecto.edit')
		->middleware('can:prospecto.edit');

// APODERADO
	Route::post('apoderados/store', 'ApoderadoController@store')->name('apoderado.store')
		->middleware('can:apoderado.create');

	Route::get('apoderados', 'ApoderadoController@index')->name('apoderado.index')
		->middleware('can:apoderado.index');

	Route::get('apoderados/create', 'ApoderadoController@create')->name('apoderado.create')
		->middleware('can:apoderado.create');

	Route::put('apoderados/{apoderado}', 'ApoderadoController@update')->name('apoderado.update')
		->middleware('can:apoderado.edit');

	Route::get('apoderados/{apoderado}', 'ApoderadoController@show')->name('apoderado.show')
		->middleware('can:apoderado.show');

	Route::delete('apoderados/{apoderado}', 'ApoderadoController@destroy')->name('apoderado.destroy')
		->middleware('can:apoderado.destroy');

	Route::get('apoderados/{apoderado}/edit', 'ApoderadoController@edit')->name('apoderado.edit')
		->middleware('can:apoderado.edit');

// POSTULACIONES
	Route::post('postulacion/store', 'PostulacionController@store')->name('postulacion.store')
		->middleware('can:postulacion.create');

	Route::get('postulacion', 'PostulacionController@index')->name('postulacion.index')
		->middleware('can:postulacion.index');

	Route::get('postulacion/create', 'PostulacionController@create')->name('postulacion.create')
		->middleware('can:postulacion.create');

	Route::put('postulacion/{postulacion}', 'PostulacionController@update')->name('postulacion.update')
		->middleware('can:postulacion.edit');

	Route::get('postulacion/{postulacion}', 'PostulacionController@show')->name('postulacion.show')
		->middleware('can:postulacion.show');

	Route::delete('postulacion/{postulacion}', 'PostulacionController@destroy')->name('postulacion.destroy')
		->middleware('can:postulacion.destroy');

	Route::get('postulacion/{postulacion}/edit', 'PostulacionController@edit')->name('postulacion.edit')
		->middleware('can:postulacion.edit');

//RANKING
	Route::get('ranking', 'RankingController@index')->name('ranking.index');
	Route::post('ranking', 'RankingController@index');

// ->middleware('can:postulacion.index');
	Route::get('files/{postulacion}/{archivo}/{filename}', 'PostulacionController@file')->name('archivos.descargar');

// CONFIGURACION
	Route::post('configuracion/store', 'ConfiguracionController@store')->name('configuracion.store')
	->middleware('can:configuracion.create');

	Route::get('configuracion', 'ConfiguracionController@index')->name('configuracion.index')
	->middleware('can:configuracion.index');

	Route::get('configuracion/create', 'ConfiguracionController@create')->name('configuracion.create')
	->middleware('can:configuracion.create');

	Route::put('configuracion/{configuracion}', 'ConfiguracionController@update')->name('configuracion.update')
	->middleware('can:configuracion.edit');

	Route::get('configuracion/{configuracion}', 'ConfiguracionController@show')->name('configuracion.show')
	->middleware('can:configuracion.show');

	Route::delete('configuracion/{configuracion}', 'ConfiguracionController@destroy')->name('configuracion.destroy')
	->middleware('can:configuracion.destroy');

	Route::get('configuracion/{configuracion}/edit', 'ConfiguracionController@edit')->name('configuracion.edit')
	->middleware('can:configuracion.edit');

// CURSO
	Route::post('curso/store', 'cursoController@store')->name('curso.store')
	->middleware('can:curso.create');

	Route::get('curso', 'cursoController@index')->name('curso.index')
	->middleware('can:curso.index');

	Route::get('curso/create', 'cursoController@create')->name('curso.create')
	->middleware('can:curso.create');

	Route::put('curso/{curso}', 'cursoController@update')->name('curso.update')
	->middleware('can:curso.edit');

	Route::get('curso/{curso}', 'cursoController@show')->name('curso.show')
	->middleware('can:curso.show');

	Route::delete('curso/{curso}', 'cursoController@destroy')->name('curso.destroy')
	->middleware('can:curso.destroy');

	Route::get('curso/{curso}/edit', 'cursoController@edit')->name('curso.edit')
	->middleware('can:curso.edit');

});
