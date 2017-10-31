<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    public function livro()
    {
        return $this->belongsTo('App\Livro');
    }
}
