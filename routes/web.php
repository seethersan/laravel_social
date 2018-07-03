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

Route::get('/', 'Auth\LoginController@showLoginForm')->middleware('guest');

Route::post('/agregaramigo', 'AmistadController@agregarAmigo');
Route::get('/persona/amigos/{persona}', 'AmistadController@amigos');

Route::resource('persona', 'PersonaController');

$this->post('login', 'Auth\LoginController@login')->name('login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');


