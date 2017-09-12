<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

//Rota de registrar e entrar no site ------------------------------------------

Auth::routes();

//Rota para confirmar o endereço de email do usuario --------------------------

Route::get('confirmar/{email}/{token}', 'UserController@confirmar');
Route::get('confirmar/novamente', 'UserController@novamente');

//Rotas de administração do site ----------------------------------------------

Route::prefix('admin')->group(function () {

    Route::get('/', 'AdminController@index');
    Route::resource('generos', 'GeneroController');
    Route::get('generos/pesquisa/{pesquisar}', 'GeneroController@pesquisar');
    Route::resource('autores', 'AutorController');
    Route::resource('editoras', 'EditoraController');
    Route::resource('livros', 'LivroController');
    Route::get('/usuarios', 'AdminController@Users');

});


//Rotas de controle dos dados de usuarios logado no site -----------------------

Route::prefix('usuario')->group(function () {

    Route::get('/', 'UsuarioController@ProprioPerfil');
    Route::get('/configurar', 'UsuarioController@Configurar');


});




