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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/categorias', 'CategoriasController@index')->name('categorias');

Route::get('/categorias/edit/{id}', 'CategoriasController@edit')->name('categoriasedit');

Route::get('/categorias/add', 'CategoriasController@add')->name('categoriasadd');

Route::post('/categorias/store', 'CategoriasController@store')->name('categoriasstore');

Route::post('/categorias/edits/{id}', 'CategoriasController@update')->name('categoriasupdate');

Route::get('/categorias/delete/{id}', 'CategoriasController@destroy')->name('categoriasdelete');



