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

Route::get('/empleado/index', 'EmpleadoController@index')->name('empleado.index');

Route::post('/empleado/store', 'EmpleadoController@store')->name('empleado.store');

Route::get('/empleado/{empleado}/show', 'EmpleadoController@show')->name('empleado.show');

Route::get('/empleado/create','EmpleadoController@create')->name('empleado.create')->middleware("editDeleteInsert.admin");;

Route::delete('/empleado/{empleado}','EmpleadoController@destroy')->name('empleado.destroy')->middleware("editDeleteInsert.admin");;

Route::get('/empleado/{empleado}/edit','EmpleadoController@edit')->name('empleado.edit')->middleware("editDeleteInsert.admin");

Route::put('/empleado/{empleado}','EmpleadoController@update')->name('empleado.update');


Route::post('/changeLang', 'HomeController@changeLang')->name('changeLang');

Route::get('/changeLangGet/{locale_id}', 'HomeController@changeLangGet')->name('changeLangGet');


//Nuevas rutas Datos contacto
Route::get('datoContacto','DatoContactoController@index')->name('datoContacto.index');

Route::get('datoContacto/{empleado}/create','DatoContactoController@create')->name('datoContacto.create');
Route::post('datoContacto','DatoContactoController@store')->name('datoContacto.store');

Route::get('datoContacto/{datoContacto}/show','DatoContactoController@show')->name('datoContacto.show');

Route::get('datoContacto/{datoContacto}/edit','DatoContactoController@edit')->name('datoContacto.edit');
Route::put('datoContacto/{datoContacto}','DatoContactoController@update')->name('datoContacto.update');

Route::delete('datoContacto/{datoContacto}/{empleadoId}','DatoContactoController@destroy')->name('datoContacto.destroy');
