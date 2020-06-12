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


Route::prefix('admin')
        ->namespace('Admin')
         //->middleware('auth')
        ->group(function() {


        
 //ROTAS DE TELEFONE


    Route::delete('pessoas/{id}/telefones/{idtelefone}', 'TelefonePessoaController@destroy')->name('telefones.pessoa.destroy');
    Route::get('pessoas/{id}/telefones/{idtelefone}', 'TelefonePessoaController@show')->name('telefones.pessoa.show');        
    Route::put('pessoas/{id}/telefones/{idtelefone}', 'TelefonePessoaController@update')->name('telefones.pessoa.update');
    Route::get('pessoas/{id}/telefones/{idtelefone}/edit', 'TelefonePessoaController@edit')->name('telefones.pessoa.edit');
     Route::post('pessoas/{id}/telefones', 'TelefonePessoaController@store')->name('telefones.pessoa.store');
    Route::get('pessoas/{id}/telefones/create', 'TelefonePessoaController@create')->name('telefones.pessoa.create');
    Route::get('pessoas/{id}/telefones', 'TelefonePessoaController@index')->name('telefones.pessoa.index');            

        //ROTAS DE contas

    Route::delete('pessoas/{id}/contas/{idconta}', 'ContaPessoaController@destroy')->name('contas.pessoa.destroy');
    Route::get('pessoas/{id}/contas/{idconta}', 'ContaPessoaController@show')->name('contas.pessoa.show');        
    Route::put('pessoas/{id}/contas/{idconta}', 'ContaPessoaController@update')->name('contas.pessoa.update');
    Route::get('pessoas/{id}/contas/{idconta}/edit', 'ContaPessoaController@edit')->name('contas.pessoa.edit');
    Route::post('pessoas/{id}/contas', 'ContaPessoaController@store')->name('contas.pessoa.store');
    Route::get('pessoas/{id}/contas/create', 'ContaPessoaController@create')->name('contas.pessoa.create');
    Route::get('pessoas/{id}/contas', 'ContaPessoaController@index')->name('contas.pessoa.index');

    //ROTAS DE PESSOAS

    Route::get('pessoas/create', 'PessoaController@create')->name('pessoas.create');

    Route::put('pessoas/{url}', 'PessoaController@update')->name('pessoas.update');
    Route::get('pessoas/{url}/edite', 'PessoaController@edite')->name('pessoas.edite');  //EXPERIMENTAL
    Route::get('pessoas/{url}/edit', 'PessoaController@edit')->name('pessoas.edit');
    Route::any('pessoas/search', 'PessoaController@search')->name('pessoas.search');
    Route::delete('pessoas/{url}', 'PessoaController@destroy')->name('pessoas.destroy');
    Route::get('pessoas/{url}', 'PessoaController@show')->name('pessoas.show');
    Route::post('pessoas', 'PessoaController@store')->name('pessoas.store');
    
    Route::get('pessoas', 'PessoaController@index')->name('pessoas.index');
    
    
    
    //ROTAS DE GERAIS
    Route::get('/gerals', 'GeralController@index')->name('gerals.index');



    //ROTAS DE base (home-dashboard)
    Route::get('/', 'PessoaController@index')->name('admin.index');

});



//ROTAS DE Acessorios
//

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
/*
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/