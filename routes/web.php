<?php

use Illuminate\Support\Facades\Route;

Route::get('home', 'HomeController@index')->name('home');
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/', 'Auth\LoginController@showLoginForm')->name('login.form');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login.show');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('users','UserController@index')->name('users.index');
Route::get('users/dataTable','UserController@dataTable')->name('users.datatable');
Route::get('users/profile','UserController@profile')->name('users.profile');
Route::get('users/changepass','UserController@changepass')->name('users.changepass');
Route::get('users/create','UserController@create')->name('users.create');
Route::get('users/chg_pass','UserController@chg_pass')->name('users.chg_pass');
Route::get('users/edit/{id}','UserController@edit')->name('users.edit');
Route::post('users/store','UserController@store')->name('users.store');
Route::post('users/update','UserController@update')->name('users.update');
Route::get('units/ajax_store','UnitController@ajax_store')->name('units.ajax_store');

/* ----------------------------------------------------------------
MODULO DE DENUNCIAS
--------------------------------------------------------------------*/
Route::get('denunciations','DenunciationController@index')->name('denunciations.index');
Route::get('denunciations/ajax_get','DenunciationController@ajax_get')->name('denunciations.ajax_get');
//-----------------------------------------------------------------------