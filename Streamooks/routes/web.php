<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'admin'], function() {
    
    Route::prefix('admin')->group(function () {

        //Route::group(['middleware' => 'auth'], function() {

            Route::get('/', 'AdminController@index');
            Route::get('/logout', 'AdminController@logout');
            Route::resource('generos', 'GeneroController');
            Route::resource('editoras', 'EditoraController');
            Route::resource('autores', 'AutorController');
            Route::resource('livros', 'LivroController');


        //});

        Route::get('/login', 'AdminController@login');
        Route::post('/login', 'AdminController@postLogin')->name('postLogin');

    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
