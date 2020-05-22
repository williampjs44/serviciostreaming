<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Perfil

Route::get('perfil', 'PerfilController@index')->name('perfil');

Route::post('search', 'PerfilController@search')->name('search');

Route::resource('comentarios','ComentariosController');

Route::get('contenidos/usuario/{id_user}','ContenidosController@showall')->where('id_user','[0-9]+');

Route::resource('contenidos','ContenidosController');

Route::resource('restricciones','RestriccionesController');

Route::get('categorias', function () {
    return view('categorias');
});
