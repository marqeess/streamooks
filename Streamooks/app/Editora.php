<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editora extends Model
{
    public function livros()
    {
        return $this->hasMany('App\Livro');
    }
    public function seditoras()
    {
        return $this->hasMany('App\Seditoras');
    }
    public function notificars()
    {
        return $this->hasMany('App\Notificar');
    }
}
