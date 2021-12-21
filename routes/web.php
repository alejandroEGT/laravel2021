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
    return view('public.app');
});
// vistas publicas
Route::get('/formulario-usuario', 'PublicController@vista_formulario_users');
Route::get('/login', 'PublicController@vista_login')->name('login');

//rutas publicas
Route::post('user/save', 'UserController@user_save');
Route::post('auth','AuthController@auth');

// autenticacion 
Route::group(['middleware' => ['auth']], function () {
    //vistas privadas
    Route::get('private_home', 'PrivateController@vista_privada');
    //metodos privados
    Route::get('logout', 'AuthController@logout');
    //auth admin
    Route::group(['middleware' => ['perfil_admin']], function () {
        //vistas
        Route::get('formulario-productos','ProductosController@vista_formulario_productos');
        Route::get('lista-productos','ProductosController@vista_lista_productos');
        Route::get('lista-usuarios','UserController@vista_lista_usuarios');
        //metodos
        Route::post('productos/save', 'ProductosController@guardar');
        Route::put('productos/update', 'ProductosController@actualizar');
        Route::delete('productos/delete/{id}', 'ProductosController@eliminar');
        Route::delete('usuario/delete/{id}', 'UserController@eliminar');
        Route::put('usuarios/update', 'UserController@actualizar');
    });
    //auth usuario
    Route::group(['middleware' => ['perfil_usuario']], function () {
        Route::get('user/lista-productos','ProductosController@vista_lista_productos');
    });

});

