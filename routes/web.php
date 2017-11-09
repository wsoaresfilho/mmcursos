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

Route::get('/home', 'HomeController@index')->name('home');

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

Route::get('/cursos/delete/{id}', 'CursosController@destroy')->name('cursosdelete');