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
    return view('auth/login');
});

Auth::routes();

// Rota padrão para usuários
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dash')->name('dash');
Route::get('/aulas/{curso_id}/{conteudo_id}', 'HomeController@aulas')->name('aulas');

// Rota padrão para admins
Route::get('/admin', 'AdminController@index')->name('admin');

//Categorias
Route::get('/categorias', 'CategoriasController@index')->name('categorias');

Route::get('/categorias/edit/{id}', 'CategoriasController@edit')->name('categoriasedit');

Route::get('/categorias/add', 'CategoriasController@add')->name('categoriasadd');

Route::post('/categorias/store', 'CategoriasController@store')->name('categoriasstore');

Route::post('/categorias/edits/{id}', 'CategoriasController@update')->name('categoriasupdate');

Route::get('/categorias/delete/{id}', 'CategoriasController@destroy')->name('categoriasdelete');

//Cursos
Route::get('/cursos', 'CursosController@index')->name('cursos');

Route::get('/cursos/edit/{id}', 'CursosController@edit')->name('cursosedit');

Route::get('/cursos/add', 'CursosController@add')->name('cursosadd');

Route::post('/cursos/store', 'CursosController@store')->name('cursosstore');

Route::post('/cursos/edits/{id}', 'CursosController@update')->name('cursosupdate');

//users
Route::get('/users', 'usersController@index')->name('users');

Route::get('/users/edit/{id}', 'usersController@edit')->name('usersedit');

Route::get('/users/add', 'usersController@add')->name('usersadd');

Route::post('/users/store', 'usersController@store')->name('usersstore');

Route::post('/users/edits/{id}', 'usersController@update')->name('usersupdate');

Route::get('/users/delete/{id}', 'usersController@destroy')->name('usersdelete');

Route::get('/cursos/delete/{id}', 'CursosController@destroy')->name('cursosdelete');

//Conteudos
Route::get('/conteudos', 'ConteudosController@index')->name('conteudos');

Route::get('/conteudos/edit/{id}', 'ConteudosController@edit')->name('conteudosedit');

Route::get('/conteudos/add', 'ConteudosController@add')->name('conteudosadd');

Route::post('/conteudos/store', 'ConteudosController@store')->name('conteudosstore');

Route::post('/conteudos/edits/{id}', 'ConteudosController@update')->name('conteudosupdate');

Route::get('/conteudos/delete/{id}', 'ConteudosController@destroy')->name('conteudosdelete');
