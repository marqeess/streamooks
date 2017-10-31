<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    public function generos()
    {
    	return $this->belongsToMany('App\Genero');
    }
    public function autors()
    {
    	return $this->belongsToMany('App\Autor');
    }
    public function editora()
    {
        return $this->belongsTo('App\Editora');
    }
    public function comentarios()
    {
        return $this->hasMany('App\Comentario');
    }
    public function favoritos()
    {
        return $this->hasMany('App\Favorito');
    }
    public function notificars()
    {
        return $this->hasMany('App\Notificar');
    }
}
