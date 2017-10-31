<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    public function livros()
    {
    	return $this->belongsToMany('App\Livro');
    }
    public function sautors()
    {
        return $this->hasMany('App\Sautors');
    }
    public function notificars()
    {
        return $this->hasMany('App\Notificar');
    }
}
