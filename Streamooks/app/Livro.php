<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    public function genero()
    {
        return $this->belongsTo('App\Genero');
    }

    public function editora()
    {
        return $this->belongsTo('App\Editora');
    }

    public function autor()
    {
        return $this->belongsTo('App\Autor');
    }
}
