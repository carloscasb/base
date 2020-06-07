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

Route::get('/admin/pessoas/create', 'Admin\PessoaController@create')->name('pessoas.create');

Route::put('/admin/pessoas/{url}', 'Admin\PessoaController@update')->name('pessoas.update');

Route::get('/admin/pessoas/{url}/edit', 'Admin\PessoaController@edit')->name('pessoas.edit');
Route::any('/admin/pessoas/search', 'Admin\PessoaController@search')->name('pessoas.search');
Route::delete('/admin/pessoas/{url}', 'Admin\PessoaController@destroy')->name('pessoas.destroy');
Route::get('/admin/pessoas/{url}', 'Admin\PessoaController@show')->name('pessoas.show');
Route::post('/admin/pessoas', 'Admin\PessoaController@store')->name('pessoas.store');

Route::get('/admin/pessoas', 'Admin\PessoaController@index')->name('pessoas.index');



//ROTAS DE GERAIS
Route::get('/admin/gerals', 'Admin\GeralController@index')->name('gerals.index');

//ROTAS DE Acessorios
Route::get('/admin', 'Admin\PessoaController@index')->name('admin.index');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
/*
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/