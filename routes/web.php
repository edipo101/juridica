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

/* ----------------------------------------------------------------
MODULO DE TRÁMITES
--------------------------------------------------------------------*/
Route::get('documents','procedures_module\DocumentController@index')->name('documents.index');
Route::get('documents/json_mydocs','procedures_module\DocumentController@json_mydocs')->name('documents.json_mydocs');
Route::get('documents/ext_docs','procedures_module\DocumentController@ext_docs')->name('documents.ext_docs');
Route::get('documents/json_extdocs','procedures_module\DocumentController@json_extdocs')->name('documents.json_extdocs');
Route::get('documents/int_docs','procedures_module\DocumentController@int_docs')->name('documents.int_docs');
Route::get('documents/json_intdocs','procedures_module\DocumentController@json_intdocs')->name('documents.json_intdocs');
Route::get('documents/get_document','procedures_module\DocumentController@get_document')->name('documents.get_document');
Route::get('documents/json/destroy','procedures_module\DocumentController@destroy')->name('documents.destroy');
Route::get('documents/create','procedures_module\DocumentController@create')->name('documents.create');
Route::get('documents/edit/{id}','procedures_module\DocumentController@edit')->name('documents.edit');
Route::post('documents/store','procedures_module\DocumentController@store')->name('documents.store');
Route::post('documents/ext_store','procedures_module\DocumentController@ext_store')->name('documents.ext_store');
Route::post('documents/update','procedures_module\DocumentController@update')->name('documents.update');

Route::get('my_documents','procedures_module\UnitRouteController@my_index')->name('unit_routes.my_index');
Route::get('my_datatable','procedures_module\UnitRouteController@my_datatable')->name('unit_routes.my_datatable');

Route::get('doc_routes','procedures_module\DocRouteController@index')->name('doc_routes.index');
Route::get('doc_routes/sent_docs','procedures_module\DocRouteController@sent_docs')->name('doc_routes.sent_docs');
Route::get('doc_routes/datatable','procedures_module\DocRouteController@datatable')->name('doc_routes.datatable');
Route::get('doc_routes/json_sentdocs','procedures_module\DocRouteController@json_sentdocs')->name('doc_routes.json_sentdocs');
Route::get('doc_routes/json/store','procedures_module\DocRouteController@json_store')->name('doc_routes.json_store');
Route::get('doc_routes/ajax/set_viewed','procedures_module\DocRouteController@set_viewed')->name('doc_routes.set_viewed');
Route::get('doc_routes/ajax/get_users','procedures_module\DocRouteController@ajax_get_users')->name('doc_routes.get_users');

Route::get('unit_routes','procedures_module\UnitRouteController@index')->name('unit_routes.index');
Route::get('unit_routes/create','procedures_module\UnitRouteController@create')->name('unit_routes.create');
Route::get('unit_routes/edit/{id}','procedures_module\UnitRouteController@edit')->name('unit_routes.edit');
Route::post('unit_routes/store','procedures_module\UnitRouteController@store')->name('unit_routes.store');
Route::post('unit_routes/update','procedures_module\UnitRouteController@update')->name('unit_routes.update');
Route::get('unit_routes/datatable','procedures_module\UnitRouteController@data_table')->name('unit_routes.datatable');

Route::get('user_routes','procedures_module\UserRouteController@index')->name('user_routes.index');
Route::get('user_routes/ajax_store','procedures_module\UserRouteController@ajax_store')->name('user_routes.ajax_store');
Route::get('user_routes/ajax_get','procedures_module\UserRouteController@ajax_get')->name('user_routes.ajax_get');
Route::get('user_routes/ajax_setViewed','procedures_module\UserRouteController@ajax_setViewed')->name('user_routes.ajax_setViewed');
Route::get('user_routes/datatable','procedures_module\UserRouteController@data_table')->name('user_routes.datatable');

Route::get('units/ajax_store','UnitController@ajax_store')->name('units.ajax_store');
//-----------------------------------------------------------------------

Route::get('denunciations', 'denunciations_module\DenunciationController@index')->name('denunciations.index');