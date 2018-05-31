<?php

Route::get('Login', 'Auth\LoginController@showLoginForm');
Route::get('Logout', 'Auth\LoginController@logout');
Route::post('Login', 'Auth\LoginController@login');
Route::get('Inicio', [ 'as' => 'inicio', 'uses' => 'IndexController@index']);
Route::resource('Reserva', 'ReservaController');
Route::resource('Usuarios', 'UsuariosController');
Route::resource('Consulta', 'ConsultaController');
Route::get('Profesional', 'ReservaController@profesional');
Route::get('HorarioDisponible', 'ReservaController@horarioDisponible');
Route::get('HorarioDisponibleProfesional', 'ReservaController@horarioDisponibleProfesional');
Route::get('ConsultarReserva', [ 'as' => 'consultarReserva', 'uses' => 'ConsultaController@consultarReserva']);