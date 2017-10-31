<?php

//Rota da pagina inicial

Route::get('/', 'NavegaController@index')->name('inicio');

//Rota de registrar e entrar no site ------------------------------------------

Auth::routes();

//Rota para confirmar o endereço de email do usuario --------------------------

Route::get('confirmar/{email}/{token}', 'UserController@confirmar');

//Rotas de administração do site ----------------------------------------------

Route::prefix('admin')->group(function () {

    Route::get('/', 'AdminController@index');
    Route::resource('generos', 'GeneroController');
    Route::resource('autores', 'AutorController');
    Route::resource('editoras', 'EditoraController');
    Route::resource('livros', 'LivroController');
    Route::resource('usuarios', 'UsuarioController');

});


//Rotas de controle dos dados de usuarios logado no site ---------------------

Route::prefix('usuario')->group(function () {

    Route::get('{id}', 'UsuarioController@Perfil');
    Route::post('/alterarsenha', 'UsuarioController@alterarSenha')->name('alterarsenha');
    Route::post('/alterarusuario', 'UsuarioController@alterarUsuario')->name('alterarusuario');


});

//Rota para leitura dos livros ------------------------------------------------
Route::middleware(['auth'])->group(function () {
    Route::get('ler/{id}', 'LeituraController@leitura');
    Route::post('ler/salvar', 'LeituraController@salvar')->name('salvarpagina');
});

//Rotas de Navegação do usuario comum -----------------------------------------

Route::middleware(['auth'])->group(function () {
    Route::get('generos', 'NavegaController@generos');
    Route::get('genero/{id}', 'NavegaController@unicoGenero');
    Route::get('editoraas', 'NavegaController@editoras')->name('editoraas');
    Route::get('editora/{id}', 'NavegaController@unicaEditora');
    Route::get('autorees', 'NavegaController@autores')->name('autorees');
    Route::get('autor/{id}', 'NavegaController@unicoAutor');
    Route::get('livro/{id}', 'NavegaController@unicoLivro');
    Route::get('livros', 'NavegaController@livros')->name('livros');
});

//Seguir

Route::post('seguirautor' , 'NavegaController@seguirAutor')->name('seguirautor');
Route::post('deseguirautor' , 'NavegaController@deseguirAutor')->name('deseguirautor');
Route::post('seguireditora' , 'NavegaController@seguirEditora')->name('seguireditora');
Route::post('deseguireditora' , 'NavegaController@deseguirEditora')->name('deseguireditora');

//Notas

Route::post('nota' , 'NavegaController@nota')->name('nota');

//Favoritos

Route::post('favoritar' , 'NavegaController@favoritar')->name('favoritar');
Route::post('desfavoritar' , 'NavegaController@desfavoritar')->name('desfavoritar');

//Comentarios

Route::post('comentar' , 'NavegaController@comentar')->name('comentar');
Route::post('comentar/deletar', 'NavegaController@deletarComentario')->name('deletarComentario');

Route::get('notificacoes' , 'NavegaController@notificacoes')->name('notificacoes');





