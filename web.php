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



//ROTAS DE PESSOAS

Route::post('/admin/pessoas', 'Admin\PessoaController@store')->name('pessoas.store');
Route::get('/admin/pessoas/create', 'Admin\PessoaController@create')->name('pessoas.create');
Route::get('/admin/pessoas', 'Admin\PessoaController@index')->name('pessoas.index');

Route::get('/admin/gerals', 'Admin\GeralController@index')->name('gerals.index');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
/*
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/